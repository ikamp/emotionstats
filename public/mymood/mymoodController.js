angular.module('emotionStatsApp')
    .controller('MyMoodController', mymoodController);

function mymoodController($scope) {
    $scope.tab = 'home';

}
