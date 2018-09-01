<?php
session_start();

if(!isset($_SESSION['user'])){
	header("Location:index.php?Login Failed");
}

?>



<?php include('connection.php'); ?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
<table>
	<tr>
		<th>ID</th>
		<th>Firstname</th>
		<th>Lastname</th>
		<th>Gender</th>
		<th>B/date</th>
		<th>Region</th>
		<th>Disability</th>
		<th>Coment</th>
		<th>Kinfirstname</th>
		<th>Kinlastname</th>
		<th>Kingender</th>
		<th>Kinphone</th>
		<th>Kinemail</th>
		<th>Kinaddress</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php

	$sql= "SELECT * FROM studentdetail";

	$result= mysqli_query($link,$sql) or die("Could not conect". mysqli_error($link));

	if (mysqli_num_rows($result)>0) {
		while ($rows=mysqli_fetch_assoc($result)) {
			 echo '<tr>
				<td>'.$rows['id'].'</td>
				<td>'.$rows['firstname'].'</td>
				<td>'.$rows['lastname'].'</td>
				<td>'.$rows['gender'].'</td>
				<td>'.$rows['date1'].'</td>
				<td>'.$rows['region'].'</td>
				<td>'.$rows['disability'].'</td>
				<td>'.$rows['coment'].'</td>
				<td>'.$rows['kinfirstname'].'</td>
				<td>'.$rows['kinlastname'].'</td>
				<td>'.$rows['kingender'].'</td>
				<td>'.$rows['kinphone'].'</td>
				<td>'.$rows['kinemail'].'</td>
				<td>'.$rows['kinaddress'].'</td>
				<td><a href="edit.php?edit='.$rows['id'].'" class="delt">Edit</a></td>
				<td><a href="delete.php?delete='.$rows['id'].'" class="delt">Delete</a></td>
				</tr>
			';
		}
	}

?>
<a href="logout.php" class="lgout">Logout</a>
<a href='javascript:window.print()' class="lgout">Print</a>
</table>


</body>
</html>