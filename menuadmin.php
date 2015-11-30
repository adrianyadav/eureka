<?php
session_start();

if ($_SESSION["login"] != "true"){

    header("Location:login.php");

    $_SESSION["error"] = "<p> You don't have privileges to see the admin page.</p>";
    exit;

}

?>

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

    <div class="container" style="text-align:center; max-width: 1000px;">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-heading">Eureka Menu Admin Page</h2>
                <p><a href="admin.php">Go to main admin page</a></p>
                <hr>
                <button type="button" class="pure-button btn" id="helpButton" onclick="toggleHelp()">Show Help</button>

                <p></p>
                <br>
                <div id="help" style="display:none">
                    <p class="section-heading lead"> This is the menu admin page. Here you can add and delete menus, sections, and individual menu items. </p>
                    <p>Terminology: A menu can be viewed as whole page, like 'main' menu, 'snack' menu etc. A section is a subcategory in a menu, there can be many sections on a page, and they each have a title and a little information to go along with them like 'To Share. . . all day.' </p>
                    <br>
                    <p>Once you have made your changes, hit save and refresh the actual menu page, the changes should show up. Make sure you're happy with what you have before you hit save, because you can't go back to previous versions. If you want to restart, simply refresh the page.</p>
                    <hr>
                    <h3>Editing Individual Items</h3>
                    <p>You will notice that at the end of every section there is a a thing labelled "new item" with a bunch of inputs, this is how your create your new items. Be sure to delete the default values from the text input boxes if you want to leave them empty (wine location, and extra info) because other wise they will show up as part of the item.</p>
                    <br>
                    <p><b>What do the various fields do?</b></p>
                    <br>
                    <p> Wine location is for where a particular wine is from, but if you want to use this field for another kind of item that is fine. Extra info will show up on a seperate line from the main body of the description, just incase you want some extra information that shouldn't be displayed as part of the main paragraph.</p>
                    <br>
                    <p>The checkboxes are for describing who the items are suitable for. Most of the checkboxes will make a visible tag show up on the item, and they also determine what gets filtered out when the user puts in their preferences. Consider wine; you don't want it to be filtered if someone is looking for vegetarian, but you also don't want the (v) tag to show up because it's so obvious. In this case, tick the 'implied vegetarian' checkbox, likewise for the 'implied gf' checckbox</p>
                    <hr>
                    <h3>Editing Sections</h3>
                    <p>You can remove sections by clicking the delete button, this also removes all the items underneath it. You can also edit the title of each section with the two text input boxes to the left of the delete button.</p>
                    <br>
                    <p>You can decide which section gets displayed when by changing the priority values. The lower the number, the higher up a section will appear. Most sections don't have a priority value to start off with, and sections with a priority value will always go above ones without them.</p>
                    <br>
                    <p>Adding sections is done at the top of each menu page using the three input boxes before the 'add section' button</p>
                    <hr>
                    <h3>Editing Whole Menus</h3>
                    <p>Editing menus is done on the first line of below the navigation button (the big gold button). All you have to do is write the name of the menu, press the 'add menu' and there should be a new menu ready for you to navigate to. The 'delete current menu' button deletes the menu you are currently viewing including all of it's sections and menu items.</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Start of Main -->
    <main>
        <!-- Slides Container -->


        <div id="slider_container" style="height: 90px">
            <div id="outer_button_container">
                <div id="inner_button_container">
                    <div class="pure-menu-item pure-menu-has-children pure-menu-allow-hover menu_type_button inline" id="menu_type_button">
                        <p id="menuLink1" class="pure-menu-link" ng-bind="capital(url)"></p>
                        <ul class="pure-menu-children">
                            <li class="pure-menu-item" ng-repeat="title in titles">
                                <div>
                                    <a href="#{{title}}" class="pure-menu-link" ng-bind="capital(title)" style="z-index: 5;"></a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div id="menu_button" class="inline">
                        <p class="button_tag">Menu</p>
                    </div>
                </div>
            </div>

        </div>

        <!--Menu Area -->
        <section class="menu-section">
            <button type="button" class="pure-button btn" ng-click="sendPost()" style="width:150px;height:40px;background-color:red;color:white;">Save Progress</button>
            <div>
                name:
                <input type="text" ng-model="newMenuName">
                <button type="button" class="pure-button btn" ng-click="addMenu(newMenuName)">Add Menu</button>
                <button type="button" class="pure-button btn" ng-click="deleteMenu()">Delete Current Menu</button>
                
            </div>
            <div>
                Name:
                <input type="text" ng-model="newSection[url].name"> Extra:
                <input type="text" ng-model="newSection[url].extra"> Prioirty:
                <input type="number" ng-model="newSection[url].priority">
                <button class="pure-button btn" ng-click="addSection(url, newSection[url])">Add Section</button>
            </div>

            <div ng-repeat="subMenu in removeHide(menuItems[url]) | object2Array| orderBy:'priority'" ng-class="white(subMenu['name']) | removeSpaces" ng-hide="!hasItems(subMenu.name, waste)">
                <h1 ng-bind="subMenu.name"></h1>
                <span ng-bind="subMenu.extra" class="extraInfo"></span>
                <button type="button" class="pure-button btn" ng-click="deleteSection(subMenu, removeHide(menuItems[url]))">Delete Section</button>
                <input type="text" ng-model="subMenu.name">
                <input type="text" ng-model="subMenu.extra"> Prioirty:
                <input type="number" ng-model="subMenu.priority">
                <hr>
                <div class="pure-u-lg-1-4 pure-u-md-1-2" ng-repeat="item in subMenu.content | object2Array | orderBy:'price' | filter:search                                                                         |isVegetarian:vege | isGF: glute">
                    <div ng-init="hides[item.name] = false" ng-hide="hides[item.name]">
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
                        <p ng-bind="item.more"></p>
                        <button type="button" class="pure-button btn" ng-click="deleteItem(subMenu.content, [item.name][0])">Delete</button>
                        <button type="button" class="pure-button btn" ng-click="hides[item.name] = true">Edit</button>
                    </div>
                    <div ng-init="hides[item.name] = false" ng-hide="!hides[item.name]">
                        <input type="text" ng-model="item.name">
                        <input type="text" ng-model="item['wine-location']">
                        <br>
                        <p>Price: </p>
                        <input type="number" ng-model="item['price']">
                        <p>Small Price: </p>
                        <input type="number" ng-model="item['small-price']">
                        <br> gf:
                        <input type="checkbox" ng-model="item['gluten-free']"> gf available:
                        <input type="checkbox" ng-model="item['some-gf']"> implied gf:
                        <input type="checkbox" ng-model="item['imp-gf']"> vegetarian:
                        <input type="checkbox" ng-model="item['vegetarian']"> vegetarian available:
                        <input type="checkbox" ng-model="item['some-v']"> implied vegetarian:
                        <input type="checkbox" ng-model="item['imp-v']"> dairy free:
                        <input type="checkbox" ng-model="item['dairy-free']">
                        <br> Tags:
                        <span ng-if="item['gluten-free']">(gf)</span>
                        <span ng-if="item['some-gf']">(gf**)</span>
                        <span ng-if="item.vegetarian">(v)</span>
                        <span ng-if="item['some-v']">(v**)</span>
                        <span ng-if="item['dairy-free']">(df)</span>
                        <br>
                        <input type="text" ng-model="item.description">
                        <input type="text" ng-model="item.more">
                        
                        <br>
                        <button type="button" class="pure-button btn" ng-click="hides[item.name] = false">Done</button>
                    </div>
                </div>

                <div class="pure-u-lg-1-4 pure-u-md-1-2">
                    <div>
                        <h1>New Item</h1>
                        <br>
                        <input type="text" ng-init="subMenu.new.name='Name'" ng-model="subMenu.new.name">
                        <input type="text" ng-init="subMenu.new['wine-location']='Wine Location'" ng-model="subMenu.new['wine-location']">
                        <br>
                        <p>Price: </p>
                        <input type="number" ng-model="subMenu.new['price']">
                        <p>Small Price: </p>
                        <input type="number" ng-model="subMenu.new['small-price']">
                        <br> gf:
                        <input type="checkbox" ng-model="subMenu.new['gluten-free']"> gf available:
                        <input type="checkbox" ng-model="subMenu.new['some-gf']"> implied gf:
                        <input type="checkbox" ng-model="subMenu.new['imp-gf']"> vegetarian:
                        <input type="checkbox" ng-model="subMenu.new['vegetarian']"> vegetarian available:
                        <input type="checkbox" ng-model="subMenu.new['some-v']"> implied vegetarian:
                        <input type="checkbox" ng-model="subMenu.new['imp-v']"> dairy free:
                        <input type="checkbox" ng-model="subMenu.new['dairy-free']">
                        <br> Tags:
                        <span ng-if="subMenu.new['gluten-free']">(gf)</span>
                        <span ng-if="subMenu.new['some-gf']">(gf**)</span>
                        <span ng-if="subMenu.new.vegetarian">(v)</span>
                        <span ng-if="subMenu.new['some-v']">(v**)</span>
                        <span ng-if="subMenu.new['dairy-free']">(df)</span>
                        <br>
                        <input type="text" ng-init="subMenu.new.description='Description'" ng-model="subMenu.new.description">
                        <input type="text" ng-init="subMenu.new.more='Extra Info'" ng-model="subMenu.new.more">
                        <br>
                        <button type="button" class="pure-button btn" ng-click="addItem(subMenu)">Add</button>
                    </div>
                </div>
            </div>

            <div class="pure-u-1-1 info">
                <p>Please inform staff of any allergies or requirements as meals can be changed to suit your needs</p>
                <p>
                    Gluten free add $3 / gf = gluten free/ df = dairy free / gf** = gluten free available / v = vegetarian / v** = vegetarian available
                </p>
            </div>
        </section>

    </main>
    <?php include 'include/footer.php';?>
        <script>
            function toggleHelp() {
                $("#help").toggle();
                if ($("#helpButton").html() == "Show Help") {
                    $("#helpButton").html("Hide Help");
                } else {
                    $("#helpButton").html("Show Help");
                }
            }
        </script>
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/angular.js"></script>
        <script src="js/angular-animate.js"></script>
        <script type="text/javascript" src="js/admincontrollers.js"></script>
        <script src="js/dropdown.js"></script>
        <script src="js/bootstrap.min.js"></script>

</body>

</html>