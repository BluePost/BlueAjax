<?php
function GETisset ($index, $harsh = TRUE) {
    return ($harsh ? strictIsset($_GET[$index]) : laxIsset($_GET[$index]));
}

function POSTisset($index, $harsh = TRUE) {
    return ($harsh ? strictIsset($_POST[$index]) : laxIsset($_POST[$index]));
}

function strictIsset ($test, $notZero = TRUE, $notEmptyString = TRUE, $notNull = TRUE) {
    if (!isset($test))
        return FALSE;
    if ($notZero && is_numeric($test) && intval($test) === 0)
        return FALSE;
    if ($notEmptyString && $test == "")
        return FALSE;
    if ($notNull && $test == null)
        return FALSE;
    return TRUE;   
}

function laxIsset ($test, $NES = TRUE) {
    return strictIsset($test, FALSE, $NES, TRUE);
}