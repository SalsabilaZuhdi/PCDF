<?php
include 'conn/dbconnection.php';
if( $_POST ){
	
	$staff_ID = $_POST['staff_ID'];
	
	@$course1=$_POST['course1'];
	@$course2=$_POST['course2'];

	
	@$searchByName=$_POST['searchByName'];
	
	@$statusAssign1 =$_POST['statusAssign1'];
	@$statusAssign2 =$_POST['statusAssign2'];
	@$department1=$_POST['department'];
	
	if($department1=='SE')
	{
		$searchCourse = "(course='BITS' OR course='BITD')";
	}
	else if($department1=='BITC')
	{
		$searchCourse = "(course='BITC' OR course='BITE') ";
	}
	else if($department1=='BITI')
	{
		$searchCourse = "(course='BITI' OR course='BITD') ";
	}
	else if($department1=='MI')
	{
		$searchCourse = "(course='BITM' OR course='BITZ')";
	}
	
	if(!empty($searchByName) && $course1=='' && $course2=='' && $statusAssign1=='' && $statusAssign2=='' )
	{
		  $query=mysqli_query($dba,"select * from student
						left join lecturer ON student.lecturerID = lecturer.staffID
						where studentName LIKE '%".$searchByName."%' AND typeOfWorkshop='2' ORDER BY studentName")or die();	
	}	
	else if($statusAssign1=='' && $statusAssign2=='')
	{
		$query=mysqli_query($dba,"select * from student	
						left join lecturer ON student.lecturerID = lecturer.staffID
						where (statusAssign='Assigned' OR statusAssign='Not Assigned' ) AND
						(course = '".$course1."' OR course = '".$course2."')
						AND studentName LIKE '%".$searchByName."%' AND typeOfWorkshop='2'
						ORDER BY studentName");
						
	}
	else if($course1=='' && $course2=='' )
	{
		$query=mysqli_query($dba,"select * from student
						left join lecturer ON student.lecturerID = lecturer.staffID
						where (statusAssign='".$statusAssign1."' OR statusAssign='".$statusAssign2."' ) AND
						".$searchCourse."
						AND studentName LIKE '%".$searchByName."%' AND typeOfWorkshop='2' ORDER BY studentName")or die();	
	}

	else
	{
		$query=mysqli_query($dba,"select * from student
						left join lecturer ON student.lecturerID = lecturer.staffID
						where (statusAssign='".$statusAssign1."' OR statusAssign='".$statusAssign2."' ) AND
						(course = '".$course1."' OR course = '".$course2."')
						AND studentName LIKE '%".$searchByName."%' AND typeOfWorkshop='2'
						ORDER BY studentName");
	}
}
	?>
<div id="resultForm" > 
<form method="post" id="FormSearch" >
	<table  class="table table-striped table-bordered table-hover">
		<tr>
			<th >No. </th>
			<th>Matric Number </th>
			<th >Student Name</th>
			<th >Courses</th>
			<th >Workshop</th>
			<th >Status</th>
			<th >Supervisor Name</th>
			<th >Assignation</th>
		</tr>
		</thead>
		<?php
			$num = 0;
			
			if($course1=='' && $course2=='' && $statusAssign1=='' && $statusAssign2=='' && $searchByName==''  )	
			{
		?>
		<tr>
			<td colspan="8" align="center"> No Data </td>
		
		</tr>
		<?php 	}
		
		else if(mysqli_num_rows($query)== 0)
			
		{
		?>
		<tr>
			<td colspan="8" align="center"> No Data </td>
		
		</tr>
		<?php 	}
		
		
		else{
		
		
		@$rowStudent['matricNum'];
		while(@$rowStudent=mysqli_fetch_array($query))
			{

			
		?>		
		<tr>
			<td><?php echo ++$num;?></td>
			<td><?php echo $rowStudent['matricNum'];?></td>
			<td><?php echo $rowStudent['studentName'];?></td>
			<td><?php echo $rowStudent['course'];?></td>
			<td><?php echo $rowStudent['typeOfWorkshop'];?></td>
			<td><?php echo @$rowStudent['statusAssign'];?></td>
			<td><?php echo @$rowStudent['lecturerName'];?></td>
			<input type="hidden" id="staff_ID" name="staff_ID" data-staffid="<?php echo  $staff_ID ; ?>" value="<?php echo $staff_ID ; ?>" size="5" >
			<td align="center"><a class="btn btn-sm btn-danger" id="add_student" data-id="<?php echo @$rowStudent['matricNum'];echo " ".$staff_ID ; ?>" href="javascript:void(0)">Add</a></td>
		</tr>
		<?php 
				
			}
			
		}
		
		?>
	</table>
	</div>
</form>
<script type="text/javascript">
$(document).ready(function() {	
	

	$('#resultForm').on('click', '#add_student', function(e){
		 $(this).closest('tr').remove()
		var productId = $(this).data('id');
		var addstaffId = $(this).data('staffid');
		
		$.ajax({
			url: 'assign_studentWorkshop2.php',
			type: 'POST',
			data: productId, addstaffId,
			
		})
		.done(function(data){
			$('#addStudent').fadeOut('slow', function(){
				$('#addStudent').fadeIn('slow').html(data);
		});
		
		
		
		})
	
		.fail(function(){
			alert('Ajax Submit Failed ...');	
		});
	});
	

	
});
</script>

