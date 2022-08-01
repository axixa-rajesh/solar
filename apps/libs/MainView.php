<?php 
class MainView{
    public function loadView($viewname,$pera=[],$hf=1){
        $viewname=str_replace('.','/',$viewname);
        $path= "apps/views/$viewname.php";
        if(file_exists($path)){
            if($pera){
                extract($pera);
            }
            include "apps/views/layout/top.php";
            if($hf)
                include "apps/views/layout/header.php";
            include $path;
            if($hf)
                include "apps/views/layout/footer.php";
            include "apps/views/layout/bottom.php";

        }
    }
}
?>