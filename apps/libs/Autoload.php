<?php 
class Autoload{
    public function __construct()
    {
        Session::init();
        $rq=request();
        //  dd($rq);
        $controller=$rq->controller;
        $method=$rq->method;
        $para=$rq->para;
        $path="apps/controllers/$controller.php";
        if(file_exists($path)){
            include_once $path;
            $obj=new $controller();
            if(method_exists($obj,$method))
                $obj->$method($para);
            else 
                include_once "404.php";

        }else {
            include_once "404.php";
        }
    }
}
?>