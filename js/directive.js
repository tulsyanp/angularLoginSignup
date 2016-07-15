app.directive('passwordMatch', [function () {
    return {
        restrict: 'A',
        scope:true,
        require: 'ngModel',
        link: function (scope, elem , attrs,control) {
           var checker = function () {
                var e1 = scope.$eval(attrs.ngModel);   
                var e2 = scope.$eval(attrs.passwordMatch);
                if(e2!=null) {
                     return e1 == e2;
                } else {
                    return false;
                }
            };
            scope.$watch(checker, function (n) {
                control.$setValidity("passwordNoMatch", n);
           });
        }
    };
}]);