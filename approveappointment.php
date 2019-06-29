<?php
require_once('conn/bdd.php');
if (isset($_POST['statusappointment']))
{
	
	
	$id = $_POST['id'];
	$location = $_POST['location'];

	$status = $_POST['statusappointment'];

	if($status=='Accept')
	{
		$color = '#008000';
		
	}
	else if($status=='Reject')
	{
		$color = '#FF0000';
	}
	else
	{
		$color = '#FFD700';
		
	}
	
	$sql = "call update_appointmentStatus('".$color ."','".$status ."','".$location ."','".$id ."')";
	
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}
	



header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
