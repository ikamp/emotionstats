angular.module('emotionStatsApp')
    .controller('ResetPasswordController', resetPasswordController);

function resetPasswordController($rootScope, $routeParams, $scope, $location, DataService) {
    $rootScope.flag = false;
    $scope.data = {
        "token": $routeParams.token
    };

    $scope.resetPassword = function () {
        DataService.postNewPassword($scope.data, function () {
            console.log($scope.data);
        }, function () {
            console.log();
        })
    }

    $scope.deneme = function () {
        console.log("d");
    }
}