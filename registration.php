<?php
include('connect.php');
if(isset($_POST['submit'])){
	if($_POST['fname']=='' || $_POST['lname']=='' || $_POST['email']=='' || $_POST['password']=='' || $_POST['password'] != $_POST['cpassword'])
	{
		echo "please check input fields.";
	}
	else
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql1="SELECT * FROM users_detail WHERE email='$email'";
		$resu=mysqli_query($con,$sql1);
		$row = mysqli_fetch_assoc($resu);
		if($row['email'] == $email)
		{
			echo "Sorry,....Error in registration.";
			echo "Your email has been already registred.";
			header('Location: index.html');
		}
		else{
			$sql="INSERT INTO users_detail(fname,lname,email,password) VALUES('$fname','$lname','$email','$password')";
			$res=mysqli_query($con,$sql);
			if($res)
			{
				echo "You have successfully registred.". "<br>";
				echo "Thanks to stay touch with us.";
				header('Location: index.html');
			}
		}
		mysqli_close($con);
	}
}


?>