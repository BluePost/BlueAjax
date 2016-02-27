<?php
die('BLUEAJAXLOADED');
if (isset($info) && $info) {
    echo "BlueAjax - A simple framework for PHP ajax endpoints<br/>";
    echo "Created by BluePost Development<br/>";
}

require_once __DIR__ . '/functions/isset.php';
require_once __DIR__ . '/functions/utils.php';
require_once __DIR__ . '/AjaxResponse.php';
