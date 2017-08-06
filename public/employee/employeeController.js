angular.module('emotionStatsApp')
    .controller('EmployeeController', employeeController);

function employeeController($scope, $rootScope, $location, DataService) {
    $rootScope.flag = true;
    $scope.order;
    $scope.search;


    DataService.getEmployee(function (response) {
        $scope.employees = response;
        console.log($scope);
    });
}
