angular.module('emotionStatsApp')
    .controller('DashboardController', DashboardController);

function DashboardController($rootScope, $scope, DataService) {
    $scope.attrs = {};
    $scope.categories = [];
    $scope.dataset = {};

    $rootScope.flag = true;
    DataService.getEmployeesAverageMood(function (response) {
            $scope.data = response;


            $scope.attrs = {
                "caption": "Average Mood (Last 4 Weeks)",
                "numberprefix": "",
                "plotgradientcolor": "",
                "bgcolor": "transparent",
                "showalternatehgridcolor": "0",
                "divlinecolor": "CCCCCC",
                "showvalues": "0",
                "showcanvasborder": "0",
                "canvasborderalpha": "0",
                "canvasbordercolor": "CCCCCC",
                "canvasborderthickness": "1",
                "captionpadding": "30",
                "linethickness": "3",
                "yaxisvaluespadding": "15",
                "legendshadow": "0",
                "legendborderalpha": "0",
                "palettecolors": "#f8bd19,#008ee4,#33bdda,#e44a00,#6baa01,#583e78",
                "showborder": "0"
            };

            $scope.moodAverages = $scope.data.averageMood;

            $scope.categories = [
                {
                    "category": []
                }

            ];
            angular.forEach($scope.moodAverages, function (value, key) {
                $scope.categories[0]['category'].push({
                    'label': key
                });
            });
            console.log($scope.categories[0]['category']);


            $scope.dataset = [
                {
                    "seriesname": "2013",
                    "data": [
                        {
                            "value": "22400"
                        }
                    ]
                }
            ];
        }
    )
}