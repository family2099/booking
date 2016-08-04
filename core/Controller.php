<?php

class Controller {
    //public function model($model)  也是指定載入特定的 $model
    public function model($model) 
    {
        require_once "../act/models/$model.php";
        return new $model ();
    }
    //是說指定要load $view，且帶 $data 給 $view。
    
    public function view($view, $data = Array()) 
    {
        require_once "../act/views/$view.php";
    }
    
    
    // public function ccs_load($name) 
    // {
    //     return "<link href='/EasyMVC/views/shopping/'".$name." rel=stylesheet>";
    // }
    
    
    
    
    
    
    
    
    
    
    
    
    
}

?>