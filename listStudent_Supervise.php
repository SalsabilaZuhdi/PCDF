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
					<?php	
					$select = "call select_studentW1('".$id."')";
					$querySelect =mysqli_query($dba,$select) or die (mysqli_error());
					mysqli_next_result($dba);
					?>
		<div class="page-header">
							<h1>
								List of Student
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
		                      <h4>
								Workshop 1
							  </h4>
									<form class="form-horizontal" role="form" method="post">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
										
														<th>No. </th>
														<th>Matric Number </th>
														<th>Student Name</th>
														<th>Project Title</th>
														<th>Course</th>
														<th>Workshop</th>
														<th></th>
														
											
													</tr>
												</thead>
												 <?php
													$num = 0;
												  while($row=mysqli_fetch_array(@$querySelect))
												  {
												  ?>
												<tbody>
													<tr>
														<td><?php echo ++$num;?></td>
														<td><?php echo $row['matricNum'];?></td>
														<td><?php echo $row['studentName'];?></td>
														<td><font color="red"><?php echo $row['title'];?></font></td>
														<td><?php echo $row['course'];?></td>
														<td>Workshop <?php echo $row['typeOfWorkshop'];?></td>
														<td><?php echo "<a href=detail.php?matric_Num=".$row['matricNum'].">"?>
														<input type="button" value="View Details"></a>	 
														</td>
												
													</tr>
													<?php };?>
												</tbody>
										</table>
									</form>
										<?php	
										$select1 ="call select_studentW2('".$id."')";
										$querySelect1 =mysqli_query($dba,$select1) or die (mysqli_error());
										mysqli_next_result($dba);
										?>
									<h4>
									Workshop 2
								  </h4>
									<form class="form-horizontal" role="form" method="post">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
										
														<th>No. </th>
														<th>Matric Number </th>
														<th>Student Name</th>
														<th>Project Title</th>
														<th>Course</th>
														<th>Workshop</th>
														<th></th>
														
											
													</tr>
												</thead>
												 <?php
													$num = 0;
												  while($row1=mysqli_fetch_array(@$querySelect1))
												  {
												  ?>
												<tbody>
													<tr>
														<td><?php echo ++$num;?></td>
														<td><?php echo $row1['matricNum'];?></td>
														<td><?php echo $row1['studentName'];?></td>
														<td><font color="red"><?php echo $row1['title'];?></font></td>
														<td><?php echo $row1['course'];?></td>
														<td>Workshop <?php echo $row1['typeOfWorkshop'];?></td>
														<td><?php echo "<a href=detail.php?matric_Num=".$row1['matricNum'].">"?>
														<input type="button" value="View Details"></a>	 
														</td>
												
													</tr>
													<?php };?>
												</tbody>
										</table>
									</form>
									<?php
									
										$rowcheckresult = 0;
										if(isset($_REQUEST['submit']))
										{
											 $sesi = $_REQUEST['sesi'];
											 $semester = $_REQUEST['semester'];
											 
											 $sqlchecksearch = "call select_previousStudent('".$sesi."','".$semester."','".$id."')";
											 $essms_selectchecksearch =mysqli_query($dba,$sqlchecksearch) or die (mysqli_error());
											 mysqli_next_result($dba);
											 $rowcheckresult = mysqli_fetch_array(@$essms_selectchecksearch);
											
											 $sqlresult =  "call select_previousStudent('".$sesi."','".$semester."','".$id."')";
											$essms_selectresult =mysqli_query($dba,$sqlresult) or die (mysqli_error());
											mysqli_next_result($dba);
											
										}
										?>
							
								
									<h4>Previous Students
								  </h4>
						<form method="POST">
						<table align="left">
						<?php
						$sqlsession = mysqli_query($dba,"call select_session")or die();
						mysqli_next_result($dba);
					
						?>
						<tr>
							<td> Search Year : </td>
							<td><select id="sesi" name="sesi" >
							<?php
							while ($rowsession = mysqli_fetch_array($sqlsession,MYSQLI_ASSOC)){
						
							   echo "<option value=\"" .   $rowsession['session'] . "\">" . $rowsession['session'] . "</option>";
							 
							}
						
							?>
							</select>
							</td>
							
							<td>&nbsp;&nbsp;Semester</td>
							<td>&nbsp;&nbsp;
							<select id="semester" name="semester">
												<option  value="1">1</option>
												<option 1value="2">2</option>
											
							</select></td>
							<td>&nbsp;<button type="submit" value="submit" name="submit">Search</button></td>
						</tr>
					
						</table>
				
						</form>
						
									<form class="form-horizontal" role="form" method="post">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
										
														<th>No. </th>
														<th>Matric Number </th>
														<th>Student Name</th>
														<th>Project Title</th>
														<th>Course</th>
														<th>Workshop</th>
												
														
											
													</tr>
												</thead>
												 <?php
												 if(@$rowcheckresult < 1 )
												 {
												?>	
													<tbody>
													<tr>
														<td colspan="6" align="center"> No Student </td>
													</tr>
																										 
												<?php }else{
													$num = 0;
												  while($row2=mysqli_fetch_array(@$essms_selectresult))
												  {
												  ?>
												<tbody>
													<tr>
														<td><?php echo ++$num;?></td>
														<td><?php echo $row2['matricNum'];?></td>
														<td><?php echo $row2['studentName'];?></td>
														<td><font color="red"><?php echo $row2['title'];?></font></td>
														<td><?php echo $row2['course'];?></td>
														<td>Workshop <?php echo $row2['typeOfWorkshop'];?></td>
											
												
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
