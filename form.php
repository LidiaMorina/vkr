<?php
set_include_path(get_include_path().PATH_SEPARATOR.realpath(__DIR__."/library/"));
function __autoload($name_class){require_once $name_class.'.php';}//автозагрузка классов из папки
$object = new stdClass();// Создаём объект
require_once 'config.php';
foreach( $_REQUEST as $key=>$val )  $object->$key = sanitize($val);//получаем переменные
foreach ($object as $key=>$val) $data[$key]=$val;
$word= new Word();
$word->generate($data);