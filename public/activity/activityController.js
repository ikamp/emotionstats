angular.module('emotionStatsApp')
    .controller('ActivityController', activityController);

function activityController($rootScope, $routeParams, $scope, $location, DataService) {
    $rootScope.flag = true;
    $scope.data = {
       'token': $routeParams.token
    };

    DataService.postToken($scope.data, function () {
        $location.path("/mymood");
    },function () {
        $scope.match = true;
        DataService.sendNewToken();
    })

}