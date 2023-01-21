<?php

class MFLogger
{
    private static $log_option = [
        'log_path' => './logs',
        'log_name' => '',
        'log_name_prefix' => '',
        'log_name_suffix' => '',
        'log_rotate_size' => 1024*10,
    ];
    private static $log_file;
    private static $instance;

    private function __construct($option=[]) {
        self::$log_option = $option + self::$log_option;
        if (!empty(self::$log_option['log_name'])) {
            $file_name = self::$log_option['log_name'];
        }
        else {
            $file_name = date('Ymd', time());
        }
        if (!empty(self::$log_option['log_name_prefix'])) {
            $file_name = self::$log_option['log_name_prefix'].'_'.$file_name;
        }
        if (!empty(self::$log_option['log_name_suffix'])) {
            $file_name = $file_name.'_'.self::$log_option['log_name_suffix'];
        }
        $log_dir = rtrim(self::$log_option['log_path'], '/');
        if (empty($log_dir)) {
            $log_dir = '.';
        }
        if (!is_dir($log_dir)) {
            @mkdir($log_dir, 0777, true);
        }
        self::$log_file = $log_dir.'/'.$file_name.'.log';
    }

    public static function instance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Logger();
        }
        return self::$instance;
    }

    private static function rotated()
    {
        return filesize(self::$log_file) >= self::$log_option['log_maxsize'];
    }

    private static function log_count()
    {
        $ret = [];
        $file_name = self::$log_file;
        extract(pathinfo(self::$log_file));
        $file_name = "$dirname/$basename";
        $command = "ls $file_name*.log | wc -l";
        exec($command, $res);
        if(isset($ret[0]))
            return $res[0]+0;
        else
            return 0;
    }
    public static function info($message, array $context=[])
    {
        self::log(LogLevel::INFO, $message, $context=[]);
    }
    public static function notice($message, array $context=[])
    {
        self::log(LogLevel::NOTICE, $message, $context=[]);
    }
    public static function warning($message, array $context=[])
    {
        self::log(LogLevel::WARNING, $message, $context=[]);
    }
    public static function error($message, array $context=[])
    {
        self::log(LogLevel::ERROR, $message, $context=[]);
    }
    public static function log($level, $message, array $context=[])
    {
        $time = date('Y-m-d H:i:s', time());
        $message = self::interpolate($message, $context);
        $text = "$time [$level] $message".PHP_EOL;
        if (self::rotated()) {
            $c = self::log_count();
            $file_name = self::$log_file.'_'.$c.'.log';
            rename(self::$log_file, $file_name);
        }
        $fp = fopen(self::$log_file, 'a+');
        fwrite($fp, $text);
        fclose($fp);
    }
    private static function interpolate($message, array $context=[])
    {
        if (strpos($message, '{') === false) {
            if (is_array($context)) {
                return $message.':'.json_encode($context);
            }
            return $message;
        }

        $replacement = [];
        foreach ($context as $key => $val) {
            $placeholder = '{' . $key . '}';
            if (strpos($message, $placeholder) === false) {
                continue;
            }
            if (is_null($val) || is_scalar($val) || (is_object($val) && method_exists($val, "__toString"))) {
                $replacement[$placeholder] = $val;
            }
            elseif (is_object($val)) {
                $replacement[$placeholder] = '[object '.get_class($val).']';
            }
            elseif (is_array($val)) {
                $replacement[$placeholder] = 'array'.@json_encode($val);
            }
            else {
                $replacement[$placeholder] = '['.gettype($val).']';
            }
        }

        return strtr($message, $replacement);
    }
}