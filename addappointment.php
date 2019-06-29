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
		$select1 = "call select_lecturerID('".$id."')";
		$essms_select1 =mysqli_query($dba,$select1) or die (mysqli_error());
		mysqli_next_result($dba);
		$row1 = mysqli_fetch_array($essms_select1);
		
		$lecturerID=$row1['staffID'];
		
	    $select = "call select_appointment2('".$lecturerID."' )";
		$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
		mysqli_next_result($dba);
		$row = mysqli_fetch_array($essms_select);
	
	 
	$title = $_POST['title'];
	$start = $_POST['starttimefinal'];
	$end = $_POST['endtimefinal'];
	$color = $_POST['color'];
	$staffID = $_POST['staffID'];
	$matricNum = $_POST['matricNum'];
	$status = 'Pending Approval';
	$starttime = $_POST['timepicker'];
	$endtime = $_POST['endtime1'];
	$currentDate = date("Y/m/d");
	
	//check appointment exist atau tidak
	   $checkAppointment = "select *
						from appointment b
						where 
						(b.start BETWEEN  '".$start."' and '".$end."')OR
						(b.end BETWEEN  '".$start."' and '".$end."') ";
						
	$essms_check =mysqli_query($dba,$checkAppointment) or die (mysqli_error());
	$rowCheckAppointment = mysqli_fetch_array($essms_check);
	 $rowcount=mysqli_num_rows($essms_check);
	
	
	if ($rowcount > '0' )
	{
		
		echo "<script> alert('Booking Failed, Please Choose Other Date or Time')</script>";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=appointment.php">';	
	}
	else 
	{

	$sql = "call insert_appointment('".$title ."',now(),'".$starttime."','".$endtime."', '".$start."', '".$end."', '".$color ."','".$status ."','".$matricNum ."','".$staffID ."')";
	
	$essms_insert = mysqli_query($dba,$sql); 
	
	if ($essms_insert) 
	{
		echo "<script>alert('Appointment Submitted')</script>";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=appointment.php">';	
	
	}
	else
	{
		echo "<script> alert('Process unsuccessful')</script>";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=appointment.php">';	
	}
	}


?>