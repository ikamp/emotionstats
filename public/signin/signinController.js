angular.module('emotionStatsApp')
    .controller('SignInController', signinController);

function signinController($scope, $rootScope, DataService) {
    $scope.user = {};
    $rootScope.flag = false;


    $scope.login = function () {
        DataService.postLoginData($scope.user, function (response) {
            console.log(response);
        })
    }
}
