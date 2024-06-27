<?php

require_once("../conn.php");



if (isset($_POST['login'])) 
{
	$username = sanitizeInput($_POST['username']);
	$password = sanitizeInput($_POST['password']);

	$sql = "SELECT * FROM users WHERE user_username = '$username' AND user_password = '$password' LIMIT 1";

	$result = mysqli_query($conn,$sql);

	if ($result) 
	{
		if (mysqli_num_rows($result)>0) 
		{
			$getDetails = mysqli_fetch_assoc($result);

			 $_SESSION['user_id'] = $getDetails['user_id'];
			 $_SESSION['user_name'] = $getDetails['user_name'];
			

			 ?>
			 	<script type="text/javascript">
			 		alert('Welcome <?=$getDetails['user_name'];?>');
			 		window.location.href = 'admin_index.php';
			 	</script>
			 <?php


		}
		else
		{
			?>	
				<script type="text/javascript">
					alert("Incorrect username or password. Please try again.");
					window.location.href = 'admin_login.php';
				</script>
			<?php
		}
	}
	else 
    {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['logout'])) {
	session_destroy();
	header("location: admin_login.php");
}
?>