<?php


class act_memberController extends Controller
{
    /*-----------------------------------
    活動報名頁呈現狀況
    
    -------------------------------------*/
    function show($act_number)
    {
        
        $act_time = $this->model("act_member");  
        
        $all=$act_time->get_act_time($act_number); 
        
       
        if(isset($all))
        {
            
            if(date('Y-m-d H:i:s') < $all[0]['start_time'])
            {
                
                $this->view("show","活動報名時間還沒到");
                
            }
            
            if(date('Y-m-d H:i:s') > $all[0]['end_time'])
            {
                
                $this->view("show","活動報名時間已過");
                
            }
            
            if($all[0]['start_time'] <= date('Y-m-d H:i:s') && date('Y-m-d H:i:s') <= $all[0]['end_time'])
            {
                $data[0]=$act_number;
                $data[1]=$all[0]['remain'];
                $data[2]=$all[0]['partner'];
                $data[3]=$all[0]['act_name'];
                $data[4]=$all[0]['id'];
                $this->view("import_member_data",$data);
            }
            
        }
        
        
    }
    
    /*-----------------------------------
    確認是否有該名人員
    
    -------------------------------------*/
    
    function check_member()
    {
    
       
        $check_ac = $this->model("act_member");
        
        
        $result=$check_ac->member_check($_POST['member_number'],$_POST['member_name'],$_POST['act_number']);
        
       
        
        $this->view("ajax",$result);
        
    }
    
    /*-----------------------------------
    確認人員是否能餐與活動
    
    -------------------------------------*/
    
    function insert_member()
    {
        
            $people_number=0;
            
            if($_POST["people_number"])
            {
                $people_number=$_POST["people_number"];
                
            }
            $inser_member_data = $this->model("act_member");
            
            $result=$inser_member_data->member_insert_database($_POST["member_number"],$_POST["member_name"],$_POST["act_number"],$_POST["act_id"],$people_number+1);
            
            if($result)
            {
                $this->view("show","報名成功");
            }
        
    }
    
    
    
}


?>