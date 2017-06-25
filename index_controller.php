<?php

function __autoload($class_name){
		require_once 'class/' . $class_name . '.php';
}
	
    if (isset($_POST["create"]) && $_POST["create"] == 'create group'  && isset($_POST["name"]) && !empty($_POST["name"]))
    {	

    		$conn=new dbconnection();
			$conn->dbcon();
    	    $group= new group();
		    $group->setName($_POST['name']);
		    $group->setFatherId($_POST['group']);

	    $group->insertGroup($conn);	    
	    $conn->dbClose();

	    header("Location:http://".$_SERVER['HTTP_HOST']."/".rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));

    }
    if (isset($_POST["create"]) && $_POST["create"] == 'create item'  && isset($_POST["name"]) && !empty($_POST["name"]))
    {	

    		$conn=new dbconnection();
			$conn->dbcon();
    	    $item= new item();
		    $item->setName($_POST['name']);
		    $item->setFatherId($_POST['group']);

	    $item->insertItem($conn);	    	    
	    $conn->dbClose();

	    header("Location:http://".$_SERVER['HTTP_HOST']."/".rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));

    }

    function creatGroupSelectMenu(){

    	$conn=new dbconnection();
		$conn->dbcon();
		$group=new group();

    	$row=$group->getAllGroups($conn);
    	
    	foreach ($row as $value)
			{	 
				
				echo '<option value="'.$value['group_id'].'">';
	        	echo $conn->searchFather($value['group_id'],'').' | group name: '.$value['group_name'].'</option>';
	        } 
	        
	    $conn->dbClose();
	    
    }   

    function itemList(){

    	$conn=new dbconnection();
		$conn->dbcon();
		$item=new item();

		$list=$item->listItem($conn);
		//print_r($list);
			foreach ($list as $value)
			{	

				$url="detail.php?id=".$value['item_id'];     		    	
	         	echo "<a href='$url' target='_blank'>".$conn->searchFather($value['item_father_id'],'').' '.$value['item_name']."</a><br>";
	        }
    	$conn->dbClose();
    } 
    function printItemInformation($item_id)
    {
    	
    	$conn=new dbconnection();
		$conn->dbcon();
		$item=new item();
		$item->setId($item_id);		
		$it=$item->getItem($conn);

		if($it[0]['item_father_id']!=0)
		{
			$group_name=$item->getGroupName($conn,$it[0]['item_father_id']);	
			//print_r($group_name);		
				echo '	<div>
 							<p>Informatie over het item</p>
 							<p>';
 				echo		'<div>
 							<p>Item name: <b>' .$it[0]['item_name'].'</b></p>
 							<p>';
 				echo ' | Group hiërarchie. '.$conn->searchFather($it[0]['item_father_id'],'');
 				echo		'</p>
  						</div>
  						<div>
 							<p>Group naam: <h2>'.$group_name[0]['group_name'] .'</h2></p>
  						</div>';

	      }
	      else
	      {
	      		echo '	<div>
 							<p>Informatie over het item</p>
 							<p>';
 				echo		'<div>
 							<p>Item name: <b>' .$it[0]['item_name'].'</b></p>
 							<p>';
 				echo 'Geen group hiërarchie.'; 
 				echo		'</p>
  						</div>
  						<div>
 							<p>Group naam: <h2>Geen group</h2></p>
  						</div>';
	      }  

    }
