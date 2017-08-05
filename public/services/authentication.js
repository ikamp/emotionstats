angular.module('emotionStatsApp')
    .factory('Authentication', authentication);

function authentication($http, $rootScope, $location) {
    return {
        getUser: getUser
    };

    function getUser() {
        $http({
            method: 'GET',
            url: '/api/user'
        }).then(
            function (response) {
                if (response.data == false) {
                    $location.path('/signin');
                }
                else {
                    $rootScope.employee = response.data;
                }
            });
    }
}