<?php
include 'config/config.php';
include 'helpers/format_helper.php';
include 'helpers/db_helper.php';
include 'helpers/temblate_helper.php';
session_start();
spl_autoload_register(function($className){
    include 'lib/'.$className.'.php';
});
?>