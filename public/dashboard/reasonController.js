angular.module('emotionStatsApp')
    .controller('ReasonController', reasonController);

function reasonController($rootScope, $scope, DataService) {

    $rootScope.flag = true;
    $scope.sadReason = [];
    $scope.unhappyReason = [];
    $scope.okReason = [];
    $scope.satisfiedReason = [];
    $scope.happyReason = [];
    $scope.reasons = [];
    $scope.allReason = [
        {
            name: 'Career',
            id: 0
        },
        {
            name: 'Colleagues',
            id: 1
        },
        {
            name: 'Communication',
            id: 2
        },
        {
            name: 'Health',
            id: 3
        },
        {
            name: 'Holidays',
            id: 4
        },
        {
            name: 'Managers',
            id: 5
        },
        {
            name: 'Organization',
            id: 6
        },
        {
            name: 'Professional',
            id: 7
        },
        {
            name: 'Salary',
            id: 8
        },
        {
            name: 'Task area/Activity',
            id: 9
        },
        {
            name: 'Work equipment',
            id: 10
        },
        {
            name: 'Working time',
            id: 11
        },
        {
            name: 'Workload',
            id: 12
        },
        {
            name: 'Work environment',
            id: 13
        },
        {
            name: 'Others',
            id: 14
        }
    ];

    DataService.getEmployeesAverageMood(function (response) {
        $scope.data = response;
        $scope.topFiveReason = $scope.data.topFiveReason;

        angular.forEach($scope.topFiveReason, function (reason, mood) {
            if (mood == 1) {
                angular.forEach(reason, function (reasons, tag) {
                    angular.forEach(reasons, function (vote, count) {
                        $scope.sadReason.push({
                            name: tag,
                            point: vote,
                            mood: 1
                        });
                    });
                });
                $scope.bubbleSort($scope.sadReason);
                $scope.reasons.push($scope.sadReason[15]);
            }
            if (mood == 2) {
                angular.forEach(reason, function (reasons, tag) {
                    angular.forEach(reasons, function (vote, count) {
                        console.log(vote);
                        $scope.unhappyReason.push({
                            name: tag,
                            point: vote,
                            mood: 2
                        });
                    });
                });
                $scope.bubbleSort($scope.unhappyReason);
                $scope.reasons.push($scope.unhappyReason[15]);
            }
            if (mood == 3) {
                angular.forEach(reason, function (reasons, tag) {
                    angular.forEach(reasons, function (vote, count) {
                        $scope.okReason.push({
                            name: tag,
                            point: vote,
                            mood: 3
                        });
                    });
                });
                $scope.bubbleSort($scope.okReason);
                $scope.reasons.push($scope.okReason[15]);
            }
            if (mood == 4) {
                angular.forEach(reason, function (reasons, tag) {
                    angular.forEach(reasons, function (vote, count) {
                        $scope.satisfiedReason.push({
                            name: tag,
                            point: vote,
                            mood: 4
                        });
                    });
                });
                $scope.bubbleSort($scope.satisfiedReason);
                $scope.reasons.push($scope.satisfiedReason[15]);
            }
            if (mood == 5) {
                angular.forEach(reason, function (reasons, tag) {
                    angular.forEach(reasons, function (vote, count) {
                        $scope.happyReason.push({
                            name: tag,
                            point: vote,
                            mood: 5
                        });
                    });
                });
                $scope.bubbleSort($scope.happyReason);
                $scope.reasons.push($scope.happyReason[15]);
                $scope.bubbleSort($scope.reasons);
            }

        });

        angular.forEach($scope.reasons, function (value, key) {
            angular.forEach($scope.allReason, function (obj, key) {
                if (value.name == obj.id) {
                    value.name = obj.name;
                }
            });
        });

    });

    $scope.bubbleSort = function (items) {
        var length = items.length;
        for (var i = 0; i < length; i++) {
            for (var j = 0; j < (length - i - 1); j++) {
                if (items[j].point > items[j + 1].point) {
                    var tmp = items[j];
                    items[j] = items[j + 1];
                    items[j + 1] = tmp;
                }
            }
        }
    }
}