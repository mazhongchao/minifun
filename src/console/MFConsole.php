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
        'gray'      => ['style'=>'0', 'color'=>'90']
    ];
    private static $text_types = [
        'emergency' => ['color'=>'#ffffff', 'background'=>'#d12c31'],
        'alert'     => ['color'=>'#000000', 'background'=>'#ffff00'],
        'critical'  => ['color'=>'#ffffff', 'background'=>'#002eff'],
        'error'   => ['color'=>'#d12c31', 'background'=>'#ffbdbf'],
        'warning' => ['color'=>'#ed8c05', 'background'=>'#fcfbca'],
        'notice'  => ['color'=>'#0486b3', 'background'=>'#b1e0f0'],
        'info'    => ['color'=>'#7a7a7a', 'background'=>'#ededed'],
        'debug'   => ['color'=>'#4a86e8', 'background'=>''],
        'success' => ['color'=>'#039c46', 'background'=>'#cafce0'],
        'common'  => ['color'=>'#333333', 'background'=>'#ededed'],
        'black'   => ['color'=>'#222222', 'background'=>''],
        'red'     => ['color'=>'#ff0000', 'background'=>''],
        'green'   => ['color'=>'#09a604', 'background'=>''],
        'yellow'  => ['color'=>'#ff9900', 'background'=>''],
        'blue'    => ['color'=>'#0000ff', 'background'=>''],
        'purple'  => ['color'=>'#a635f1', 'background'=>''],
        'cyan'    => ['color'=>'#04bac7', 'background'=>''],
        'white'   => ['color'=>'#ffffff', 'background'=>''],
        'gray'    => ['color'=>'#888888', 'background'=>''],
        'black-d'   => ['color'=>'#666666', 'background'=>'#000000'],
        'red-d'     => ['color'=>'#d12c31', 'background'=>'#000000'],
        'green-d'   => ['color'=>'#1e9c02', 'background'=>'#000000'],
        'yellow-d'  => ['color'=>'#ffff00', 'background'=>'#000000'],
        'blue-d'    => ['color'=>'#4175f5', 'background'=>'#000000'],
        'purple-d'  => ['color'=>'#a635f1', 'background'=>'#000000'],
        'cyan-d'    => ['color'=>'#00d7ff', 'background'=>'#000000'],
        'white-d'   => ['color'=>'#ffffff', 'background'=>'#000000'],
        'gray-d'    => ['color'=>'#aaaaaa', 'background'=>'#000000']
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
                $background = self::$text_types[$type]['background'];
                if (empty($class)) {
                    echo "<div style=\"color: $color; background: $background; float:left; width: 80%; padding: 0 10px 0 10px;\"><pre>{$pre_text}{$text}</pre></div>";
                }
                else{
                    echo "<div style=\"$class\"><pre>{$pre_text}{$text}</pre></div>";
                }
            }
            else {
                if (empty($class)) {
                    echo "<div style=\"color: #333; float:left; width: 80%; padding: 0 10px 0 10px;\"><pre>{$pre_text}{$text}</pre></div>";
                }
                else{
                    echo "<div style=\"$class\"><pre>{$pre_text}{$text}</pre></div>";
                }
            }
        }
        else {
            if (empty($class)) {
                echo "<div style=\"color: #666; background: #ddd; float:left; width: 80%; padding: 0 10px 0 10px;\">";
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
