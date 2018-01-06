<?php

	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	if( strlen($user)== 0 || strlen($pass)==0 ){
		//invalid form data
		header("Location: form.php?error");
	}else{
		//check if the user and password are correct
		
		//connect and select db
		$conn = mysqi_connect("localhost","root","","cms");
		
		//select db
		if( !$conn ){
			echo "Error connecting to Mysql Server.";
		}else{
			echo "Ok!";
		}
		
		//prepare sql statement
		$sql = "SELECT * FROM users WHERE
				username='".$user."' AND password='".sha1($pass)."'";
	
		//echo sql
		//execute sql
		$result = mysqli_query($conn, $sql);
		
		
		//process the result
		if( $myrow=mysqli_fetch_array($result) )
			echo "Ok!";
		else
			echo "You have entered invalid username or password";
		
		//display the result
?>