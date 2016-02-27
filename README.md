# BlueAjax
Super-Simple framework for making AJAX easier to deal with on the PHP side.

##Getting Started
### Installation with <a href="https://getcomposer.org/">Composer</a> <b>Recommended</b>
We recommend you install the package with Composer:
```
composer require bluepost/blueajax
```
### Installation
Alternatively you can download the <a href="https://github.com/BluePost/BlueAjax/releases/latest">Latest Release</a>, unzip it, and upload the src folder to your environment. Then require it for every file for which you need it. 
```php
require_once ('BlueAjax.php');
```

## Using BlueAjax
```php
    <?php
    require_once '../BlueAjax.php';
    //Create a response object
    $response = new BluePost\AjaxResponse();
    //Check if the GET index "q" isset, if not, die with an error: '{"error":"q not set"}'
    $response->assert(GETisset("q"), error("q not set"));
    //Check if $_GET["q"] is a correct value (1 or 2), if not die with an error: '{"error":"q invalid"}'
    $response->isGoodVal($_GET["q"], [1,2], error("q invalid"));
    //If $_GET["q"] is 1, then make sure that the GET index "text" is set. If not, die with an error: '{"error":"text not set"}'
    $response->condAssert($_GET["q"] == 1, GETisset("text"), error("text not set"));
    //Respond with an "All good!" message
    $response->respond(success("All good!"));
```
