<?php
require_once '../BlueAjax.php';
AjaxAssert(GETisset("q"), error("q not set"));
AjaxGoodVal($_GET["q"], [1,2], error("q invalid"));
AjaxCondAssert($_GET["q"] == 1, GETisset("text"), error("text not set"));