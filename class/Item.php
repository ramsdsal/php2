<?php
require_once 'entity.php';

class item extends entity{

	public function insertItem($conn)
	{	
		$sql = 'INSERT INTO items(
							item_name,
            				item_father_id) VALUES (
				            :name, 
            				:father)';
            				
        $stmt = $conn->dbhandle->prepare($sql);

		$stmt->bindParam(':name', $this->getName(), PDO::PARAM_STR);       
		$stmt->bindParam(':father', $this->getFatherId(), PDO::PARAM_INT);  
		                                      
		$stmt->execute(); 
		
	}
	public function listItem($conn)
	{
    	$sql = "SELECT
				item_id,
				item_name,
				item_father_id				
				FROM items 
				order by item_father_id";

		$stmt = $conn->dbhandle->query($sql); 
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row;
    }
    
    public function getItem($conn)
    {
    	$sql = "SELECT
				item_id,
				item_name,
				item_father_id				
				FROM items 
				WHERE item_id = :id";

		$stmt = $conn->dbhandle->prepare($sql);
		$stmt->bindParam(':id', $this->getId(), PDO::PARAM_STR);                                      
		$stmt->execute(); 
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row;
    }

    public function getGroupName($conn,$group_id)
    {
    	$sql = "SELECT
				group_name							
				FROM groups 
				WHERE group_id = :id";

		$stmt = $conn->dbhandle->prepare($sql);
		$stmt->bindParam(':id', $group_id, PDO::PARAM_STR);                                      
		$stmt->execute(); 
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $row;
    }

}
