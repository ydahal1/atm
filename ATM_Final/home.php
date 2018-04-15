<?php
//importing connection
include 'connection.php';

//Connecting to the database
$con= new mysqli($server_name, $user_name,$password,$database);

//If the connection fails
if ($con->connect_error) {
	echo 'ERR: Connection to DB unsucessful; check configuration';
}

//pullling Terminal Ids form Termianl Table to display in drop down
	//step 1: storing select statement in a variable $sql_get_techs
	$sql = "SELECT terminal_id FROM terminal";

	//step 2:storing selected data in a varible $result1
	$result = mysqli_query($con, $sql);
	

//Lopping through all the selected data
while($row= mysqli_fetch_assoc($result)){
	//storing all the retrived data into drop down options
	$terminal_options .= "<option value= {$row['terminal_id']}>TERM-{$row['terminal_id']}</option>";	
}
?>


<!DOCTYPE html>
<html>
	<head>
	</head>
		<link rel="stylesheet" href="style.css">
			
	<body>
	<nav class="nav "><h1>Money Machine LLC </h1></nav><br>
	
		<fieldset id="field_set"><b>Create / Register users </b>  <br><hr>
			<br>
			<div class="grid-container">		
				<div class="grid-item"><a href="create_technician.php"><button >&nbsp;Create Technician&nbsp;</button></a></div>
				<div class="grid-item"><a href="create_cash_loader.php"><button>&nbsp;Create Cash Loader&nbsp;</button></a></div>
				<div class="grid-item"><a href="create_terminal.php"><button>&nbsp; Create Terminal &nbsp;</button></a></div>
			</div>
		</fieldset>
		
		<br>
		<fieldset id="field_set"><b>Display Tables </b><br><hr>
		<div class="grid-container">
			<div class="grid-item1"><a href="technician_table.php"><button >&nbsp;Technician Table&nbsp;</button></a></div>
			<div class="grid-item1"><a href="cash_loader_table.php"><button>&nbsp;Cash Loader Table&nbsp;</button></a></div>
			<div class="grid-item1"><a href="terminal_table.php"><button>&nbsp; Terminal Table &nbsp;</button></a></div>
			<div class="grid-item1"><a href="owner_table.php"><button>&nbsp; Owner Table &nbsp;</button></a></div>
		</div>
		</fieldset>		
		
		<br>
		<fieldset id="field_set"><b> Display details</b> <br><hr>
		<form method="post" action="display_terminal.php">
			<Label style="font-size: 18px;"> Terminal : </Label>
			<select name="terminals" id="dropdown">
				<?php echo $terminal_options; ?>
			</select>	
			<input type="submit" name="terminal_submit" id="submit_button">		
		</form>
		</fieldset>	
		
		<br>
	</body>	
	<footer>
		<a href="index.php"><button>&nbsp;Signout / Lock&nbsp;</button></a>
	</footer>
	<br>
</html>