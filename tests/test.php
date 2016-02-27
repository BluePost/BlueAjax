<?php
//Require in the BlueAjax library, also display info about it
$info = TRUE;
require_once '../BlueAjax.php';

if (GETisset("old", FALSE)) {
    //OLD TESTS, Deprecated
    //Check if the GET index "q" isset, if not, die with an error: '{"error":"q not set"}'
    AjaxAssert(GETisset("q"), error("q not set"));
    //Check if $_GET["q"] is a correct value (1 or 2), if not die with an error: '{"error":"q invalid"}'
    AjaxGoodVal($_GET["q"], [1,2], error("q invalid"));
    //If $_GET["q"] is 1, then make sure that the GET index "text" is set. If not, die with an error: '{"error":"text not set"}'
    AjaxCondAssert($_GET["q"] == 1, GETisset("text"), error("text not set"));
}
echo("New Tests: <br/>");
$response = new BluePost\AjaxResponse();
$response->assert(GETisset("q"), error("q not set"));
$response->isGoodVal($_GET["q"], [1,2], error("q invalid"));
$response->condAssert($_GET["q"] == 1, GETisset("text"), error("text not set"));
$response->respond(success("All good!"));