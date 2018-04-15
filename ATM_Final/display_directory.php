<?php 
	//importing connection
	include 'connection.php';
	
	//Connecting to the database
	$con= new mysqli($server_name, $user_name,$password,$database);
	
	if ($con->connect_error) {
		echo 'ERR: Connection to DB unsucessful; check configuration';
	}
	else{
		//Getting id that was passed form display_terminal.php or id that has been clicked
		$id= $_GET['id'];
		
		//Creating sub string form string $id to dispaly in input box role
			$role_id = substr($id, 0, 3);
			if($role_id == 'LDR'){
				// Role spelled out
				$role = "Loader";
				//Select data form loader table
				$sql= "SELECT * FROM loader where loader_id='$id'";
				//Running SQL query
				$result = mysqli_query($con, $sql);
				//Checking how many rows were pulled by select statement
				$number_of_rows = mysqli_num_rows($result);
				//if number of rows pulled by select staement is more then zero assign them to variable
				if($number_of_rows == 1){
					while($row = mysqli_fetch_assoc($result)){
						$phone = $row['phone_number'];
						$first_name = $row['first_name'];
						$last_name = $row['last_name'];
						$state = $row['state_provience'];
						$city = $row['city'];
						$street = $row['street'];
					}
				}
				
			} else if($role_id == 'OWN'){
				$role = "Owner";
				//Select data form loader table
				$sql= "SELECT * FROM owner where owner_id='$id'";
				//Running SQL query
				$result = mysqli_query($con, $sql);
				//Checking how many rows were pulled by select statement
				$number_of_rows = mysqli_num_rows($result);
				//if number of rows pulled by select staement is more then zero assign them to variable
				if($number_of_rows == 1){
					while($row = mysqli_fetch_assoc($result)){
						$phone = $row['phone_number'];
						$first_name = $row['first_name'];
						$last_name = $row['last_name'];
						$state = $row['state_provience'];
						$city = $row['city'];
						$street = $row['street'];
					}
				}
				
			} else {
				$role = "Technician";
				//Select data form loader table
				$sql= "SELECT * FROM technician where technician_id='$id'";
				//Running SQL query
				$result = mysqli_query($con, $sql);
				//Checking how many rows were pulled by select statement
				$number_of_rows = mysqli_num_rows($result);
				//if number of rows pulled by select staement is more then zero assign them to variable
				if($number_of_rows == 1){
					while($row = mysqli_fetch_assoc($result)){
						$phone = $row['phone_number'];
						$first_name = $row['first_name'];
						$last_name = $row['last_name'];
						$state = $row['state_provience'];
						$city = $row['city'];
						$street = $row['street'];
					}
				}
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
				<h2>Details &nbsp; &nbsp; </h2><hr>
				<div class= "label_and_inputs">
					<label> Phone: </label>
					<input type="text" name="directory_phone_number" value="<?php echo $phone; ?>" disabled><br>
				
					<label> First Name: </label>
					<input type="text" name="directory_first_name" value="<?php echo $first_name; ?>"disabled><br>
					
					<label> Last Name: </label>
					<input type="text" name="directory_last_name" value="<?php echo $last_name; ?>" disabled><br>
					
					<label> Role: </label>
					<input type="text" name="directory_role" value = " <?php echo $role; ?>" disabled><br>
					
					<label> Role ID: </label>
					<input type="text" name="directory_role_id" value = " <?php echo $id; ?>" disabled><br>
					
					<label> State: </label>
					<input type="text" name="directory_state" value="<?php echo $state; ?>" disabled><br>
					
					<label> City: </label>
					<input type="text" name="directory_city" value="<?php echo $city; ?>" disabled><br>
					
					<label> Street: </label>
					<input type="text" name="directory_street" value="<?php echo $street; ?>" placeholder="Street"><br>
				</div>
			</fieldset>		
		</form>
	</body>
	
	<footer>
		<a href="home.php"><button> Home </button></a>
	</footer>
</html>