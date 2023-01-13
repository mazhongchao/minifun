<?php
require "../vendor/autoload.php";

$console_types = [
    'INFO' => 'info', 
    'NOTICE' => 'notice', 
    'WARNING' => 'warning',
    'SUCCESS' => 'success',
    'ERROR' => 'error', 
    'Blue' => 'blue', 
    'Green' => 'green', 
    'Red' => 'red',
    'White' => 'white',
    'Yellow'  => 'yellow'
];

$text_types = [
    'INFO' => 'info',
    'NOTICE' => 'notice',
    'WARNING' => 'warning',
    'ERROR' => 'error',
    'SUCCESS' => 'success',
    'Black' => 'black',
    'Blue' => 'blue', 
    'Green' => 'green',
    'Red' => 'red',
    'Yellow'  => 'yellow'
];

if (strpos(php_sapi_name(), 'cli') !== false) {
    foreach ($console_types as $key => $value) {
        MFConsole::log("test MFConsole::log()", $value, "{$key}: ");
    }
    
    MFConsole::log("common info");
    
    $arr = ['foo', 'foo'=>'bar'];
    MFConsole::log($arr);
}
else {
    foreach ($text_types as $key => $value) {
        MFConsole::info("test MFConsole::info()", $value, "{$key}: ");
    }
    
    MFConsole::info("common info");
    
    $arr = ['foo', 'foo'=>'bar'];
    MFConsole::info($arr);
}
