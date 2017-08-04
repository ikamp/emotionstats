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
                .when('/mymood', {
                    templateUrl: '/mymood/mymood.html',
                    controller: 'MyMoodController'
                })
                .otherwise({
                    redirectTo: '/'
                });



    });