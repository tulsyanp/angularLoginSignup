var app = angular.module('firstApplication', ['ngMaterial', 'ngMessages', 'ngRoute', 'ngAnimate', 'toaster']);

app.config(['$routeProvider',
  	function ($routeProvider) {
        $routeProvider.
        when('/login', {
            title: 'Login',
            templateUrl: 'view/login.html',
            controller: 'authCtrl'
        })
        .when('/logout', {
            title: 'Logout',
            templateUrl: 'view/login.html',
            controller: 'logoutCtrl'
        })
        .when('/signup', {
            title: 'Signup',
            templateUrl: 'view/signup.html',
            controller: 'authCtrl'
        })
        .when('/dashboard', {
            title: 'Dashboard',
            templateUrl: 'view/dashboard.html',
            controller: 'authCtrl'
        })
        .when('/', {
            title: 'Login',
            templateUrl: 'view/login.html',
            controller: 'authCtrl',
            //role: '0'
        })
        .otherwise({
            redirectTo: '/login'
        });
	}
])
.run(function ($rootScope, $location, $http) {
    $rootScope.$on("$routeChangeStart", function (event, next, current) {
        $rootScope.authenticated = false;
        var request = $http({
            method: "get",
            url: "api/session.php",
        });
        request.success(function (data) {
            if (data.id) {
                $rootScope.authenticated = true;
                $rootScope.id = data.id;
                $rootScope.email = data.email;
                $rootScope.todos = [];
                var request = $http({
                    method: "POST",
                    url: "api/users.php",
                    headers: { 'Content-Type': 'application/json' }
                });
                request.success(function (data) {
                    angular.forEach(data, function(value) {
                      $rootScope.todos.push({
                          id: value.id,
                          email: value.email,
                        });
                    });
                });
            } else {
                var nextUrl = next.$$route.originalPath;
                if (nextUrl == '/signup' || nextUrl == '/login') {

                } else {
                    $location.path("/login");
                }
            }
        });
    });
});
