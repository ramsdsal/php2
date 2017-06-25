<?php
class dbconnection{

	public $dbname = 'hvmp_rdelgado';
	public $username = 'root';
	public $password = '';
	public $hostname = 'localhost';
	public $dbhandle = 'false';

	public function dbcon()
	{

		try 
		{
		    $this->dbhandle = new PDO("mysql:host=$this->hostname;dbname=$this->dbname;", $this->username, $this->password);
		    // set the PDO error mode to exception
		    $this->dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //echo "Connected successfully";
	    }
		catch(PDOException $e)
	    {
	    	echo "Connection failed: " . $e->getMessage();
	    }	
	
	}
	public function dbClose()
	{
		$this->dbhandle = null;
	}
	
	
    public function searchFather($id,$node)
    {   
    	if($id!=0)
    	{
    		$sql = "SELECT group_id,group_name,group_father_id FROM groups WHERE group_id = $id order by group_father_id";    	
			$stmt = $this->dbhandle->query($sql);		 
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($row['group_father_id']!=0)
			{					
				
					if(!empty($node)){
						$node=$node.'.'.$row['group_name'];
					}else{
						$node=$row['group_name'];
					}				
				
				$this->searchFather($row['group_father_id'],$node);
			}
			else 
			{			       
				if(!empty($node)){
						$node=$node.'.'.$row['group_name'];
					}else{
						$node=$row['group_name'];
					}
				
				 $new=$this->textInvert($node);
				 
				echo $new;
	    	}
		}		    
    }

    public function textInvert($texto){

		$divisor = explode(".", $texto);
		$reverse = array_reverse($divisor);		
		$final = implode(".", $reverse);
        return $final;

    }	
}
