<?php

require_once("conn.php");



if (isset($_POST['login'])) 
{
	$username = sanitizeInput($_POST['username']);
	$password = sanitizeInput($_POST['password']);

	$sql = "SELECT * FROM teachers WHERE teacher_username = '$username' AND teacher_password = '$password' AND teacher_status='1' LIMIT 1";

	$result = mysqli_query($conn,$sql);

	if ($result) 
	{
		if (mysqli_num_rows($result)>0) 
		{
			$getDetails = mysqli_fetch_assoc($result);

			 $_SESSION['teacher_id'] = $getDetails['teacher_id'];
			 $_SESSION['teacher_name'] = $getDetails['teacher_name'];
			 $_SESSION['teacher_designation'] = $getDetails['teacher_designation'];

			 ?>
			 	<script type="text/javascript">
			 		alert('Welcome <?=$getDetails['teacher_name'];?>');
			 		window.location.href = 'index.php';
			 	</script>
			 <?php


		}
		else
		{
			?>	
				<script type="text/javascript">
					alert("Incorrect username or password. Please try again. If you believed this is a mistake, please contact administrator.");
					window.location.href = 'login.php';
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
	header("location: login.php");
}
?>