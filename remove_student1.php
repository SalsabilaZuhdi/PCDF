<?php

include 'conn/dbconnection.php';

	 
	 @$post = file_get_contents('php://input');

	list($matricNum, $staff_ID) = explode(' ', $post);
	$assignupdate = "Not Assigned";
	$updateStaffID = "";

	

	
		 $updateAllocationstudent = "update allocation_student
				set totalSuperviseeWorkshop1 = totalSuperviseeWorkshop1 - 1
				where staffID= '".$staff_ID."'";
		$essms_updatestudent = mysqli_query($dba,$updateAllocationstudent); 
				$update = "update student
					set lecturerID = '".$updateStaffID."' , 
					statusAssign='".$assignupdate."'
					where matricNum= '".$matricNum."'";

		$essms_update = mysqli_query($dba,$update); 
	
	  


	
	

?>
<div id="addStudent" > 
<?php
	
//list student untuk yang dah pilih 
	 $selectSupervisee = "select * from student where lecturerID='".$staff_ID ."' and typeOfWorkshop='1'";
$querySupervisee =mysqli_query($dba,$selectSupervisee) or die (mysqli_error());
mysqli_next_result($dba);

?>
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
				<td "><?php echo ++$num1;?></td>
				<td><?php echo $rowSupervisee['studentName'];?></td>
							<td><?php echo $rowSupervisee['matricNum'];?></td>
				<td>Workshop <?php echo $rowSupervisee['typeOfWorkshop'];?></td>
				<td align="center"><a class="btn btn-sm btn-danger" id="delete_student" data-id="<?php echo @$rowSupervisee['matricNum'];echo " ".$staff_ID ; ?>" href="javascript:void(0)">Remove</a></td>
			</tr>
		<?php }?>
		
	</tbody>
	</table>
	

</div>



