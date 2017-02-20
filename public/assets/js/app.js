

var app = angular.module("XHR", ['ngRoute']);

//hacemos el ruteo de nuestra aplicación
app.config(function($routeProvider){
//  alert($routeProvider);
	$routeProvider.when("/companys", {
		templateUrl : "companys/index.blade.php",
    controller : "CompanyCtrl"
	});
	//esta es la forma de decirle a angular que vamos a pasar una variable por la url
	/*.when('/companys/{companys}/edit', {
      templateUrl : "companys/edit.blade.php",
     controller : "EditCompanyCtrl"
   })
	.when("/companys/create", {
		title: 'Añadir usuario',
		templateUrl : "companys/create.blade.php",
		controller : "CompanyCtrl"
	})
	.when("/companys/{companys}", {
		title: 'Editar usuario',
		templateUrl : "companys/show.blade.php",
		controller : "CompanyCtrl"
	})
 	.when("/remove/:id", {
 		title: 'Eliminar usuario',
 		templateUrl : "templates/remove.html",
 		controller : "removeController"
 	});
 	//.otherwise({ redirectTo : "/"})*/
  $locationProvider.html5Mode(true);
});

app.controller("CompanyCtrl",['$scope','$http',function($scope, $http){
  $scope.filtros=[
     {
       id:"client",
       nombre:"clientes"
     },
     {
       id:"prove",
       nombre:"Proveedores"
     },
     {
      id:"cp",
       nombre:"Clientes/Proveedores"

     },
     {
      id:"todos",
       nombre:"Todos"

     }
   ];

  $scope.init = function() {
  // $scope.loading = true;

   $http.get("/companys").then(
     function(resp){
     $scope.companys =resp;
     //alert(resp.companys);
     },
     function (){

     });
 };

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
  $scope.init();

}]);//fin controller companys

app.controller("EditCompanyCtrl", function($scope,$routeParams, $http){
   //$scope.company=data;
  // $scope.company = RestApi.query();
});//EditCompanyCtrl
