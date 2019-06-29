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
						 if(isset($_REQUEST['search']))
						 {
								  @$course1=$_POST['course1'];
								  @$course2=$_POST['course2'];
								  @$course3=$_POST['course3'];
								  @$course4=$_POST['course4'];
								  @$course5=$_POST['course5'];
								  @$course6=$_POST['course6'];	  
								  @$course7=$_POST['course7'];

								  @$workshop1 =$_POST['workshop1'];
								  @$workshop2 =$_POST['workshop2'];
								  
								  if($workshop1=='' && $workshop2=='')
									{
			
							
									$querySelect=mysqli_query($dba,"select *  from report left join student ON report.matricNum = student.matricNum left join finalReport ON report.reportID = finalReport.reportID 
									where (student.typeOfWorkshop='1' OR student.typeOfWorkshop ='2' ) AND (student.course = '".$course1."' OR student.course = '".$course2."' OR student.course = '".$course3."' OR student.course = '".$course4."' OR student.course = '".$course5."' OR student.course = '".$course6."' OR student.course = '".$course7."') AND
									finalReport.statusProject ='Approve'") or die();	
								
									$selectCountA = "select count(*) AS TotalAll from student where (typeOfWorkshop='1' OR typeOfWorkshop ='2') AND (student.course = '".$course1."' OR student.course = '".$course2."' OR student.course = '".$course3."' OR student.course = '".$course4."' OR student.course = '".$course5."' OR student.course = '".$course6."' OR student.course = '".$course7."')";
									$essms_selectCountA =mysqli_query($dba,$selectCountA) or die (mysqli_error());
									$rowCountA = mysqli_fetch_array($essms_selectCountA);
									
									$selectCount = "select count(*) AS Total from finalreport left join report ON finalreport.reportID = report.reportID left join student ON report.matricNum = student.matricNum where (student.typeOfWorkshop='1' OR student.typeOfWorkshop ='2' ) AND (student.course = '".$course1."' OR student.course = '".$course2."' OR student.course = '".$course3."' OR student.course = '".$course4."' OR student.course = '".$course5."' OR student.course = '".$course6."' OR student.course = '".$course7."') AND finalreport.statusProject ='Approve'";
									$essms_selectCount =mysqli_query($dba,$selectCount) or die (mysqli_error());
									$rowCount = mysqli_fetch_array($essms_selectCount);
									}
						
									else if($course1=='' && $course2=='' && $course3=='' && $course4=='' && $course5=='' && $course6=='' && $course7=='')
									{
									$querySelect=mysqli_query($dba,"select *  from report left join student ON report.matricNum = student.matricNum left join finalReport ON report.reportID = finalReport.reportID 
									where (student.typeOfWorkshop='".$workshop1."' OR student.typeOfWorkshop ='".$workshop2."' ) AND
									(course = 'BITS' OR course = 'BITM' OR course = 'BITE' OR course = 'BITD' OR course = 'BITC' OR course = 'BITZ' OR course = 'BITI') AND
									finalReport.statusProject ='Approve'") or die();	
									
									$selectCountA = "select count(*) AS TotalAll from student where (student.typeOfWorkshop='".$workshop1."' OR student.typeOfWorkshop ='".$workshop2."' ) AND (course = 'BITS' OR course = 'BITM' OR course = 'BITE' OR course = 'BITD' OR course = 'BITC' OR course = 'BITZ' OR course = 'BITI')";
									$essms_selectCountA =mysqli_query($dba,$selectCountA) or die (mysqli_error());
									$rowCountA = mysqli_fetch_array($essms_selectCountA);
									
									$selectCount = "select count(*) AS Total from finalreport left join report ON finalreport.reportID = report.reportID left join student ON report.matricNum = student.matricNum where (course = 'BITS' OR course = 'BITM' OR course = 'BITE' OR course = 'BITD' OR course = 'BITC' OR course = 'BITZ' OR course = 'BITI') AND
								    finalreport.statusProject ='Approve'";
									$essms_selectCount =mysqli_query($dba,$selectCount) or die (mysqli_error());
									$rowCount = mysqli_fetch_array($essms_selectCount);
								
									}
									else
									{
									$querySelect=mysqli_query($dba,"select *  from report left join student ON report.matricNum = student.matricNum left join finalReport ON report.reportID = finalReport.reportID 
									where (student.typeOfWorkshop='".$workshop1."' OR student.typeOfWorkshop ='".$workshop2."' ) AND
									(student.course = '".$course1."' OR student.course = '".$course2."' OR student.course = '".$course3."' OR student.course = '".$course4."' OR student.course = '".$course5."' OR student.course = '".$course6."' OR student.course = '".$course7."') AND
									finalReport.statusProject ='Approve'") or die();

									$selectCountA = "select count(*) AS TotalAll from student where (student.typeOfWorkshop='".$workshop1."' OR student.typeOfWorkshop ='".$workshop2."' ) AND
									(student.course = '".$course1."' OR student.course = '".$course2."' OR student.course = '".$course3."' OR student.course = '".$course4."' OR student.course = '".$course5."' OR student.course = '".$course6."' OR student.course = '".$course7."')";
									$essms_selectCountA =mysqli_query($dba,$selectCountA) or die (mysqli_error());
									$rowCountA = mysqli_fetch_array($essms_selectCountA);
									
									$selectCount = "select count(*) AS Total from finalReport left join report ON finalReport.reportID = report.reportID left join student ON report.matricNum = student.matricNum where (student.typeOfWorkshop='".$workshop1."' OR student.typeOfWorkshop ='".$workshop2."' ) AND
									(student.course = '".$course1."' OR student.course = '".$course2."' OR student.course = '".$course3."' OR student.course = '".$course4."' OR student.course = '".$course5."' OR student.course = '".$course6."' OR student.course = '".$course7."') AND
									finalReport.statusProject ='Approve'";
									$essms_selectCount =mysqli_query($dba,$selectCount) or die (mysqli_error());
									$rowCount = mysqli_fetch_array($essms_selectCount);									
									}
									
									}
									else
									{
									$querySelect=mysqli_query($dba,"select *  from report left join student ON report.matricNum = student.matricNum left join finalReport ON report.reportID = finalReport.reportID 
									where (student.typeOfWorkshop='1' OR student.typeOfWorkshop ='2' ) AND
									(course = 'BITS' OR course = 'BITM' OR course = 'BITE' OR course = 'BITD' OR course = 'BITC' OR course = 'BITZ' OR course = 'BITI') AND
									finalReport.statusProject ='Approve'") or die();	
								
								
									$selectCountA = "select count(*) AS TotalAll from student where (student.typeOfWorkshop='1' OR student.typeOfWorkshop ='2' ) AND
									(course = 'BITS' OR course = 'BITM' OR course = 'BITE' OR course = 'BITD' OR course = 'BITC' OR course = 'BITZ' OR course = 'BITI')";
									$essms_selectCountA =mysqli_query($dba,$selectCountA) or die (mysqli_error());
									$rowCountA = mysqli_fetch_array($essms_selectCountA);
									
									$selectCount = "select count(*) AS Total from finalReport left join report ON finalReport.reportID = report.reportID left join student ON report.matricNum = student.matricNum where (student.typeOfWorkshop='1' OR student.typeOfWorkshop ='2' ) AND
									(course = 'BITS' OR course = 'BITM' OR course = 'BITE' OR course = 'BITD' OR course = 'BITC' OR course = 'BITZ' OR course = 'BITI') AND
									finalReport.statusProject ='Approve'";
									$essms_selectCount =mysqli_query($dba,$selectCount) or die (mysqli_error());
									$rowCount = mysqli_fetch_array($essms_selectCount);
									}
						?> 
		<div class="page-header">
							<h1>
								Student's Final Report
							</h1>
						</div><!-- /.page-header -->
                        		<div class="tab-content profile-edit-tab-content">
		                            <div id="edit-basic" class="tab-pane in active">
									<form class="form-horizontal" role="form" method="post" action="finalReportS.php">
										<div class="form-group">
										<div class="col-xs-12 col-sm-9">
								    
								        	<table width="689">
									<tr>
										<td width="135">Courses</td>
										<td width="10">:</td>
										<td width="126"><input type="checkbox" name="course1" value="BITS" <?php if(isset($_POST['course1'])) echo "checked='checked'"; ?>>BITS</td>
										<td width="101"><input type="checkbox" name="course2" value="BITM" <?php if(isset($_POST['course2'])) echo "checked='checked'"; ?>>BITM</td>
										<td width="158"><input type="checkbox" name="course3" value="BITE" <?php if(isset($_POST['course3'])) echo "checked='checked'"; ?>>BITE</td>
										<td width="131" colspan="3"><input type="checkbox" name="course4" value="BITD" <?php if(isset($_POST['course4'])) echo "checked='checked'"; ?>>BITD</td>
										
									 </tr>
									<tr>
										<td align="left">&nbsp;</td>
										<td>:</td>
										<td><input type="checkbox" name="course5" value="BITC" <?php if(isset($_POST['course5'])) echo "checked='checked'"; ?>>BITC</td>
										<td><input type="checkbox" name="course6" value="BITI" <?php if(isset($_POST['course6'])) echo "checked='checked'"; ?>>BITI </td>
										<td colspan="4"><input type="checkbox" name="course7" value="BITZ" <?php if(isset($_POST['course7'])) echo "checked='checked'"; ?>>BITZ</td>
									
									</tr>
									</table>
									  
										    
										</div>
									    </div>
										<div class="form-group">
									
										<div class="col-xs-12 col-sm-9">
												<table width="689">
									<tr>
										<td width="135" align="left">Workshop</td>
										<td width="10">:</td>
										<td width="223"><input type="checkbox" name="workshop1" value="1" <?php if(isset($_POST['workshop1'])) echo "checked='checked'"; ?>>Workshop 1</td>
										<td width="305" colspan="5"><input type="checkbox" name="workshop2" value="2" <?php if(isset($_POST['workshop2'])) echo "checked='checked'"; ?>>Workshop 2</td>
										
									</tr>
									</table>
											  <input name="search" type="submit" id="search" value="Search" />
										</div>
										
									    </div>
										
									</form>			

									</div>
									</div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
		                        <p><a href="javascript:window.open('assignDueSubmisionFR.php','mywindowtitle','width=800,height=700')"><input type="button" value="Assign Submission Date"></a></p>
								 <h6 align="right"> Total Student : <?php echo $rowCount['Total']; ?> / <?php echo $rowCountA['TotalAll']; ?>  </h6>
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
														<th>View Document</th>
														
											
													</tr>
												</thead>
												 	<?php
													$num = 0;
													
													
												while(@$row=mysqli_fetch_array($querySelect))
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
														<td><p>	<i class="menu-icon fa fa-upload"></i>&nbsp;<a href="Documents/Final Report/<?php echo $row['sourceFR']; ?>"  ><?php echo $row['sourceFR']; ?></a></p></td>
												
													</tr>
													<?php };?>
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
