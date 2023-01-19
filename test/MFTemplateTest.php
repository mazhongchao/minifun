<?php
require "../vendor/autoload.php";

$data = ['title'=>"MFTemplate Test",'content'=>"MiniFun is a PHP programming utilities set"];

MFTemplate::setPath(dirname(__FILE__).DIRECTORY_SEPARATOR."test-resource");
MFTemplate::render("template-test.html", $data);