<?php
// include ('security.php');

            // $hostname="localhost";
            // $db="tecuri_pms";
            // $Username="tecuri_qwerty";
            // $Password="qwerty2020@";
            
            // $conn=new PDO("mysql:host=$hostname;dbname=$db",$Username,$Password);

$connection = mysqli_connect("localhost", "tecuri_qwerty", "qwerty2020@", "tecuri_pms");


if(isset($_POST['registerbtn']))
{
	$username = $_POST['username'];
 	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['confirmpassword'];
// 	$user_role = $_POST['user_role'];

	if($password === $cpassword)
	{
		$query = "INSERT INTO users (username, password ) VALUES ('$username',$password')";
		$query_run = mysqli_query($connection, $query);

		if ($query_run)
		 {
		//echo "saved";
		 	$_SESSION['success'] = "Admin profile added";
		 	header('Location: register.php');
		}
		else
		{
			$_SESSION['status'] = "Admin profile not added";
		 	header('Location: register.php');
		}
	}
	else
	{
		$_SESSION['status'] = "password does not match";
		 	header('Location: register.php');
	}
}







if(isset($_POST['updatebtn']))
{
	$id = $_POST['edit_id'];
	$username = $_POST['edit_username'];
	$email = $_POST['edit_email'];
	$password = $_POST['edit_password'];
	$usertypeupdate = $_POST['update_usertype'];

	$query = "UPDATE register SET username='$username', email='$email', password='$password' , usertype='$usertypeupdate' WHERE id='$id'";
	$query_run = mysqli_query($connection, $query);


	if($query_run)
	{
		$_SESSION['success'] = "data updated";
		header('Location: register.php');
	}
	else
	{
		$_SESSION['status'] = "data not updated";
		header('Location: register.php');
	}
}




if(isset($_POST['delete_btn']))
{
	$id = $_POST['delete_id'];

	$query = "DELETE FROM register WHERE id='$id'";
	$query_run = mysqli_query($connection,$query);

	if($query_run)
	{
		$_SESSION['success'] = "data deleted";
		header('Location: register.php');
	}
	else
	{
		$_SESSION['status'] = "data not deleted";
		header('Location: register.php');
	}
}



if(isset($_POST['login_btn']))
{
	$email_login = $_POST['email'];
	$password_login = $_POST['password'];
	
	$query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";
	$query_run = mysqli_query($connection,$query);

	if(mysqli_fetch_array($query_run))
	{
		$_SESSION['username'] = $email_login;
		header('Location: index.php');
	}
	else
	{
		$_SESSION['status'] = "Invalid credentials";
		header('Location: login.php');
	}

}










?>