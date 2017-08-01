// Define the `emotionStatsApp` module
angular
    .module('emotionStatsApp', ['ngRoute'])
        .config(function ($routeProvider, $locationProvider) {
            $locationProvider.hashPrefix('');

            $routeProvider
                .when('/home', {
                    templateUrl: 'views/home.html',
                    controller: 'HomeController'
                })
                .otherwise({
                    redirectTo: '/'
                });

    });