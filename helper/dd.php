<?php 
function dd($arg){
    $type=['boolean','null'];
    echo "<div style='background:black;color:white'>";
    if(in_array(gettype($arg),$type)){
        var_dump($arg);
    }else{
        echo "<pre>";
        print_r($arg);
        echo "</pre>";
    }
    echo "</div>";
    exit;

}