angular.module('emotionStatsApp')
    .controller('HomeController', homeController);

function homeController($rootScope, $scope, DataService) {
    $rootScope.flag = true;

}

