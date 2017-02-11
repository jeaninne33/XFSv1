angular.module("XHR",[])
.controller("CompanyCtrl",['$scope','$http',function($scope, $http){
  $scope.company = {

  };
  $scope.airplanes = [];

 $scope.save =  function($event){
    $event.preventDefault();
    //return false;
    var company =  $scope.company;
    company["_token"] =  $("#_token").val();
    company.aviones  =  $scope.airplanes;
    var data=$.param(company);
    $http.post('companys.store', data)
    .then(
    function(response){// success callback
      console.log(data);
    },
    function(response){// failure callback
    //  console.log(data);
      console.log(data);
    }

 );

  };//fin save

}]);


/*   $http({
        method: 'POST',
        url: '/companys.store',
        dataType: "json",//optional
        data: company,
       headers: {'Content-Type': 'application/json'}
 }).success(function(data) {
        console.log(data);

        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorName = data.errors.name;
          $scope.errorSuperhero = data.errors.superheroAlias;
        } else {
          // if successful, bind success message to message
          $scope.message = data.message;
        }
    });*/
