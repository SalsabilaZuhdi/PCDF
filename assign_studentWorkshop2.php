<?php
include 'conn/dbconnection.php';

	 
	@$post = file_get_contents('php://input');
	
	list($matricNum, $staff_ID) = explode(' ', $post);
	$assignupdate = "Assigned";
	//$update = "call update_assignSupervisor('".$staff_ID."','".$assignupdate."','".$matricNum."')";
	//check current student dalam lecturer
	 $check_student= "select * from allocation_student where staffID='".$staff_ID."'";
	$essms_checkstudent = mysqli_query($dba,$check_student)or die (mysqli_error());
	$row = mysqli_fetch_array($essms_checkstudent);
	
	 $maxWorkshop2 = $row['allocationWorkshop2'];
	 $totalStudent2 = $row['totalSuperviseeWorkshop2'];

	
	 //check if student has already assigned
	 $checkassign = "select * from student where matricNum= '".$matricNum."'";
	 $essms_checkassign = mysqli_query($dba,$checkassign)or die (mysqli_error());
	 $rowcheckAssign = mysqli_fetch_array($essms_checkassign);	 
	 $updateStaff=  $rowcheckAssign['lecturerID'];
	 

	if($totalStudent2 >= $maxWorkshop2 )
	{
		?>	<script type="text/javascript">alert('Assignation Fail, You have Reach Maximun Student Allocation Reach');</script> <?php
		
	}
	else if($rowcheckAssign['statusAssign']=='Assigned')
	{

		 $updateAllocationstudent = "update allocation_student
				set totalSuperviseeWorkshop2 = totalSuperviseeWorkshop2 - 1
				where staffID= '".$updateStaff."'";
		$essms_updatestudent = mysqli_query($dba,$updateAllocationstudent); 
		
		$updateAllocationstudent = "update allocation_student
				set totalSuperviseeWorkshop2 = totalSuperviseeWorkshop2 + 1
				where staffID= '".$staff_ID."'";
		
		$essms_updatestudent = mysqli_query($dba,$updateAllocationstudent); 

		//update table student
		$update = "update student
					set lecturerID = '".$staff_ID."' , 
					statusAssign='Assigned'
					where matricNum= '".$matricNum."'";

		$essms_update = mysqli_query($dba,$update); 

		
	}
	else{
		
		
	 $updateAllocationstudent = "update allocation_student
				set totalSuperviseeWorkshop2 = totalSuperviseeWorkshop2 + 1
				where staffID= '".$staff_ID."'";

	//$updateAllocation = "update allocation_student set  "
	 $update = "update student
				set lecturerID = '".$staff_ID."' , 
				statusAssign='".$assignupdate."'
				where matricNum= '".$matricNum."'";

	$essms_update = mysqli_query($dba,$update); 
	$essms_updatestudent = mysqli_query($dba,$updateAllocationstudent); 

	}
//list student untuk yang dah pilih 
$selectSupervisee = "select * from student where lecturerID='".$staff_ID ."' and typeOfWorkshop='2'";
$querySupervisee =mysqli_query($dba,$selectSupervisee) or die (mysqli_error());
mysqli_next_result($dba);
?>
<div id="addStudent" > 
<form method="post" id="FormAdd" >
	<table  class="table table-striped table-bordered table-hover">
	<tbody>
		<tr>
						<th>No</th>
						<th width="400">Name</th>
						<th>Matric Number</th>
						<th width="100">Workshop</th>
						<th width="50">Remove</th>
					</tr>
		<?php
			$num1=0;
			 while($rowSupervisee=mysqli_fetch_array($querySupervisee))
			{
		?>
			<tr>
				<td><?php echo ++$num1;?></td>
				<td><?php echo $rowSupervisee['studentName'];?></td>
				<td><?php echo $rowSupervisee['matricNum'];?></td>
				<td>Workshop <?php echo $rowSupervisee['typeOfWorkshop'];?></td>
				<td align="center"><a class="btn btn-sm btn-danger" id="delete_student" data-id="<?php echo @$rowSupervisee['matricNum'];echo " ".$staff_ID ; ?>" href="javascript:void(0)">Remove</a></td>
			</tr>
		<?php }?>
		
	</tbody>
	</table>
	
</form>
</div>



