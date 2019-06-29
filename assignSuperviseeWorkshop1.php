<?php
session_start();
include 'conn/dbconnection.php';
 if (@$_SESSION['password'] == "")
 {
	echo "<script> alert('Log In unsuccessful.');</script>";
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=index.php">';
 }

 else {}
		@$staff_ID = $_POST['staff_ID'];
		$select = "call select_lecturer('".$_REQUEST['staff_ID']."')";
		$querySelect =mysqli_query($dba,$select) or die (mysqli_error());
		mysqli_next_result($dba);
		$row = mysqli_fetch_array($querySelect);

		@$course1=$_POST['course1'];
		@$course2=$_POST['course2'];
		@$course3=$_POST['course3'];
		@$course4=$_POST['course4'];
		@$course5=$_POST['course5'];
		@$course6=$_POST['course6'];	  
		@$course7=$_POST['course7'];
		
		@$searchByName=$_POST['searchByName'];
		
		@$statusAssign1 =$_POST['statusAssign1'];
		@$statusAssign2 =$_POST['statusAssign2'];


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>eSSMS</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    <style type="text/css">
    .no-skin #navbar #navbar-container font {
	color: #FFFFFF;
}
    </style>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
				 <img src="assets/img/logo_ftmk.png" width="169" height="29" class="img-responsive" />
				</div>
                <font size="+2">&nbsp;&nbsp;Student Supervision Management System </font>
				</div>
			</div><!-- /.navbar-container -->
		</div>

	<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

	  
			<div class="main-content">
				<div class="main-content-inner">

				 
		<div class="page-header">
							<h1>
								Workshop 1 Supervisee Assignation
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
										
								
								
									<div class="tab-content profile-edit-tab-content">
		                            <div id="edit-basic" class="tab-pane in active" >

<div style="float:left;" > 
<table border="0" class="table  table-bordered table-hover" >
											<tbody>
												<tr>
													<td >Name </td>
													<td><input type="text" id="name" name="name" value="<?php echo $row['lecturerName'];?>" size="50" disabled></td>
												</tr>
												<tr>
													<td>Department</td>
													<td><input type="text" id="department" name="department" value="<?php echo $row['department'];?>" size="10" disabled></td>
												</tr>
												<?php if($row['positionName']=='Committee'){ ?>
												<tr>
													<td>Workshop</td>
													<td><input type="text" id="Workshop" name="Workshop" value="<?php echo "Workshop "; echo $row['assignationWorkshop'];?>" size="10" disabled></td>
												</tr>
												<?php } ?>
												<tr>
												<td>Position</td>
												<td><input type="text" id="department3" name="department3" value="<?php echo $row['positionName'];?>" size="10" disabled></td>
												</tr>
											
												<tr>
												<td height="50" colspan="2" align="right"><a class="btn btn-sm btn-danger" value="close_window" 
onclick='javascript:window.onunload=refreshParent;function refreshParent(){window.opener.location.reload();}window.close();'>Complete Assignation</a></td>
												</tr>
												
	</tbody>
  </table>

</div>
<div style="float: left" id="addStudent">
<?php
		
		//list student untuk yang dah pilih 
		 $selectSupervisee = "select * from student where lecturerID='".$_REQUEST['staff_ID']."' and typeOfWorkshop='1'";
		$querySupervisee =mysqli_query($dba,$selectSupervisee) or die (mysqli_error());

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
						<td ><?php echo ++$num1;?></td>
						<td><?php echo $rowSupervisee['studentName'];?></td>
						<td><?php echo $rowSupervisee['matricNum'];?></td>
						<td>Workshop <?php echo $rowSupervisee['typeOfWorkshop'];?></td>
						<td align="center"><a class="btn btn-sm btn-danger" id="delete_student" data-id="<?php echo @$rowSupervisee['matricNum'];echo " ".$_REQUEST['staff_ID']; ?>" href="javascript:void(0)">Remove</a></td>
					</tr>
					<?php }?>
				</tbody>
			 </table>
	</div>

<div id="div3"  style="clear: both;"> 							
	<form method="post" id="searchForm" >
		<table width="689" frame="box">
		<tr>
		<th colspan="8" align="left"> &nbsp; Student Filters</th>
		</tr>
		<tr>
			<td width="117"> &nbsp; Courses</td>
			<td width="10">:</td>
			<td width="109"><input type="checkbox" name="course1" value="BITS" <?php if(isset($_POST['course1'])) echo "checked='checked'"; ?>>BITS</td>
			<td width="137"><input type="checkbox" name="course2" value="BITM" <?php if(isset($_POST['course2'])) echo "checked='checked'"; ?>>BITM</td>
			<td width="87"><input type="checkbox" name="course3" value="BITE" <?php if(isset($_POST['course3'])) echo "checked='checked'"; ?>>BITE</td>
			<td width="111"><input type="checkbox" name="course4" value="BITD" <?php if(isset($_POST['course4'])) echo "checked='checked'"; ?>>BITD</td>
			<td width="36">&nbsp;</td>
			<td width="46">&nbsp;</td>
		 </tr>
		<tr>
			<td align="left">&nbsp;</td>
			<td>:</td>
			<td><input type="checkbox" name="course5" value="BITC" <?php if(isset($_POST['course5'])) echo "checked='checked'"; ?>>BITC</td>
			<td><input type="checkbox" name="course6" value="BITI" <?php if(isset($_POST['course6'])) echo "checked='checked'"; ?>>BITI </td>
			<td><input type="checkbox" name="course7" value="BITZ" <?php if(isset($_POST['course7'])) echo "checked='checked'"; ?>>BITZ</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="left"> &nbsp; Status</td>
			<td>:</td>
			<td><input type="checkbox" name="statusAssign1" value="Assigned" <?php if(isset($_POST['statusAssign1'])) echo "checked='checked'"; ?>>Assigned</td>
			<td><input type="checkbox" name="statusAssign2" value="Not Assigned" <?php if(isset($_POST['statusAssign2'])) echo "checked='checked'"; ?>>Not Assigned</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td align="left">  &nbsp; Search By Name</td>
			<td align="left">:</td>
			<td colspan="6" align="left"><input type="text" id="searchByName" name="searchByName" value="<?php echo @$_REQUEST['searchByName'];?>" size="50" ></td>
		</tr>
		
		<tr>
			<td colspan="3" align="left"><button class="btn btn-primary">Submit</button>  </td>
			<td colspan="5"><input type="hidden" id="staff_ID" name="staff_ID" value="<?php echo $_REQUEST['staff_ID']; ?>" size="5" ></td>
		</tr>
		</table>
	</form>
		<br>
</div>


<div id="resultForm" > 

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
			
			if($course1=='' && $course2=='' && $course3=='' && $course4=='' && $course5=='' && $course6=='' && $course7=='' && $statusAssign1=='' && $statusAssign2=='')	
			{
		?>
		<tr>
			<td colspan="8" align="center"> No Data </td>
		
		</tr>
		<?php 	}else{
		
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
			
			<td><a class="btn btn-sm btn-danger" id="add_student" data-id="<?php echo  @$rowStudent['matricNum']; ?>" href="javascript:void(0)">add</a></td>
		</tr>
		<?php 
				
			}
		}
		
		?>
	</table>

</div>
		</div>
		<hr/>
								
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder"><a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse"> <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i> 
							</a>eSSMS</span> &copy; 2017
						</span>


						&nbsp; &nbsp;
						
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>
<script src="assets/jquery-1.12.4-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {	
	
	// submit form using $.ajax() method
	
	$('#searchForm').submit(function(e){
		
		e.preventDefault(); // Prevent Default Submission
		
		$.ajax({
			url: 'search_studentWorkshop1.php',
			type: 'POST',
			data: $(this).serialize() // it will serialize the form data
		})
		.done(function(data){
			$('#resultForm').fadeOut('slow', function(){
				$('#resultForm').fadeIn('slow').html(data);
			});
		})
		.fail(function(){
			alert('Ajax Submit Failed ...');	
		});
	});
		
});
$(document).ready(function() {	
	


	$('#addStudent').on('click', '#delete_student', function(e){
		 $(this).closest('tr').remove()
		var productId = $(this).data('id');
	
		
		$.ajax({
			url: 'remove_student1.php',
			type: 'POST',
			data: productId, 
			
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
