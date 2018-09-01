<?php
session_start();

if(isset($_SESSION['user'])){
	header("Location:index.php?Login Failed");
}

?>

<?php
	include('connection.php');

	if(isset($_GET['student_id'])){

		$id = $_GET['student_id'];


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

	$sql="INSERT INTO studentdetail(student_id, firstname, lastname, gender, date1, region,disability,coment,kinfirstname,kinlastname,kingender,kinphone,kinemail,kinaddress)
	VALUES('$id','$f_name', '$l_name', '$gender', '$date', '$region','$disability','$coment','$kf_name','$kl_name','$kgender','$kphone','$kemail','$kaddress')";

	if ($link->query($sql)===TRUE) {
		echo "successfull";
		header('Location:student_page.php?id='.$id.'');
	}else{
		echo "Error: " .$link->error;
	}
}


?>