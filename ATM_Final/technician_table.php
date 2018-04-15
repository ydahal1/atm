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
$sql = "SELECT * FROM technician";
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
	<h3> Technician Table: </h3>
	<div class="table_wrap">
	<table>
	<thead>
		<tr>
			<th>Technician ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone Number </th>
			<th>State</th>
			<th>City</th>
			<th>Street</th>
		</tr>
		</thead>
		
		<tbody>
		<?php 
		if ($number_of_rows > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$technician_id = $row['technician_id'];
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$phone_number = $row['phone_number'];
				$state = $row['state_provience'];
				$city = $row['city'];
				$street = $row['street']; ?>
				
				<tr>
				<td><?php echo $technician_id ;?></td>
				<td><?php echo $first_name;?></td>
				<td><?php echo $last_name;?></td>
				<td><?php echo $phone_number;?></td>
				<td><?php echo $state;?></td>
				<td><?php echo $city?></td>
				<td><?php echo $street?></td>
				</tr>  
		<?php }
		}
		?>
		</tbody>
	
	</table>
	</div>
	
	<footer>
		<a href="home.php"><button> Home </button></a>
	</footer>
</html>


