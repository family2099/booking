<?php

require_once("dbconfig.php");


class act extends dbconfig
{
    
    public $act_number;
    
    public function __construct()
    {
     
        $this->_dbname="act";
        parent::__construct();
        
    }   
    
    function act_insert($q1,$q2,$q3,$q4,$q5,$q6,$q7)
    {
        
        if(isset($q1) && isset($q2) && isset($q3) && isset($q4) && isset($q5) && isset($q6) && isset($q7))
        {
            
            $a_number=$this->act_number = "act_".date('YmdHis');
            // echo "act_".date('YmdHis');
            
            // exit;
            $query = "INSERT INTO `create_act` (`act_name`, `username`, `quota_limit`, `remain`, `partner`, `start_time`, `end_time`, `act_number`) VALUES (?,?,?,?,?,?,?,?)";
            
            
            $result = $this->_dsnconn->prepare($query);
            
            $result->bindValue(1, $q1, PDO::PARAM_STR);
            $result->bindValue(2, $q2, PDO::PARAM_STR);
            $result->bindValue(3, $q3, PDO::PARAM_STR);
            $result->bindValue(4, $q4, PDO::PARAM_STR);
            $result->bindValue(5, $q5, PDO::PARAM_STR);
            $result->bindValue(6, $q6, PDO::PARAM_STR);
            $result->bindValue(7, $q7, PDO::PARAM_STR);
            $result->bindValue(8, $a_number, PDO::PARAM_STR);
            
            $result->execute();
            
           
            return true;
        
        }
        else
        {
            return false;
            
        }
        
        
    }
    
    
    function act_member_insert($q1,$q2)
    {
        
        if(isset($q1) && isset($q2))
        {
            $a_number=$this->act_number;
          
            $query = "INSERT INTO `act_member` (`member_number`, `member_name`, `act_number`) VALUES (?,?,?)";
    
            
            $result = $this->_dsnconn->prepare($query);
            
            $result->bindValue(1, $q1, PDO::PARAM_STR);
            $result->bindValue(2, $q2, PDO::PARAM_STR);
            $result->bindValue(3, $a_number, PDO::PARAM_STR);
            
            // echo $a_number;
            // exit;
            
            $result->execute();
            
           
            return true;
        
        }
        else
        {
            return false;
            
        }
        
    }    
    
    
    
    
}





?>