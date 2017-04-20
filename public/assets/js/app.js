var app = angular.module("XHR", []);

app.controller("indexCompany", ['$scope', '$http', function($scope, $http) {
    $scope.company = {
        pais_id: 0
    };
    $scope.filtros = [{
            id: "client",
            nombre: "Clientes"
        },
        {
            id: "prove",
            nombre: "Proveedores"
        },
        {
            id: "cp",
            nombre: "Clientes/Proveedores"
        },
        {
            id: "todos",
            nombre: "todas las Compañias"
        }
    ];

    $scope.filter_table = function() {
        //alert($scope.relacion.id);
        var url = "/comp/" + $scope.relacion.id;
        //  $('#tabla').empty();
        //$( "#tabla" ).load(url);
        /*$http.get(url).then(
          function(resp){
            var data=resp.data;
            var url="/table/"+data;
          //  $scope.compa  =  resp.data;
            $('#tabla').empty();
            //$( "#tabla" ).load(url);
          //  $('#tabla').append($(resp.data))
            //alert(  $scope.compa);
          },
          function (){
          }
        );*/
    }; //
}]); //fin controller index

///////////CompanyCtrl CONTROLLER
app.controller("CompanyCtrl", ['$scope', '$http', function($scope, $http) {
    $scope.company = {
        pais_id: 0
    };
    $scope.airplanes = [];
    $scope.states = [];
    $scope.getStates = function() {
        var url = "/state/" + $scope.company.pais_id;
        $http.get(url).then(
            function(resp) {
                $scope.states = resp.data;
            },
            function() {}
        );
    };
    $scope.message = false;
    $scope.show_error = false;
    $scope.message_error = [];
    $scope.save = function($event) {
        $event.preventDefault();
        var company = $scope.company;
        company["_token"] = $("input[name=_token]").val();
        company.aviones = $scope.airplanes;
        $http.post('/companys', company)
            .then(
                function(response) { // success callback
                    if (response.data.message == "bien") {
                        $scope.message = "Compañia Agregada Exitosamente";
                        $scope.show_error = false;
                    } else { //sin no bien
                        $scope.show_error = true;
                        $scope.message = false; //ocultamos el div del mensaje bien
                        $scope.message_error = response.data.error;
                    }
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
    }; //fin save
    //$scope.init();
    $scope.airplanesdelete = function() {
        $scope.airplanes.pop();
    };
}]); //fin controller companys

///////////////controlador de editar
app.controller("EditCompanyCtrl", function($scope, $http) {
    $scope.company = {
        pais_id: 0
    };
    $scope.airplanes = [];
    $scope.states = [];
    //  alert($("select#pais_id").val());
    $scope.getStates = function() {
        var url = "/state/" + $scope.company.pais_id;
        //alert($scope.company.pais_id);
        $http.get(url).then(
            function(resp) {
                $scope.states = resp.data;
                //alert(resp);
            },
            function() {}
        );
    };
    $scope.validate_air = function($air) {
        if ($air.tipo == null || $air.matricula == null || $air.piloto1 == null || $air.licencia1 == null) {
            return false;
        } else {
            return true;
        }
    };

    $scope.airplanesdelete = function() {
        var largo = $scope.airplanes.length;
        var nombre = $scope.airplanes[largo - 1].tipo;
        var id_air = $scope.airplanes[largo - 1].id;
        var data = [];
        data["_token"] = $("input[name=_token]").val();
        if (largo > 0 && $scope.validate_air($scope.airplanes[largo - 1]) && id_air != null) {
            if (confirm("¿Esta Seguro que desea Eliminar el Avion " + nombre + "?") === true) {

                $http.post('/avion/' + id_air, data)
                    .then(
                        function(response) { // success callback
                            $scope.message = response.data.message;
                            $scope.show_error = false;
                            $scope.airplanes.pop();
                        },
                        function(response) { // failure callback
                            $scope.message = false; //ocultamos el div del mensaje bien
                            var errors = response.data;
                            $scope.show_error = true; //mostramos el div del mensaje error
                            $scope.message_error = errors; //
                        }
                    ); //fin then
            } //fin si es un avion de BD
        } else {
            $scope.airplanes.pop();
        }
    };
    // $scope.company = RestApi.query();
    $scope.edit = function($event) {
        $event.preventDefault();
        var company = $scope.company;
        company["_token"] = $("input[name=_token]").val();
        company.aviones = $scope.airplanes;
        var url = '/companys/' + $scope.company.id;
        $http.put(url, company)
            .then(
                function(response) { // success callback
                    if (response.data.message == "bien") {
                        $scope.message = "Compañia Actualizada Exitosamente";
                        $scope.show_error = false;
                    } else { //sin no bien
                        $scope.message = false; //ocultamos el div del mensaje bien
                        $scope.show_error = true;
                        $scope.message_error = response.data.error;
                    }
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
    }; //fin save

}); //EditCompanyCtrl

///////////ESTIMATES CONTROLLER
app.controller("EstimateCtrl", ['$scope', '$http', '$timeout', function($scope, $http, $timeout) {
    //alert(typeof $scope.invoice.fecha_pag);
    //  alert('bien');
    $scope.estimate = {
        total: 0,
        ganancia: 0,
        descuento: 0,
        subtotal: 0

    };
    //
    $scope.data_estimates = [];
    $scope.aviones = {};
    $scope.airs = [];
    $scope.categorias = null;
    $scope.proveedor = null;
    $scope.cliente = null;
    $scope.matricula = null;
    $scope.info = null;

    $scope.actualizar = function(opc) {
        var sub = $scope.subtotal();
        $scope.estimate.subtotal = sub;
        $scope.estimate.ganancia = $scope.ganancia();
        $scope.total();
        data["_token"] = $("input[name=_token]").val();
        data['ganancia'] = $scope.estimate.ganancia;
        data['subtotal'] = sub;
        data['total'] = $scope.estimate.total;
        data['estimate_id'] = $scope.estimate.id;
        return data;
    }
    $scope.delete = function(index) { //delete item factura specific
        var largo = $scope.data_estimates.length;
        //  var nombre=$scope.data_estimates[index].tipo;
        var id_data = $scope.data_estimates[index].id;
        if (largo > 0 && id_data != null) {
            if (confirm("¿Esta Seguro que desea Eliminar el Item #: " + (index + 1) + " de la base de Datos?") === true) {
                data = {}
                $scope.data_estimates.splice(index, 1);
                data = $scope.actualizar(1);
                $http.post('/item/' + id_data, data)
                    .then(
                        function(response) { // success callback
                            $scope.message = response.data.message;
                            $scope.show_error = false;
                        },
                        function(response) { // failure callback
                            $scope.message = false; //ocultamos el div del mensaje bien
                            var errors = response.data;
                            $scope.show_error = true; //mostramos el div del mensaje error
                            $scope.message_error = errors; //
                        }
                    ); //fin then
            } //fin si es un avion de BD
        } else {
            $scope.data_estimates.splice(index, 1);
            var sub = $scope.subtotal();
            $scope.estimate.subtotal = sub;
            $scope.total();
            $scope.estimate.ganancia = $scope.ganancia();
        }
    };

    $scope.search_descrip = function(obj, key, value) { //delete item factura specific
        for (var i = 0; i < $scope.servicios.length; i++) {
            if (obj[i][key] === value) {
                return obj[i].descripcion;
            }
        } //fin para
        return null;
    };
    $scope.search_precio = function(obj, key, value) { //delete item factura specific
        for (var i = 0; i < $scope.servicios.length; i++) {
            if (obj[i][key] === value) {
                return obj[i].precio;
            }
        } //fin para
        return null;
    };
    $scope.inicializar = function(index) { //
        var servicio_id = $scope.data_estimates[index].servicio_id;
        var descripcion = $scope.search_descrip($scope.servicios, 'id', servicio_id);
        var precio=$scope.search_precio($scope.servicios, 'id', servicio_id);
        $scope.data_estimates[index].cantidad = 1;
        $scope.data_estimates[index].precio = precio;
        $scope.data_estimates[index].descripcion = descripcion;
        $scope.calcular(index);
        //alert($scope.data_invoices[index].cantidad);
    };
    $scope.cargar_tabla = function($id) {
        var table = $('#example3').DataTable();
        table.clear();
        if ($id == 1) {
            $('#titulo').html('Listado de Clientes');
            $('.cliente').css('display', 'block');
        } else if ($id == 0) {
            $('#titulo').html('Listado de Proveedores');
            $('.cliente').css('display', 'block');
        }
        $http.get('/clientes/' + $id).then(
            function(resp) {
                if ($id == 1) {
                    $scope.tipo = 1;
                    $scope.companys = resp.data;
                } else {
                    $scope.tipo = 0;
                    $scope.providers = resp.data;
                }
                var tipo = null;
            //    $("#yourtableid tr").remove();
              //  alert();
                // if(resp.data==null){
                //   alert('nada');
                // }angular.equals(resp.data, {})
                if(jQuery.isEmptyObject( resp.data)){
                  table.clear().draw();
                //  $('#example3 tr:not(:first-child)').slice(1).remove();
                 //  $('#example3 tbody').remove();
                }else{
                angular.forEach(resp.data, function(value, key) {
                    /* Vamos agregando a nuestra tabla las filas necesarias */
                    switch (value.tipo) {
                        case "client":
                            tipo = 'Cliente';
                            break;
                        case "prove":
                            tipo = 'Proveedor';
                            break;
                        case "cp":
                            tipo = 'Cliente/Proveedor';
                            break;
                    }
                    table.row.add([
                        value.id,
                        value.nombre,
                        value.pais,
                        value.correo,
                        tipo
                    ]).draw(false);
                    //alert(tipo);
                });
              }//fin si no es vacio
                //alert(resp);
            },
            function() {}
        );
    };
    $('#example3 > tbody').on('dblclick', '>tr', function() {
        var tab = $('#example3').DataTable();
        var datos = tab.row(this).data();
        var id = datos[0];
        var obj;
        if ($scope.tipo == 1) {
            obj = $scope.companys;
            $http.get('/listAvion/' + id).then(
                function(resp) {
                    $scope.aviones = resp.data;
                },
                function() {}
            );
        } else {
            obj = $scope.providers;
        }
        angular.forEach(obj, function(value, key) {
            //  alert(value.id==id);
            if (value.id == id) {
                if ($scope.tipo == 1) {
                    // alert(($scope.estimate.company_id!=value.id));
                    if ($scope.estimate.company_id != value.id) {
                        $scope.estimate = {
                            total: 0,
                            ganancia: 0,
                            descuento: 0,
                            subtotal: 0,
                            prove_id: $scope.estimate.prove_id
                        };
                        $scope.estimate.company_id = id;
                        $scope.cliente = value.nombre;
                        $scope.estimate.categoria = value.categoria;
                        $scope.categorias = $scope.categoria_show(value.categoria);
                        $scope.info = [{
                                id: "Telefono",
                                nombre: value.telefono
                            },
                            {
                                id: "Correo",
                                nombre: value.correo
                            },
                            {
                                id: "Celular",
                                nombre: value.celular
                            }
                        ];
                        $scope.data_estimates.length = 0;
                        $scope.data_estimates = []
                    }
                } else {
                    $scope.estimate.prove_id = id;
                    $scope.proveedor = value.nombre;
                    $scope.prueba = null;
                }
                //
            }
        });
        $('#clientes').modal('toggle');
    });
    $scope.metodoSegui = function() {
        var meto = $scope.estimate.metodo_segui;
        //  alert(meto);$scope.telefono;
        if (meto == 'Telefono') {
            $scope.estimate.info_segui = $scope.info[0].nombre;
        } else if (meto == 'Correo') {
            $scope.estimate.info_segui = $scope.info[1].nombre;
        } else if (meto == 'Celular') {
            $scope.estimate.info_segui = $scope.info[2].nombre;
        }
    };
    $scope.matri = function() {
        var avion_id = $scope.estimate.avion_id;
        if (avion_id == null) {
            $scope.matricula = null;
        } else {
            angular.forEach($scope.aviones, function(value, key) {
                if (value.id == avion_id) {
                    $scope.matricula = value.matricula;
                }
            });
        }
    };
    $scope.categoria = function(a) { //
        //alert(a);
        if (a == '0') {
            return 0.00;
        } else if (a == '1') {
            return 0.20;
        } else if (a == '2') {
            return 0.25;
        } else if (a == '3') {
            return 0.30;
        }
        //alert($scope.data_invoices[index].cantidad);
    };
    $scope.categoria_show = function(a) { //
        //alert(a);
        if (a == '0') {
            return '0 %';
        } else if (a == '1') {
            return '20 %';
        } else if (a == '2') {
            return '25 %';
        } else if (a == '3') {
            return '30 %';
        }
        //alert($scope.data_invoices[index].cantidad);
    };
    $scope.subtotal = function() { //sum the total amount
        var obj = $scope.data_estimates;
        var acum = 0;
        for (var i = 0; i < $scope.data_estimates.length; i++) {
            if (obj[i]['subtotal'] != null) {
                acum = parseFloat((acum + parseFloat(obj[i].total)).toFixed(2));
            }
        } //fin para
        return acum;
    };

    $scope.ganancia = function() { //sum the total amount
        var obj = $scope.data_estimates;
        var acum = 0;
        for (var i = 0; i < $scope.data_estimates.length; i++) {
            if (obj[i]['recarga'] != null) {
                acum = parseFloat((acum + parseFloat(obj[i].recarga)).toFixed(2));
            }
        } //fin para
        return acum;
    };

    $scope.total = function() { //sum the total amount
        //alert('aja');
        var subtotal = parseFloat($scope.estimate.subtotal);
        var desc = parseFloat($scope.estimate.descuento);
        //alert(desc);
        var total_des = 0;
        var total = 0;
        if (subtotal != null && desc != null && desc != 0 && !isNaN(desc)) {
            total_des = parseFloat((subtotal * desc).toFixed(2));
            total = parseFloat((subtotal - total_des).toFixed(2));
            $scope.estimate.total_descuento = total_des;
            $scope.estimate.total = total;
        } else {
            $scope.estimate.total_descuento = total_des;
            $scope.estimate.total = subtotal;
        }
    };

    $scope.calcular = function(index) { //calculate operations aritmetics
        var precio = parseFloat($scope.data_estimates[index].precio);
        var cantidad = parseInt($scope.data_estimates[index].cantidad);
        var errors = {};
        if (precio != 0 && precio != null && !isNaN(precio) && !isNaN(cantidad)) {
            var categoria = $scope.categoria($scope.estimate.categoria);
            if (categoria == null) {
                $scope.show_error = true;
                $scope.message = false; //ocultamos el div del mensaje bien
                errors['campos'] = ["Error! Debe Seleccionar el cliente para poder agregar los Items del Estimado"];
                $scope.message_error = errors;
            } else {
                $scope.show_error = false;
                $scope.message = false; //ocultamos el div del mensaje bien
                var subtotal = parseFloat((cantidad * precio).toFixed(2)); //bien
                var ganancia = parseFloat((categoria * subtotal).toFixed(2)); //si es numero
                var total = parseFloat((ganancia + subtotal).toFixed(2));
                var recarga = parseFloat((categoria * precio).toFixed(2));
                var subtotal_recarga = parseFloat((precio + recarga).toFixed(2));
                $scope.data_estimates[index].subtotal = subtotal;
                $scope.data_estimates[index].recarga = ganancia;
                $scope.data_estimates[index].total = total;
                $scope.data_estimates[index].subtotal_recarga = subtotal_recarga;
                var subtotal = $scope.subtotal();
                $scope.estimate.subtotal = subtotal;
                $scope.estimate.total = subtotal;
                $scope.estimate.ganancia = $scope.ganancia();
            }

        }
    };

    $scope.save = function($event) {
      $event.preventDefault();
      var estimate = $scope.estimate;
      estimate["_token"] = $("input[name=_token]").val();
      estimate.data_estimates = $scope.data_estimates;
      var file = $scope.file
      var nombre=estimate.imagen;
      var formData = new FormData();
      estimate.file=file;
      formData.append('file', file);
      formData.append('nombre', nombre);
      $http.post('/estimates', estimate).then(
        function(response) { // success callback
                  if (response.data.message == "bien") {
                      $scope.message = "Estimado Agregado Exitosamente";
                      $scope.show_error = false;
                      $http.post('/image', formData, {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined}
                      }
                      ).then(
                      function(response) {},
                      function(response) { // failure callback

                      }
                      ); //fin then
                      $timeout(function() {
                          window.location.href = "/estimates/" + response.data.id;
                      }, 2000);
                  } else { //sin no bien
                      $scope.show_error = true;
                      $scope.message = false; //ocultamos el div del mensaje bien
                      $scope.message_error = response.data.error;
                  }
              },
              function(response) { // failure callback
                  $scope.message = false; //ocultamos el div del mensaje bien
                  var errors = response.data;
                  $scope.show_error = true; //mostramos el div del mensaje error
                  $scope.message_error = errors; //
              }
          ); //fin then
    }; //fin save
    $scope.edit = function($event) {
        $event.preventDefault();
        var estimate = $scope.estimate;
        estimate["_token"] = $("input[name=_token]").val();
        estimate.data_estimates = $scope.data_estimates;
        var file = $scope.file
        var nombre=estimate.imagen;
        var formData = new FormData();
        estimate.file=file;
        formData.append('file', file);
        formData.append('nombre', nombre);
        $http.put('/estimates/' + $scope.estimate.id, estimate)
            .then(
                function(response) { // success callback
                    if (response.data.message == "bien") {
                        $scope.message = "Estimado Actualizado Exitosamente";
                        $scope.show_error = false;
                        if(file!=undefined){
                          $http.post('/image', formData, {
                            transformRequest: angular.identity,
                            headers: {'Content-Type': undefined}
                          }
                          ).then(
                          function(response) {},
                          function(response) { // failure callback

                          }
                          ); //fin then
                        }
                        $timeout(function() {
                            window.location.href = "/estimates/" + $scope.estimate.id;
                        }, 2000);
                    } else { //sin no bien
                        $scope.show_error = true;
                        $scope.message = false; //ocultamos el div del mensaje bien
                        $scope.message_error = response.data.error;
                    }
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
    }; //fin save
    $scope.correo = function() {
      $('#titulo').html('Enviando Estimado por Correo');
      $('.fuelrelease').css('display','none');
      $('.cliente').css('display','none');
      $('.correo').css('display','block');
      $scope.message = false;
      $scope.show_error = false;
    }
    $scope.send = function($event) {
        //  alert('entre');
        $event.preventDefault();

        if($scope.mail.asunto!=null && $scope.mail.contenido!=null){
          var estimate = $scope.estimate;
          estimate["_token"] = $("input[name=_token]").val();
          estimate['tipo']='Estimate';

          estimate['to'] = $scope.mail.to;

          estimate['asunto']=$scope.mail.asunto;
          estimate["contenido"]=$scope.mail.contenido;
          estimate["adjunto"]=$scope.mail.adjunto;
          $('#clientes').modal('toggle');
        //alert(invoice["_token"]);
        $http.post('/send', estimate)
            .then(
                function(response) { // success callback
                    if (response.data.message == "bien") {
                        $scope.message = "Su correo ha Sido enviado Exitosamente ";
                        $scope.show_error = false;
                    } else { //sin no bien
                        $scope.show_error = true;
                        $scope.message = false; //ocultamos el div del mensaje bien
                        $scope.message_error = response.data.error;
                    }
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
          }else{
            alert("Debe Ingresar el asunto y el contenido del correo");
          }
    }; //fin save

}]); //fin controller companys
///////////ServicesCtrl CONTROLLER
app.controller("ServicesCtrl", ['$scope', '$http', function($scope, $http) {
//  alert('ajaa');
  $scope.service={};
  $scope.categorys={};
  $scope.save = function($event) {
    //alert('ajaa');
      $event.preventDefault();
      var service = $scope.service;
      service["_token"] = $("input[name=_token]").val();
      $http.post('/servicios', service)
          .then(
              function(response) { // success callback
                  $scope.show_error = false;
                  $scope.message = "El servicio se ha creado Exitosamente";
              },
              function(response) { // failure callback
                  $scope.message = false; //ocultamos el div del mensaje bien
                  var errors = response.data;
                  $scope.show_error = true; //mostramos el div del mensaje error
                  $scope.message_error = errors; //
              }
          ); //fin then
  };
  $scope.edit = function($event) {
      $event.preventDefault();
      var service = $scope.service;
      service["_token"] = $("input[name=_token]").val();
    //  alert(service.id);
      $http.put('/servicios/' + service.id, service)
          .then(
              function(response) { // success callback
                  if (response.data.message == "bien") {
                      $scope.show_error = false;
                      $scope.message = "El servicio se ha Actualizado Exitosamente";
                  } else { //sin no bien
                      $scope.show_error = true;
                      $scope.message = false; //ocultamos el div del mensaje bien
                      $scope.message_error = response.data.error;
                  }
              },
              function(response) { // failure callback
                  $scope.message = false; //ocultamos el div del mensaje bien
                  var errors = response.data;
                  $scope.show_error = true; //mostramos el div del mensaje error
                  $scope.message_error = errors; //
              }
          ); //fin then
  };

}]); //fin controller EditCompanyCtrlInvoiceCtrl
///////////INVOICES CONTROLLER
app.controller("InvoiceCtrl", ['$scope', '$http', function($scope, $http) {
    //alert(typeof $scope.invoice.fecha_pag);
    $scope.invoice = {
        fecha: new Date()
    };
    //
    $scope.avion = [];
    $scope.servicios = {};
    $scope.data_invoices = [];
    $scope.estados = [{
            id: "1",
            nombre: "No pagado"
        },
        {
            id: "2",
            nombre: "Pagado"
        },
        {
            id: "3",
            nombre: "Pago Vencido"
        }
    ];
    $scope.estado = function() { //Cambiar el estado de la factura
        var fecha_p = $scope.invoice.fecha_pago;
        if (fecha_p != null) {
            $scope.invoice.estado = "2";
        }
    };
    //alert(  $('#estado').val());
    //$("#estado option[value="+ 1 +"]").attr("selected",true);
    //  $('#estado option:contains("No pagado")').attr('selected','selected');
    $scope.metodos = [{
            nombre: "Cheque"
        },
        {
            nombre: "Debito/Credito"
        },
        {
            nombre: "Efectivo"
        },
        {
            nombre: "Transferencia Bancaria"
        }
    ];
    $scope.delete = function(index) { //delete item factura specific
        $scope.data_invoices.splice(index, 1);
        var sub = $scope.subtotal();
        $scope.invoice.subtotal = sub;
        $scope.invoice.total = sub;
        $scope.invoice.ganancia = $scope.ganancia();
    };

    $scope.search_descrip = function(obj, key, value) { //delete item factura specific
        for (var i = 0; i < $scope.servicios.length; i++) {
            if (obj[i][key] === value) {
                return obj[i].descripcion;
            }
        } //fin para
        return null;
    };
    $scope.search_precio = function(obj, key, value) { //delete item factura specific
        for (var i = 0; i < $scope.servicios.length; i++) {
            if (obj[i][key] === value) {
                return obj[i].precio;
            }
        } //fin para
        return null;
    };
    $scope.inicializar = function(index) { //
        var servicio_id = $scope.data_invoices[index].servicio_id;
        var descripcion = $scope.search_descrip($scope.servicios, 'id', servicio_id);
        var precio=$scope.search_precio($scope.servicios, 'id', servicio_id);
        $scope.data_invoices[index].cantidad = 1;
        $scope.data_invoices[index].precio = precio;
        $scope.data_invoices[index].descripcion = descripcion;
        $scope.calcular(index);
        //alert($scope.data_invoices[index].cantidad);
    };
    $scope.categoria = function(a) { //
        //alert(a);
        if (a == '0') {
            return 0.00;
        } else if (a == '1') {
            return 0.20;
        } else if (a == '2') {
            return 0.25;
        } else if (a == '3') {
            return 0.30;
        }
        //alert($scope.data_invoices[index].cantidad);
    };
    $scope.subtotal = function() { //sum the total amount
        var obj = $scope.data_invoices;
        var acum = 0;
        for (var i = 0; i < $scope.data_invoices.length; i++) {
            if (obj[i]['subtotal'] != null) {
                acum = parseFloat((acum + parseFloat(obj[i].total)).toFixed(2));
            }
        } //fin para
        return acum;
    };

    $scope.ganancia = function() { //sum the total amount
        var obj = $scope.data_invoices;
        var acum = 0;
        for (var i = 0; i < $scope.data_invoices.length; i++) {
            if (obj[i]['recarga'] != null) {
                acum = parseFloat((acum + parseFloat(obj[i].recarga)).toFixed(2));
            }
        } //fin para
        return acum;
    };

    $scope.total = function() { //sum the total amount
        //alert('aja');
        var subtotal = parseFloat($scope.invoice.subtotal);
        var desc = parseFloat($scope.invoice.descuento);
        //alert(desc);
        var total_des = 0;
        var total = 0;
        if (subtotal != null && desc != null && desc != 0 && !isNaN(desc)) {
            total_des = parseFloat((subtotal * desc).toFixed(2));
            total = parseFloat((subtotal - total_des).toFixed(2));
            $scope.invoice.total_descuento = total_des;
            $scope.invoice.total = total;
        } else {
            $scope.invoice.total_descuento = total_des;
            $scope.invoice.total = subtotal;
        }
    };

    $scope.calcular = function(index) { //calculate operations aritmetics
        var precio = parseFloat($scope.data_invoices[index].precio);
        var cantidad = parseInt($scope.data_invoices[index].cantidad);
        if (precio != 0 && precio != null && !isNaN(precio) && !isNaN(cantidad)) {
            var categoria = $scope.categoria($scope.invoice.categoria);
            var subtotal = parseFloat((cantidad * precio).toFixed(2)); //bien
            var ganancia = parseFloat((categoria * subtotal).toFixed(2)); //si es numero
            var total = parseFloat((ganancia + subtotal).toFixed(2));
            var recarga = parseFloat((categoria * precio).toFixed(2));
            var subtotal_recarga = parseFloat((precio + recarga).toFixed(2));
            $scope.data_invoices[index].subtotal = subtotal;
            $scope.data_invoices[index].recarga = ganancia;
            $scope.data_invoices[index].total = total;
            $scope.data_invoices[index].subtotal_recarga = subtotal_recarga;
            var subtotal = $scope.subtotal();
            $scope.invoice.subtotal = subtotal;
            $scope.invoice.total = subtotal;
            $scope.invoice.ganancia = $scope.ganancia();
        }
    };

    $scope.plazo = function() {
        if ($scope.invoice.fecha != null && $scope.invoice.plazo != null) {
            var fecha = new Date($scope.invoice.fecha);
            var plazo = $scope.invoice.plazo;

            var f_venci;
            if (plazo == "1") {
                $scope.invoice.fecha_vencimiento = fecha;
            } else if (plazo == "2") {
                $scope.invoice.fecha_vencimiento = null;
            } else {
                var dias = parseInt(plazo);
                f_venci = new Date(fecha.setDate(fecha.getDate() + dias));
                $scope.invoice.fecha_vencimiento = f_venci;
            }
        }
    };

    $scope.save = function($event) {
        $event.preventDefault();
        var invoice = $scope.invoice;
        invoice["_token"] = $("input[name=_token]").val();
        invoice.data_invoices = $scope.data_invoices;
        $http.post('/invoices', invoice)
            .then(
                function(response) { // success callback
                    if (response.data.message == "bien") {
                        $scope.message = "Factura Agregada Exitosamente";
                        $scope.show_error = false;
                    } else { //sin no bien
                        $scope.show_error = true;
                        $scope.message = false; //ocultamos el div del mensaje bien
                        $scope.message_error = response.data.error;
                    }
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
    }; //fin save
}]); //fin controller estimate

////////////////
////////////////
app.controller("EditInvoiceCtrl", ['$scope', '$http', function($scope, $http) {
    $scope.invoice = {};

    //var fecha=$filter('date')($scope.invoice.fecha, "yyyy-MM-dd");
    // var f_v = new Date($scope.invoice.vencimiento);
    // var f_p = new Date($scope.invoice.fecha_pago);
    // //alert(fecha);
    //
    // $scope.invoice.fecha = fecha;
    // $scope.invoice.fecha_vencimiento = f_v;
    // $scope.invoice.fecha_pago = f_p;

    $scope.estados = [{
            id: "1",
            nombre: "No pagado"
        },
        {
            id: "2",
            nombre: "Pagado"
        },
        {
            id: "3",
            nombre: "Pago Vencido"
        }
    ];
    $scope.avion = [];
    $scope.servicios = {};
    $scope.metodos = [{
            nombre: "Cheque"
        },
        {
            nombre: "Debito/Credito"
        },
        {
            nombre: "Efectivo"
        },
        {
            nombre: "Transferencia Bancaria"
        }
    ];
    // Función para calcular los días transcurridos entre dos fechas
    $scope.restaFechas = function(f1, f2) {
        var aFecha1 = f1.split('-');
        var aFecha2 = f2.split('-');
        var nuevafecha1 = new Date(aFecha1);
        var nuevafecha2 = new Date(aFecha2);
        var Dif = nuevafecha2.getTime() - nuevafecha1.getTime();
        var dias = Math.floor(Dif / (1000 * 24 * 60 * 60));
        return dias;
    }
    $scope.info_invoice = function(dias, op) {
        var d = "";
        var estado = null;
        var val1, val2;
        var info;
        if (op == '1') {
            //return 'No pagado';
            val1 = "Vencio";
            val2 = "Vence";
        } else {
            val1 = "Pagado";
            val2 = "Pago";
        }
        if (dias > 1) { //si aun no se ha vencido
            d = "Vence en " + dias + " días";
        } else if (dias == 0) { //si se vencio ayer
            d = val2 + " Hoy";
        } else if (dias < -1) { //si tiene mas de un día de vencida
            dia = dias.toString();
            dia = dia.replace('-', '');
            d = val1 + " hace " + dia + " días";
        } else if (dias == 1) { //si se vence mañana
            d = val2 + " Mañana";
        } else if (dias == -1) { //si se vencio ayer
            d = val1 + " Ayer";
        }
        return d;
    }
    $scope.estado = function() { //Cambiar el estado de la factura
        var fecha_p = $scope.invoice.fecha_pago;
        if (fecha_p != null && fecha_p != "") {
            $scope.invoice.estado = "2";
            var date = new Date();
            var d = "";
            fecha_p = new Date(fecha_p);
            fecha_pago = fecha_p.getFullYear() + "-" + (fecha_p.getMonth() + 1) + "-" + fecha_p.getDate();
            var fecha = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
            var dias = $scope.restaFechas(fecha.toString(), fecha_pago.toString());
            var info = "Pagado (" + $scope.info_invoice(dias, 2) + ")";
            $scope.invoice.informacion = info;
        }
    };
    $scope.plazo = function() {
        if ($scope.invoice.fecha != null && $scope.invoice.plazo != null) {
            var fecha = new Date($scope.invoice.fecha);
            var plazo = $scope.invoice.plazo;
            var f_venci;
            if (plazo == "1") {
                $scope.invoice.fecha_vencimiento = fecha;
            } else if (plazo == "2") {
                $scope.invoice.fecha_vencimiento = null;
            } else {
                var dias = parseInt(plazo);
                f_venci = new Date(fecha.setDate(fecha.getDate() + dias));
                $scope.invoice.fecha_vencimiento = f_venci;
            }
        }
    };
    $scope.edit = function($event) {
        //  alert('entre');
        $event.preventDefault();
        var invoice = $scope.invoice;
        invoice["_token"] = $("input[name=_token]").val();
        var url = '/invoices/' + $scope.invoice.id;
        $http.put(url, invoice)
            .then(
                function(response) { // success callback
                    if (response.data.message == "bien") {
                        $scope.message = "Factura Actualizada Exitosamente";
                        $scope.show_error = false;
                    } else { //sin no bien
                        $scope.show_error = true;
                        $scope.message = false; //ocultamos el div del mensaje bien
                        $scope.message_error = response.data.error;
                    }
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
    }; //fin save
    $scope.correo = function() {
      $('#titulo').html('Enviando factura por Correo');
      $('.fuelrelease').css('display','none');
      $('.cliente').css('display','none');
      $('.correo').css('display','block');
      $scope.message = false;
      $scope.show_error = false;
    }
    $scope.send = function($event) {
        //  alert('entre');
        $event.preventDefault();

        if($scope.mail.asunto!=null && $scope.mail.contenido!=null){
          var invoice = $scope.invoice;
          invoice["_token"] = $("input[name=_token]").val();
          invoice['tipo']='Invoice';
          invoice['to'] = $scope.mail.to;
          invoice['asunto']=$scope.mail.asunto;
          invoice["contenido"]=$scope.mail.contenido;
          invoice["adjunto"]=$scope.mail.adjunto;
          $('#clientes').modal('toggle');
        //alert(invoice["_token"]);
        $http.post('/send', invoice)
            .then(
                function(response) { // success callback
                    if (response.data.message == "bien") {
                        $scope.message = "Su correo ha Sido enviado Exitosamente ";
                        $scope.show_error = false;
                    } else { //sin no bien
                        $scope.show_error = true;
                        $scope.message = false; //ocultamos el div del mensaje bien
                        $scope.message_error = response.data.error;
                    }
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
          }else{
            alert("Debe Ingresar el Asunto y el contenido del correo");
          }
    }; //fin save

}]); //fin controller EditCompanyCtrlInvoiceCtrl
///////////////////reportes

////////////////
app.controller("ReportsCtrl", ['$scope', '$http', function($scope, $http) {
    $scope.servicios = {};
    $scope.clientes = {};
    $scope.reporte = {};
    $scope.show_error = false;
    $scope.message = false;
    $scope.report = null;
    $scope.paises = [];
    $scope.relacion = function($event) {
        //  alert($scope.tipo);
        var url = $scope.tipo;
        var errors = {};
        var band = true;
        $event.preventDefault();
        if (url != "company") {
            if ($scope.reporte.desde == null || $scope.reporte.hasta == null) {
                errors['campos'] = ["Error! Los campos con (*) son Obligatorios"];
                band = false;
            } else {
                var hoy = new Date();
                var desde = new Date($scope.reporte.desde);
                var hasta = new Date($scope.reporte.hasta);
                if (desde > hoy) {
                    band = false;
                    errors['desde'] = ["La Fecha Desde no puede ser mayor a la Fecha Actual"];
                }
                if (hasta < desde) {
                    band = false;
                    errors['hasta'] = ["La Fecha Hasta no puede ser mayor a la Fecha Desde"];
                }
                if (hasta > hoy) {
                    band = false;
                    errors['hastam'] = ["La Fecha Hasta no puede ser mayor a la Fecha Actual"];
                }
            } //fin si
        } //fin si no es company
        // alert(errors.length != null);
        if (!band) {
            $scope.show_error = true;
            $scope.message = false; //ocultamos el div del mensaje bien
            $scope.message_error = errors;
        } else {
            $scope.show_error = false; //ocultamos el div del mensaje error
            var relation = $scope.reporte;
            relation["_token"] = $("input[name=_token]").val();
            $http.post('/' + url, relation)
                .then(
                    function(response) { // success callback
                        var report = null;
                        $scope.message = "Su Reporte se esta generando en una ventana emergente! Debe habilitar los popup del navegador";
                        report = "data:application/pdf;base64," + response.data;
                        window.open(report, "Reportes XFS", "width=800,height=600");

                    },
                    function(response) { // failure callback
                        $scope.message = false; //ocultamos el div del mensaje bien
                        var errors = response.data;
                        $scope.show_error = true; //mostramos el div del mensaje error
                        $scope.message_error = errors; //
                    }
                ); //fin then
        }
    };

}]); //fin controller EditCompanyCtrlInvoiceCtrl

////////////////
app.controller("UsersCtrl", ['$scope', '$http', function($scope, $http) {
    $scope.user = {};
    $scope.show_error = false;
    $scope.message = false;

    $scope.pass = function($event) {
        var pass = $scope.user.password;
        var fortaleza = null;
        if (pass != null) {
            if (pass.length > 8) {
                fortaleza = 'Fuerte';
            } else if (pass.length > 3) {
                fortaleza = 'Media';
            } else if (pass.length <= 0) {
                fortaleza = null;
            } else {
                fortaleza = 'Debil';
            }
            $scope.strength = fortaleza;
        } else {
            $scope.strength = null;
        }
    };

    $scope.enviar = function($event) {
        $event.preventDefault();
        var url = $scope.tipo;
        var user = $scope.user;
        user["_token"] = $("input[name=_token]").val();
        $http.post('/' + url, user)
            .then(
                function(response) { // success callback
                    $scope.show_error = false;
                    $scope.message = "El Usuario se ha Creado Exitosamente";
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
    };
    $scope.editar = function($event) {
        $event.preventDefault();
        var user = $scope.user;
        var tipo = $scope.tipo;
        var msj = null;
        if (tipo == 'perfil') {
            msj = "El Perfil de su Usuario se ha Actualizado Exitosamente";
        } else {
            msj = "El Usuario se ha Actualizado Exitosamente";
        }

        user["_token"] = $("input[name=_token]").val();
        user["tipo"] = tipo;
        $http.put('/users/' + $scope.user.id, user)
            .then(
                function(response) { // success callback
                    if (response.data.message == "bien") {
                        $scope.show_error = false;
                        $scope.message = msj;
                    } else { //sin no bien
                        $scope.show_error = true;
                        $scope.message = false; //ocultamos el div del mensaje bien
                        $scope.message_error = response.data.error;
                    }
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
    };

}]); //fin controller EditCompanyCtrlInvoiceCtrl

////////////////
app.controller("LoginCtrl", ['$scope', '$http', function($scope, $http) {
    $scope.login = {};
    $scope.show_error = false;
    $scope.message = false;
    $scope.enviar = function($event) {
        // alert('holaa');
        $event.preventDefault();
        var login = $scope.login;
        login["_token"] = $("input[name=_token]").val();
        $http.post('login', login)
            .then(
                function(response) { // success callback
                    $scope.show_error = false;
                    window.location.href = "/principal"; //lo redireccionamos a la principal de usuarios
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    //alert(errors);
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
    };
}]); //fin controller EditCompanyCtrlInvoiceCtrl

////////////////
app.controller("FuelreleaseCtrl", ['$scope', '$http', '$timeout', function($scope, $http, $timeout) {
    //alert('aja');
    $scope.estimate = {};
    $scope.fuel = {
      date:new Date
    };
    // var date= new Date($scope.fuel.date);
    // var f_eta = new Date($scope.fuel.eta);
    // var f_etd = new Date($scope.fuel.etd);
    // //alert(fecha);
    //
    // $scope.fuel.date = date;
    // $scope.fuel.eta = f_eta;
    // $scope.fuel.etd = f_etd;

    $scope.save = function($event) {
        //  alert('entre');
        $event.preventDefault();
        var fuel = $scope.fuel;
        fuel["_token"] = $("input[name=_token]").val();
        $http.post('/fuelreleases', fuel)
            .then(
                function(response) { // success callback
                    if (response.data.message == "bien") {
                        $scope.message = "El Fuel Release se ha creado Exitosamente ";
                        $scope.show_error = false;
                        $timeout(function() {
                            window.location.href = "/fuelreleases/" + response.data.id;
                        }, 2000);
                    } else { //sin no bien
                        $scope.show_error = true;
                        $scope.message = false; //ocultamos el div del mensaje bien
                        $scope.message_error = response.data.error;
                    }
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
    }; //fin save
    $scope.edit = function($event) {
        //  alert('entre');
        $event.preventDefault();
        var fuel = $scope.fuel;
        fuel["_token"] = $("input[name=_token]").val();
        $http.put('/fuelreleases/' + fuel.id, fuel)
            .then(
                function(response) { // success callback
                    if (response.data.message == "bien") {
                        $scope.message = "El Fuel Release fue actualizado Exitosamente ";
                        $scope.show_error = false;
                        $timeout(function() {
                            window.location.href = "/fuelreleases/" + response.data.id;
                        }, 2000);
                    } else { //sin no bien
                        $scope.show_error = true;
                        $scope.message = false; //ocultamos el div del mensaje bien
                        $scope.message_error = response.data.error;
                    }
                },
                function(response) { // failure callback
                    $scope.message = false; //ocultamos el div del mensaje bien
                    var errors = response.data;
                    $scope.show_error = true; //mostramos el div del mensaje error
                    $scope.message_error = errors; //
                }
            ); //fin then
    }; //fin save
}]); //fin controller

app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            element.bind('change', function(e){
              scope.$apply(function(){
                  modelSetter(scope, element[0].files[0]);
                  scope.estimate.imagen=element[0].files[0].name;
              });
              //$parse(attrs.fileModel).assign(scope, element[0].files[0]);
               //alert(scope.estimate.imagen);
            });
        }
    };
}]);
