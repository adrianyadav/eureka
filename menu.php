<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts and External Stylesheets -->
    <title>Eureka Cafe &#38; Bar</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link href='http://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="fonts/bebasneue.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/base-min.css">
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" href="css/grids-responsive-min.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link href="css/nav-footer.css" rel="stylesheet">


</head>

<body ng-app="menuApp" ng-controller="menuCtrl">
    <?php include 'include/nav.php';?>

    <!-- Start of Main -->
    <main>
        <!-- Slides Container -->
        

        <div id="slider_container">
            <div id="outer_button_container">
                <div id="inner_button_container">
                    <div class="pure-menu-item pure-menu-has-children pure-menu-allow-hover menu_type_button inline" id="menu_type_button">
                        <p id="menuLink1" class="pure-menu-link" ng-bind="capital(url)"></p>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item" ng-repeat="title in titles" >
                                <div>
                                    <a href="#{{title}}" class="pure-menu-link" ng-bind="capital(title)"style="z-index: 5;"></a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div id="menu_button" class="inline">
                        <p class="button_tag">Menu</p>
                    </div>
                </div>
            </div>
                <div ng-repeat="title in titles" class="slide" ng-show="title === url" ng-style="{'background-image': 'url(img/menu/' + title + '.jpg'}"></div>
        </div>

        <!--Menu Area -->
        <section class="menu-section">
                
            <div class="search">
                <p>Search:</p>
                <input type="text" ng-model="search" ng-change="wasteFun()">
                <p>vegetarian:</p>
                <input type="checkbox" ng-model="vege" ng-change="wasteFun()">
                <p>gluten free:</p>
                <input type="checkbox" ng-model="glute" ng-change="wasteFun()">
            </div>

            <div ng-repeat="subMenu in removeHide(menuItems[url])" ng-class="white(subMenu['name']) | removeSpaces" ng-hide="!hasItems(subMenu.name, waste)">
                <h1 ng-bind="subMenu.name"></h1>
                <span ng-bind="subMenu.extra" class="extraInfo"></span>
                <hr>
                <div class="pure-u-lg-1-4 pure-u-md-1-2" ng-repeat="item in subMenu.content | object2Array | orderBy:'price' | filter:search                                                                         |isVegetarian:vege | isGF: glute">
                    <div>
                        <span class="pure-u-3-4">
                        <h1 ng-bind="item.name"></h1>
                        <p ng-if="item['wine-location']"ng-bind="'(' + item['wine-location'] + ')'"></p>
                    </span>
                        <span class="pure-u-1-5">
                        <span ng-if="item['small-price']" class="price" ng-bind="'$' + item['small-price'].toFixed(2)"></span>
                        <span class="price" ng-bind="'$' + item.price.toFixed(2)"></span>
                        </span>
                        <span ng-if="item['gluten-free']">(gf)</span>
                        <span ng-if="item['some-gf']">(gf**)</span>
                        <span ng-if="item.vegetarian">(v)</span>
                        <span ng-if="item['some-v']">(v**)</span>
                        <span ng-if="item['dairy-free']">(df)</span>
                        <p ng-if="isString(item.description)" ng-bind="item.description" ng-class="{hideit : menuItems[url].hide}"></p>
                        <ul ng-if="isObject(item.description)">
                            <li class="desc-repeat" ng-repeat="desc in item.description track by $index" ng-bind="desc"></li>
                        </ul>
                    </div>
                </div>
                    
                    <span ng-if="item['gluten-free']">(gf)</span>
                    <span ng-if="item['some-gf']">(gf**)</span>
                    <span ng-if="item.vegetarian">(v)</span>
                    <span ng-if="item['some-v']">(v**)</span>      
                    <span ng-if="item['dairy-free']">(df)</span>                  
                    <p ng-if="isString(item.description)" ng-bind="item.description"></p>
                    <ul ng-if="isObject(item.description)">
                        <li class="desc-repeat" ng-repeat="desc in item.description track by $index" ng-bind="desc"></li>
                    </ul>
            </div>

            <div class="pure-u-1-1 info">
                <p>Please inform staff of any allergies or requirements as meals can be changed to suit your needs</p>
                <p>
                    Gluten free add $3 / gf = glutn free/ df = dairy free / gf** = gluten free available / v = vegetarian / v** = vegetarian available
                </p>
            </div>
        </section>
        
    </main>
       <?php include 'include/footer.php';?>

    <script src="js/jquery-1.11.3.min.js"></script> 
    <script src="js/angular.js"></script>
    <script src="js/angular-animate.js"></script>
    <script type="text/javascript" src="js/controllers.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>