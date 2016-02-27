<?php
/**
 * Create an error array that can then be json-encoded
 * @param type $text - The text of the error
 * @param type $index - The index of the error ("error")
 * @param type $orriginal - An array to start from, will set the $index of that array to $text and return it
 * @return Array
 */
function error ($text, $index = "error", $orriginal = Array()) {
    $orriginal[$index] = $text;
    return $orriginal;
}

function success($text, $index = "success", $orriginal = Array()) {
    $orriginal[$index] = $text;
    return $orriginal;
}