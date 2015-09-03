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
        return item.vegetarian || item['some-v'] || !bool;
    });
  };
}).filter('isGF', function () {
    return function (items, bool) {
        return items.filter(function (item) {
            return item['gluten-free'] || item['some-gf'] || !bool; 
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
}).filter('capital', function() {
    return function (item) {
        item[0] = item[0]
    }
});

app.controller('menuCtrl', function($location, $scope, $http, $filter, $window) {
    /********************************
    Here is the stuff that actually
    runs when the controller starts.
    *********************************/
    $scope.waste  = 0;
    
    
  	$http.get('json/menu-items.json').then(function(res){
        $scope.menuItems = res.data;
        $scope.url = $location.path().substring(1);
        var keys = Object.keys($scope.menuItems);
        var allG = false;
        
        keys.forEach(function(element) {
            console.log(element);
            if (element == $scope.url) {
                allG = true;
            }
        });
        console.log(allG);
        if (!allG) {
            $scope.url = 'snack';
        }
        $scope.subMenuList = keys[$scope.url];
    });
       
    
    /***********************************
    From Here I'm just definiing functions 
    that will be used in the view.
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
        console.log(input);
        return input.constructor.name;       
    }
    
    $scope.wasteFun = function () {
        $scope.waste += 1;
    }
    
    $scope.hasItems = function (className, waste) {
        className = $filter('removeSpaces')(className);
        var x =	angular.element("." + className).children();
        if (x['length'] == 0) {
            return true;
        }
        console.log("got here");
        //console.log(0 == x.children()['length'] || typeof x != 'undefined');
        /*console.log(x);
        console.log("children: " + x.children() + "   children length: " + x.children()['length']);
        console.log(0 == x.children()['length']);
        console.log("----------------------------------------");*/
        return 0 != x.children()['length'];
    }
});