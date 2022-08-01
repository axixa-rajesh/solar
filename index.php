<?php 
require_once "config/route.php";
$helperfiles=glob("helper/*.php");
array_map(fn($fn)=>include_once $fn,$helperfiles);
require_once "apps/libs/Session.php";
spl_autoload_register(function($clsname){
    $path="apps/libs/$clsname.php";
    if(file_exists($path))
        include_once $path;

});
new Autoload();
?>