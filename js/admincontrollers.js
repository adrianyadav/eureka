var app = angular.module('menuApp', ['ngAnimate']).filter('object2Array', function () {
    return function (input) {
        var out = [];
        for (i in input) {
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
            return item['gluten-free'] || item['some-gf'] || item['imp-gf'] || !bool;
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
var memes;
app.controller('menuCtrl', function ($location, $scope, $http, $filter, $window, $timeout) {
    /********************************
    Here is the stuff that actually
    runs when the controller starts.
    *********************************/
    $scope.waste = 0;

    $http.get('json/menu-items.json').then(function (res) {
        $scope.menuItems = res.data;
        $scope.titles = Object.keys($scope.menuItems);
        $scope.url = $location.path().substring(1);
        $scope.setUrl();
        var keys = Object.keys($scope.menuItems);
    });

    memes = $scope;

    $scope.sendPost = function () {
        var data = JSON.parse(JSON.stringify($scope.menuItems));
        for (var i in data) {
            console.log(data[i]);
            for (var j in data[i]) {
                delete data[i][j].new;
            }
        }

        var request = $http({
            method: "post",
            url: "/php/menubackend.php",
            data: data,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        });

        request.success(function (data) {
            console.log("You have memed and here's your data: " + data);
        });
    }

    $scope.setUrl = function () {
        var keys = Object.keys($scope.menuItems);
        var allG = false;
        keys.forEach(function (element) {
            if (element == $scope.url) {
                allG = true;
            }
        });
        if (!allG) {
            $scope.url = 'main';
        }
        $scope.subMenuList = keys[$scope.url];
    }


    /***********************************
    From Here I'm just definiing functions 
    that will used in the view.
    ************************************/
    $scope.deleteItem = function (content, item) {
        delete content[item];
    }

    $scope.deleteSection = function (section, menu) {
        delete menu[section.name];
    }

    $scope.addItem = function (subMenu) {
        var item = JSON.parse(JSON.stringify(subMenu.new));
        subMenu.content[item.name] = item;
        console.log(subMenu);
    }
    
    $scope.addMenu = function (name) {
        $scope.menuItems[name.toLowerCase()] = {
            section: {
                name: "section",
                content: {}
            }
        }
        $scope.titles = Object.keys($scope.menuItems);
        $scope.url = 'main';
        $scope.url = name;
    }
    
    $scope.deleteMenu = function () {
        delete $scope.menuItems[$scope.url];
        $scope.titles = Object.keys($scope.menuItems);
        
        $timeout(function (){
            $scope.setUrl();     
        }, 1);
    }
    
    $scope.addSection = function (url, menu) {
        console.log(menu);
        $scope.menuItems[url][menu.name] = JSON.parse(JSON.stringify(menu));
        
        $scope.menuItems[url][menu.name].content = {};
    }

    $scope.removeHide = function (obj) {
        if (!obj) return null;
        delete obj.hide;
        return obj;
    }

    $scope.correctHash = function (str) {
        return str.substring(1);
    }
    $scope.isString = function (input) {
        return typeof input === 'string';
    };

    $scope.isObject = function (input) {
        return typeof input === 'object';
    }

    $scope.name = function (input) {
        return input.constructor.name;
    }

    $scope.wasteFun = function (str) {
        $scope.waste += 1;
        return str;
    }

    $scope.wasteFuns = function () {
        $timeout($scope.wasteFun, 1);
    }

    $scope.white = function (str) {
        return str.replace(/\s/g, '');
    }

    $scope.hasItems = function (className, waste) {
        className = $filter('removeSpaces')(className);
        var x = angular.element("." + className).children();
        if (x['length'] == 0) {
            return true;
        }
        return 0 != x.children()['length'];
    }

    $scope.capital = function (input) {
        if (typeof (input) === 'undefined' || input == "") {
            return ""
        }
        return input[0].toUpperCase() + input.substring(1);
    }

    $scope.objLength = function (obj) {
        console.log(Object.keys(obj).length);
        return Object.keys(obj).length;
    }

    $scope.$watch(function () {
        return $location.path();
    }, function () {
        $scope.url = $location.path().substring(1);
        if ($scope.menuItems) {
            $scope.setUrl();
            $timeout($scope.wasteFun, 1);
        }
    });
});