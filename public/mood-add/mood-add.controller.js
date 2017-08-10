angular.module('emotionStatsApp')
    .controller('MoodAddController', MoodAddController);

function MoodAddController($rootScope, $routeParams, $scope, $location, DataService) {
    $rootScope.flag = true;
    $scope.data = {
        "moodId": $routeParams.id
    };

    $scope.addMood = function () {
        DataService.postMood($scope.data, function () {
            $location.path("/mymood");
        })
    };

    $scope.getMood = function (mood) {
        $scope.data.mood = mood;
    }
}