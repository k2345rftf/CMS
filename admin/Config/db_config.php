<?php
return array(
    'type'=>'mysql',
    'name'=>'cms_test',
    'host'=>'localhost',
    'login'=>'root',
    'password'=>'',
    'charset'=>'utf-8',
    'options'=>array(
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES=> false
    )
);