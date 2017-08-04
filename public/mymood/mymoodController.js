angular.module('emotionStatsApp')
    .controller('MyMoodController', mymoodController);

function mymoodController($rootScope) {
    $rootScope.flag = true;
}
