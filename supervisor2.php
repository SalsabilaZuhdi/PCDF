<?php
session_start();
include 'conn/dbconnection.php';
 if (@$_SESSION['password'] == "")
 {
	echo "<script> alert('Log In unsuccessful.');</script>";
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=index.php">';
 }

 else {}

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
		<?php include 'navigation.php'; ?>

			<div class="main-content">
				<div class="main-content-inner">

				  <div class="page-content">
					  <div class="ace-settings-container" id="ace-settings-container">
						  <div class="ace-settings-box clearfix" id="ace-settings-box">
							  <div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
							</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
			</div>
								</div><!-- /.pull-left -->
						  </div><!-- /.ace-settings-box -->
					  </div><!-- /.ace-settings-container -->
			
 <?php

	 
 if(isset($_REQUEST['search']))
 {
			 											
		 @$department1=$_POST['department1'];

		
		 @$position1=$_POST['position1'];
		 @$position2=$_POST['position2'];
		
		
		@$searchByName=$_POST['searchByName'];
		
		if(!empty($searchByName) && $position1 == '' && $position2=='' && $department1 == ''  )
		{
						$rowSearchName =mysqli_fetch_array(@$querySearch);
			$department1= $rowSearchName['department'];
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
			//allocation table
			//count total student based on department
			 $selectTotalStudent = "select count(*) as TotalStudent from student where typeOfWorkshop='2' AND  ".$searchCourse." ";
			$essms_selectTotalStudent =mysqli_query($dba,$selectTotalStudent) or die (mysqli_error());

			$rowTotalStudent=mysqli_fetch_assoc($essms_selectTotalStudent);
											 
			//count select lecturer
			 $selectTotalLecturer = "select count(*) as TotalLecturer from lecturer where department='".$department1."'";
			$essms_selectTotalLecturert =mysqli_query($dba,$selectTotalLecturer) or die (mysqli_error());
		
			$rowTotalLecturer=mysqli_fetch_assoc($essms_selectTotalLecturert); 
			
			//calculate allocation
			$allocationStudent= @$rowTotalStudent[TotalStudent]/@$rowTotalLecturer[TotalLecturer]; 
			$roundallocation = round($allocationStudent+0.5, 0, PHP_ROUND_HALF_EVEN);
			
																	
			$updateallocation = "update allocation_student 
										left join lecturer on lecturer.staffID=allocation_student.staffID
										set allocationWorkshop2='".$roundallocation."'
										where lecturer.department='".$department1."'";
													
			$essms_update = mysqli_query($dba,$updateallocation)or die (mysqli_error($dba));
			
				
			$minroundallocation = round($allocationStudent+0.5, 0, PHP_ROUND_HALF_EVEN);
			
			$query=mysqli_query($dba,"select * from lecturer 
										left join lecturer_position on lecturer.staffID = lecturer_position.staffID
										left join position on lecturer.positionID = position.positionID
										left join allocation_student on lecturer.staffID = allocation_student.staffID 
										where
										(department = 'BITI' OR department = 'SE' OR department = 'BITC' OR department = 'MI' ) AND 
										(lecturer.positionID = '2' OR lecturer.positionID = '3' ) AND  lecturer.lecturerName LIKE '%".$searchByName."%'
										GROUP BY lecturer.staffID ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC")or die();	
			
			$querySearch=mysqli_query($dba,"select * from lecturer 
										left join lecturer_position on lecturer.staffID = lecturer_position.staffID
										left join position on lecturer.positionID = position.positionID
										left join allocation_student on lecturer.staffID = allocation_student.staffID 
										where
										(department = 'BITI' OR department = 'SE' OR department = 'BITC' OR department = 'MI' ) AND 
										(lecturer.positionID = '2' OR lecturer.positionID = '3' ) AND  lecturer.lecturerName LIKE '%".$searchByName."%'
										GROUP BY lecturer.staffID ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC")or die();	
			

																	
		
		
	
		} 
		else if($position1 == '' && $position2=='' )
		{
			
								//condition department to courses
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
			//allocation table
			//count total student based on department
			$selectTotalStudent = "select count(*) as TotalStudent from student where typeOfWorkshop='2' AND  ".$searchCourse." ";
			$essms_selectTotalStudent =mysqli_query($dba,$selectTotalStudent) or die (mysqli_error());

			$rowTotalStudent=mysqli_fetch_assoc($essms_selectTotalStudent);
											 
			//count select lecturer
			 $selectTotalLecturer = "select count(*) as TotalLecturer from lecturer where department='".$department1."'";
			$essms_selectTotalLecturert =mysqli_query($dba,$selectTotalLecturer) or die (mysqli_error());
		
			$rowTotalLecturer=mysqli_fetch_assoc($essms_selectTotalLecturert); 
			
			//calculate allocation
			$allocationStudent= @$rowTotalStudent[TotalStudent]/@$rowTotalLecturer[TotalLecturer]; 
			$roundallocation = round($allocationStudent+0.5, 0, PHP_ROUND_HALF_EVEN);
			
																	
			 $updateallocation = "update allocation_student 
										left join lecturer on lecturer.staffID=allocation_student.staffID
										set allocationWorkshop2='".$roundallocation."'
										where lecturer.department='".$department1."'";
													
		
			$essms_update = mysqli_query($dba,$updateallocation)or die (mysqli_error($dba));
			
				
			$minroundallocation = round($allocationStudent+0.5, 0, PHP_ROUND_HALF_EVEN);
			$query=mysqli_query($dba,"select * from lecturer 
										left join lecturer_position on lecturer.staffID = lecturer_position.staffID
										left join position on lecturer.positionID = position.positionID
										left join allocation_student on lecturer.staffID = allocation_student.staffID 
										where
										department = '".$department1."'   AND 
										(lecturer.positionID = '2' OR lecturer.positionID = '3' ) AND  lecturer.lecturerName LIKE '%".$searchByName."%'
										GROUP BY lecturer.staffID ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC")or die();	
			mysqli_next_result($dba);
			

															
			
		}
		else if ($department1 == '' )
		{
			
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
			//allocation table
			//count total student based on department
			 $selectTotalStudent = "select count(*) as TotalStudent from student where typeOfWorkshop='2' AND  ".$searchCourse." ";
			$essms_selectTotalStudent =mysqli_query($dba,$selectTotalStudent) or die (mysqli_error());

			$rowTotalStudent=mysqli_fetch_assoc($essms_selectTotalStudent);
											 
			//count select lecturer
			 $selectTotalLecturer = "select count(*) as TotalLecturer from lecturer where department='".$department1."'";
			$essms_selectTotalLecturert =mysqli_query($dba,$selectTotalLecturer) or die (mysqli_error());
		
			$rowTotalLecturer=mysqli_fetch_assoc($essms_selectTotalLecturert); 
			
			//calculate allocation
			$allocationStudent= @$rowTotalStudent[TotalStudent]/@$rowTotalLecturer[TotalLecturer]; 
			$roundallocation = round($allocationStudent+0.5, 0, PHP_ROUND_HALF_EVEN);
			
																	
			 $updateallocation = "update allocation_student 
										left join lecturer on lecturer.staffID=allocation_student.staffID
										set allocationWorkshop2='".$roundallocation."'
										where lecturer.department='".$department1."'";			 
			$essms_update = mysqli_query($dba,$updateallocation)or die (mysqli_error($dba));
			
				
			$minroundallocation = round($allocationStudent+0.5, 0, PHP_ROUND_HALF_EVEN);
			
			$query=mysqli_query($dba,"select * from lecturer 
										left join lecturer_position on lecturer.staffID = lecturer_position.staffID
										left join position on lecturer.positionID = position.positionID
										left join allocation_student on lecturer.staffID = allocation_student.staffID 
										where
										department = '".$department1."'   AND 
										(lecturer.positionID = '".$position1."' OR lecturer.positionID = '".$position2."' ) AND  lecturer.lecturerName LIKE '%".$searchByName."%'
										GROUP BY lecturer.staffID ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC")or die();
										
			echo $select="select * from lecturer 
										left join lecturer_position on lecturer.staffID = lecturer_position.staffID
										left join position on lecturer.positionID = position.positionID
										left join allocation_student on lecturer.staffID = allocation_student.staffID 
										where
										department = '".$department1."'   AND 
										(lecturer.positionID = '".$position1."' OR lecturer.positionID = '".$position2."' ) AND  lecturer.lecturerName LIKE '%".$searchByName."%'
										GROUP BY lecturer.staffID ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC";
			mysqli_next_result($dba);

			
			
		}
		else
		{
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
			//allocation table
			//count total student based on department
			 $selectTotalStudent = "select count(*) as TotalStudent from student where typeOfWorkshop='2' AND  ".$searchCourse." ";
			$essms_selectTotalStudent =mysqli_query($dba,$selectTotalStudent) or die (mysqli_error());

			$rowTotalStudent=mysqli_fetch_assoc($essms_selectTotalStudent);
											 
			//count select lecturer
			 $selectTotalLecturer = "select count(*) as TotalLecturer from lecturer where department='".$department1."'";
			$essms_selectTotalLecturert =mysqli_query($dba,$selectTotalLecturer) or die (mysqli_error());
		
			$rowTotalLecturer=mysqli_fetch_assoc($essms_selectTotalLecturert); 
			
			//calculate allocation
			$allocationStudent= @$rowTotalStudent[TotalStudent]/@$rowTotalLecturer[TotalLecturer]; 
			$roundallocation = round($allocationStudent+0.5, 0, PHP_ROUND_HALF_EVEN);
			
																	
			 $updateallocation = "update allocation_student 
										left join lecturer on lecturer.staffID=allocation_student.staffID
										set allocationWorkshop2='".$roundallocation."'
										where lecturer.department='".$department1."'";		
			$essms_update = mysqli_query($dba,$updateallocation)or die (mysqli_error($dba));
			
				
			$minroundallocation = round($allocationStudent+0.5, 0, PHP_ROUND_HALF_EVEN);
			
			$query=mysqli_query($dba,"select * from lecturer 
										left join lecturer_position on lecturer.staffID = lecturer_position.staffID
										left join position on lecturer.positionID = position.positionID
										left join allocation_student on lecturer.staffID = allocation_student.staffID 
										where
										department = '".$department1."'   AND 
										(lecturer.positionID = '".$position1."' OR lecturer.positionID = '".$position2."' )  AND  lecturer.lecturerName LIKE '%".$searchByName."%'
										GROUP BY lecturer.staffID ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC") or die();	
			mysqli_next_result($dba);
			
				
		}
		}
		else
		{
			$searchCourse='';
			$department1='';
			
			if(@$department1=='SE')
			{
				@$searchCourse = "(course='BITS' OR course='BITD')";
			}
			else if(@$department1=='BITC')
			{
				@$searchCourse = "(course='BITC' OR course='BITE') ";
			}
			else if(@$department1=='BITI')
			{
				@$searchCourse = "(course='BITI' OR course='BITD') ";
			}
			else if(@$department1=='MI')
			{
				@$searchCourse = "(course='BITM' OR course='BITZ')";
			}
			//allocation table
			//count total student based on department
			$selectTotalStudent = "select count(*) as TotalStudent from student where typeOfWorkshop='3' ".@$searchCourse." ";
			$essms_selectTotalStudent =mysqli_query($dba,$selectTotalStudent) or die (mysqli_error());

			$rowTotalStudent=mysqli_fetch_assoc($essms_selectTotalStudent);
											 
			//count select lecturer
			$selectTotalLecturer = "select count(*) as TotalLecturer from lecturer where department='".$department1."'";
			$essms_selectTotalLecturert =mysqli_query($dba,$selectTotalLecturer) or die (mysqli_error());
		
			$rowTotalLecturer=mysqli_fetch_assoc($essms_selectTotalLecturert); 
			
			//calculate allocation
			@$allocationStudent= @$rowTotalStudent[TotalStudent]/@$rowTotalLecturer[TotalLecturer]; 
			$roundallocation = round($allocationStudent+0.5, 0, PHP_ROUND_HALF_EVEN);
			
																	
			 $updateallocation = "update allocation_student 
										left join lecturer on lecturer.staffID=allocation_student.staffID
										set allocationWorkshop2='".$roundallocation."'
										where lecturer.department='".$department1."'";	
			$essms_update = mysqli_query($dba,$updateallocation)or die (mysqli_error($dba));
			
				
			$minroundallocation = round($allocationStudent+0.5, 0, PHP_ROUND_HALF_EVEN);
			
			
			$query=mysqli_query($dba,"select * from lecturer 
										left join lecturer_position on lecturer.staffID = lecturer_position.staffID
										left join position on lecturer.positionID = position.positionID
										left join allocation_student on lecturer.staffID = allocation_student.staffID 
										where
										department = '".@$department1."'   AND 
										(lecturer.positionID = '2' OR lecturer.positionID = '3' )
										GROUP BY lecturer.staffID ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC") or die();	
			mysqli_next_result($dba);
			
		}

?> 
	<div class="page-header">
							<h1>
								Workshop 2 Supervisor Assignation
							</h1>
						</div><!-- /.page-header -->
						
						
								
									<div class="tab-content profile-edit-tab-content">
									
		                            <div id="edit-basic" class="tab-pane in active">

								
							<div class="row">
								<div class="col-sm-5">
									<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													
													Select Department
												</h4>

									<form class="form-horizontal" role="form" method="post" action="supervisor2.php">
										<div class="form-group">
										
										<div class="col-xs-12 col-sm-9">
								    
								        	<table  border="0">
											  <tbody>
												<tr>
												  <td width="113">Department</td>
												  											 
												
												  <td width="84"><input type="radio" name="department1" value="SE"   checked='checked'">SE</td>
												  
												  <td width="91"><input type="radio" name="department1" value="BITC" <?php if(isset($_POST['department1'])&& $_POST['department1'] == 'BITC') echo "checked='checked'"; ?>>BITC</td>
												</tr>
												<tr>
												  <td>&nbsp;</td>
												
												  <td><input type="radio" name="department1" value="BITI" <?php if(isset($_POST['department1'])&& $_POST['department1'] == 'BITI') echo "checked='checked'"; ?>>BITI</td>
												
												  <td><input type="radio" name="department1" value="MI" <?php if(isset($_POST['department1']) && $_POST['department1'] == 'MI') echo "checked='checked'"; ?>>MI </td>
												</tr>
												
												
												
												
											  </tbody>
											</table>
									  
										</div>
									  
									
									
										<div class="col-xs-12 col-sm-9">
										<table  border="0">
											  <tbody>
												<tr>
												  <td width="113">Position</td>
												
												  <td width="84"><input type="checkbox" name="position1" value="3" <?php if(isset($_POST['position1'])) echo "checked='checked'"; ?>>Supervisor</td>
												  
												  <td width="91"><input type="checkbox" name="position2" value="2" <?php if(isset($_POST['position2'])) echo "checked='checked'"; ?>>Committee</td>
												</tr>
										
											  </tbody>
											</table>
											<table border="0">
											  <tbody>
											  	<tr>
													<td colspan="8" align="left">&nbsp</td>
													
												</tr>
												<tr>
													<td colspan="8" align="left">Search By Name</td>
													
												</tr>
												<tr>
												
													<td colspan="8" align="left"><input type="text" id="searchByName" name="searchByName" value="<?php echo @$_REQUEST['searchByName'];?>" size="50" ></td>
												</tr>
												
												
										
											  </tbody>
											</table>
											  <input name="search" type="submit" id="search" value="Search" />
										</div>
										
									    </div>
										
									</form>			
	</div><!-- /.widget-main -->
	</div><!-- /.widget-body -->
</div><!-- /.widget-box -->
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Student Allocation	<span class="label label-danger arrowed">Workshop 2</span>
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
												<?php

											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Department 
																</th>

																<th>
																<?php echo $department1; ?>
																</th>
															</tr>
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total Student 
																</th>

																<th>
																<?php echo @$rowTotalStudent[TotalStudent]; ?>
																</th>
															</tr>
																<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total Lecturer 
																</th>

																<th>
																	<?php echo @$rowTotalLecturer[TotalLecturer]; ?>
																</th>
															</tr>
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Maximun Allocation of student per Lecturer
																</th>

																<th>
																	<?php 

																		echo @$roundallocation;
																	
																	?>
																</th>
															</tr>
														</thead>
														

											
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
										</div><!-- /.col -->								
								</div><!-- /.row -->
									</div>
									</div>
							
								<h6>
							
							</h6>
								
								<form class="form-horizontal" role="form" method="post">
						
								
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
										
														<th>No. </th>
														<th>Staff ID</th>
														<th>Lecturer Name</th>
														<th>Department</th>
														<th>Position</th>
														<th>Workshop</th>
														<th>Total Supervisee</th>
														<th>Max Supervisee</th>
														<th>Assignation</th>
													</tr>
												</thead>
												  <?php
													$num = 0;
												
												if(empty(@$searchByName) && @$position1 == '' && @$position2=='' && @$department1 == '' )	
												{
												?>
												<tr>
													<td colspan="9" align="center"> No Data </td>
												
												</tr>
												<?php 	}
												else if(mysqli_num_rows($query)== 0)
												{
													?>
												<tr>
													<td colspan="9" align="center"> No Data </td>
												
												</tr>
												<?php }
												else{
												  while($row=mysqli_fetch_array(@$query))
												  {
												  ?>
												<tbody>
												<?php
											
														if ($row['positionName'] == 'Committee') {
														echo '<tr style="color:blue">';
													  } else {
														echo "<tr>";
													  }
												?>
													
														<td><?php echo ++$num;?></td>
														<td><?php echo $row['staffID'];?></td>
														<td><?php echo $row['lecturerName'];?></td>
														<td><?php echo $row['department'];?></td>
														<td><?php echo $row['positionName'];?></td>
														<td>
														<?php if ($row['assignationWorkshop'] == "0")
															  {
																echo "-";
														      }
														      else {
														?>
															  Workshop <?php echo @$row['assignationWorkshop']; }?></td>
														<td align="center"><?php echo $row['totalSuperviseeWorkshop2'];?></td>
														<td align="center"><?php echo $row['allocationWorkshop2'];?></td>
															<td>
														<p><a href="javascript:window.open('assignSuperviseeWorkshop2.php?staff_ID=<?php echo $row['staffID'];?>','mywindowtitle','width=1400,height=800')"><input type="button" value="Assign Supervisee"></a></p>
														
														</td>
								
								
														
													</tr>
												<?php }};?>
													</tbody>
		                                           </table>

								</form>
								
								
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
