<?php
function AjaxAssert($test, $error, $json = TRUE) {
    if (!$test) {
        die($json ? json_encode($error) : $error);
    }
}

function AjaxGoodVal($needle, $haystack, $error, $json = TRUE) {
    AjaxAssert(in_array($needle, $haystack), $error, $json);
}

function AjaxGoodKey ($needle, $haystack, $error, $json = TRUE) {
    AjaxAssert(array_key_exists($needle, $haystack), $error, $json);
}

function AjaxCondAssert ($cond, $test, $error, $json = TRUE) {
    if ($cond) AjaxAssert ($test, $error, $json);
}
