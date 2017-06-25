<?php 
	require_once 'index_controller.php';	
?>
<!DOCTYPE html>
<html>
<head>
<title>R Delgado</title>
</head>
<body>
	<h5></h5>
	<h1>Create Group:</h1>

	<p> 
		<form action="" method="post">
		  Group Naam:<br>
		  <input type="text" name="name"><br>
		  Group:<br>
			  <select name="group">
			  		<option value="0">Geen Group</option>
			  		<?php
			  		 creatGroupSelectMenu();									
		  			?>	
			  </select>
			  	
			  <br><br>
		  <input type="submit" value="create group" name="create">
		</form> 
	</p>
	<h1>Create Item:</h1>
	<p> 
		<form action="" method="post">
		  Item Naam:<br>
		  <input type="text" name="name"><br>
		  Group:<br>
		  <select name="group">
		  		<option value="0">Geen Group</option>
		  			<?php
			  		 creatGroupSelectMenu();									
		  			?>		  		
		  </select><br><br>
		  <input type="submit" value="create item" name="create">
		</form>
	</p>
	<p>
				<?php 		 
						itemList();
		  		?>	
	</p> 

</body>
</html> 


	