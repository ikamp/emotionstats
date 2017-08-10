angular.module('emotionStatsApp')
    .controller('ForgotPasswordController', forgotPasswordController);

function forgotPasswordController($rootScope, $routeParams, $scope, $location, DataService) {
    $rootScope.flag = false;
    $scope.data = {};

    $scope.reset = function () {
        DataService.postResetPassword($scope.data, function () {
            console.log(true);
        }, function () {
            $scope.match = true;
        })
    }
}