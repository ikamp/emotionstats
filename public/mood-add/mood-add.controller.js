angular.module('emotionStatsApp')
    .controller('MoodAddController', MoodAddController);

function MoodAddController($rootScope, $routeParams, $scope, $location, DataService) {
    $rootScope.flag = true;
    $scope.data = {
        "moodId": $routeParams.id,
        "reasons": []
    };

    $scope.reasons = [
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

    $scope.addMood = function () {
        DataService.postMood($scope.data, function () {
            $location.path("/mymood");
        })
    };

    $scope.getMood = function (moodReason) {
        $scope.data.reasons.push(moodReason);
    }
}