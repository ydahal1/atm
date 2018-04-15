<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<nav><h2>Money Machine LLC </h2></nav><hr>
		<form action="" method="post">
			<fieldset id="field_set">
				<h2>Technician Registration</h2><hr>				
				<div class="label_and_inputs">
					<label> First Name: </label>
					<input type="text" name="create_technician_first_name" placeholder="First Name"><br>
					
					<label> Last Name: </label>
					<input type="text" name="create_technician_last_name" placeholder="Last Name"><br>
					
					<label> Phone: </label>
					<input type="text" name="create_technician_phone_number" placeholder="xxxxxxxxx"><br>
					
					<label> State: </label>
					<input type="text" name="create_technician_state" placeholder="State"><br>
					
					<label> City: </label>
					<input type="text" name="create_technician_city" placeholder="City"><br>
					
					<label> Street: </label>
					<input type="text" name="create_technician_street" placeholder="Street"><br><br>
					
					<input type="submit" name="submit_technicaian_registration">
				</div>	
				
			</fieldset>	
		</form>
	</body>
	
	<footer>
		<a href="home.php"><button> Home </button></a>
	</footer>
</html>

<?php 
	//importing connection
	include 'connection.php';
	
	//Connecting to the database
	$con= new mysqli($server_name, $user_name,$password,$database);
	
	//If the connection fails
	if ($con->connect_error) {
		echo 'ERR: Connection to DB unsucessful; check configuration';
	}
	if(isset($_POST['submit_technicaian_registration'])){ 		//check if form was submitted
		$first_name = $_POST['create_technician_first_name'];	//Grabs user input and assigns to variable
		$last_name =  $_POST['create_technician_last_name'];
		$phone=       $_POST['create_technician_phone_number'];
		$state=       $_POST['create_technician_state'];
		$city=        $_POST['create_technician_city'];
		$street=      $_POST['create_technician_street'];
		
	//Creating technician  id  and prefixing with TCH
		$technician_id = "TCH-".round(microtime(true)*10);
	
	//Inserting data to the database
		// Step-1: assigning sql query to a variable
		$sql ="INSERT INTO technician(technician_id, first_name, last_name, phone_number, state_provience, city, street)
			   values('$technician_id', '$first_name', '$last_name', '$phone', '$state', '$city', '$street')";
		
		//Step-2: running above sql query and stores result in variable $result
		$result = mysqli_query($con, $sql);
	} 
	// Close connection
	mysqli_close($con);
?>