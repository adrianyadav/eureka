var app = angular.module('menuApp', []).filter('object2Array', function() {
    return function(input) {
        var out = []; 
        for(i in input){
            out.push(input[i]);
        }
        return out;
    }
});

app.controller('menuCtrl', function($scope, $http) {
    $scope.index = 0;
  	$http.get('json/menu-items.json').then(function(res){
        $scope.menuItems = res.data;   
        $scope.subMenuList = Object.keys($scope.menuItems['snacks']);
        console.log($scope.subMenuList);
    });
       
    $scope.isString = function(input) {
        return typeof input === 'string';
    };
    
    $scope.isObject = function(input) {
        return typeof input === 'object';
        console.log(input);
    }
});