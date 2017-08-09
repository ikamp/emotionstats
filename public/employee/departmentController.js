angular.module('emotionStatsApp')
    .controller('DepartmentController', departmentController);

function departmentController($scope, $rootScope, $location, DataService) {
    $rootScope.flag = true;
    $rootScope.department = {};

    $scope.addNewDepartment = function () {
        DataService.postDepartment($rootScope.department, function (response) {
            $location.path("/mymood");
        })
    }
}
