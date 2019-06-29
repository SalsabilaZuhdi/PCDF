<?php
session_start();
include 'conn/dbconnection.php';

@$id = $_POST['id'];
@$password  = $_POST['password'];
@$position  = $_POST['position'];

$select="call select_login('".$id."', '".$password."','".$position."')"; 
//$select="select * from login where id='".$id."' and password='".$password."' and positionID='".$position."' ";

$essms_select =mysqli_query($dba,$select)or die (mysqli_error());
$row=mysqli_fetch_assoc($essms_select);


@$_SESSION['password']=$row['password'];
@$_SESSION['position']=$row['positionID'];
@$_SESSION['id']=$row['id'];



if($row>0)
	{
		echo "<script> alert('Welcome to PCDF');</script>";
		echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=main.php">';
	}
	else
	{
		echo "<script> alert('Invalid id or password. Please try again.');</script>";
		echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=index.php">';
	}


	
?>