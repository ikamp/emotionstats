angular.module('emotionStatsApp')
    .controller('HomeController', homeController);

function homeController($rootScope) {
    $rootScope.flag = true;
}

