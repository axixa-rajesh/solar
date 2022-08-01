<?php 
class MainController{
    protected $view;
    public function __construct()
    {
        $this->view = new MainView();
    }
    public function loadModel($modelname,$objname=''){
        if($objname==''){
            $objname=strtolower($modelname);
        }
        $cmodel=ucfirst(strtolower($modelname));
        $path="apps/models/$cmodel.php";
        if(file_exists($path)){
            include $path;
            $this->$objname=new $cmodel($cmodel);
        }
    }
}