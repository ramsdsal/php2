<?php 
	require_once 'index_controller.php';

	if(isset($_GET['id']) && $_GET['id']!=null)
	{			
		$item_id=(int)$_GET['id'];				
	}
	else
	{
		header("Location:http://".$_SERVER['HTTP_HOST']."/".rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));
	}	


?>
<!DOCTYPE html>
<html>
<head>
<title>R Delgado</title>
</head>
<body>
 <?php 
	printItemInformation($item_id); 
 ?>
 	

</body>
</html> 