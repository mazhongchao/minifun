<?php
class MFTemplate
{
    protected static $path = [
        'path' => '../templates',
    ];
    protected static $data = [];

    public static function render($tpl, array $data = []) {
        $tpl_file = self::$path.DIRECTORY_SEPARATOR.$tpl;
        self::$data = array_merge(self::$data, $data);

        ob_start();
        extract(self::$data);
        include $tpl_file;

        $content = ob_get_clean();
        ob_end_clean();
        echo $content;
    }
}
