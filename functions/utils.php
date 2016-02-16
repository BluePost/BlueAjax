<?php
/**
 * Create an error array that can then be json-encoded
 * @param type $text - The text of the error
 * @param type $index - The index of the error ("error")
 * @return Array
 */
function error ($text, $index = "error") {
    return Array($index => $text);
}