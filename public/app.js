// Define the `emotionStatsApp` module
angular
    .module('emotionStatsApp', ['ngRoute', 'ng-fusioncharts'])
    .config(function ($routeProvider, $locationProvider) {
        $locationProvider.hashPrefix('');

        $routeProvider
            .when('/', {
                templateUrl: 'views/home.html',
                controller: 'HomeController'
            })
            .when('/mymood', {
                templateUrl: '/mymood/mymood.html',
                controller: 'MyMoodController'
            })
            .when('/signin', {
                templateUrl: '/signin/signin.html',
                controller: 'SignInController'
            })
            .when('/signup', {
                templateUrl: '/signup/signup.html',
                controller: 'SignUpController'
            })
            .when('/create-password/:id', {
                templateUrl: '/create-password/create-password.html',
                controller: 'CreatePasswordController'
            })
            .when('/employee', {
                templateUrl: '/employee/employee.html',
                controller: 'EmployeeController'
            })
            .when('/employee-add', {
                templateUrl: '/employee-add/employee-add.html',
                controller: 'EmployeeAddController'
            })
            .when('/dashboard', {
                templateUrl: '/dashboard/dashboard.html',
                controller: 'DashboardController'
            })
            .otherwise({
            redirectTo: '/'
        });

    }).run(function (Authentication) {
    Authentication.getUser();
});
