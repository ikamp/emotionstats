angular.module('emotionStatsApp')
    .controller('DashboardController', dashboardController);

function dashboardController($rootScope, $scope, DataService) {
    $rootScope.flag = true;
    DataService.getEmployeesMoodAverage(function (response) {
            $scope.data = response;
            console.log($scope.data);
        }
    )
};

