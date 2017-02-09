angular.module("XHR",[])
.controller("CompanyCtrl",['$scope','$http',function($scope, $http){
  $scope.company = {

  };
  $scope.airplanes = [];

  $scope.save =  function(){
    var company =  $scope.company;
    company.aviones  =  $scope.airplanes;
    $http.post('/company',
    function(){
      
    },
    function(){

    });
  };
}]);
