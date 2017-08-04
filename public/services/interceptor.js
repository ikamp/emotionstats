angular.module('emotionStatsApp')
    .factory('HttpInterceptor', HttpInterceptor);

function HttpInterceptor($q, $window) {
    return {
        'responseError': function(rejection) {
            if (rejection.status == 401) {
                $window.location.href = '#/login';
            }
            return $q.reject(rejection);
        }
    };
};