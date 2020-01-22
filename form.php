<?php 


set_include_path(get_include_path().PATH_SEPARATOR.realpath(__DIR__."/library/")); 
require_once 'config.php';
//автозагрузка классов из папки
function __autoload($name_class) {require_once $name_class.'.php';} 
//создание объекта
$object = new stdClass(); 
//получение данных из формы
foreach( $_REQUEST as $key=>$val )  $object->$key = sanitize($val); 

$word= new Word();

foreach ($object as $key=>$val) $data[$key]=$val;
$word->generate($data);
