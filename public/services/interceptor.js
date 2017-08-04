angular.module('emotionStatsApp')
    .factory('HttpInterceptor', HttpInterceptor);

function HttpInterceptor($q, $window) {
    return {
        'responseError': function(rejection) {
            if (rejection.status == 401) {
                $window.location.href = '#/signin';
            }
            return $q.reject(rejection);
        }
    };
};