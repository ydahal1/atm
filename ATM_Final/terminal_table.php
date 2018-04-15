<?php 
//importing connection
include 'connection.php';

//Connecting to the database
$con= new mysqli($server_name, $user_name,$password,$database);

//If the connection fails
if ($con->connect_error) {
	echo 'ERR: Connection to DB unsucessful; check configuration';
}

//Select data form database table terminal
// querying: select data
$sql = "SELECT * FROM terminal";
//Running the query
$result = mysqli_query($con, $sql);
//Checking how many rows were pulled by the select statement
$number_of_rows = mysqli_num_rows($result);
// If the row is selected is more then 1, which it should be ---


// Close connection
mysqli_close($con);

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<nav><h2>Money Machine LLC </h2></nav><hr>
		
	</body>
	<h3>Terminal Table</h3>
	<div class="table_wrap">
	<table>
		<tr>
			<th>Terminal ID</th>
			<th>State</th>
			<th>City</th>
			<th>Street </th>
			<th>Support Cards</th>
			<th>Tech ID</th>
			<th>Cash Loader ID</th>
			<th>Owner ID</th>
			
		</tr>
		<?php 
		if ($number_of_rows > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$terminal_id = $row['terminal_id'];
				$state = $row['state_provience'];
				$city = $row['city'];
				$street = $row['street'];
				$card = $row['card'];
				$technician_id = $row['technician_id'];
				$cash_loader_id = $row['cash_loader_id'];
				$owner_id = $row['owner_id'];
				?>
				
				<tr>
				<td><?php echo $terminal_id;?></td>
				<td><?php echo $state;?></td>
				<td><?php echo $city;?></td>
				<td><?php echo $street;?></td>
				<td><?php echo $card;?></td>
				<td><?php echo $technician_id?></td>
				<td><?php echo $cash_loader_id?></td>
				<td><?php echo $owner_id ?></td>
				</tr>  
		<?php }
		}
		?>
	
	</table>
	</div>
	
	<footer>
		<a href="home.php"><button> Home </button></a>
	</footer>
</html>


