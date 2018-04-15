<?php 
	//importing connection
	include 'connection.php';
	
	//Connecting to the database
	$con= new mysqli($server_name, $user_name,$password,$database);
	
	//If the connection fails
	if ($con->connect_error) {
		echo 'ERR: Connection to DB unsucessful; check configuration';
	}

	//pullling tech Ids form Tech Table to display in drop down
		//step 1: storing select statement in a variable $sql_get_techs
		$sql_get_techs = "SELECT technician_id FROM technician";
		
		//step 2:storing selected data in a varible $result1
		$result1 = mysqli_query($con, $sql_get_techs);
		
		//Lopping through all the selected data
		while($row= mysqli_fetch_assoc($result1)){
			//storing all the retrived data into drop down options
			$technicians_options .= "<option value='{$row['technician_id']}'>{$row['technician_id']}</option>";
		}
		
		echo $technicians_options;
		
	//pulling loader Ids from loader table to dipsly in drop down
		//step 1: storing select statement in a variable $sql_get_loaders
		$sql_get_loaders = "SELECT loader_id FROM loader";
		
		//step 2:storing selected data in a varible $result2
		$result2 = mysqli_query($con, $sql_get_loaders);
		
		//Lopping through all the selected data
		while($row= mysqli_fetch_assoc($result2)){
			//storing all the retrived data into drop down options
			$loader_options .= "<option value='{$row['loader_id']}'>{$row['loader_id']}</option>";
		}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<nav><h2>Money Machine LLC </h2></nav>
		<form method="post" action="">
			<fieldset id="field_set" style="height: 400px; overflow-y: auto;">
			<h2 style="margin-top: -10px;"> Terminal Registration</h2><hr>
			<div class= "label_and_inputs">
				<label> First Name: </label>
				<input type="text" name="create_terminal_first_name" placeholder="First Name"/><br>
				
				<label> Last Name: </label>
				<input type="text" name="create_terminal_last_name" placeholder="Last Name"/><br>
				
				<label> Phone: </label>
				<input type="text" name="create_terminal_phone_number" placeholder="xxxxxxxxx"/><br>
				
				<label> State: </label>
				<input type="text" name="create_termianl_state" placeholder="State"/><br>
				
				<label> City: </label>
				<input type="text" name="create_terminal_city" placeholder="City"/><br>
				
				<label> Street: </label>
				<input type="text" name="create_terminal_street" placeholder="Street"/><br>
			
				<label> Supports:</label>
					&ensp;<input type="checkbox" name="card[]" value="Visa" id="check_box"/>&nbsp;Visa
					<input type="checkbox" name="card[]"  value="Master" id="check_box"/>&nbsp;Master
					<input type="checkbox" name="card[]" value="Amex" id="check_box"/>&nbsp;Amex
					<br>
				<label> Technicain</label>
				<select name="select_terminal_technician" id="dropdown">
					<!--  Options that were pulled form DB used for drop down -->
					<?php echo $technicians_options ?>
				</select><br>
				
				<label> Cash Loader </label>
				<select name="select_terminal_cash_loader" id="dropdown">
					<!--  Options that were pulled form DB used for drop down -->
					<?php echo $loader_options ?>
				</select><br><br>
					
				<input type="submit" name="submit_terminal_registration">
				</div>
			</fieldset>		
		</form>
	</body>
	<footer>
		<a href="home.php"><button>Home</button></a>
	</footer>
</html>

<?php 
if(isset($_POST['submit_terminal_registration'])){ 		//check if form was submitted
	$first_name = $_POST['create_terminal_first_name'];	//Grabs user input and assigns to variable
	$last_name =  $_POST['create_terminal_last_name'];
	$phone=       $_POST['create_terminal_phone_number'];
	$state=       $_POST['create_termianl_state'];
	$city=        $_POST['create_terminal_city'];
	$street=      $_POST['create_terminal_street'];
	$technician = $_POST['select_terminal_technician'];
	$cash_loader= $_POST['select_terminal_cash_loader'];
	
	//Finds which check boxes are checked
	$card = $_POST['card'];
	$card_type =implode(", ", $card); // Converts checked check boxes to string and stores in a variable
	
	//Creating unique owner id prefexing with OWN-
	$owner_id = "OWN-".(round(microtime(true)*10)); 
	
	//Inserting data to the database - owner table
		// Step-1: assigning sql query to a variable - inserts data in owner table
		$sql1 ="INSERT INTO owner(owner_id, first_name, last_name, phone_number, state_provience, city, street)
		values('$owner_id', '$first_name', '$last_name', '$phone', '$state', '$city', '$street')";
		
		//Step-2: running above sql query and stores result in variable $result
		$result1 = mysqli_query($con, $sql1);
		
	//Inserting data to the database - Terminal table
		//Step-1: assigning sql query to a variable - inserts data in termianl table
		$sql2 ="INSERT INTO terminal(state_provience, city, street, card, technician_id, cash_loader_id, owner_id)
		values('$state', '$city', '$street', '$card_type', '$technician', '$cash_loader', '$owner_id' )";
		
		//Step-2: running above sql query and stores result in variable $result
		$result2 = mysqli_query($con, $sql2);	
} 

// Close connection
mysqli_close($con);
?>

