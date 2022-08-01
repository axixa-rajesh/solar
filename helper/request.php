<?php 
function request($key=null){ 
    $robj=(object)['controller'=>'CategoriesController','method'=>'index','get'=>$_GET,'post'=>$_POST,'para'=>null];
    if($_GET){
        $url=explode('/',rtrim($_GET['url'],'/'));
        $robj->controller=ucfirst(strtolower($url[0]))."Controller";
        $robj->method=(isset($url[1]))?$url[1]:$robj->method;
        $robj->para=(isset($url[2]))?$url[2]:null;
        unset($robj->get['url']);

    }
    if($key){
        if(array_key_exists($key,$_POST)){
            return $_POST[$key];
        }
        if(array_key_exists($key,$_GET)){
            return $_GET[$key];
            }
        return null;
    }

    return $robj;
}
function enc($val){
    return urlencode(base64_encode($val));
}
function dec($val){
    return base64_decode(urldecode($val));
}
function redirect($url){
    $url=str_replace('.','/',$url);
    header('Location:'.ROOT.$url);
    
}