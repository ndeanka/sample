
<?php
include('connection.php');

if (isset($_POST['sigin'])) {
	$username = $_POST['username'];
	$password =$_POST['password'];

	$select = 'SELECT * FROM user WHERE username="'.$username.'" AND password="'.$password.'"';
	$result = mysqli_query($link, $select) or die(mysqli_error($link));

	if (mysqli_num_rows($result)>0) {
		while ($rows = mysqli_fetch_assoc($result)) {
			if (($rows['username'] === $username) && ($rows['password'] === $password)) {
				$id = $rows['id'];
				if (!isset($_SESSION['user'])) {
					    session_start();
						$_SESSION['user'] = $rows['username'] ;
						echo $_SESSION;
					 
					}

				if ($rows['status'] === "admin") {
					header('Location:admin.php');
				}

				if ($rows['status'] === "student") {
					header('Location:student_page.php?id='.$id.'');
				}
			}else{
				echo "username or password not match";
			}
			
		}
	}else{
		echo "Account not found";
	}
}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Registration</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<h1>Online Student Registration</h1>
		<form name="reg" method="Post" action="" id="form" class="register1">
			<h5>Login Form</h5>
			<ul>
				<li>
					<input type ="text" name="username" required placeholder="Username" class="input">
				</li>
			
				<li>
					<input type= "password" name="password" required placeholder="Password" class="input">
				</li>
				
					<input type="submit" Value="Signin" name="sigin" class="send">
				
			</ul>

		</form>
	</body>
</html>