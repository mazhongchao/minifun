<?php

class MFConsole
{
    private static $console_types = [
        'emergency' => ['style'=>'1', 'color'=>'33;41'],
        'alert'     => ['style'=>'0', 'color'=>'30;43'],
        'critical'  => ['style'=>'1', 'color'=>'37;44'],
        'error'     => ['style'=>'1', 'color'=>'31'],
        'warning'   => ['style'=>'1', 'color'=>'33'],
        'notice'    => ['style'=>'1', 'color'=>'36'],
        'info'      => ['style'=>'1', 'color'=>'37'],
        'debug'     => ['style'=>'1', 'color'=>'34'],
        'success'   => ['style'=>'1', 'color'=>'32'],
        'common'    => ['style'=>'7', 'color'=>''],
        'black'     => ['style'=>'0', 'color'=>'30'],
        'red'       => ['style'=>'0', 'color'=>'31'],
        'green'     => ['style'=>'0', 'color'=>'32'],
        'yellow'    => ['style'=>'0', 'color'=>'33'],
        'blue'      => ['style'=>'0', 'color'=>'34'],
        'purple'    => ['style'=>'0', 'color'=>'35'],
        'cyan'      => ['style'=>'0', 'color'=>'36'],
        'white'     => ['style'=>'0', 'color'=>'37'],
        'gray'      => ['style'=>'0', 'color'=>'90'],

        // 'info'    => ['style'=>'1', 'color'=>'37'],  //highlight white
        // 'notice'  => ['style'=>'0', 'color'=>'36'],  //cyan-blue
        // 'warning' => ['style'=>'0', 'color'=>'33'],  //yellow
        // 'error'   => ['style'=>'1', 'color'=>'31'],  //highlight red
        // 'success' => ['style'=>'0', 'color'=>'32'],
        // 'blue'    => ['style'=>'1', 'color'=>'34'],
        // 'green'   => ['style'=>'0', 'color'=>'32'],
        // 'red'     => ['style'=>'1', 'color'=>'31'],
        // 'white'   => ['style'=>'1', 'color'=>'37'],
        // 'yellow'  => ['style'=>'0', 'color'=>'33'],
    ];
    private static $text_types = [
        'info'    => ['color'=>'#7a7a7a', 'bg_color'=>'#ededed'],
        'notice'  => ['color'=>'#0486b3', 'bg_color'=>'#b1e0f0'],
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

    public static function log($text, $type='', $pre_text='')
    {
        if (is_string($text)) {
            if (!empty($type) && isset(self::$console_types[$type])) {
                $mode = self::$console_types[$type]['style'];
                $color = self::$console_types[$type]['color'];
                echo "\033[{$mode};{$color}m{$pre_text}{$text}\033[0m\n";
                //print("\\033\[{$mode};{$color}m{$pre}{$text}\\033\[0m\n");
            }
            else {
                echo "{$pre_text}{$text}\n";
            }
        }
        else {
            echo "\033[0;90m";
            if (!empty($pre_text)) {
                echo "$pre_text\n";
            }
            var_dump($text);
            echo "\033[0m\n";
        }
    }

    public static function info($text, $type='', $pre_text='', $class='')
    {
        if (is_string($text)) {
            if (!empty($type) && isset(self::$text_types[$type])) {
                $color = self::$text_types[$type]['color'];
                $background = self::$text_types[$type]['bg_color'];
                if (empty($class)) {
                    echo "<div style=\"color: $color; background: $background; float:left; width: 80%;\"><pre>{$pre_text}{$text}</pre></div>";
                }
                else{
                    echo "<div style=\"$class\"><pre>{$pre_text}{$text}</pre></div>";
                }
            }
            else {
                if (empty($class)) {
                    echo "<div style=\"color: #333; background: #ededed; float:left; width: 80%;\"><pre>{$pre_text}{$text}</pre></div>";
                }
                else{
                    echo "<div style=\"$class\"><pre>{$pre_text}{$text}</pre></div>";
                }
            }
        }
        else {
            if (empty($class)) {
                echo "<div style=\"color: #555; background: #ddd; float:left; width: 80%;\">";
            }
            else {
                echo "<div style=\"$class\">";
            }

            if (!empty($pre_text)) {
                echo "$pre_text";
            }

            echo "<pre>";
            var_dump($text);
            echo "</pre></div>";
        }
    }
}
