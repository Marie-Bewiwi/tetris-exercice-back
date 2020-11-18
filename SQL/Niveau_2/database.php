<?php
include_once "Medoo.php";
use Medoo\Medoo;
//initialisation
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'exniveau2',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
])

?>
