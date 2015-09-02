var app = angular.module('menuApp', []).filter('object2Array', function() {
    return function(input) {
        var out = []; 
        for(i in input){
            out.push(input[i]);
        }
        return out;
    }
});

app.controller('menuCtrl', function($location, $scope, $http) {
    $scope.index = 0;
    
  	$http.get('json/menu-items.json').then(function(res){
        $scope.menuItems = res.data;   
        $scope.subMenuList = Object.keys($scope.menuItems['snacks']);
    });
       
    $scope.correctHash = function (str) {
        return str.substring(1);
    }
    $scope.isString = function(input) {
        return typeof input === 'string';
    };
    
    $scope.isObject = function(input) {
        return typeof input === 'object';
    }
    
    $scope.keys = function(obj) {
        return Object.keys(obj);
    }
});