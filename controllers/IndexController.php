<?php

class IndexController extends Controller 
{
    function index() 
    {
        
        $this->view("act_register");
        
            
        
        
    }
    
    
    function insert_act() 
    {
        $member_check=false;
        
        if(isset($_POST["btnOK"]))
        {               
           $people_limit = $_POST['people_limit'];
            
            
            
            $act_build = $this->model("act");
            
            $result=$act_build ->act_insert($_POST['act_name'], $_POST['act_username'], $people_limit, $people_limit, $_POST['partner'], $_POST['start_time'], $_POST['end_time']);
            
            $member_num=$_POST['employee'];
            $member_name=$_POST['employee_name'];
            $number=count($_POST['employee']);
            
            // echo $member_num[0];
            // exit;

            for($i=0;$i<$number;$i++)
            {
                $result1=$act_build->act_member_insert($member_num[$i],$member_name[$i]);
                if($result1)
                {
                    $member_check=$result1;
                    
                }
                
                
                
            }
            
            if($member_check)
            {
                
                $this->view("get_url",$result);
                
            }
            else 
            {
                
                
                $this->view("act_register",false);
                
                
            }
        
            
            
            
            
            
        }
        
        
        
        
            
        
        
    }
    
    
}


?>