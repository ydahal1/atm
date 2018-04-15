<?php 
	//importing connection
	include 'connection.php';
	
	//importing home.php
	if(isset($_POST['terminal_submit'])){
		$terminal = $_POST['terminals'];
	}
	
	//Connecting to the database
	$con= new mysqli($server_name, $user_name,$password,$database);
	
	//If the connection fails
	if ($con->connect_error) {
		echo 'ERR: Connection to DB unsucessful; check configuration';
	}
		
	//Select data form database table terminal
		// querying: select data
		$sql = "SELECT * FROM terminal where terminal_id='$terminal'";
		//Running the query
		$result = mysqli_query($con, $sql);
		//Checking how many rows were pulled by the select statement
		$number_of_rows = mysqli_num_rows($result);
		// If the row is selected is more then 1, which it should be ---
		if ($number_of_rows > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$terminal_id = $row['terminal_id'];
				$owner_id = $row['owner_id'];
				$technician_id = $row['technician_id'];
				$loader_id = $row[cash_loader_id];
				$card_type = $row['card'];
				$state = $row['state_provience'];
				$city = $row['city'];
				$street = $row['street'];
			}
				}
				
	// Close connection
	mysqli_close($con);
?>

<!DOCTYPE html>
<html>
	<head>
	</head>
		<link rel="stylesheet" href="style.css">
	
	<body>
	<nav><h2>Money Machine LLC </h2></nav><hr>
		<form>
			<fieldset id="field_set">	
				<h2> Terminal information </h2><hr>
				<div class= "label_and_inputs">
						<label> Terminal Number: </label>
						<input type="text" value= "<?php echo "TRML-".$terminal_id ?>" disabled><br>
					
						<label> Owner ID: </label>
						<a href="display_directory.php?id=<?php echo $owner_id ?>"> <input type="text" value= "<?php echo $owner_id?>" disabled></a><br>
						
						<label> Technician ID: </label>
						<a href="display_directory.php?id=<?php echo $technician_id ?>"><input type="text" value= "<?php echo $technician_id ?>" disabled></a><br>
						
						<label> Loader ID: </label>
						<a href="display_directory.php?id=<?php echo $loader_id ?>"><input type="text"  value= "<?php echo $loader_id ?>" disabled></a><br>
						
						<label> Supports Card type: </label>
						<input type="text"  value= "<?php echo $card_type ?>" disabled><br>
						
						<label> State: </label>
						<input type="text" value= "<?php echo $state ?>" disabled><br>
						
						<label> City: </label>
						<input type="text" value= "<?php echo $city ?>" disabled><br>
						
						<label> Street: </label>
						<input type="text" value= "<?php echo $street ?>" disabled><br>
				</div>
			
			</fieldset>		
		</form>
	</body>
	
	<footer>
		<a href="home.php"><button> Home </button></a>
		 
	</footer>
</html>