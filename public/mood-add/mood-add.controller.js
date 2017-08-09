angular.module('emotionStatsApp')
    .controller('MoodAddController', MoodAddController);

function MoodAddController($rootScope, $scope, DataService) {
    $rootScope.flag = true;
}