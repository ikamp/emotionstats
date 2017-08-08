angular.module('emotionStatsApp')
    .controller('EmployeeAddController', employeeAddController);

function employeeAddController($scope, $rootScope, $location, DataService) {
    $rootScope.flag = true;
    $scope.newEmployee = {
        "department_id": ""
    };

    DataService.getEmployee(function (response) {
        $scope.departments = response.departments;
    });

    $scope.addEmployee = function () {
        console.log({employee: $scope.newEmployee});
        DataService.postEmployee({employee: $scope.newEmployee}, function (response) {
            $location.path("/mymood");
        });
    }

    $scope.getValue = function (item) {
        $scope.newEmployee.department_id = item.id;
    }
}
