angular.module('emotionStatsApp')
    .controller('GraphController', ["$scope", function ($scope, $rootScope) {
        $scope.myDataSource1 = {
            chart: {caption: "Some week"},
            data: [
                {label: "Saturday", value: "100"},
                {label: "Sunday", value: "300"},
                {label: "Monday", value: "150"},
                {label: "Tuesday", value: "240"},
                {label: "Wednesday", value: "300"},
                {label: "Thursday", value: "90"},
                {label: "Friday", value: "170"}
            ]
        };

    }]);