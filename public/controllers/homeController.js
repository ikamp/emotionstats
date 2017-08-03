angular.module('emotionStatsApp')
    .controller('HomeController', homeController);

function homeController($scope) {
    $scope.tab = 'home';

}
