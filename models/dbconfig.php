<?php

class dbconfig
{

    protected $_dbms = "mysql";             //資料庫類型 
    protected $_host = "localhost";         //資料庫ip位址
    protected $_port = "3306";           //資料庫埠
    protected $_username = "root";          //資料庫用戶名
    protected $_password = "";              //密碼
    protected $_dbname = "test";            //資料庫名
    protected $_charset = "utf-8";       //資料庫字元編碼
    protected $_dsnconn;                    //data soruce name 資料來源


    /*-------------------------
    預設先連資料庫
    -------------------------*/
    public function __construct()
    {
        
        try 
        {
                
          
    		$this->_dsnconn = new PDO($this->_dbms.':host='.$this->_host.';dbname='.$this->_dbname,$this->_username,$this->_password);
    	    
    		$this->_dsnconn->exec("SET CHARACTER SET utf8");
    	    
		} 
		catch (PDOException $e) {
		    
			return 'Error!: ' . $e->getMessage() . '<br />';
		}
        
    
    }

    
    /**
     * Execute select query
     *
     * @param   string  SQL select query
     * @return  array
     */
    public function select($sql)
    {
        $statement = $this->_dsnconn->query($sql, PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    /**
     * Execute update query
     *
     * @param   string  SQL update query
     * @return  int     number of affected rows
     */
    public function update($sql)
    {
        return $this->exec($sql);
    }
    /**
     * Execute insert query
     *
     * @param   string  SQL insert query
     * @return  bool
     */
    public function insert($sql)
    {
        $rowEffect = $this->exec($sql);
        if ($rowEffect > 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Execute delete query
     *
     * @param   string  SQL delete query
     * @return  int     number of affected rows
     */
    public function delete($sql)
    {
        return $this->exec($sql);
    }
    /**
     * Last insert id
     *
     * @return  int
     */
    public function lastInsertId()
    {
        return (int)$this->_dsnconn->lastInsertId();
    }
    /**
     * Execute any SQL query
     *
     * @param   string  SQL query
     * @return  int     number of affected rows
     */
    public function exec($sql)
    {
        return $this->_dsnconn->exec($sql);
    }

    
    
    
    
    


}


?>