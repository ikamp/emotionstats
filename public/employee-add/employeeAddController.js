angular.module('emotionStatsApp')
    .controller('EmployeeAddController', employeeAddController);

function employeeAddController($scope, $rootScope, $location, DataService) {
    $rootScope.flag = true;
}
