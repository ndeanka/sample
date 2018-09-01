<?php
include('connection.php'); 

if (isset($_GET['delete'])) {
	$getid= $_GET['delete'];

	$deletes="DELETE FROM studentdetail WHERE id=$getid";

	if (mysqli_query($link,$deletes)) {
		//echo "data deleted";
		header('Location:admin.php');
	}else{
		echo "Cant delete data " .mysqli_error($link);
	}

}





?>