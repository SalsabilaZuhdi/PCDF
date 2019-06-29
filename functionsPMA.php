<?php
include 'conn/connection.php';
$con = getdb();

   if(isset($_POST["Import"])){		
		echo $filename=$_FILES["file"]["tmp_name"];	

		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
			    $sql = "INSERT INTO staffpma (staffID, staffName, trade, region, locationS, jobGrade, retirementDate, statusA, eLearning, heartMind, DCS, OTS, oralInterview, MME) values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."')"; 
	           $result = mysqli_query($con, $sql);
			    // var_dump(mysqli_error_list($con));
			    // exit();
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"staffpma.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"staffpma.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }
	}	 
	
	 if(isset($_POST["Export"])){
		 
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=staffPMA.csv');  
      $output = fopen("php://output", "w");
      fputcsv($output, array('staffID', 'staffName', 'trade', 'region','locationS', 'jobGrade', 'retirementDate', 'statusA', 'eLearning', 'heartMind','DCS','OTS','oralInterview','MME'));  
      $query = "SELECT * from staffpma";  
      $result = mysqli_query($con, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 } 
?>

