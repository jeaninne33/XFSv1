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

//controlador de editar
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
app.controller("InvoiceCtrl",['$scope','$http',function($scope, $http){

   $scope.invoice = {};
   $scope.avion = [];
   $scope.servicios = {};
   $scope.data_invoices = [];
   //alert($scope.invoice.avion_id);
   $scope.delete = function(index){//delete item factura specific
        $scope.data_invoices.splice(index, 1);
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
        $scope.data_invoices[index].cantidad=0;
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
   $scope.calcular = function(index){//calculate operations aritmetics
      var categoria=$scope.categoria($scope.invoice.categoria);
      var precio=parseFloat($scope.data_invoices[index].precio);
      var cantidad=parseFloat($scope.data_invoices[index].cantidad);
      var subtotal=(cantidad*precio).toFixed(2);
      var ganancia=parseFloat(categoria*subtotal);

      var total=ganancia+subtotal;
      //alert(total);
      var f_subtotal=parseFloat($scope.invoice.subtotal);
      $scope.data_invoices[index].subtotal=subtotal;
      $scope.data_invoices[index].ganancia=ganancia;
      $scope.data_invoices[index].total=total;
       f_subtotal=f_subtotal+total;
      $scope.invoice.subtotal=f_subtotal.toFixed(2);
   };
   $scope.validate_decimal=function(valor){
    /*var RE = /^\d*(\.\d{1})?\d{0,1}$/;
    if (RE.test(valor)) {
        return true;
    } else {
        return false;
    }*/
   //}
   };
}]);//fin controller companys
