<?php
require_once("dbconfig.php");

class act_member extends dbconfig
{
    
    public function __construct()
    {
     
        $this->_dbname="act";
        parent::__construct();
        
    }
    
    function get_act_time($q1)
    {
        
        if(isset($q1))
        {
            $p=0;
            
            $query = "SELECT * FROM `create_act` WHERE `act_number` = ? ";
            
            $result = $this->_dsnconn->prepare($query);
            
            $result->bindValue(1, $q1, PDO::PARAM_STR);
            
            $result->execute();    
            if ($result) 
            {	
        	
        		while($row=$result->fetch(PDO::FETCH_ASSOC))
    			{
    			   $arr[$p]=array(
    			        "id"=>$row["id"],
    					"act_name"=>$row["act_name"],
    					"act_number"=>$row["act_number"],
    					"remain"=>$row["remain"],
    					"partner"=>$row["partner"],
    					"start_time"=>$row["start_time"],
    					"end_time"=>$row["end_time"]
    					
    			
    			    );
    			
    			    $p++; 
    			    
    			}   
        		
        	}
            
            
            
            return $arr;
            
        }
        
        
        
    }
    
    
    function member_check($acc,$passw,$act_num)
    {
        $query="SELECT `member_number`, `member_name` FROM `act_member` WHERE `member_number`=? AND `member_name`=? AND `act_number`=?";
     
        $result = $this->_dsnconn->prepare($query);
            
        $result->bindValue(1, $acc, PDO::PARAM_STR);
        
        $result->bindValue(2, $passw, PDO::PARAM_STR);
        
        $result->bindValue(3, $act_num, PDO::PARAM_STR);
            
        $result->execute();
        
        $rows = $result->rowCount();
        if ($rows) 
        {
            
            return 1; 
     
        }
        else
        {
  
            return 0;
       
        }
        
    }
    
    
    function member_insert_database($q1,$q2,$q3,$q4,$q5)
    {
        
        try
        {
			$this->_dsnconn->beginTransaction();
			
			
			$query = "SELECT participate FROM `act_member` WHERE `member_number`=? AND `member_name`=? AND `act_number`=?";
			
			$result = $this->_dsnconn->prepare($query);
			
			$result->bindValue(1, $q1, PDO::PARAM_STR);
            $result->bindValue(2, $q2, PDO::PARAM_STR);
            $result->bindValue(3, $q3, PDO::PARAM_STR);
            
			
			
			$result->execute();
			
			$act_participate = $result->fetch();
// 			echo $act_participate['participate'];
// 			exit;
			
				
			if(isset($act_participate['participate']))
			{
				// echo $act_participate['participate'];
		  //  	exit;
				if($act_participate['participate'] == 1)
				{
					throw new Exception('禁止重複報名');
				}
			}
		
			
            // echo $q4;
            // exit;
            $query = "SELECT * FROM `create_act` WHERE `id`=:id FOR UPDATE";
            
			$result = $this->_dsnconn->prepare($query);
			
			$result->bindValue(':id', $q4, PDO::PARAM_INT);
			
			
			$result->execute();
			
			$create_act_data = $result->fetch();
            
            sleep(5);
            if($create_act_data['remain']>=$q5)
            {
                
                
                $query="UPDATE `create_act` SET `remain`=`remain`- ? WHERE `id`=? ";
                
                $result = $this->_dsnconn->prepare($query);
                
                $result->bindValue(1, $q5, PDO::PARAM_STR);
                $result->bindValue(2, $q4, PDO::PARAM_STR);
                
             
                
                $result->execute();
                
                
                
                $query = "UPDATE `act_member` SET `participate`= 1 WHERE `member_number`=? AND `member_name`=? AND `act_number`=? ";
			 //   echo $query;
			 //   exit;
			    $result = $this->_dsnconn->prepare($query);
			    
    			$result->bindValue(1, $q1, PDO::PARAM_STR);
                $result->bindValue(2, $q2, PDO::PARAM_STR);
                $result->bindValue(3, $q3, PDO::PARAM_STR);
                
                $result->execute();
                
    
                
            }
            else
            {
				throw new Exception('超過可以報名人數'); 
			}
            
            
            
            
            $this->_dsnconn->commit();
            
            return true;
        }    
        catch (Exception $err) {
			$this->_dsnconn->rollback();
			echo $err->getMessage();
		}
		
// 		
	}
        
        
        
    
    
    
    
    
    
    
    
    
    
}    
?>