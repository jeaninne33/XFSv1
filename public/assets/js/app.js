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
            $scope.message="si hay aviones ";

         }else{
           $scope.message="no hay aviones ";
         }
          $scope.reset();

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
