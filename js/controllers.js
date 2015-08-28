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
  	$http.get('json/menu-items.json').then(function(res){
        $scope.menuItems = res.data;               
    });
    
    $scope.isString = function(input) {
        return typeof input === 'string';
    };
});