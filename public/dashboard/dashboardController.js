angular.module('emotionStatsApp')
    .controller('DashboardController', DashboardController);

function DashboardController($rootScope, $scope, DataService) {
    $rootScope.flag = true;
    DataService.getEmployeesAverageMood(function (response) {
            $scope.data = response;
        }
    )
};