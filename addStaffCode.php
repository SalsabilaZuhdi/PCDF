<?php
include 'conn/connection.php';
$con = getdb();

$arr = array('Yes'=> 1,'No'=> 0);

	$staffID=$_POST['staffID'];
	$staffName=$_POST['staffName'];
	$trade=$_POST['trade'];
	$region=$_POST['region'];
	$locationS=$_POST['locationS'];
	$jobGrade=$_POST['jobGrade'];
	$statusA=$_POST['statusA'];
	$retirementDate=$_POST['retirementDate'];
	$eLearning=$arr[$_POST['eLearning']];
	$heartMind=$arr[$_POST['heartMind']];
	$DCS=$arr[$_POST['DCS']];
	$OTS=$arr[$_POST['OTS']];
	$oralInterview=$arr[$_POST['oralInterview']];
	$MME=$arr[$_POST['MME']];

	if ($region == "PMA") {

		if(isset($_POST["submit"])){
			$sql = "INSERT INTO staffpma (staffID, staffName, trade, region, locationS, jobGrade, retirementDate, statusA, eLearning, heartMind, DCS, OTS, oralInterview, MME) values ('".$staffID."','".$staffName."','".$trade."','".$region."','".$locationS."','".$jobGrade."','".$retirementDate."','".$statusA."','".$eLearning."','".$heartMind."','".$DCS."','".$OTS."','".$oralInterview."','".$MME."')";
			$result = mysqli_query($con,$sql);

			if(!isset($result))
			{
				echo "<script type=\"text/javascript\">
						alert(\"Please Fill in the form.\");
						window.location = \"addStaff.php\"
					</script>";		
			}
			else {
				echo "<script type=\"text/javascript\">
						alert(\"Staff Successfully Added.\");
						window.location = \"staffpma.php\"
					</script>";
			}		
	}

	} elseif ($region == "SK OIL") {
 
		if(isset($_POST["submit"])){
			$sql = "INSERT INTO staffskoil (staffID, staffName, trade, region, locationS, jobGrade, retirementDate, statusA, eLearning, heartMind, DCS, OTS, oralInterview, MME) values ('".$staffID."','".$staffName."','".$trade."','".$region."','".$locationS."','".$jobGrade."','".$retirementDate."','".$statusA."','".$eLearning."','".$heartMind."','".$DCS."','".$OTS."','".$oralInterview."','".$MME."')";
			$result = mysqli_query($con,$sql);

			if(!isset($result))
			{
				echo "<script type=\"text/javascript\">
						alert(\"Please Fill in the form.\");
						window.location = \"addStaff.php\"
					</script>";		
			}
			else {
				echo "<script type=\"text/javascript\">
						alert(\"Staff Successfully Added.\");
						window.location = \"staffskoil.php\"
					</script>";
			}	 

	}
 	} elseif ($region == "SK GAS") {
	
		if(isset($_POST["submit"])){
			$sql = "INSERT INTO staffskgas (staffID, staffName, trade, region, locationS, jobGrade, retirementDate, statusA, eLearning, heartMind, DCS, OTS, oralInterview, MME) values ('".$staffID."','".$staffName."','".$trade."','".$region."','".$locationS."','".$jobGrade."','".$retirementDate."','".$statusA."','".$eLearning."','".$heartMind."','".$DCS."','".$OTS."','".$oralInterview."','".$MME."')";
			$result = mysqli_query($con,$sql);

			if(!isset($result))
			{
				echo "<script type=\"text/javascript\">
						alert(\"Please Fill in the form.\");
						window.location = \"addStaff.php\"
					</script>";		
			}
			else {
				echo "<script type=\"text/javascript\">
						alert(\"Staff Successfully Added.\");
						window.location = \"staffskgas.php\"
					</script>";
			}	

	} 
	}elseif ($region == "SBA") {
	
		if(isset($_POST["submit"])){
			$sql = "INSERT INTO staffsba (staffID, staffName, trade, region, locationS, jobGrade, retirementDate, statusA, eLearning, heartMind, DCS, OTS, oralInterview, MME) values ('".$staffID."','".$staffName."','".$trade."','".$region."','".$locationS."','".$jobGrade."','".$retirementDate."','".$statusA."','".$eLearning."','".$heartMind."','".$DCS."','".$OTS."','".$oralInterview."','".$MME."')";
			$result = mysqli_query($con,$sql);

			if(!isset($result))
			{
				echo "<script type=\"text/javascript\">
						alert(\"Please Fill in the form.\");
						window.location = \"addStaff.php\"
					</script>";		
			}
			else {
				echo "<script type=\"text/javascript\">
						alert(\"Staff Successfully Added.\");
						window.location = \"staffsba.php\"
					</script>";
				}	
			}
		 } else {
				echo "<script>alert('Pendaftaran tidak berjaya. Sila isi semua maklumat.')</script>";
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=pendaftaranBaru.php">';
		}
?>