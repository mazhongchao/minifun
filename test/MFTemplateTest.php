<?php
require "../vendor/autoload.php";

$data = [
    'title'=>"MFTemplate Test",
    'content'=>"MiniFun is a PHP programming utilities set",
    'list'=>[['company1', '$147', '$1,325', '$683', '$524'],
            ['company2', '$135', '$2,342', '$683', '$524'],
            ['company3', '$164', '$332', '$331', '$438']],
    'capitals'=>['China'=>'Peking', 'Germany'=>'Berlin']
];

MFTemplate::setPath(dirname(__FILE__).DIRECTORY_SEPARATOR."test-resource");
MFTemplate::render("template-test.html", $data);