angular.module('emotionStatsApp')
    .factory('Authentication', authentication);

function authentication($http, $rootScope) {
    return {
        getUser: getUser
    };

    function getUser() {
        $http({
            method: 'GET',
            url: '/api/user'
        }).then(
            function (response) {
                if(!response.data)
                {
                    return false;
                }
                else {
                    $rootScope.employee = response.data;
                }
            });
    }
}