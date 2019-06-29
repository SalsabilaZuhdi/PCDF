<?php
session_start();
include 'conn/dbconnection.php';
$id = $_SESSION['id'];
 if (@$_SESSION['password'] == "")
 {
	echo "<script> alert('Log In unsuccessful.');</script>";
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=index.php">';
 }

 else {}
 @$deleteID = $_REQUEST['deleteID'];


  $delete = "call delete_appointment('".$_REQUEST['deleteID']."')";


	$essms_delete = mysqli_query($dba,$delete);
	if ($essms_delete) 
	{
		echo "<script>alert('Appointment has been deleted')</script>";
		echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=appointment.php">';
	}
	else
	{
		echo "<script> alert('Delete process unsuccessful')</script>";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=appointment.php">';	
	}
?>
