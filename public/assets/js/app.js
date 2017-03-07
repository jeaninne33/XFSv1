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

   $scope.invoice = {
     fecha:new Date()
   };
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
  //$scope.invoice.estado = {id: '1'};

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
                acum=parseFloat((acum+parseFloat(obj[i].subtotal)).toFixed(2));
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
     var subtotal=parseFloat($scope.invoice.subtotal);
     var desc=parseFloat($scope.invoice.descuento);
     var total_des=0;
     var total=0;
     if(subtotal!=null && desc!=null && desc!=0 && !isNaN(desc)){
        total_des=parseFloat((subtotal*desc).toFixed(2));
        total=parseFloat((subtotal-total_des).toFixed(2));
        $scope.invoice.total_descuento=total_des;
        $scope.invoice.total=total;
     }
   };
   $scope.calcular = function(index){//calculate operations aritmetics
     var precio=parseFloat($scope.data_invoices[index].precio);
     var cantidad=parseInt($scope.data_invoices[index].cantidad);
     if(precio!=0  && precio!=null && !isNaN(precio) && !isNaN(cantidad)){
          var categoria=$scope.categoria($scope.invoice.categoria);
          var subtotal=parseFloat((cantidad*precio).toFixed(2));//bien
          var ganancia=parseFloat(categoria*subtotal);//si es numero
          var total=ganancia+subtotal;
          $scope.data_invoices[index].subtotal=subtotal;
          $scope.data_invoices[index].recarga=ganancia;
          $scope.data_invoices[index].total=total;
          //  alert(typeof(totall));
         var subtotal=$scope.subtotal();
          $scope.invoice.subtotal=subtotal;
          $scope.invoice.total=subtotal;
          $scope.invoice.ganancia=$scope.ganancia();
     }
   };

   $scope.validate_precio= function ($air) {
  /*   if($air.precio==null || $air.matricula==null || $air.piloto1==null || $air.licencia1==null){
       return false;
     }else{
       return true;
     }*/
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
