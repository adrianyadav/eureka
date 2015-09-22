var app = angular.module('menuApp', []).filter('object2Array', function() {
    return function(input) {
        var out = []; 
        for(i in input){
            out.push(input[i]);
        }
        return out;
    }
}).filter('isVegetarian', function () {
  return function (items, bool) {
    return items.filter(function (item) {
        return item.vegetarian || item['some-v'] || item['imp-v'] || !bool;
    });
  };
}).filter('isGF', function () {
    return function (items, bool) {
        return items.filter(function (item) {
            return item['gluten-free'] || item['some-gf'] ||  item['imp-gf']||!bool; 
        });
    };
}).filter('removeSpaces', function () {
    return function (item) {
        var retStr = '';
        for (var i = 0; i < item.length; i++) {
            if (item[i] != ' ') {
                retStr += item[i];
            }
        }
        return retStr;
    }
});

app.controller('menuCtrl', ['$location', '$scope', '$http', '$filter', '$window', '$timeout', function($location, $scope, $http, $filter, $window, $timeout) {
    /********************************
    Here is the stuff that actually
    runs when the controller starts.
    *********************************/
    window.myScope = $scope;
    $scope.waste  = 0;
    
    urlUpdate = function (keys) {
        var allG = false;
        
        keys.forEach(function(element) {
            if (element == $scope.url) {
                allG = true;
            }
        });

        if (!allG) {
            $scope.url = 'main';
        }
        $scope.subMenuList = keys[$scope.url];
    }
    
  	$http.get('json/menu-items.json').then(function(res){
        $scope.menuItems = res.data;
        $scope.titles = Object.keys($scope.menuItems);
        $scope.url = $location.path().substring(1);
        var keys = Object.keys($scope.menuItems);
        
        urlUpdate(keys);
        
    });
       
    
    /***********************************
    From Here I'm just definiing functions 
    that will e used in the view.
    ************************************/
    $scope.correctHash = function (str) {
        return str.substring(1);
    }
    $scope.isString = function(input) {
        return typeof input === 'string';
    };
    
    $scope.isObject = function(input) {
        return typeof input === 'object';
    }
    
    $scope.name = function(input) {
        return input.constructor.name;       
    }
    
    $scope.wasteFun = function (str) {
        $scope.waste += 1;
        return str;
    }
    
    
    
    $scope.white = function (str) {
        return str.replace(/\s/g, '');
    }
    $scope.hasItems = function (className, waste) {
        className = $filter('removeSpaces')(className);
        var x =	angular.element("." + className).children();
        if (x['length'] == 0) {
            return true;
        }
        return 0 != x.children()['length'];
    }
    
    $scope.capital = function (input) {
        if (typeof input == 'undefined') {return ""}
        return input[0].toUpperCase() + input.substring(1);
    }
    
    $scope.objLength = function (obj) {
        console.log(Object.keys(obj).length);
        return Object.keys(obj).length;
    }
    
    $scope.$watch(function() {
        return $location.path();
     }, function(){
        $scope.url = $location.path().substring(1);
        if ($scope.menuItems) {
            var keys = Object.keys($scope.menuItems);
            urlUpdate(keys);
            $timeout($scope.wasteFun, 1);
        }
     });
    
}]);