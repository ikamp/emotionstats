angular.module('emotionStatsApp')
    .controller('MyMoodController', mymoodController);

function mymoodController($scope, $rootScope, DataService) {
    $rootScope.flag = true;
    DataService.getMood(function (response) {
        $scope.data= response;
        $scope.sad = {
            "rate": 0,
            "total": 0
        };
        $scope.unhappy = {
            "rate": 0,
            "total": 0
        };
        $scope.happy = {
            "rate": 0,
            "total": 0
        };
        $scope.ok = {
            "rate": 0,
            "total": 0
        };
        $scope.satisfied = {
            "rate": 0,
            "total": 0
        };
        $scope.mood;

        if (response.average == 1) {
            $scope.mood = "sad"
        } else if (response.average == 2) {
            $scope.mood = "unhappy"
        } else if (response.average == 3) {
            $scope.mood = "ok"
        } else if (response.average == 4) {
            $scope.mood = "satisfied"
        } else if (response.average == 5) {
            $scope.mood = "happy"
        }

        if (response.TotalPercent1) {
            $scope.sad = {
                "rate": response.TotalPercent1,
                "total": response.Total1,
            };
        }
        if (response.TotalPercent2) {
            $scope.unhappy = {
                "rate": response.TotalPercent2,
                "total": response.Total2
            };
        }
        if (response.TotalPercent3) {
            $scope.ok = {
                "rate": response.TotalPercent3,
                "total": response.Total3
            };
        }
        if (response.TotalPercent4) {
            $scope.satisfied = {
                "rate": response.TotalPercent4,
                "total": response.Total4
            };
        }
        if (response.TotalPercent5) {
            $scope.happy = {
                "rate": response.TotalPercent5,
                "total": response.Total5
            };
        }

    });
}
