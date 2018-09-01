<?php
session_start();

if(!isset($_SESSION['user'])){
	header("Location:index.php?Login Failed");
}

?>


<?php include('connection.php');?>
<html>
<head>
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<body>
	<?php
		if (isset($_GET['edit'])) {
			$getid= $_GET['edit'];
			echo '<form class="student_form" method="post">';
			$result="SELECT * FROM studentdetail WHERE id = $getid";
			$sql= mysqli_query($link,$result) or die("cant conect". mysqli_error($link));
			if (mysqli_num_rows($sql)>0) {
				while ($rows=mysqli_fetch_assoc($sql)) {
					echo '
					<ul>
			<li>
				<input type="text" name="firstname" value="'.$rows['firstname'].'" placeholder="Firstname">
				<input type="text" name="lastname" id="lastname" value="'.$rows['lastname'].'" placeholder="Lastssname">
			</li>
			<li class = "radio cf">
				<input type="radio" name="gender" id="gender" value="male" checked id = "male" ><label for="male">Male</label>
				<input type="radio" name="gender" id ="gender" value="female"><label for="female">Female</label>
			</li>
			<li>
				<input type="date" name="date" id="date" value="'.$rows['date1'].'">
				<input type="text" name="region" id="region" placeholder="Region" value="'.$rows['region'].'">
			</li>
	
			<li class = "radio cf">
				<label class = "Disability cf">Disability</label>
				<input type="radio" name="disability" value="yes" id = "yes" > <label for="yes">Yes</label>
				<input type="radio" name="disability" value="no" id = "no" checked > <label for="no">No</label>
				<textarea name="coment" placeholder="Write your disability here">'.$rows['coment'].'</textarea>
			</li>
		</ul>
		
			<ul>
			<h5>Student next of kin information</h5>
			<li>
				<input type="text" name="kfirstname" placeholder="First Name" value="'.$rows['kinfirstname'].'">
				<input type="text" name="klastname" placeholder="Last Name" value="'.$rows['kinlastname'].'">
			</li>
			<li class = "radio cf">
				<input type="radio" name="kgender" value="male" checked id = "kinmale" ><label for="kinmale">Male</label>
				<input type="radio" name="kgender" value="female" id = "kinfemale" ><label for="kinfemale">Female</label>
			</li>
			<li>
				<input type="text" name="kphone" placeholder="Phone number" value="'.$rows['kinphone'].'">
				<input type="email" name="kemail" placeholder="youremail@mail.com" value="'.$rows['kinemail'].'">
			</li>
			<li>
				<input type="text" name="kaddress" value="'.$rows['kinaddress'].'">
			</li>

				</ul>
					';
				}
			}
			echo '
			<input type="submit" value="submit" name = "update" class = "sub_btn">
			</form>';
		}
		if (isset($_POST['update'])) {
			$f_name=mysqli_real_escape_string($link,$_POST['firstname']);
			$l_name=mysqli_real_escape_string($link,$_POST['lastname']);
			$gender=mysqli_real_escape_string($link, $_POST['gender']);
			$date=mysqli_real_escape_string($link, $_POST['date']);
			$region=mysqli_real_escape_string($link, $_POST['region']);
			$disability=mysqli_real_escape_string($link, $_POST['disability']);
			$coment=mysqli_real_escape_string($link, $_POST['coment']);

			$kf_name=mysqli_real_escape_string($link,$_POST['kfirstname']);
			$kl_name=mysqli_real_escape_string($link,$_POST['klastname']);
			$kgender=mysqli_real_escape_string($link,$_POST['kgender']);
			$kphone=mysqli_real_escape_string($link,$_POST['kphone']);
			$kemail=mysqli_real_escape_string($link,$_POST['kemail']);
			$kaddress=mysqli_real_escape_string($link,$_POST['kaddress']);

			$sql2="UPDATE studentdetail SET firstname='$f_name', lastname='$l_name', gender='$gender', date1='$date', region='$region', disability='$disability', coment='$coment',kinfirstname='$kf_name',kinlastname='$kl_name',kingender='$kgender',kinphone='$kphone',kinemail='$kemail',kinaddress='$kaddress' WHERE id='$getid'";
			/*VALUES('$f_name', '$l_name', '$gender', '$date', '$region','$disability','$coment','$kf_name','$kl_name','$kgender','$kphone','$kemail','$kaddress')";*/
			$sql= mysqli_query($link,$sql2) or die("cant conect". mysqli_error($link));
			if(mysqli_affected_rows($link)){
				//er('Location:admin.php?');
				?>
				<script>
					alert("Record  are Updated");
					window.close();
					window.location.href="admin.php";

				</script>
				<?php
		}else{
			echo "fail";
		}

		}
	?>
</body>
</html>