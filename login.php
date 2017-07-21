<?php

include('connect.php');

if(isset($_POST['submit'])){
	if( $_POST['email']=='' || $_POST['password']=='')
	{
		Echo "please check input fields.";
	}
	else
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql="SELECT * FROM users_detail WHERE email='$email'";
		$res=mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($res);
		if($row['email'] == $email)
		{
			if($row['password'] == $password){
				echo "You have successfully logged in.";
				session_start();
				$_SESSION['id'] = $row['id'];
				header('Location: index.html');
			}
			else{
				echo "Password incorrect";
				die();
			}
		}
		else
		{
			echo "Sorry,....Error in Logged in:" . mysqli_error($con);
		}
		mysqli_close($con);
	}
}

?>