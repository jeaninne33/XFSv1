angular.module("XHR",[])


.controller("CompanyCtrl",['$scope','$http',function($scope, $http){
  $scope.company = {
    pais_id:0
  };

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
/*function getErrosAirplane () {
    var errors =[];
  if($scope.airplanes.nombre===null){
    errors.push("El Tipo de Avion es Obligatorio");
  }else if ($scope.airplanes.matriculad===null){
    errors.push("La matricula es Obligatoria");
  }else if ($scope.airplanes.licencia1===null){
    errors.push("La Licencia 1 es Obligatoria");
  }else if ($scope.airplanes.piloto1===null){
    errors.push("El Piloto 1 es Obligatorio");
  }
  return errors;
};*/

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
         /*if  (company.aviones.length > 0){
            var errora=[];
            //errora=getErrosAirplane();
            //errora.length == 0
            if($scope.form1.$error.required==false){//
                $scope.message="todo bien por aviones";
            }else{
              errora=$scope.form1.$error.required;
              $scope.show_error =  true;
              $scope.message_error = errora ;
              $scope.message =  false;
            }

         }else{
           $scope.message="no hay aviones ";
         }*/
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
}]);//fin controller companys
