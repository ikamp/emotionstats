angular.module('emotionStatsApp')
    .controller('ActivityController', activityController);

function activityController($rootScope, $routeParams, $scope, $location, DataService) {
    $rootScope.flag = false;
    $scope.data = {
       'token': $routeParams.token
    };

    DataService.postToken($scope.data, function () {
        $location.path("/mymood");
    })

}