<?php
session_start();

if(!isset($_SESSION['user'])){
	header("Location:index.php?Login Failed");
}

?>

<?php include('connection.php'); ?>
<html>
<head>
	<title>student page</title>
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<a href="logout.php" class="lgout logout1">Logout</a>
<?php
	if(isset($_GET['id']) && (!empty($_GET['id']))){
		$id = $_GET['id'];

		//echo $id;


		$sql= 'SELECT * FROM studentdetail where student_id = '.$id.'';

		$result= mysqli_query($link,$sql) or die("Could not conect". mysqli_error($link));

		if (mysqli_num_rows($result)>0) {

			echo '<table>
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
						</tr>';

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
					<td><a href="student_edit.php?edit='.$rows['id'].'">Edit</a></td>

					</tr>
				';
			}
			echo "<a href='javascript:window.print()' class ='lgout'> Print &raquo</a>";
			echo '</table>';

		}else{

			echo '
				<form action= "form_process.php?student_id='.$id.'" method="post" class = "student_form">
					<ul>
						<h5>Student person information</h5>
						<li>
							<input type="text" name="firstname" id="firstname" placeholder="First Name">
							<input type="text" name="lastname" id="lastname" placeholder="Last Name">
						</li>
						<li class = "radio cf">
							<input type="radio" name="gender" id="gender" value="male" checked id = "male" ><label for="male">Male</label>
							<input type="radio" name="gender" id ="gender" value="female"><label for="female">Female</label>
						</li>
						<li>
							<input type="date" name="date" id="date" placeholder="Date of birth: YYY/MM/DD">
							<input type="text" name="region" id="region" placeholder="Region">
						</li>
				
						<li class = "radio cf">
							<label class = "Disability cf">Disability</label>
							<input type="radio" name="disability" value="yes" id = "yes" > <label for="yes">Yes</label>
							<input type="radio" name="disability" value="no" id = "no" checked > <label for="no">No</label>
							<textarea name="coment" placeholder="Write your disability here"></textarea>
						</li>
					</ul>
					
						<ul>
						<h5>Student next of kin information</h5>
						<li>
							<input type="text" name="kfirstname" placeholder="First Name">
							<input type="text" name="klastname" placeholder="Last Name">
						</li>
						<li class = "radio cf">
							<input type="radio" name="kgender" value="male" checked id = "kinmale" ><label for="kinmale">Male</label>
							<input type="radio" name="kgender" value="female" id = "kinfemale" ><label for="kinfemale">Female</label>
						</li>
						<li>
							<input type="text" name="kphone" placeholder="Phone number">
							<input type="email" name="kemail" placeholder="youremail@mail.com">
						</li>
						<li>
							<input type="text" name="kaddress" placeholder="Address">
						</li>
					</ul>
					<input type="submit" value="submit" name = "submit" class = "sub_btn">
				</form>';


		}


	}
?>
</body>
</html>