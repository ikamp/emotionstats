angular.module('emotionStatsApp')
    .controller('SignUpController', signupController);

function signupController($scope, $rootScope, $location, DataService) {
    $scope.employee = {};
    $rootScope.flag = false;

    $scope.register = function () {
        DataService.postRegisterData($scope.employee, function (response) {
            $location.path("/signin");
        })
    }
}
