var app = angular.module('menuApp', []);

app.controller('menuCtrl', function($scope, $http) {
	console.log($scope.firstName);
	$scope.meme = "my memes are top";
  	$http.get('json/menu-items.json').then(function(res){
        $scope.menuItems = res.data;     
    	console.log($scope.menuItems.snacks.fries['gluten-free']);           
    });
});