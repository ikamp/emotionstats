angular.module('emotionStatsApp')
    .controller('HomeController', homeController);

function homeController($scope, DataService) {
        $scope.user = {};

        $scope.login = function () {
            DataService.postLoginData($scope.user, function (response) {
                console.log(response);
            })
        }
}
