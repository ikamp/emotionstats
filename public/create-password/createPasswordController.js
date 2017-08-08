angular.module('emotionStatsApp')
    .controller('CreatePasswordController', createPasswordController);

function createPasswordController($scope, $rootScope, $location, $routeParams, DataService) {
    $rootScope.flag = false;
    $scope.password;
    $scope.passwordNew;


    $scope.createPassword = function () {
        if ($scope.password === $scope.passwordNew) {
            $scope.data = {
                "password": $scope.password,
                "employeeId": $routeParams.id
            };
            DataService.postPassword($scope.data, function (response) {
                 $location.path("/signin");
            })
        } else {
            alert("Passwords do not match each other");
        }
    }


}
