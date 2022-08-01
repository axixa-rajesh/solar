<?php
class Session{
    public static function init(){
        session_start();
    }
    public static function set($proname,$provalue){
        $_SESSION[$proname]=$provalue;
    }
    public static function get($proname){
        if(isset($_SESSION[$proname]))
            return $_SESSION[$proname];
        return null;    
    }
    public static function delete($proname){
        if(isset($_SESSION[$proname]))
            unset($_SESSION[$proname]);
    }
    public static function destroy(){
            session_destroy();
    }
    
} 
?>