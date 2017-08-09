angular.module('emotionStatsApp')
    .factory('DataService', dataService);

function dataService($http) {
    return {
        postLoginData: postLoginData,
        getUser: getUser,
        postRegisterData: postRegisterData,
        postPassword: postPassword,
        getEmployee: getEmployee,
        getMood: getMood,
        postEmployee: postEmployee,
        getEmployeesAverageMood: getEmployeesAverageMood,
        postDepartment: postDepartment,
        postChangedDepartment:postChangedDepartment,
        postOffEmployee:postOffEmployee
    };

    function postDepartment(data, callback) {
        $http.post('/api/new-department', data)
            .then(function (response) {
                callback(response.data);
            });
    }

    function postOffEmployee(data, callback) {
        $http.post('/api/destroy', data)
            .then(function (response) {
                callback(response.data);
            });
    }

    function postRegisterData(data, callback) {
        $http.post('/register', data)
            .then(function (response) {
                callback(response.data);
            });
    }

    function postChangedDepartment(data, callback) {
        $http.post('/api/changeDepartment', data)
            .then(function (response) {
                callback(response.data);
            });
    }

    function postPassword(data, callback) {
        $http.post('/api/create-password', data)
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

    function postEmployee(data, callback) {
        $http.post('/api/employee', data)
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

    function getMood(callback) {
        $http({
            method: 'GET',
            url: '/api/mood'
        }).then(
            function (response) {
                callback && callback(response.data);
            });
    }

    function getEmployeesAverageMood(callback) {
        $http({
            method: 'GET',
            url: '/api/home'
        }).then(
            function (response) {
                callback && callback(response.data);
            });
    }
}
