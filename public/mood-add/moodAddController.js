angular.module('emotionStatsApp')
    .controller('MoodAddController', moodAddController);

function moodAddController($scope, $rootScope, $location, DataService) {
    $rootScope.flag = true;
}