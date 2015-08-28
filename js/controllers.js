var app = angular.module('menuApp', []);

app.controller('menuCtrl', function($scope, $http) {
  	$http.get('json/menu-items.json').then(function(res){
        $scope.menuItems = res.data;               
    });
});