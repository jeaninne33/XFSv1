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
function getErrosAirplane () {
    var errors =[];
  if($scope.airplanes.tipo.$error.required==true){
    errors.push("El Tipo de Avion es Obligatorio");
  }else if ($scope.airplanes.matricula.$error.required==true){
    errors.push("La matricula es Obligatoria");
  }else if ($scope.airplanes.licencia1.$error.required==true){
    errors.push("La Licencia 1 es Obligatoria");
  }else if ($scope.airplanes.piloto1.$error.required==true){
    errors.push("El Piloto 1 es Obligatorio");
  }
  return errors;
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
       if(response.data.message)  {
        //  $scope.message = response.data.message;
          $scope.show_error =  false;

         if  (company.aviones.length > 0){
            var errora=[];
            errora=getErrosAirplane();
            if(errora.length == 0){//$scope.form1.$error.required==false
                $scope.message="todo bien por aviones";
            }else{

              $scope.show_error =  true;
              $scope.message_error =  errora;
            }

         }else{
           ///$scope.message="no hay aviones ";
         }
      }
    },
    function(response){// failure callback
        var errors = response.data;
        $scope.show_error =  true;
        $scope.message_error =  errors;
    }
   );//fin then
  };//fin save
}]);//fin controller companys
