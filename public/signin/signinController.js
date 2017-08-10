angular.module('emotionStatsApp')
    .controller('SignInController', signinController);

function signinController($scope, $rootScope, $location, DataService) {
    $scope.user = {
        "password": ""
    };
    $rootScope.flag = false;

    $scope.login = function () {
        DataService.postLoginData($scope.user, function (response) {
            $location.path("/mymood");
        }, function () {
            $scope.match = true;
        })
    }
}
