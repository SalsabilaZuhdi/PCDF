<?php
session_start();
include 'conn/dbconnection.php';

@$id = $_POST['id'];
@$password  = $_POST['password'];


//$select="select * from login where id='".$id."' and password='".$password."' and positionID='1' ";

$select="call select_loginA('".$id."', '".$password."','1') "; 

$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
$row=mysqli_fetch_assoc($essms_select);


@$_SESSION['password']=$row['password'];
@$_SESSION['position']=$row['positionID'];
@$_SESSION['id']=$row['id'];

if($row>0)
	{
		echo "<script> alert('Welcome to Admin Page.');</script>";
		echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=main.php">';
	}
	else
	{
		echo "<script> alert('Invalid id or password. Please try again.');</script>";
		echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=adminPage.php">';
	}

?>