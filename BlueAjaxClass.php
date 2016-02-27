<?php
namespace BluePost;
class AjaxResponse {
    
    private $response = Array();
    
    public function __construct($baseArray = Array()) {
        $this->response = $baseArray;
    }
    
    /**
    * Assert that a test is true, if not, die with an error message
    * @param type $test - The thing to test if TRUE
    * @param type $error - The error message
    * @param type $json - Set to FALSE if $error is not an array that should be encoded
    */
   function assert($test, $error, $json = TRUE) {
       if (!$test) {
           die($json ? json_encode(array_merge($error, $this->response)) : $error);
       }
   }

   /**
    * Assert that a value is in an array, wrapper for AjaxAssert (is $needle in $haystack, if no, die $error)
    */
   function isGoodVal($needle, $haystack, $error, $json = TRUE) {
       $this->assert(in_array($needle, $haystack), $error, $json);
   }

   /**
    * Assert that a value is a valid key for an array, wrapper for Ajax Assert
    */
   function isGoodKey ($needle, $haystack, $error, $json = TRUE) {
       $this->assert(array_key_exists($needle, $haystack), $error, $json);
   }

   /**
    * Only assert $test if $cond is true, wrapper for AjaxAssert
    */
   function condAssert ($cond, $test, $error, $json = TRUE) {
       if ($cond) $this->assert ($test, $error, $json);
   }
   
   function addResponse($key, $value) {
       $this->response[$key] = $value;
   }
   
   function respond($response=Array(), $add=TRUE) {
       if ($add) die(json_encode (array_merge ($this->response, $response)));
       json_encode($response);
   }
    
}


