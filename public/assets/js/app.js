angular.module("XHR",[])
.controller("CompanyCtrl",['$scope','$http',function($scope, $http){
  $scope.company = {

  };
  $scope.airplanes = [];

 $scope.save =  function($event){
    $event.preventDefault();
    //return false;
    var company =  $scope.company;
  //  company["_token"] =  $("#_token").val();
  //  alert($("#_token").attr("value"));
    company.aviones  =  $scope.airplanes;
    var data=$.param(company);
    $http.post('/companys.store', data)
    .then(
    function(response){// success callback
    //  console.log(data);
    },
    function(response){// failure callback
    //  console.log(data);
    //  console.log(data);
    }

 );

  };//fin save

}])();
