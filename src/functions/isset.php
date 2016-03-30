<?php
/**
 * Checks if a specific index of $_GET isset
 * @param type $index - Index to check
 * @param type $harsh - TRUE => use strict isset, FALSE => use LaxIsset
 * @return boolean
 */
function GETisset ($index, $harsh = TRUE) {
    $oldErrorLevel = error_reporting();
    error_reporting(E_ALL ^ E_NOTICE);
    $val = FALSE;
    try {
        $val = ($harsh ? strictIsset($_GET[$index]) : isset($_GET[$index]));
    }
    catch (Exception $e) {$val = FALSE;}
    error_reporting($oldErrorLevel);
    return $val;
}

/**
 * Checks if a specific index of $_POST isset
 * @param type $index - Index to check
 * @param type $harsh - TRUE => use strict isset, FALSE => use LaxIsset
 * @return boolean
 */
function POSTisset($index, $harsh = TRUE) {
    $oldErrorLevel = error_reporting();
    error_reporting(E_ALL ^ E_NOTICE);
    $val = FALSE;
    try {
        $val = ($harsh ? strictIsset($_POST[$index]) : isset($_POST[$index]));
    }
    catch (Exception $e) {$val = FALSE;}
    error_reporting($oldErrorLevel);
    return $val;
}

/**
 * Check if a specific variable isset
 * @param type $test - Variable to check if it isset
 * @param type $notZero - TRUE => Check that the variable is not 0 (FALSE) 
 * @param type $notEmptyString TRUE => Check that the variable is not "" (TRUE)
 * @param type $notNull - TRUE => Check that the variable is not null (TRUE)
 * @return boolean
 */
function strictIsset ($test, $notZero = FALSE, $notEmptyString = TRUE, $notNull = TRUE) {
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

/**
 * Check if a specific value isset
 * @param type $test - The variable to check if it isset
 * @param type $NES - TRUE => Check that the variable is not "" (TRUE)
 * @return boolean
 */
function laxIsset ($test, $NES = FALSE) {
    return strictIsset($test, FALSE, $NES, TRUE);
}