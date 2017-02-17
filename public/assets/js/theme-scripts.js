/*
 * Title:   Travelo - Travel, Tour Booking HTML5 Template - Main Javascript file
 * Author:  http://themeforest.net/user/soaptheme
 */

var stGlobals = {};
stGlobals.isMobile = (/(Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|windows phone)/.test(navigator.userAgent));
stGlobals.isMobileWebkit = /WebKit/.test(navigator.userAgent) && /Mobile/.test(navigator.userAgent);
stGlobals.isIOS = (/iphone|ipad|ipod/gi).test(navigator.appVersion);

String.prototype.lpad = function(padString, length) {
    var str = this;
    while (str.length < length)
        str = padString + str;
    return str;
}

$.fn.removeClassPrefix = function(prefix) {
    this.each(function(i, el) {
        var classes = el.className.split(" ").filter(function(c) {
            return c.lastIndexOf(prefix, 0) !== 0;
        });
        el.className = classes.join(" ");
    });
    return this;
};

// middle block plugin(set image in the middle of its parent object)
;(function(window, document, $) {
    var middleblock;
    var prototype = $.fn;
    middleblock = prototype.middleblock = function() {
        var $this = this;
        if ($(this).is(":visible")) {
            $this.bind("set.middleblock", set_middle_block).trigger('set.middleblock');
        }
        return $this;
    };

    function set_middle_block(event, value) {
        var $this = $(this);
        var $middleItem = $this.find(".middle-item");
        if ($middleItem.length < 1) {
            $middleItem = $this.children("img");
        }
        if ($middleItem.length < 1) {
            return;
        }
        var width = $middleItem.width();
        var height = $middleItem.height();
        if ($this.width() <= 1) {
            var parentObj = $this;
            while (parentObj.width() <= 1) {
                parentObj = parentObj.parent();
            }
            $this.css("width", parentObj.width() + "px");
        }
        $this.css("position", "relative");
        $middleItem.css("position", "absolute");

        if ($this.hasClass("middle-block-auto-height")) {
            $this.removeClass("middle-block-auto-height");
            $this.height(0);
        }
        if ($this.height() <= 1) {
            var parentObj = $this;
            while (parentObj.height() <= 1) {
                if (parentObj.css("float") =="left" && parentObj.index() == 0 && parentObj.next().length > 0) {
                    parentObj = parentObj.next();
                } else if (parentObj.css("float") == "left" && parentObj.index() > 0) {
                    parentObj = parentObj.prev();
                } else {
                    parentObj = parentObj.parent();
                }
            }
            $this.css("height", parentObj.outerHeight() + "px");
            $this.addClass("middle-block-auto-height");

            width = $middleItem.width();
            height = $middleItem.height();
            if (height <= 1) {
                height = parentObj.outerHeight();
            }
        }
        $middleItem.css("top", "50%");
        $middleItem.css("margin-top", "-" + (height / 2) + "px");
        if (width >= 1) {
            /*if ($this.width() == width) {
                $this.width(width);
            }*/
            $middleItem.css("left", "50%");
            $middleItem.css("margin-left", "-" + (width / 2) + "px");
        } else {
            $middleItem.css("left", "0");
        }
    }
}(this, document, jQuery));

/* jQuery CounTo plugin */
(function(a){a.fn.countTo=function(g){g=g||{};return a(this).each(function(){function e(a){a=b.formatter.call(h,a,b);f.html(a)}var b=a.extend({},a.fn.countTo.defaults,{from:a(this).data("from"),to:a(this).data("to"),speed:a(this).data("speed"),refreshInterval:a(this).data("refresh-interval"),decimals:a(this).data("decimals")},g),j=Math.ceil(b.speed/b.refreshInterval),l=(b.to-b.from)/j,h=this,f=a(this),k=0,c=b.from,d=f.data("countTo")||{};f.data("countTo",d);d.interval&&clearInterval(d.interval);d.interval=
setInterval(function(){c+=l;k++;e(c);"function"==typeof b.onUpdate&&b.onUpdate.call(h,c);k>=j&&(f.removeData("countTo"),clearInterval(d.interval),c=b.to,"function"==typeof b.onComplete&&b.onComplete.call(h,c))},b.refreshInterval);e(c)})};a.fn.countTo.defaults={from:0,to:0,speed:1E3,refreshInterval:100,decimals:0,formatter:function(a,e){return a.toFixed(e.decimals)},onUpdate:null,onComplete:null}})(jQuery);

/* on stage plugin */
;(function(window, document, $) {
    var onstage;
    var prototype = $.fn;
    onstage = prototype.onstage = function() {
        var scrollTop = $(window).scrollTop();
        var windowHeight = $(window).height();
        var $this = this;
        if ($this.offset().top + $this.height() * 0.9 <= scrollTop + windowHeight && $this.offset().top + $this.height() * 0.9 > scrollTop) {
            return true;
        }
        return false;
    };
}(this, document, jQuery));


/* soaptheme popup plugin */
(function($) {
    var stp, SoapPopup = function(){};

    SoapPopup.prototype = {
        constructor: SoapPopup,
        init: function() {

        },
        open: function(options, obj) {
            if (typeof options == "undefined") {
                options = {};
            }
            var wrapObj = options.wrapId ? "#" + options.wrapId : ".opacity-overlay";
            if ($(wrapObj).length < 1) {
                var idStr = options.wrapId ? " id='" + options.wrapId + "'" : "";
                $("<div class='opacity-overlay' " + idStr + "><div class='container'><div class='popup-wrapper'><i class='fa fa-spinner fa-spin spinner'></i><div class='col-xs-12 col-sm-9 popup-content'></div></div></div></div>").appendTo("body");
            }
            stp.wrap = $(wrapObj);
            stp.content = stp.wrap.find(".popup-content");
            stp.spinner = stp.wrap.find(".spinner");
            stp.contentContainer = stp.wrap.find(".popup-wrapper");

            if (stGlobals.isMobile) {
                stp.wrap.css({
                    height: $(document).height(),
                    position: 'absolute'
                });
                stp.contentContainer.css("top", $(window).scrollTop());
            }

            /*if (stGlobals.isMobile) {
                $(window).scrollTop(($(document).height() - stp.content.height()) / 2);
            }*/

            stp.updateSize();

            if (options.type == "ajax") {
                stp.content.html('');
                stp.content.height('auto').css("visibility", "hidden");
                stp.wrap.fadeIn();
                stp.spinner.show();
                $("body").addClass("overlay-open");
                $.ajax({
                    url: obj.attr("href"),
                    type: 'post',
                    dataType: 'html',
                    success: function(html) {
                        stp.content.html(html);
                        if (options.callBack) {
                            options.callBack(stp);
                        }
                        setTimeout(function() {
                            stp.content.css("visibility", "visible");
                            stp.spinner.hide();
                        }, 100);
                    }
                });
            } else if (options.type == "map") {
                stp.wrap.fadeIn();
                stp.spinner.show();
                var lngltd = options.lngltd.split(",");
                var contentWidth = stp.content.width();
                stp.content.gmap3({
                    clear: {
                        name: "marker",
                        last: true
                    }
                });
                var zoom = options.zoom ? parseInt(options.zoom, 10) : 12;
                stp.content.height(contentWidth * 0.5).gmap3({
                    map: {
                        options: {
                            center: lngltd,
                            zoom: zoom
                        }
                    },
                    marker: {
                        values: [
                            {latLng: lngltd}

                        ],
                        options: {
                            draggable: false
                        },
                    }
                });
                $("body").addClass("overlay-open");
            } else {
                var sourceId = obj.attr("href");
                if (typeof sourceId == "undefined") {
                    sourceId = obj.data("target");
                }
                stp.content.children().hide();
                if (stp.content.children(sourceId).length > 0) {
                    // ignore
                } else {
                    $(sourceId).appendTo(stp.content);
                }
                $(sourceId).show();
                stp.spinner.hide();
                stp.wrap.fadeIn(function() {
                    $(sourceId).find(".input-text").eq(0).focus();
                    $("body").addClass("overlay-open");
                });
            }
        },
        close: function() {
            $("body").removeClass("overlay-open");
            $("html").css("overflow", "");
            $("html").css("margin-right", "");
            stp.spinner.hide();
            stp.wrap.fadeOut();
        },
        updateSize: function() {
            if (stGlobals.isIOS) {
                var zoomLevel = document.documentElement.clientWidth / window.innerWidth;
                var height = window.innerHeight * zoomLevel;
                stp.contentContainer.css('height', height);
            } else if (stGlobals.isMobile) {
                stp.contentContainer.css('height', $(window).height());
            }
        },
        getScrollbarSize: function() {
            if (document.body.scrollHeight <= $(window).height()) {
                return 0;
            }
            if(stp.scrollbarSize === undefined) {
                var scrollDiv = document.createElement("div");
                scrollDiv.style.cssText = 'width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;';
                document.body.appendChild(scrollDiv);
                stp.scrollbarSize = scrollDiv.offsetWidth - scrollDiv.clientWidth;
                document.body.removeChild(scrollDiv);
            }
            return stp.scrollbarSize;
        }
    }

    $.fn.soapPopup = function(options) {
        stp = new SoapPopup();
        stp.init();

        $(document).bind('keydown', function (e) {
            var key = e.keyCode;
            if ($(".opacity-overlay:visible").length > 0 && key === 27) {
                e.preventDefault();
                stp.close();
            }
        });

        $(document).on("click touchend", ".opacity-overlay", function(e) {
            if ($("body").hasClass("overlay-open") && !$(e.target).is(".opacity-overlay .popup-content *")) {
                e.preventDefault();
                stp.close();
            }
        });

		$(document).on("click touchend", ".opacity-overlay [data-dismiss='modal']", function(e) {
            stp.close();
        });

        $(window).resize(function() {
            stp.updateSize();
        });

        stp.open(options, $(this));
        return $(this);
    };
})(jQuery);

if (typeof enableChaser == "undefined") {
    enableChaser = 1 // Enable Chaser menu (open on scroll) ?   1 - Yes / 0 - No
}

/*if(enableChaser == 1) {
    $(window).load(function() {

    });
}*/

/* disable click before loading page */
$("body").on("click", "a.popup-gallery", function(e) {
    e.preventDefault();
    return false;
});

function changeTraveloElementUI() {
    // change UI of select box
    $(".selector select").each(function() {
        var obj = $(this);
        if (obj.parent().children(".custom-select").length < 1) {
            obj.after("<span class='custom-select'>" + obj.children("option:selected").html() + "</span>");

            if (obj.hasClass("white-bg")) {
                obj.next("span.custom-select").addClass("white-bg");
            }
            if (obj.hasClass("full-width")) {
                //obj.removeClass("full-width");
                //obj.css("width", obj.parent().width() + "px");
                //obj.next("span.custom-select").css("width", obj.parent().width() + "px");
                obj.next("span.custom-select").addClass("full-width");
            }
        }
    });
    $("body").on("change", ".selector select", function() {
        if ($(this).next("span.custom-select").length > 0) {
            $(this).next("span.custom-select").text($(this).find("option:selected").text());
        }
    });

    $("body").on("keydown", ".selector select", function() {
        if ($(this).next("span.custom-select").length > 0) {
            $(this).next("span.custom-select").text($(this).find("option:selected").text());
        }
    });

    // change UI of file input
    $(".fileinput input[type=file]").each(function() {
        var obj = $(this);
        if (obj.parent().children(".custom-fileinput").length < 1) {
            obj.after('<input type="text" class="custom-fileinput" />');
            if (typeof obj.data("placeholder") != "undefined") {
                obj.next(".custom-fileinput").attr("placeholder", obj.data("placeholder"));
            }
            if (typeof obj.prop("class") != "undefined") {
                obj.next(".custom-fileinput").addClass(obj.prop("class"));
            }
            obj.parent().css("line-height", obj.outerHeight() + "px");
        }
    });

    $(".fileinput input[type=file]").on("change", function() {
        var fileName = this.value;
        var slashIndex = fileName.lastIndexOf("\\");
        if (slashIndex == -1) {
            slashIndex = fileName.lastIndexOf("/");
        }
        if (slashIndex != -1) {
            fileName = fileName.substring(slashIndex + 1);
        }
        $(this).next(".custom-fileinput").val(fileName);
    });
    // checkbox
    $(".checkbox input[type='checkbox'], .radio input[type='radio']").each(function() {
        if ($(this).is(":checked")) {
            $(this).closest(".checkbox").addClass("checked");
            $(this).closest(".radio").addClass("checked");
        }
    });
    $(".checkbox input[type='checkbox']").bind("change", function() {
        if ($(this).is(":checked")) {
            $(this).closest(".checkbox").addClass("checked");
        } else {
            $(this).closest(".checkbox").removeClass("checked");
        }
    });
    //radio
    $(".radio input[type='radio']").bind("change", function(event, ui) {
        if ($(this).is(":checked")) {
            var name = $(this).prop("name");
            if (typeof name != "undefined") {
                $(".radio input[name='" + name + "']").closest('.radio').removeClass("checked");
            }
            $(this).closest(".radio").addClass("checked");
        }
    });

    // datepicker
    $('.datepicker-wrap input').each(function() {
        var minDate = $(this).data("min-date");
        if (typeof minDate == "undefined") {
            minDate = 0;
        }
        $(this).datepicker({
            showOn: 'button',
            buttonImage: 'images/icon/blank.png',
            buttonText: '',
            buttonImageOnly: true,
            changeYear: false,
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            /*showOtherMonths: true,*/
            minDate: minDate,
            dateFormat: "mm/dd/yy",
            dayNamesMin: ["D", "L", "M", "M", "J", "V", "S"],
            beforeShow: function(input, inst) {
                var themeClass = $(input).parent().attr("class").replace("datepicker-wrap", "");
                $('#ui-datepicker-div').attr("class", "");
                $('#ui-datepicker-div').addClass("ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all");
                $('#ui-datepicker-div').addClass(themeClass);
            },
            onClose: function(selectedDate) {
                if ( $(this).attr('name') == 'date_from' ) {
                    if ( $(this).closest('form').find('input[name="date_to"]').length > 0 ) {
                        $(this).closest('form').find('input[name="date_to"]').datepicker("option", "minDate", selectedDate);
                    }
                }
                if ( $(this).attr('name') == 'date_to' ) {
                    if ( $(this).closest('form').find('input[name="date_from"]').length > 0 ) {
                        $(this).closest('form').find('input[name="date_from"]').datepicker("option", "maxDate", selectedDate);
                    }
                }
            }
        });
    });

    // placeholder for ie8, 9
    try {
        $('input, textarea').placeholder();
    } catch (e) {}
}

$(document).ready(function() {
    changeTraveloElementUI();

	if ( stGlobals.isMobile ) {
        $("body").addClass("is-mobile");
    }

    // parallax for wekbit mobile
    if (stGlobals.isMobileWebkit) {
        $(".parallax").css("background-attachment", "scroll");
    }
});

/* display photo gallery */
function displayPhotoGallery($item) {
    if (!$.fn.flexslider || $item.length < 1 || $item.is(":hidden")) {
        return;
    }
    var dataAnimation = $item.data("animation");
    var dataSync = $item.data("sync");
    if (typeof dataAnimation == "undefined") {
        dataAnimation = "slide";
    }
    var dataFixPos = $item.data("fix-control-nav-pos");
    var callFunc = $item.data("func-on-start");

    $item.flexslider({
        animation: dataAnimation,
        controlNav: true,
        animationLoop: true,
        slideshow: true,
        pauseOnHover: true,
        sync: dataSync,
        start: function(slider) {
            if (typeof dataFixPos != "undefined" && dataFixPos == "1") {
                var height = $(slider).find(".slides img").height();
                $(slider).find(".flex-control-nav").css("top", (height - 44) + "px");
            }
            if (typeof callFunc != "undefined") {
                try {
                    eval(callFunc + "();");
                } catch (e) {}
            }
        },
    });
}

/* display image carousel */
function displayImageCarousel($item) {
    if (!$.fn.flexslider || $item.length < 1 || $item.is(":hidden")) {
        return;
    }
    var dataAnimation = $item.data("animation");
    var dataItemWidth = $item.data("item-width");
    var dataItemMargin = $item.data("item-margin");
    var dataSync = $item.data("sync");
    if (typeof dataAnimation == "undefined") {
        dataAnimation = "slide";
    }
    if (typeof dataItemWidth == "undefined") {
        dataItemWidth = 70;
    }
    if (typeof dataItemMargin == "undefined") {
        dataItemMargin = 10;
    }
    dataItemWidth = parseInt(dataItemWidth, 10);
    dataItemMargin = parseInt(dataItemMargin, 10);

    var dataAnimationLoop = true;
    var dataSlideshow = false;
    if (typeof dataSync == "undefined") {
        dataSync = "";
        //dataAnimationLoop = true;
        dataSlideshow = true;
    }
    $item.flexslider({
        animation: dataAnimation,
        controlNav: true,
        animationLoop: dataAnimationLoop,
        slideshow: dataSlideshow,
        itemWidth: dataItemWidth,
        itemMargin: dataItemMargin,
        minItems: 2,
        pauseOnHover: true,
        asNavFor: dataSync,
        start: function(slider) {
            if (dataSync != "") {
                $(slider).find(".slides > li").height(dataItemWidth);
                $(slider).find(".slides > li > img").each(function() {
                    if($(this).width() < 1) {
                        $(this).load(function() {
                            $(this).parent().middleblock();
                        });
                    } else {
                        $(this).parent().middleblock();
                    }
                });
            } else {
                $(slider).find(".middle-block img, .middle-block .middle-item").each(function() {
                    if($(this).width() < 1) {
                        $(this).load(function() {
                            $(this).closest(".middle-block").middleblock();
                        });
                    } else {
                        $(this).closest(".middle-block").middleblock();
                    }
                });
            }
        },
        after: function(slider) {
            if (slider.currentItem == 0) {
                target = 0;
                if (slider.transitions) {
                    target = (slider.vars.direction === "vertical") ? "translate3d(0," + target + ",0)" : "translate3d(" + target + ",0,0)";
                    slider.container.css("-" + slider.pfx + "-transition-duration", "0s");
                    slider.container.css("transition-duration", "0s");
                }
                slider.args[slider.prop] = target;
                slider.container.css(slider.args);
                slider.container.css('transform',target);
            }
        }

    });
}

$(window).load(function() {

    // back to top
    $("body").on("click", "#back-to-top", function(e) {
        e.preventDefault();
        $("html,body").animate({scrollTop: 0}, 1000);
    });

    // Mobile search
    if ($('#mobile-search-tabs').length > 0) {
        var mobile_search_tabs_slider = $('#mobile-search-tabs').bxSlider({
            mode: 'fade',
            infiniteLoop: false,
            hideControlOnEnd: true,
            touchEnabled: true,
            pager: false,
            onSlideAfter: function($slideElement, oldIndex, newIndex) {
                $('a[href="' + $($slideElement).children("a").attr("href") + '"]').tab('show');
            }
        });
    }

    // Mobile menu
    $(".mobile-menu ul.menu > li.menu-item-has-children").each(function(index) {
        var menuItemId = "mobile-menu-submenu-item-" + index;
        $('<button class="dropdown-toggle collapsed" data-toggle="collapse" data-target="#' + menuItemId + '"></button>').insertAfter($(this).children("a"));
        /*$(this).children(".dropdown-toggle").click(function(e) {
            if ($(this).hasClass("collapsed")) {
                $(this).parent().addClass("open");
            } else {
                $(this).parent().removeClass("open");
            }
        });*/
        $(this).children("ul").prop("id", menuItemId);
        $(this).children("ul").addClass("collapse");

        $("#" + menuItemId).on("show.bs.collapse", function() {
            $(this).parent().addClass("open");
        });
        $("#" + menuItemId).on("hidden.bs.collapse", function() {
            $(this).parent().removeClass("open");
        });
    });

    // middle block
    $(".middle-block").middleblock();

    // third level menu position to left
    function fixPositionSubmenu() {
        $("#main-menu .menu li.menu-item-has-children > ul, .ribbon ul.menu.mini").each(function(e) {
            if ($(this).closest(".megamenu").length > 0) {
                return;
            }
            var leftPos = $(this).parent().offset().left + $(this).parent().width();
            if (leftPos + $(this).width() > $("body").width()) {
                $(this).addClass("left");
            } else {
                $(this).removeClass("left");
            }
        });
    }
    fixPositionSubmenu();

    // chaser
    if (enableChaser == 1 && $('#content').length > 0 && $('#main-menu ul.menu').length > 0) {
        var forchBottom;
        var chaser = $('#main-menu ul.menu').clone().hide().appendTo(document.body).wrap("<div class='chaser hidden-mobile'><div class='container'></div></div>");
        $('<h1 class="logo navbar-brand"><a title="Travelo - home" href="index.html"><img alt="" src="assets/images/logo.png"></a></h1>').insertBefore('.chaser .menu');
        var forch = $('#content').first();
        forchBottom = forch.offset().top + 2;
        $(window).on('scroll', function () {
            var top = $(document).scrollTop();
            if ($(".chaser").is(":hidden") && top > forchBottom) {
                $(".chaser").slideDown(300);
                //chaser.fadeIn(300, shown);
            } else if ($(".chaser").is(":visible") && top < forchBottom) {
                $(".chaser").slideUp(200);
                //chaser.fadeOut(200, hidden);
            }
        });
        $(window).on('resize', function () {
            var top = $(document).scrollTop();
            if ($(".chaser").is(":hidden") && top > forchBottom) {
                $(".chaser").slideDown(300);
            } else if ($(".chaser").is(":visible") && top < forchBottom) {
                $(".chaser").slideUp(200);
            }
        });

        $(".chaser").css("visibility", "hidden");
        chaser.show();
        fixPositionMegaMenu(".chaser");
        $(".chaser .megamenu-menu").removeClass("light");
        //chaser.hide();
        $(".chaser").hide();
        $(".chaser").css("visibility", "visible");
    }

    // accordion & toggles
    $(".toggle-container .panel-collapse").each(function() {
        if (!$(this).hasClass("in")) {
            $(this).closest(".panel").find("[data-toggle=collapse]").addClass("collapsed");
        }
    });

    $(".toggle-container.with-image").each(function() {
        var type = "";
        var duration = "1s";
        if (typeof $(this).data("image-animation-type") != "undefined") {
            type = $(this).data("image-animation-type");
        }
        if (typeof $(this).data("image-animation-duration") != "undefined") {
            duration = $(this).data("image-animation-duration");
        }
        var imageHtml = '<div class="image-container';
        if (type != "") {
            imageHtml += ' animated" data-animation-type="' + type + '" data-animation-duration="' + duration;
        }
        imageHtml += '"><img src="" alt="" /></div>';
        $(this).prepend(imageHtml);
        if ($(this).find(".panel-collapse.in").length > 0) {
            var activeImg = $(this).find(".panel-collapse.in").parent().children("img");
            var src = activeImg.attr("src");
            var width = activeImg.attr("width");
            var height = activeImg.attr("height");
            var alt = activeImg.attr("alt");

            var imgObj = $(this).find(".image-container img");
            imgObj.attr("src", src);
            if (typeof width != "undefined") {
                imgObj.attr("width", width);
            }
            if (typeof height != "undefined") {
                imgObj.attr("height", height);
            }
            if (typeof alt != "undefined") {
                imgObj.attr("alt", alt);
            }
            $(this).children(".image-container").show();
        }
    });

    $('.toggle-container.with-image').on('show.bs.collapse', function (e) {
        var activeImg = $(e.target).parent().children("img");
        if (activeImg.length > 0) {
            var src = activeImg.attr("src");
            var width = activeImg.attr("width");
            var height = activeImg.attr("height");
            var alt = activeImg.attr("alt");

            var imgObj = $(this).find(".image-container img");
            imgObj.attr("src", src);
            if (typeof width != "undefined") {
                imgObj.attr("width", width);
            }
            if (typeof height != "undefined") {
                imgObj.attr("height", height);
            }
            if (typeof alt != "undefined") {
                imgObj.attr("alt", alt);
            }

            imgObj.parent().css("visibility", "hidden");
            imgObj.parent().removeClass(imgObj.parent().data("animation-type"));
            setTimeout(function() {
                imgObj.parent().addClass(imgObj.parent().data("animation-type"));
                imgObj.parent().css("visibility", "visible");
            }, 10);
        }
    });

    $('.toggle-container.with-image').on('shown.bs.collapse', function (e) {
        //e.target
    });

    // alert, info box
    $("body").on("click", ".alert > .close, .info-box > .close", function() {
        $(this).parent().fadeOut(300);
    });

    // tooltip
    $("[data-toggle=tooltip]").tooltip();

    // testimonials
    function fixTestimonialHeight(slider) {
        var maxHeight = 0;
        $(slider).find(".slides > li").each(function() {
            $(this).css("height", "auto");
            if ($(this).height() > maxHeight) {
                maxHeight = $(this).height();
            }
        });
        $(slider).find(".slides > li").height(maxHeight);
    }
    function displayTestimonials() {
        try {
            if ($('.testimonial.style1').length > 0 && $('.testimonial.style1').is(":visible")) {
                $('.testimonial.style1').flexslider({
                    namespace: "testimonial-",
                    animation: "slide",
                    controlNav: true,
                    animationLoop: false,
                    directionNav: false,
                    slideshow: false,
                    start: fixTestimonialHeight
                });
            }
        } catch (e) {}
        try {
            if ($('.testimonial.style2').length > 0 && $('.testimonial.style2').is(":visible")) {
                $('.testimonial.style2').flexslider({
                    namespace: "testimonial-",
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    directionNav: true,
                    slideshow: false,
                    start: fixTestimonialHeight
                });
            }
        } catch (e) {}
        try {
            if ($('.testimonial.style3').length > 0 && $('.testimonial.style3').is(":visible")) {
                $('.testimonial.style3').flexslider({
                    namespace: "testimonial-",
                    controlNav: false,
                    animationLoop: false,
                    directionNav: true,
                    slideshow: false,
                    start: fixTestimonialHeight
                });
            }
        } catch (e) {}
    }
    displayTestimonials();

    /* photo gallery and slideshow */
    // photo gallery with thumbnail
    $('.image-carousel').each(function() {
        displayImageCarousel($(this));
    });
    $('.photo-gallery').each(function() {
        displayPhotoGallery($(this));
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var contentId = $(e.target).attr("href");
        if ($(contentId).find(".image-carousel").length > 0) {
            displayImageCarousel($(contentId).find(".image-carousel"));
        }
        if ($(contentId).find(".photo-gallery").length > 0) {
            displayPhotoGallery($(contentId).find(".photo-gallery"));
        }
        if ($(contentId).find(".testimonial").length > 0) {
            displayTestimonials();
        }
        $(contentId).find(".middle-block").middleblock();
    });

    // popup
    $("body").on("click", "a.popup-gallery", function(e) {
        e.preventDefault();
        $(this).soapPopup({
            type: "ajax",
            wrapId: "soap-gallery-popup",
            callBack: function(stp) {
                if (stp.wrap.find('.image-carousel').length > 0) {
                    displayImageCarousel(stp.wrap.find('.image-carousel'));
                }
                if (stp.wrap.find('.photo-gallery').length > 0) {
                    displayPhotoGallery(stp.wrap.find('.photo-gallery'));
                }
            }
        });
    });

    $("body").on("click", ".popup-map", function(e) {
        var lngltd = $(this).data("box");
        if (typeof lngltd != "undefined") {
            e.preventDefault();
            $(this).soapPopup({
                type: "map",
                zoom: 12,
                wrapId: "soap-map-popup",
                lngltd: lngltd
            });
        }
    });

    $("body").on("click", ".soap-popupbox", function(e) {
        e.preventDefault();
        var sourceId = $(this).attr("href");
        if (typeof sourceId == "undefined") {
            sourceId = $(this).data("target");
        }
        if (typeof sourceId == "undefined") {
            return;
        }
        if ($(sourceId).length < 1) {
            return;
        }
        $(this).soapPopup({
            wrapId: "soap-popupbox",
        });
    });

    // style changer
    $(".style-changer .design-skins a").click(function(e) {
        e.preventDefault();
        $(this).closest("ul").children("li").removeClass("active");
        $(this).parent().addClass("active");
    });
    $("#style-changer .style-toggle").click(function(e) {
        e.preventDefault();
        if ($(this).hasClass("open")) {
            $("#style-changer").addClass("opened");
            $(this).removeClass("open");
            $(this).addClass("close");
        } else {
            $("#style-changer").removeClass("opened");
            $(this).removeClass("close");
            $(this).addClass("open");
        }
    });

    // filters option
    $(".filters-container .filters-option a").click(function(e) {
        e.preventDefault();
        if ($(this).parent().hasClass("active")) {
            $(this).parent().removeClass("active");
        } else {
            $(this).parent().addClass("active");
        }
    });

    // sort of trip
    $(".sort-trip a").click(function(e) {
        e.preventDefault();
        $(this).parent().parent().children().removeClass("active");
        $(this).parent().addClass("active");
    });

    // redirect to the location
    $(".location-reload").click(function(e) {
        e.preventDefault();
        var url = $(this).prop("href").split("#")[0];
        if (window.location.href.indexOf(url) != -1) {
            var hash = $(this).prop("href").split("#")[1];
            if (typeof hash != "undefined" && hash != "" && $("a[href='#" + hash + "']").length > 0) {
                $("a[href='#" + hash + "']").tab('show');
            }
        } else {
            window.location.href = $(this).prop("href");
        }
    });

    // promo box
    function fixPromoBoxHeight() {
        $(".promo-box").each(function() {
            if ($(this).find(".content-section").css("float") == "right") {
                var maxHeight = $(this).find(".image-container > img").height();
                $(this).find(".content-section .table-wrapper").css("height", "auto");
                var calcPaddingTop = $(".content-section").css("padding-top");
                var calcPaddingBottom = $(".content-section").css("padding-bottom");
                var calcPadding = 0;
                try {
                    calcPadding = parseInt(calcPaddingTop, 10) + parseInt(calcPaddingBottom, 10);
                } catch (e) {  }
                var contentHeight = $(this).find(".content-section >.table-wrapper").length > 0 ? $(this).find(".content-section > .table-wrapper").height() + calcPadding : $(this).find(".content-section").innerHeight();
                if (maxHeight < contentHeight) {
                    maxHeight = contentHeight;
                } else {
                    maxHeight += 15;
                }
                $(this).find(".image-container").height(maxHeight);
                $(this).find(".content-section").innerHeight(maxHeight);
                $(this).find(".content-section .table-wrapper").css("height", "100%");
                $(this).find(".image-container").css("margin-left", "-5%");
                $(this).find(".image-container").css("position", "relative");
                $(this).find(".image-container > img").css("position", "absolute");
                $(this).find(".image-container > img").css("bottom", "0");
                $(this).find(".image-container > img").css("left", "0");
            } else {
                $(this).find(".image-container").css("height", "auto");
                $(this).find(".image-container").css("margin", "0");
                $(this).find(".content-section").css("height", "auto");
                $(this).find(".image-container > img").css("position", "static");
            }
            if (!$(this).find(".image-container > img").hasClass("animated")) {
                $(this).find(".image-container > img").css("visibility", "visible");
            }
        });
    }
    fixPromoBoxHeight();

    // fit video
    if ($.fn.fitVids) {
        $('.full-video').fitVids();
    }

    // go back
    $(".go-back").click(function(e) {
        e.preventDefault();
        window.history.go(-1);
    });

    // activate tab
	var traveloLocationHash = window.location.hash;
	if (traveloLocationHash != "") {
		traveloLocationHash = escape(traveloLocationHash.replace("#", ""));
		if ($('a[href="#' + traveloLocationHash + '"]').length > 0) {
			setTimeout(function() {
				$('a[href="#' + traveloLocationHash + '"]').tab('show');
			}, 100);
		}
	}

    // parallax
    if(!stGlobals.isMobileWebkit && $(".parallax").length > 0) {
        $.stellar({
            responsive: true,
            horizontalScrolling: false
        });
    }

    if($().waypoint && !stGlobals.isMobile) {
        // animation effect
        $('.animated').waypoint(function() {
            var type = $(this).data("animation-type");
            if (typeof type == "undefined" || type == false) {
                type = "fadeIn";
            }
            $(this).addClass(type);

            var duration = $(this).data("animation-duration");
            if (typeof duration == "undefined" || duration == false) {
                duration = "1";
            }
            $(this).css("animation-duration", duration + "s");

            var delay = $(this).data("animation-delay");
            if (typeof delay != "undefined" && delay != false) {
                $(this).css("animation-delay", delay + "s");
            }

            $(this).css("visibility", "visible");

            setTimeout(function() { $.waypoints('refresh'); }, 1000);
        }, {
            triggerOnce: true,
            offset: 'bottom-in-view'
        });
    }

	// display counter
    if ($().waypoint) {
        $('.counters-box').waypoint(function() {
            $(this).find('.display-counter').each(function() {
                var value = $(this).data('value');
                $(this).countTo({from: 0, to: value, speed: 3000, refreshInterval: 10});
            });
            setTimeout(function() { $.waypoints('refresh'); }, 1000);
        }, {
            triggerOnce: true,
            offset: '100%'
        });
    } else {
        $(".counters-box .display-counter").each(function() {
            var value = $(this).data('value');
            $(this).text(value);
        });
    }

    // mobile top nav(language and currency)
    $("body").on("click", function(e) {
        var target = $(e.target);
        if (!target.is(".mobile-topnav .ribbon.opened *")) {
            $(".mobile-topnav .ribbon.opened > .menu").toggle();
            $(".mobile-topnav .ribbon.opened").removeClass("opened");
        }
    });
    $(".mobile-topnav .ribbon > a").on("click", function(e) {
        e.preventDefault();
        if ($(".mobile-topnav .ribbon.opened").length > 0 && !$(this).parent().hasClass("opened")) {
            $(".mobile-topnav .ribbon.opened > .menu").toggle();
            $(".mobile-topnav .ribbon.opened").removeClass("opened");
        }
        $(this).parent().toggleClass("opened");
        $(this).parent().children(".menu").toggle(200);
        if ($(this).parent().hasClass("opened") && $(this).parent().children(".menu").offset().left + $(this).parent().children(".menu").width() > $("body").width()) {
            var offsetX = $(this).parent().children(".menu").offset().left + $(this).parent().children(".menu").width() - $("body").width();
            offsetX = $(this).parent().children(".menu").position().left - offsetX - 1;
            $(this).parent().children(".menu").css("left", offsetX + "px");
        } else {
            $(this).parent().children(".menu").css("left", "0");
        }
    });

    // slideshow bg
    function resizeSlideshowBGHeight() {
        if ($(".slideshow-bg.full-screen").length == 1) {
            var offsetTop = $(".slideshow-bg.full-screen").offset().top;
            $(".slideshow-bg.full-screen").height($(window).height() - offsetTop);
        }
    }
    resizeSlideshowBGHeight();

    // isotope
    $(".items-container.isotope").each(function() {
        if ( !$.fn.isotope ) {
            return;
        }
        var _container       = $(this),
            _filter          = _container.siblings('.gallery-filter'),
            _links           = _filter.find('a');
        var _options = {
            layoutMode : 'fitRows',
            itemSelector : '.iso-item',
            animationEngine: 'best-available',
            resizable: false,
        };

        function runIsotope() {
            var $container = _container.addClass('active').isotope(_options, function() {
                _container.css({overflow:'visible'});
            });
        };

        _links.bind('click',function() {
            var current     = $(this),
                selector    = current.data('filter');
            _links.removeClass('active');
            current.addClass('active');

            _options.filter = '.' + selector;
            _container.isotope(_options, function() {
                _container.css({overflow:'visible'});
            });

            return false;
        });

        $(window).on('debouncedresize', function() {
            _container.isotope("reLayout");
        });

        runIsotope();
    });

    // fix position in resize
    $(window).resize(function() {
        $(".middle-block").middleblock();
        fixPositionMegaMenu();
        fixPositionSubmenu();
        fixPromoBoxHeight();
        fixTestimonialHeight('.testimonial');
        // fix slider position of gallery slideshow style2
        if ($(".photo-gallery.style2").length > 0) {
            $(".photo-gallery.style2").each(function() {
                var height = $(this).find(".slides img").height();
                $(this).find(".flex-control-nav").css("top", (height - 44) + "px");
            });
        }
        resizeSlideshowBGHeight();
    });
});

// mega menu
var megamenu_items_per_column = 6;
function fixPositionMegaMenu(parentObj) {
    if (typeof parentObj == "undefined") {
        parentObj = "";
    } else {
        parentObj += " ";
    }
    $(parentObj + ".megamenu-menu").each(function() {
        var paddingLeftStr = $(this).closest(".container").css("padding-left");
        var paddingLeft = parseInt(paddingLeftStr, 10);
        var offsetX = $(this).offset().left - $(this).closest(".container").offset().left - paddingLeft;
        if (offsetX == 0) { return; }
        $(this).children(".megamenu-wrapper").css("left", "-" + offsetX + "px");
        $(this).children(".megamenu-wrapper").css("width", $(this).closest(".container").width() + "px");
        if (typeof $(this).children(".megamenu-wrapper").data("items-per-column") != "undefined") {
            megamenu_items_per_column = parseInt($(this).children(".megamenu-wrapper").data("items-per-column"), 10);
        }
        //$(this).children(".megamenu-wrapper").show();
        var columns_arr = new Array();
        var sum_columns = 0;
        $(this).find(".megamenu > li").each(function() {
            var each_columns = Math.ceil($(this).find("li > a").length / megamenu_items_per_column);
            if (each_columns == 0) {
                each_columns = 1;
            }
            columns_arr.push(each_columns);
            sum_columns += each_columns;
        });
        $(this).find(".megamenu > li").each(function(index) {
            $(this).css("width", (columns_arr[index] / sum_columns * 100) + "%");
            $(this).addClass("megamenu-columns-" + columns_arr[index]);
        });

        $(this).find(".megamenu > li.menu-item-has-children").each(function(index) {
            if ($(this).children(".sub-menu").length < 1) {
                $(this).append("<ul class='sub-menu'></ul>");
                for (var j = 0; j < columns_arr[index]; j++) {
                    $(this).children(".sub-menu").append("<li><ul></ul></li>")
                }
                var lastIndex = $(this).children("ul").eq(0).children("li").length - 1;
                $(this).children("ul").eq(0).children("li").each(function(i) {
                    var parentIndex = Math.floor(i / megamenu_items_per_column);
                    $(this).closest("li.menu-item-has-children").children(".sub-menu").children("li").eq(parentIndex).children("ul").append($(this).clone());
                    if (i == lastIndex) {
                        $(this).closest(".menu-item-has-children").children("ul").eq(0).remove();
                    }
                });
            }
        });
        $(this).children(".megamenu-wrapper").show();
    });
}
fixPositionMegaMenu();

// login box
$("body").on("click", ".travelo-signup-box .signup-email", function(e) {
    e.preventDefault();
    $(this).closest(".travelo-signup-box").find(".simple-signup").hide();
    $(this).closest(".travelo-signup-box").find(".email-signup").show();
    $(this).closest(".travelo-signup-box").find(".email-signup").find(".input-text").eq(0).focus();
});

// THIS SCRIPT DETECTS THE ACTIVE ELEMENT AND ADDS ACTIVE CLASS (This should be removed in the php version.)
$(document).ready(function(){
    var pathname = window.location.pathname,
        page = pathname.split(/[/ ]+/).pop(),
        menuItems = $('#main-menu a, #mobile-primary-menu a');
    menuItems.each(function(){
        var mi = $(this),
            miHrefs = mi.attr("href"),
            miParents = mi.parents('li');
        if(page == miHrefs) {
            miParents.addClass("active").siblings().removeClass('active');
        }
    });
});
