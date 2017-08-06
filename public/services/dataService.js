angular.module('emotionStatsApp')
    .factory('DataService', dataService);

function dataService($http) {
    return {
        postLoginData: postLoginData,
        getUser: getUser,
        postRegisterData: postRegisterData,
        getEmployee: getEmployee
    };

    function postRegisterData(data, callback) {
        $http.post('/register', data)
            .then(function (response) {
                callback(response.data);
            });
    }

    function postLoginData(data, callback) {
        $http.post('/login', data)
            .then(function (response) {
                callback(response.data);
            });
    }

    function getUser(callback) {
        $http({
            method: 'GET',
            url: '/api/user'
        }).then(
            function (response) {
                callback && callback(response.data);
            });
    }
    function getEmployee(callback) {
        $http({
            method: 'GET',
            url: '/api/employee'
        }).then(
            function (response) {
                callback && callback(response.data);
            });
    }
}
