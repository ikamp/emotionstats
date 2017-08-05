angular.module('emotionStatsApp')
    .factory('HttpInterceptor', HttpInterceptor);

function HttpInterceptor($q, $location) {
    return {
        'responseError': function(rejection) {
            if (rejection.status == 401) {
                $location.path('/signin');
            }
            return $q.reject(rejection);
        }
    };
};