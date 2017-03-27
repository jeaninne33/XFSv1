var app = angular.module("XHR", []);

app.controller("indexCompany",['$scope','$http',function($scope, $http){
  $scope.company = {
        pais_id:0 };
  $scope.filtros=[
     {
       id:"client",
       nombre:"Clientes"
     },
     {
       id:"prove",
       nombre:"Proveedores"
     },
     {
      id:"cp",
       nombre:"Clientes/Proveedores"
     } ,
     {
      id:"todos",
       nombre:"todas las Compañias"
     }
   ];

$scope.filter_table  = function () {
  //alert($scope.relacion.id);
  var url  = "/comp/"+$scope.relacion.id;
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
};//
}]);//fin controller index

///////////CompanyCtrl CONTROLLER
app.controller("CompanyCtrl",['$scope','$http',function($scope, $http){
$scope.company = {
      pais_id:0 };
$scope.airplanes = [];
$scope.states = [];
$scope.getStates  = function () {
  var url  = "/state/"+$scope.company.pais_id;
  $http.get(url).then(
    function(resp){
      $scope.states  =  resp.data;
    },
    function (){
    }
  );
};
$scope.message =  false;
$scope.show_error =  false;
$scope.message_error =  [];
$scope.save =  function($event){
    $event.preventDefault();
    var company =  $scope.company;
    company["_token"] =  $("input[name=_token]").val();
    company.aviones  =  $scope.airplanes;
    $http.post('/companys', company)
    .then(
    function(response){// success callback
       if(response.data.message=="bien")  {
         $scope.message = "Compañia Agregada Exitosamente";
          $scope.show_error =  false;
      }else{//sin no bien
        $scope.show_error =  true;
        $scope.message =  false;//ocultamos el div del mensaje bien
        $scope.message_error =  response.data.error;
      }
    },
    function(response){// failure callback
       $scope.message =  false;//ocultamos el div del mensaje bien
        var errors = response.data;
        $scope.show_error =  true;//mostramos el div del mensaje error
        $scope.message_error =  errors;//
    }
   );//fin then
  };//fin save
  //$scope.init();
  $scope.airplanesdelete  = function () {
    $scope.airplanes.pop();
  };
}]);//fin controller companys

///////////////controlador de editar
app.controller("EditCompanyCtrl", function($scope , $http){
  $scope.company = {
    pais_id:0
  };
  $scope.airplanes = [];
  $scope.states = [];
//  alert($("select#pais_id").val());
  $scope.getStates  = function () {
    var url  = "/state/"+$scope.company.pais_id;
    //alert($scope.company.pais_id);
    $http.get(url).then(
      function(resp){
        $scope.states  =  resp.data;
        //alert(resp);
      },
      function (){
      }
    );
  };
  $scope.validate_air= function ($air) {
    if($air.tipo==null || $air.matricula==null || $air.piloto1==null || $air.licencia1==null){
      return false;
    }else{
      return true;
    }
  };
  $scope.airplanesdelete  = function () {
    var largo=$scope.airplanes.length;
    var nombre=$scope.airplanes[largo-1].tipo;
    var id_air=$scope.airplanes[largo-1].id;
    var data=[];
    data["_token"] =  $("input[name=_token]").val();
    if(largo>0 && $scope.validate_air($scope.airplanes[largo-1]) && id_air!=null){
       if (confirm("¿Esta Seguro que desea Eliminar el Avion "+nombre+"?") === true) {

         $http.post('/avion/'+id_air, data)
         .then(
         function(response){// success callback
              $scope.message = response.data.message;
              $scope.show_error =  false;
              $scope.airplanes.pop();
         },
         function(response){// failure callback
            $scope.message =  false;//ocultamos el div del mensaje bien
             var errors = response.data;
             $scope.show_error =  true;//mostramos el div del mensaje error
             $scope.message_error =  errors;//
         }
       );//fin then
     }//fin si es un avion de BD
    }else{
        $scope.airplanes.pop();
    }
  };
  // $scope.company = RestApi.query();
  $scope.edit =  function($event){
      $event.preventDefault();
      var company =  $scope.company;
      company["_token"] =  $("input[name=_token]").val();
      company.aviones  =  $scope.airplanes;
      var url='/companys/'+$scope.company.id;
      $http.put(url, company)
      .then(
      function(response){// success callback
         if(response.data.message=="bien")  {
           $scope.message = "Compañia Actualizada Exitosamente";
            $scope.show_error =  false;
        }else{//sin no bien
          $scope.message =  false;//ocultamos el div del mensaje bien
          $scope.show_error =  true;
          $scope.message_error =  response.data.error;
        }
      },
      function(response){// failure callback
         $scope.message =  false;//ocultamos el div del mensaje bien
          var errors = response.data;
          $scope.show_error =  true;//mostramos el div del mensaje error
          $scope.message_error =  errors;//
      }
     );//fin then
    };//fin save

});//EditCompanyCtrl

///////////INVOICES CONTROLLER
app.controller("InvoiceCtrl",['$scope','$http',function($scope, $http){
  //alert(typeof $scope.invoice.fecha_pag);
   $scope.invoice = {
     fecha:new Date()
   };
   //
   $scope.avion = [];
   $scope.servicios = {};
   $scope.data_invoices = [];
   $scope.estados=[
      {id:"1",
        nombre:"No pagado"
      },
      {  id:"2",
        nombre:"Pagado"
      },
      { id:"3",
        nombre:"Pago Vencido"
      }
    ];

    $scope.estado = function(){//Cambiar el estado de la factura
      var fecha_p= $scope.invoice.fecha_pago;
      if(fecha_p!=null){
         $scope.invoice.estado ="2";
      }

    };
    //alert(  $('#estado').val());

//$("#estado option[value="+ 1 +"]").attr("selected",true);
//  $('#estado option:contains("No pagado")').attr('selected','selected');
    $scope.metodos=[
       {nombre:"Cheque"
       },
       {nombre:"Debito/Credito"
       },
       {nombre:"Efectivo"
      },
      { nombre:"Transferencia Bancaria"
      }
     ];
   $scope.delete = function(index){//delete item factura specific
        $scope.data_invoices.splice(index, 1);
        var sub=$scope.subtotal();
        $scope.invoice.subtotal=sub;
        $scope.invoice.total=sub;
        $scope.invoice.ganancia=$scope.ganancia();
   };

   $scope.search_descrip = function(obj, key, value){//delete item factura specific
         for (var i = 0; i < $scope.servicios.length; i++) {
            if (obj[i][key] === value) {
                return obj[i].descripcion;
            }
        }//fin para
      return null;
   };
   $scope.inicializar = function(index){//
       var servicio_id=$scope.data_invoices[index].servicio_id;
       var descripcion=$scope.search_descrip($scope.servicios,'id', servicio_id);
        $scope.data_invoices[index].cantidad=1;
        $scope.data_invoices[index].precio=0.00;
        $scope.data_invoices[index].subtotal=0.00;
        $scope.data_invoices[index].total=0.00;
        $scope.data_invoices[index].recarga=0.00;
        $scope.data_invoices[index].subtotal_recarga=0.00;
        $scope.data_invoices[index].descripcion=descripcion;
      //alert($scope.data_invoices[index].cantidad);
   };
   $scope.categoria = function(a){//
     //alert(a);
     if(a=='0'){
       return 0.00;
     }else if(a=='1'){
         return 0.20;
     }else if(a=='2'){
           return 0.25;
     }else if(a=='3'){
          return 0.30;
     }
      //alert($scope.data_invoices[index].cantidad);
   };
   $scope.subtotal = function(){//sum the total amount
     var obj=$scope.data_invoices;
     var acum=0;
         for (var i = 0; i < $scope.data_invoices.length; i++) {
            if (obj[i]['subtotal'] != null) {
                acum=parseFloat((acum+parseFloat(obj[i].total)).toFixed(2));
            }
        }//fin para
      return acum;
   };

   $scope.ganancia = function(){//sum the total amount
     var obj=$scope.data_invoices;
     var acum=0;
         for (var i = 0; i < $scope.data_invoices.length; i++) {
            if (obj[i]['recarga'] != null) {
                acum=parseFloat((acum+parseFloat(obj[i].recarga)).toFixed(2));
            }
        }//fin para
      return acum;
   };

   $scope.total = function(){//sum the total amount
     //alert('aja');
     var subtotal=parseFloat($scope.invoice.subtotal);
     var desc=parseFloat($scope.invoice.descuento);
     //alert(desc);
     var total_des=0;
     var total=0;
     if(subtotal!=null && desc!=null && desc!=0 && !isNaN(desc)){
        total_des=parseFloat((subtotal*desc).toFixed(2));
        total=parseFloat((subtotal-total_des).toFixed(2));
        $scope.invoice.total_descuento=total_des;
        $scope.invoice.total=total;
     }else{
       $scope.invoice.total_descuento=total_des;
       $scope.invoice.total=subtotal;
     }
   };

   $scope.calcular = function(index){//calculate operations aritmetics
     var precio=parseFloat($scope.data_invoices[index].precio);
     var cantidad=parseInt($scope.data_invoices[index].cantidad);
     if(precio!=0  && precio!=null && !isNaN(precio) && !isNaN(cantidad)){
          var categoria=$scope.categoria($scope.invoice.categoria);
          var subtotal=parseFloat((cantidad*precio).toFixed(2));//bien
          var ganancia=parseFloat((categoria*subtotal).toFixed(2));//si es numero
          var total=parseFloat((ganancia+subtotal).toFixed(2));
          var recarga=parseFloat((categoria*precio).toFixed(2));
          var subtotal_recarga=parseFloat((precio+recarga).toFixed(2));
          $scope.data_invoices[index].subtotal=subtotal;
          $scope.data_invoices[index].recarga=ganancia;
          $scope.data_invoices[index].total=total;
          $scope.data_invoices[index].subtotal_recarga=subtotal_recarga;
          //  alert(typeof(totall));
          var subtotal=$scope.subtotal();
          $scope.invoice.subtotal=subtotal;
          $scope.invoice.total=subtotal;
          $scope.invoice.ganancia=$scope.ganancia();
     }
   };

   $scope.plazo= function () {
     if($scope.invoice.fecha!=null && $scope.invoice.plazo!=null){
       var fecha= new Date($scope.invoice.fecha);
       var plazo=$scope.invoice.plazo;

       var f_venci;
       if(plazo=="1"){
         $scope.invoice.fecha_vencimiento=fecha;
       }else if(plazo=="2"){
         $scope.invoice.fecha_vencimiento=null;
       }else{
         var dias=parseInt(plazo);
          f_venci=new Date(fecha.setDate(fecha.getDate() + dias));
          $scope.invoice.fecha_vencimiento=f_venci;
       }
     }
   };
   $scope.save =  function($event){
       $event.preventDefault();
       var invoice =  $scope.invoice;
       invoice["_token"] =  $("input[name=_token]").val();
       invoice.data_invoices  =  $scope.data_invoices;
       $http.post('/invoices', invoice)
       .then(
       function(response){// success callback
          if(response.data.message=="bien")  {
            $scope.message = "Factura Agregada Exitosamente";
             $scope.show_error =  false;
         }else{//sin no bien
           $scope.show_error =  true;
           $scope.message =  false;//ocultamos el div del mensaje bien
           $scope.message_error =  response.data.error;
         }
       },
       function(response){// failure callback
          $scope.message =  false;//ocultamos el div del mensaje bien
           var errors = response.data;
           $scope.show_error =  true;//mostramos el div del mensaje error
           $scope.message_error =  errors;//
       }
      );//fin then
     };//fin save
}]);//fin controller companys

////////////////
app.controller("EditInvoiceCtrl",['$scope','$http',function($scope, $http){
  $scope.invoice = {};

    //var fecha=$filter('date')($scope.invoice.fecha, "yyyy-MM-dd");
    var f_v=new Date($scope.invoice.vencimiento);
    var f_p=new Date($scope.invoice.fecha_pago);
    //alert(fecha);

  $scope.invoice.fecha= fecha;
  $scope.invoice.fecha_vencimiento= f_v;
  $scope.invoice.fecha_pago= f_p;

  $scope.estados=[
     {id:"1",
       nombre:"No pagado"
     },
     {  id:"2",
       nombre:"Pagado"
     },
     { id:"3",
       nombre:"Pago Vencido"
     }
   ];
  $scope.avion = [];
  $scope.servicios = {};
   $scope.metodos=[
      {nombre:"Cheque"
      },
      {nombre:"Debito/Credito"
      },
      {nombre:"Efectivo"
     },
     { nombre:"Transferencia Bancaria"
     }
    ];
    $scope.plazo= function () {
      if($scope.invoice.fecha!=null && $scope.invoice.plazo!=null){
        var fecha= new Date($scope.invoice.fecha);
        var plazo=$scope.invoice.plazo;

        var f_venci;
        if(plazo=="1"){
          $scope.invoice.fecha_vencimiento=fecha;
        }else if(plazo=="2"){
          $scope.invoice.fecha_vencimiento=null;
        }else{
          var dias=parseInt(plazo);
           f_venci=new Date(fecha.setDate(fecha.getDate() + dias));
           $scope.invoice.fecha_vencimiento=f_venci;
        }
      }
    };
    $scope.edit =  function($event){
    //  alert('entre');
        $event.preventDefault();
        var invoice =  $scope.invoice;
        invoice["_token"] =  $("input[name=_token]").val();
        var url='/invoices/'+$scope.invoice.id;
        alert(url);
        $http.put(url, invoice)
        .then(
        function(response){// success callback
           if(response.data.message=="bien")  {
             $scope.message = "Factura Actualizada Exitosamente";
             $scope.show_error =  false;
          }else{//sin no bien
            $scope.show_error =  true;
            $scope.message =  false;//ocultamos el div del mensaje bien
            $scope.message_error =  response.data.error;
          }
        },
        function(response){// failure callback
           $scope.message =  false;//ocultamos el div del mensaje bien
            var errors = response.data;
            $scope.show_error =  true;//mostramos el div del mensaje error
            $scope.message_error =  errors;//
        }
       );//fin then
   };//fin save
}]);//fin controller EditCompanyCtrlInvoiceCtrl
///////////////////reportes

////////////////
app.controller("ReportsCtrl",['$scope','$http',function($scope, $http){
  $scope.servicios = {};
  $scope.clientes = {};
  $scope.reporte = {};
  $scope.show_error =  false;
  $scope.message =  false;
  $scope.report = null;
  $scope.paises = [];
  $scope.relacion =  function($event){
  //  alert($scope.tipo);
    var url=$scope.tipo;
    var errors={};
    var band=true;
     $event.preventDefault();
     if(url!="company"){
         if ( $scope.reporte.desde==null ||$scope.reporte.hasta==null){
           errors['campos']= ["Error! Los campos con (*) son Obligatorios"];
           band=false;
         }else{
           var hoy=new Date();
           var desde=new Date($scope.reporte.desde);
           var hasta=new Date($scope.reporte.hasta);
           if(desde>hoy){
              band=false;
              errors['desde']= ["La Fecha Desde no puede ser mayor a la Fecha Actual"];
           }
           if(hasta<desde){
              band=false;
              errors['hasta']= ["La Fecha Hasta no puede ser mayor a la Fecha Desde"];
           }
           if(hasta>hoy){
             band=false;
             errors['hastam']= ["La Fecha Hasta no puede ser mayor a la Fecha Actual"];
           }
         }//fin si
       }//fin si no es company
    // alert(errors.length != null);
     if(!band){
       $scope.show_error =  true;
       $scope.message =  false;//ocultamos el div del mensaje bien
       $scope.message_error =  errors;
     }else{
        $scope.show_error =  false;//ocultamos el div del mensaje error
        var relation =  $scope.reporte;
        relation["_token"] =  $("input[name=_token]").val();
        $http.post('/'+url, relation)
        .then(
        function(response){// success callback
          var report=null;
          $scope.message = "Su Reporte se esta generando en una ventana emergente! Debe habilitar los popup del navegador";
          report = "data:application/pdf;base64,"+ response.data;
          window.open(report,"Reportes XFS", "width=800,height=600");

        },
        function(response){// failure callback
           $scope.message =  false;//ocultamos el div del mensaje bien
            var errors = response.data;
            $scope.show_error =  true;//mostramos el div del mensaje error
            $scope.message_error =  errors;//
        }
       );//fin then
     }
  };

}]);//fin controller EditCompanyCtrlInvoiceCtrl

////////////////
app.controller("UsersCtrl",['$scope','$http',function($scope, $http){
  $scope.user = {};
  $scope.show_error =  false;
  $scope.message =  false;

  $scope.pass =  function($event){
    var pass=$scope.user.password;
    var fortaleza=null;
    if (pass!=null) {
           if (pass.length > 8) {
               fortaleza= 'Fuerte';
           } else if (pass.length > 3) {
               fortaleza = 'Media';
          } else if (pass.length <= 0) {
                 fortaleza = null;
           } else {
               fortaleza = 'Debil';
           }
           $scope.strength=fortaleza;
       }else{
          $scope.strength=null;
       }
  };

  $scope.enviar =  function($event){
     $event.preventDefault();
     var url=$scope.tipo;
     var user=$scope.user;
      user["_token"] =  $("input[name=_token]").val();
      $http.post('/'+url, user)
      .then(
      function(response){// success callback
        $scope.show_error =  false;
        $scope.message = "El Usuario se ha Creado Exitosamente";
       },
      function(response){// failure callback
         $scope.message =  false;//ocultamos el div del mensaje bien
          var errors = response.data;
          $scope.show_error =  true;//mostramos el div del mensaje error
          $scope.message_error =  errors;//
       }
     );//fin then
  };
  $scope.editar =  function($event){
     $event.preventDefault();
     var user=$scope.user;
     var tipo=$scope.tipo;
     var msj=null;
     if(tipo=='perfil'){
         msj = "El Perfil de su Usuario se ha Actualizado Exitosamente";
     }else{
         msj = "El Usuario se ha Actualizado Exitosamente";
     }

      user["_token"] =  $("input[name=_token]").val();
      user["tipo"]=tipo;
      $http.put('/users/'+$scope.user.id, user)
      .then(
      function(response){// success callback
          if(response.data.message=="bien")  {
            $scope.show_error =  false;
            $scope.message = msj;
         }else{//sin no bien
           $scope.show_error =  true;
           $scope.message =  false;//ocultamos el div del mensaje bien
           $scope.message_error =  response.data.error;
         }
       },
      function(response){// failure callback
         $scope.message =  false;//ocultamos el div del mensaje bien
          var errors = response.data;
          $scope.show_error =  true;//mostramos el div del mensaje error
          $scope.message_error =  errors;//
       }
     );//fin then
  };

}]);//fin controller EditCompanyCtrlInvoiceCtrl

////////////////
app.controller("LoginCtrl",['$scope','$http',function($scope, $http){
  $scope.login={};
  $scope.show_error =  false;
  $scope.message =  false;
  $scope.enviar =  function($event){
    //  alert('holaa');
     $event.preventDefault();
     var login=$scope.login;
      login["_token"] =  $("input[name=_token]").val();
      $http.post('login', login)
      .then(
      function(response){// success callback
        $scope.show_error =  false;
        window.location.href = "/principal";//lo redireccionamos a la principal de usuarios
       },
      function(response){// failure callback
         $scope.message =  false;//ocultamos el div del mensaje bien
          var errors = response.data;
          //alert(errors);
          $scope.show_error =  true;//mostramos el div del mensaje error
          $scope.message_error =  errors;//
       }
     );//fin then
  };

}]);//fin controller EditCompanyCtrlInvoiceCtrl
