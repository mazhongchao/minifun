<?php

class MFConsole
{
    private static $console_types = [
        'info'    => ['style'=>'0', 'color'=>'36'],  //cyan-blue
        'notice'  => ['style'=>'1', 'color'=>'37'],  //highlight white
        'warning' => ['style'=>'0', 'color'=>'33'],  //yellow
        'error'   => ['style'=>'1', 'color'=>'31'],  //highlight red
        'blue'    => ['style'=>'1', 'color'=>'34'],
        'green'   => ['style'=>'0', 'color'=>'32'],
        'red'     => ['style'=>'1', 'color'=>'31'],
        'white'   => ['style'=>'1', 'color'=>'37'],
        'yellow'  => ['style'=>'0', 'color'=>'33'],
    ];
    private static $page_types = [
        'info'    => ['color'=>'#0486b3', 'bg_color'=>'#b1e0f0'],
        'notice'  => ['color'=>'#7a7a7a', 'bg_color'=>'#ededed'],
        'warning' => ['color'=>'#ed8c05', 'bg_color'=>'#fcfbca'],
        'error'   => ['color'=>'#d12c31', 'bg_color'=>'#ffbdbf'],
        'success' => ['color'=>'#039c46', 'bg_color'=>'#cafce0'],
        'black'   => ['color'=>'#555555', 'bg_color'=>'#000000'],
        'blue'    => ['color'=>'#4175f5', 'bg_color'=>'#000000'],
        'green'   => ['color'=>'#1e9c02', 'bg_color'=>'#000000'],
        'red'     => ['color'=>'#d12c31', 'bg_color'=>'#000000'],
        'yellow'  => ['color'=>'#f58b41', 'bg_color'=>'#000000'],
    ];

    private static $instance;

    private function __construct() {
        //
    }

    public static function instance()
    {
        if (empty(self::$instance)) {
            self::$instance = new MFConsole();
        }
        return self::$instance;
    }

    public static function log($text, $type='', $pre='')
    {
        if (is_string($text)) {
            if (!empty($type) && isset(self::$console_types[$type])) {
                $mode = self::$console_types[$type]['style'];
                $fc = self::$console_types[$type]['color'];
                echo "\033[$mode;$fc;m$pre$text\033[0m\n";
            }
            else {
                echo "$pre$text\n";
            }
        }
        else {
            if(!empty($pre)) echo "$pre\n";
            var_dump($text);
        }
    }

    public static function page($text, $type='', $pre='')
    {
        if (is_string($text)) {
            if (!empty($type) && isset(self::$console_types[$type])) {
                $mode = self::$page_types[$type]['style'];
                $color = self::$page_types[$type]['color'];
                $background = self::$page_types[$type]['bg_color'];
                echo "<div style=\"color: $color; background: $background; float:left; width: 80%;padding: 3px;margin: 0;\">$pre$text</div>";
            }
            else {
                echo "$pre$text\n";
            }
        }
        else {
            if(!empty($pre)) echo "$pre\n";
            var_dump($text);
        }
    }
}
