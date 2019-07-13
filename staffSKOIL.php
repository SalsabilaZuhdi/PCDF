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
		<title>pcdf</title>

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
		<div id="navbar" class="navbar navbar-default ace-save-state" style="background-color:#00B1A9;">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
				 <img src="assets/img/petronass.png" width="75" height="40" class="img-responsive" style="padding-bottom:10px;"/>
				</div>
		  <h2 style="padding-top:10px; color:white;" >&nbsp;&nbsp;Panelman Competency Development Framework</h2>
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
							@$jobGrade1=$_POST['jobGrade1'];
							@$jobGrade2=$_POST['jobGrade2'];
							@$jobGrade3=$_POST['jobGrade3'];
							@$jobGrade4=$_POST['jobGrade4'];
							@$jobGrade5=$_POST['jobGrade5'];
		
							$query=mysqli_query($dba,"call select_staffskoil('".$jobGrade1."','".$jobGrade2."','".$jobGrade3."','".$jobGrade4."','".$jobGrade5."')") or die();	
							mysqli_next_result($dba);
								
						 }
						else
						{
							@$jobGrade1=$_POST['jobGrade1'];
							@$jobGrade2=$_POST['jobGrade2'];
							@$jobGrade3=$_POST['jobGrade3'];
							@$jobGrade4=$_POST['jobGrade4'];
							@$jobGrade5=$_POST['jobGrade5'];

							$query=mysqli_query($dba,"call select_staffskoil('".$jobGrade1."','".$jobGrade2."','".$jobGrade3."','".$jobGrade4."','".$jobGrade5."')") or die();	
							mysqli_next_result($dba);
						}
						
						if(isset($_REQUEST['delete']))
						{
						   mysqli_query($dba,"call delete_all_staffskoil") or die();	
						   $result=mysqli_next_result($dba);
							echo "<script type=\"text/javascript\">
							alert(\"All data succesfully deleted\");
							window.location = \"staffSKOIL.php\"
							</script>";		
						}
						 
						?> 
	<div class="page-header">
							<h1>
								Staff's Information SK OIL
							</h1>
						</div><!-- /.page-header -->
	<div class="row">
							<div class="col-xs-12">
							<div class="tab-content profile-edit-tab-content">
		                            <div id="edit-basic" class="tab-pane in active">
									<form class="form-horizontal" role="form" method="post" >
												<div class="form-group">
										
								        	<table width="689">
									<tr>
										<td width="135">Job Grade</td>
										<td width="10">:</td>
										<td width="126"><input type="checkbox" name="jobGrade1" value="NT1" <?php if(isset($_POST['jobGrade1'])) echo "checked='checked'"; ?>>NT1</td>
										<td width="101"><input type="checkbox" name="jobGrade2" value="NT2" <?php if(isset($_POST['jobGrade2'])) echo "checked='checked'"; ?>>NT2</td>
										<td width="158"><input type="checkbox" name="jobGrade3" value="NT3" <?php if(isset($_POST['jobGrade3'])) echo "checked='checked'"; ?>>NT3</td>
										
									 </tr>
									<tr>
										<td align="left">&nbsp;</td>
										<td>:</td>
										<td><input type="checkbox" name="jobGrade4" value="NT4" <?php if(isset($_POST['jobGrade4'])) echo "checked='checked'"; ?>>NT4</td>
										<td colspan="4"><input type="checkbox" name="jobGrade5" value="NT5" <?php if(isset($_POST['jobGrade5'])) echo "checked='checked'"; ?>>NT5</td>
									
									</tr>
									</table>
									  <input name="search" type="submit" id="search" value="Search" />
									  </div>
									</form>
									
									</div>
									</div>
					                <form class="form-horizontal" action="functionsSKOIL.php" method="post" name="upload_excel" enctype="multipart/form-data">
                  


				  <fieldset>

                        <!-- Form Name -->
                        <legend>Import And Export CSV file data</legend>

                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large" required>
                            </div>
                        </div>
						
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                            </div>
                        </div>
						
                    </fieldset>
					</form>
				    <div>
					<form class="form-horizontal" action="functionsSKOIL.php" method="post" name="upload_excel" enctype="multipart/form-data">
						<div class="form-group">
									<div class="col-md-4 col-md-offset-4">
										<input type="submit" name="Export" class="btn btn-success" value="Export to excel"/>
									</div>
						</div>                    
					</form>           
					</div>
											<h6>
							
							</h6>
									<form class="form-horizontal" role="form" method="post">
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>No. </th>
														<th>Staff ID</th>
														<th>Staff Name</th>
														<th>Trade</th>
														<th>Region</th>
														<th>Location</th>
														<th>Job Grade</th>
														<th>Retirement Date</th>		
														<th>Status</th>
														<th>E-Learning</th>
														<th>Hearts & Minds</th>
														<th>DCS</th>
														<th>OTS</th>
														<th>Oral Interview</th>
														<th>MME</th>
														<th></th>
													</tr>
												</thead>
												  <?php
													$arr = array(1 => 'Yes', 0 => 'No');
													$num = 0;
												  while($row=mysqli_fetch_array(@$query))
												  {
												  ?>
												<tbody>
													<tr>
														<td><?php echo ++$num;?></td>
														<td><?php echo $row['staffID'];?></td>
														<td><?php echo $row['staffName'];?></td>
														<td><?php echo $row['trade'];?></td>
														<td><?php echo $row['region'];?></td>
														<td><?php echo $row['locationS'];?></td>
														<td><?php echo @$row['jobGrade'];?></td>
														<td><?php 
														$date = $row['retirementDate'];
														echo date("d.m.Y", strtotime($date));
														?></td>
														<td><?php echo $row['statusA'];?></td>
														<td><?php echo $arr[$row['eLearning']];?></td>
														<td><?php echo $arr[$row['heartMind']];?></td>
														<td><?php echo $arr[$row['DCS']];?></td>
														<td><?php echo $arr[$row['OTS']];?></td>
														<td><?php echo $arr[$row['oralInterview']];?></td>
														<td><?php echo $arr[$row['MME']];?></td>
													
														<td align="center">
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="green" href="javascript:window.open('viewSKOIL.php?staffID=<?php echo $row['staffID'];?>','mywindowtitle','width=800,height=700')">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>
															</div>

														</td>
								
								
														
													</tr>
													<?php };?>
													</tbody>
		                                           </table>
												      <!-- Form Name -->
								 					<legend>Delete All Data</legend>

													<!-- File Button -->
													<div class="form-group">
														<div class="col-md-4">
														<button type="submit" id="delete" name="delete" class="btn btn-danger"  onclick="return confirm('Do you want to delete all SK OIL staff ?')">Delete</button>
														</div>
													</div>
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
							</a>PCDF</span> &copy; 2019
						</span>

						&nbsp; &nbsp;
						
					</div>
				</div>
			</div>
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

