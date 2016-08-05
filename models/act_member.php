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
    
    
    function member_check($acc,$passw)
    {
        $query="SELECT `member_number`, `member_name` FROM `act_member` WHERE `member_number`=? AND `member_name`=?";
     
        $result = $this->_dsnconn->prepare($query);
            
        $result->bindValue(1, $acc, PDO::PARAM_STR);
        
        $result->bindValue(2, $passw, PDO::PARAM_STR);
            
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
    
    
    function member_insert_database($q1,$q2,$q3,$q4=1)
    {
        
        try{
			$conn->beginTransaction()
        
            $sql = "SELECT * FROM  WHERE id = :id FOR UPDATE";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':id', $activityID);
			$stmt->execute();
			$activityResult = $stmt->fetch();
            
            $query="UPDATE `act_member` SET `participate`=? WHERE member_number=? AND member_name=? AND act_number=?";
        
            $result = $this->_dsnconn->prepare($query);
            
            $result->bindValue(1, $q1, PDO::PARAM_STR);
            $result->bindValue(2, $q2, PDO::PARAM_STR);
            $result->bindValue(3, $q3, PDO::PARAM_STR);
            $result->bindValue(4, $q4, PDO::PARAM_STR);
                
            $result->execute();
            
            
        }    
        
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
}    
?>