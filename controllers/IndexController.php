<?php

class IndexController extends Controller 
{
    function index() 
    {
        
        $this->view("act_register");
        
            
        
        
    }
    
    
    function insert_act() 
    {
        
        
        if(isset($_POST["btnOK"]))
        {               
            $act_build = $this->model("act");
            
            $result=$act_build ->act_insert($_POST['act_name'], $_POST['act_username'], $_POST['people_limit'], $_POST['partner'], $_POST['start_time'], $_POST['end_time']);
            if($result)
            {
                
                
                
                $this->view("get_url",true);
                
                
            }
            else 
            {
                
                
                $this->view("act_register",false);
                
                
            }
        
            
            
            
            
            
        }
        
        
        
        
            
        
        
    }
    
    
}


?>