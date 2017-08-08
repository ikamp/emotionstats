angular.module('emotionStatsApp')
    .controller('DepartmentController', departmentController);

function departmentController($scope, $rootScope, $location, DataService) {
    $rootScope.flag = true;
    $scope.department = {};

    $scope.addNewDepartment = function () {
        DataService.postDepartment($scope.department, function (response) {
            $location.path("/employee");
        })
    }
}
