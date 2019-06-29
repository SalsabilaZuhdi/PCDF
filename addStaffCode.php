<?php
include 'conn/connection.php';

$staffID=$_POST['staffID'];
$staffName=$_POST['staffName'];
$trade=$_POST['trade'];
$region=$_POST['region'];
$locationS=$_POST['locationS'];
$jobGrade=$_POST['jobGrade'];
$statusA=$_POST['statusA'];
$retirementDate=$_POST['retirementDate'];
$eLearning=$_POST['eLearning'];
$heartMind=$_POST['heartMind'];
$DCS=$_POST['DCS'];
$OTS=$_POST['OTS'];
$oralInterview=$_POST['oralInterview'];
$MME=$_POST['MME'];


if(isset($_REQUEST['submit']))
{
	$insertStaff = "call insert_staffpma('".$staffID."','".$staffName."','".$trade."','".$region."','".$locationS."',
	'".$jobGrade."','".$statusA."','".$retirementDate."','".$eLearning."','".$heartMind."','".$DCS."','".$OTS."','".$oralInterview."','".$MME."')";

	/* $insertRegister = "INSERT INTO ahli (gelaran, namaPenuh, noKP, tarikhLahir, jantina, alamat, noTelRumah, noTelBimbit,
	kataLaluan, statusAhli, jawatanID) values('".$gelaran."','".$namaPenuh."','".$noKP."','".$tarikhLahir."','".$jantina."','".$alamat."','".$noTelRumah."','".$noTelBimbit."','".$kataLaluan."','".$statusAhli."','".$jawatanID."')"; */
	
	$pcdf_insertStaff = mysqli_query($dba,$insertStaff);
	mysqli_next_result($dba);
			
	
	if(@$pcdf_insertStaff)
	{
		echo "<script>alert('Pendaftaran berjaya. Sila jelaskan yuran pendaftaran untuk tindakan Pentadbir selanjutnya.
		Terima kasih.')</script>";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=index.php">'; 
	}  else
	{
		echo "<script>alert('Pendaftaran tidak berjaya. Sila isi semua maklumat.')</script>";
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=pendaftaranBaru.php">';
	}  
}

?>