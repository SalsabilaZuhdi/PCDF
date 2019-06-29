<?php
session_start();
session_destroy();

echo "<script> alert('Log Out.')</script>";
echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=index.php">';
		
	if ($_SESSION['password'] == "")
	{
		echo "<script> alert('Log In unsuccessful.');</script>";
		echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=index.php">';
	}
	else {}
?>