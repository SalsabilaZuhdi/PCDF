<?php
session_start();
include 'conn/dbconnection.php';
$id = $_SESSION['id'];
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
					<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
							<?php if(@$_SESSION['position'] == "1" ) { ?>
								<!-- PAGE CONTENT BEGINS (ADMIN) -->
								<h1>Welcome to page e-SSMS</h1></br>
								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													Traffic Sources
												</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder"></div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Student FTMK
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
											 $select = "select course,count(*)as total from student Group By course";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Course 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														

														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														
															<tr>
																<td><?php echo $row['course'];?></td>

																<td>
						
																	<b class="blue"><?php echo $row['total'];?></b>
																</td>
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
																		<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Lecturer FTMK
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
											 $select = "select department,count(*)as total from lecturer Group By department";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Course 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														

														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														
															<tr>
																<td><?php echo $row['department'];?></td>

																<td>
						
																	<b class="blue"><?php echo $row['total'];?></b>
																</td>
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>
								

								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Student 	<span class="label label-danger arrowed">Not Assigned</span>
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
											 $select = "select course,count(*)as total from student where statusAssign ='Not Assigned' Group By course";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Course 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														

														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														
															<tr>
																<td><?php echo $row['course'];?></td>

																<td>
						
																	<b class="red"><?php echo $row['total'];?></b>
																</td>
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
																		<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Student 	<span class="label label-success arrowed-in arrowed-in-right">Assigned</span>
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
											 $select = "select course,count(*)as total from student where statusAssign ='Assigned' Group By course";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Course 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														

														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														
															<tr>
																<td><?php echo $row['course'];?></td>

																<td>
						
																	<b class="green"><?php echo $row['total'];?></b>
																</td>
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>
								

								<!-- PAGE CONTENT ENDS (ADMIN) -->
								
								<?php }else if(@$_SESSION['position'] == "2" ) { ?>
								
								<!-- PAGE CONTENT BEGINS (COMMITTEE) -->
						    <h1>Welcome to page e-SSMS</h1><br/>
							<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Student FTMK
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
											 $select = "select course,count(*)as total from student Group By course";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Course 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														

														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														
															<tr>
																<td><?php echo $row['course'];?></td>

																<td>
						
																	<b class="blue"><?php echo $row['total'];?></b>
																</td>
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
																		<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Lecturer FTMK
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
											 $select = "select department,count(*)as total from lecturer Group By department";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Course 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														

														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														
															<tr>
																<td><?php echo $row['department'];?></td>

																<td>
						
																	<b class="blue"><?php echo $row['total'];?></b>
																</td>
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>
								

								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Student 	<span class="label label-danger arrowed">Not Assigned</span>
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
											 $select = "select course,count(*)as total from student where statusAssign ='Not Assigned' Group By course";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Course 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														

														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														
															<tr>
																<td><?php echo $row['course'];?></td>

																<td>
						
																	<b class="red"><?php echo $row['total'];?></b>
																</td>
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
																		<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Student 	<span class="label label-success arrowed-in arrowed-in-right">Assigned</span>
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
											 $select = "select course,count(*)as total from student where statusAssign ='Assigned' Group By course";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Course 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														

														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														
															<tr>
																<td><?php echo $row['course'];?></td>

																<td>
						
																	<b class="green"><?php echo $row['total'];?></b>
																</td>
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->
								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-list pink"></i>
													Student to Supervise 
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
											 $select = "select student.matricNum, studentEmail, studentPhoneNum, studentName, title, course, student.typeOfWorkshop from student left join report ON student.matricNum = report.matricNum where lecturerID='".$id."' ORDER BY student.typeOfWorkshop ASC";
											?>
									<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Matric Number
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Student Name
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Project Title
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Course
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Workshop
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Email
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Phone Number
																</th>
															</tr>
														</thead>
														
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														<tbody>
														
															<tr>
																<td><?php echo $row['matricNum'];?></td>
																<td><?php echo $row['studentName'];?></td>
																<td><font color="red"><?php echo $row['title'];?></font></td>
																<td><?php echo $row['course'];?></td>
																<td align="center"><?php echo $row['typeOfWorkshop'];?></td>
																<td><?php echo $row['studentEmail'];?></td>
																<td><?php echo $row['studentPhoneNum'];?></td>		
		
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<div class="vspace-12-sm"></div>
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-sm-7">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon  fa fa-calendar-o orange"></i>
													Pending Appointment 
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
											 $select = "SELECT * FROM appointment LEFT JOIN student ON appointment.matricNum = student.matricNum where appointment.staffid= '".$id."' AND status='Pending Approval'";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Date 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Time
																</th>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Agenda 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Student Name
																</th>
															</tr>
														</thead>
														

														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
																$originalDate =  $row['start'];
																$newDate = date("d/m/Y", strtotime($originalDate));
															?>
														
															<tr>
																<td><?php echo $newDate;?></td>
																	<td><?php echo $row['start_time'];?></td>
																	<td><?php echo $row['title'];?></td>
																	<td><?php echo $row['studentName'];?></td>
														
						
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<?php
											$countsql ="call select_totalAppointment('".$id."')";
											$essms_countsql =mysqli_query($dba,$countsql) or die (mysqli_error());
											mysqli_next_result($dba);
											$countstatus = mysqli_fetch_array($essms_countsql);
									?>
																		<div class="col-sm-5">
											<div class="widget-box ">
				<div class="widget-header">
				<h4>Summary of Appointment</h4>
				</div>

						<div >
								<div class="external-event label-yellow" data-class="label-yellow" style="background-color:yellow">
								<i class="ace-icon fa "><?php echo $countstatus['totalpending']; ?></i>
								Pending Approval
						</div>
								<div class="external-event label-success" data-class="label-success" style="background-color:green">
								<i class="ace-icon fa "><?php echo $countstatus['totalaccept']; ?></i>
								Accepted Appointment
						</div>
						<div class="external-event label-danger" data-class="label-danger" style="background-color:red">
							<i class="ace-icon fa "><?php echo $countstatus['totalreject']; ?></i>
							Rejected Appointment
						</div>
					
					</div>
			</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>


								<!-- PAGE CONTENT ENDS (COMMITTEE) -->
								
								<?php } else if(@$_SESSION['position'] == "3" ) { ?>
								
								<!-- PAGE CONTENT BEGINS (SUPERVISOR) -->
			    			    <h1>Welcome to page e-SSMS</h1><br/>
								<div class="row">
									<div class="col-sm-10">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-list pink"></i>
													Student to Supervise 
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
											 $select = "select student.matricNum, studentEmail, studentPhoneNum,  studentName, title, course, student.typeOfWorkshop from student left join report ON student.matricNum = report.matricNum where lecturerID='".$id."' ORDER BY student.typeOfWorkshop ASC";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Matric Number
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Student Name
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Project Title
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Course
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Workshop
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Email
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Phone Number
																</th>
															</tr>
														</thead>
														
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														<tbody>
														
														
															<tr>
																<td><?php echo $row['matricNum'];?></td>
																<td><?php echo $row['studentName'];?></td>
																<td><font color="red"><?php echo $row['title'];?></font></td>
																<td><?php echo $row['course'];?></td>
																<td align="center"><?php echo $row['typeOfWorkshop'];?></td>
																<td><?php echo $row['studentEmail'];?></td>
																<td><?php echo $row['studentPhoneNum'];?></td>
															
																	
																
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<div class="vspace-12-sm"></div>
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-sm-7">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon  fa fa-calendar-o orange"></i>
													Pending Appointment 
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
											 $select = "SELECT * FROM appointment LEFT JOIN student ON appointment.matricNum = student.matricNum where appointment.staffid= '".$id."' AND status='Pending Approval'";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Date 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Time
																</th>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Agenda 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Student Name
																</th>
															</tr>
														</thead>
														

														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
																$originalDate =  $row['start'];
																$newDate = date("d/m/Y", strtotime($originalDate));
															?>
														
															<tr>
																    <td><?php echo $newDate;?></td>
																	<td><?php echo $row['start_time'];?></td>
																	<td><?php echo $row['title'];?></td>
																	<td><?php echo $row['studentName'];?></td>
						
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<?php
											$countsql ="call select_totalAppointment('".$id."')";
											$essms_countsql =mysqli_query($dba,$countsql) or die (mysqli_error());
											mysqli_next_result($dba);
											$countstatus = mysqli_fetch_array($essms_countsql);
									?>
							<div class="col-sm-5">
							<div class="widget-box ">
								<div class="widget-header">
								<h4>Summary of Appointment</h4>
								</div>

										<div >
												<div class="external-event label-yellow" data-class="label-yellow" style="background-color:yellow">
												<i class="ace-icon fa "><?php echo $countstatus['totalpending']; ?></i>
												Pending Approval
										</div>
												<div class="external-event label-success" data-class="label-success" style="background-color:green">
												<i class="ace-icon fa "><?php echo $countstatus['totalaccept']; ?></i>
												Accepted Appointment
										</div>
										<div class="external-event label-danger" data-class="label-danger" style="background-color:red">
											<i class="ace-icon fa "><?php echo $countstatus['totalreject']; ?></i>
											Rejected Appointment
										</div>
									
									</div>
								</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>


								<!-- PAGE CONTENT ENDS (SUPERVISOR) -->
								
								
								<?php }else if(@$_SESSION['position'] == "4" ) { ?>
								<!-- PAGE CONTENT BEGINS (STUDENT) -->
							    <h1>Welcome to page e-SSMS</h1><br/>
								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-list pink"></i>
													Proposal 
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
											 $select = "select * from report left join proposal ON report.reportID = proposal.reportID where matricNum ='".$id."' ORDER BY proposalID DESC";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Submission Date 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Status
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Mark
																</th>
															</tr>
														</thead>
														
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														<tbody>
														
														
															<tr>
																<td><?php echo $row['submissionDate'];?></td>
																<td><?php echo $row['statusProject'];?></td>
																<?php if ($row['mark']==0) { ?>
																<td>
						
																	<b class="red"><?php echo $row['mark'];?> %</b>
																</td>
																<?php } else { ?>
																<td>
																	<b class="green"><?php echo $row['mark'];?> %</b>
																</td>
																<?php }; ?>
																	
																
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<div class="vspace-12-sm"></div>
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-list green"></i>
													Final Report 
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
											 $select = "select * from report left join finalreport ON report.reportID = finalreport.reportID where matricNum ='".$id."' ORDER BY finalreportID DESC";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Submission Date 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Status
																</th>
																	<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Mark
																</th>
															</tr>
														</thead>
														
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
														<tbody>
														
														
															<tr>
																<td><?php echo $row['submissionDate'];?></td>
																<td><?php echo $row['statusProject'];?></td>
																<?php if ($row['mark']==0) { ?>
																<td>
						
																	<b class="red"><?php echo $row['mark'];?> %</b>
																</td>
																<?php } else { ?>
																<td>
																	<b class="green"><?php echo $row['mark'];?> %</b>
																</td>
																<?php }; ?>
																	
																
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon  fa fa-calendar-o orange"></i>
													Appointment
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
											 $select = "select * from appointment where matricNum ='".$id."'";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Date 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Status
																</th>
															</tr>
														</thead>
														

														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
															while($row=mysqli_fetch_assoc($essms_select))
															{
																$originalDate =  $row['start'];
																$newDate = date("d/m/Y", strtotime($originalDate));
															?>
														
															<tr>
																<td><?php echo $newDate;?></td>
																<?php if ($row['status']=='Accept') { ?>
																<td>
						
																	<b class="green"><?php echo $row['status'];?></b>
																</td>
																<?php } else if ($row['status']=='Reject') { ?>
																<td>
																	<b class="red"><?php echo $row['status'];?> %</b>
																</td>
																<?php } else if ($row['status']=='Pending Approval') { ?>
																<td>
																	<b class="blue"><?php echo $row['status'];?></b>
																</td>
																<?php }; ?>
						
															</tr>
														</tbody>
														  <?php };?>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<?php
											$countsql ="call select_totalAppointment('".$id."')";
											$essms_countsql =mysqli_query($dba,$countsql) or die (mysqli_error());
											mysqli_next_result($dba);
											$countstatus = mysqli_fetch_array($essms_countsql);
									?>
								<div class="col-sm-5">
								<div class="widget-box ">
								<div class="widget-header">
								<h4>Summary of Appointment</h4>
								</div>

									<div >
											<div class="external-event label-yellow" data-class="label-yellow" style="background-color:yellow">
											<i class="ace-icon fa "><?php echo $countstatus['totalpending']; ?></i>
											Pending Approval
									</div>
											<div class="external-event label-success" data-class="label-success" style="background-color:green">
											<i class="ace-icon fa "><?php echo $countstatus['totalaccept']; ?></i>
											Accepted Appointment
									</div>
									<div class="external-event label-danger" data-class="label-danger" style="background-color:red">
										<i class="ace-icon fa "><?php echo $countstatus['totalreject']; ?></i>
										Rejected Appointment
									</div>
								
								</div>
								</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>

								<!-- PAGE CONTENT ENDS (STUDENT) -->
													<?php }?>
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

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			<?php $select = "select course,count(*)as total from student Group By course"; ?>
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  <?php
				$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
				while($row=mysqli_fetch_assoc($essms_select))
				{
																
				?>
			  var data = [
				{ label: "<?php echo $row['course']; ?>",  data: 38.7, color: "#68BC31"},
				{ label: "<?php echo $row['course']; ?>",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
				<?php } ?>
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);

			})
		</script>
	</body>
</html>
