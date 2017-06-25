<?php
require_once 'entity.php';


class group extends entity{

	public function insertGroup($conn)
	{	
		$sql = 'INSERT INTO groups(
							group_name,
            				group_father_id) VALUES (
				            :name, 
            				:father)';
            				
        $stmt = $conn->dbhandle->prepare($sql);

		$stmt->bindParam(':name', $this->getName(), PDO::PARAM_STR);       
		$stmt->bindParam(':father', $this->getFatherId(), PDO::PARAM_INT);  
		                                      
		$stmt->execute(); 
		
	}
	public function getAllGroups($conn)
	{
		$sql = "SELECT group_id, group_name, group_father_id FROM groups";
		$stmt = $conn->dbhandle->query($sql); 
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row;
    }	

}
