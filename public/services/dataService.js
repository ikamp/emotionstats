angular.module('emotionStatsApp')
    .factory('DataService', dataService);

function dataService($http) {
    return {
        postLoginData: postLoginData,
    };

    function postLoginData(data, callback, errorCallback) {
        $http.post('/login', data)
            .then(function(response) {
                callback(response.data);
            }, function(error) {
                errorCallback(error);
            });

    }
}
