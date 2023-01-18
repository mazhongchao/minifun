<?php
require "../vendor/autoload.php";

$console_types = [
    'emergency' => 'EMERGENCY',
    'alert' => 'ALERT',
    'critical' => 'CRITICAL',
    'error' => 'ERROR',
    'warning' => 'WARNING',
    'notice' => 'NOTICE',
    'info' => 'INFO',
    'debug' => 'DEBUG',
    'success' => 'SUCCESS',
    'common' => 'COMMON',
    'black' => 'Black',
    'red' => 'Red',
    'green' => 'Green',
    'yellow'  => 'Yellow',
    'blue' => 'Blue',
    'purple' => 'Purple',
    'cyan' => 'Cyan',
    'white' => 'White',
    'gray' => 'Gray'
];

$text_types = [
    'emergency' => 'EMERGENCY',
    'alert' => 'ALERT',
    'critical' => 'CRITICAL',
    'error' => 'ERROR',
    'warning' => 'WARNING',
    'notice' => 'NOTICE',
    'info' => 'INFO',
    'debug' => 'DEBUG',
    'success' => 'SUCCESS',
    'common' => 'COMMON',
    'black' => 'Black',
    'red' => 'Red',
    'green' => 'Green',
    'yellow'  => 'Yellow',
    'blue' => 'Blue',
    'purple' => 'Purple',
    'cyan' => 'Cyan',
    'white' => 'White',
    'gray' => 'Gray',
    'black-d' => 'Black',
    'red-d' => 'Red',
    'green-d' => 'Green',
    'yellow-d'  => 'Yellow',
    'blue-d' => 'Blue',
    'purple-d' => 'Purple',
    'cyan-d' => 'Cyan',
    'white-d' => 'White',
    'gray-d' => 'Gray'
];

if (strpos(php_sapi_name(), 'cli') !== false) {
    foreach ($console_types as $type => $pre_text) {
        MFConsole::log("test MFConsole::log()", $type, "{$pre_text}: ");
    }
    
    MFConsole::log("plain text");
    
    $arr = ['foo', 'foo'=>'bar'];
    MFConsole::log($arr);
}
else {
    foreach ($text_types as $type => $pre_text) {
        MFConsole::info("test MFConsole::info()", $type, "{$pre_text}: ");
    }
    
    MFConsole::info("plain text");
    
    $arr = ['foo', 'foo'=>'bar'];
    MFConsole::info($arr, '', 'array dump');
}
