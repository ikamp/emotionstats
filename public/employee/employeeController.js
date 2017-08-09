angular.module('emotionStatsApp')
    .controller('EmployeeController', employeeController);

function employeeController($scope, $rootScope, $location, DataService) {
    $rootScope.flag = true;
    $scope.order = '';
    $scope.search = '';
    $rootScope.worker = {
        "employeeId": "",
        "employeeName": ""
    };

    $rootScope.changedDepartment = {
        "departmentId": "",
        "employeeId": ""
    };

    $scope.addEmployee = function (employee) {
        $rootScope.changedDepartment.employeeId = employee.employeeId;
        $rootScope.worker.employeeName = employee.employeeName;
    };


    DataService.getEmployee(function (response) {
        $scope.employees = response.employees;
    });

    $scope.addChangedDepartment = function () {
        DataService.postChangedDepartment($scope.changedDepartment, function (response) {
            $location.path("/mymood");
        });
    };

    $scope.getValue = function (item) {
        $rootScope.changedDepartment.departmentId = item.id;
    };

    DataService.getEmployee(function (response) {
        $scope.departments = response.departments;
    });

}
