<?php
session_start();
include 'conn/dbconnection.php';
 if (@$_SESSION['password'] == "")
 {
	echo "<script> alert('Log In unsuccessful.');</script>";
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=index.php">';
 }

 else {}			
	
@$staffID = $_POST['staffID'];

	$select = "call view_staffskgas('".$_REQUEST['staffID']."')";
	$pcdf_select =mysqli_query($dba,$select) or die (mysqli_error());
	mysqli_next_result($dba);
	$row = mysqli_fetch_array($pcdf_select);

	if(isset($_REQUEST['submit']))	{

		$arr2 = array('Yes'=> 1,'No'=> 0);
		$eLearning=$arr2[$_REQUEST['eLearning']];
		$heartMind=$arr2[$_REQUEST['heartMind']];
		$DCS=$arr2[$_REQUEST['DCS']];
		$OTS=$arr2[$_REQUEST['OTS']];
		$oralInterview=$arr2[$_REQUEST['oralInterview']];
		$MME=$arr2[$_REQUEST['MME']];

			// $update = "call update_staffpma('".$staffID."','".$staffName."','".$trade."','".$region."','".$locationS."','".$jobGrade."','".$retirementDate."','".$statusA."','".$eLearning."','".$heartMind."','".$DCS."','".$OTS."','".$oralInterview."','".$MME."')";
			$update = "call update_staffskgas('".$_REQUEST['staffID']."','".$_REQUEST['staffName']."','".$_REQUEST['trade']."','".$_REQUEST['region']."','".$_REQUEST['locationS']."','".$_REQUEST['jobGrade']."','".$_REQUEST['retirementDate']."','".$_REQUEST['statusA']."','".$eLearning."','".$heartMind."','".$DCS."','".$OTS."','".$oralInterview."','".$MME."','".$_REQUEST['remarks']."')";
			$essms_update = mysqli_query($dba,$update);
			mysqli_next_result($dba);
		  
			if ($essms_update) {
				echo "<script>alert('Staff has been updated!')</script>";
				echo "<script>
				window.onunload = refreshParent;
				function refreshParent() {
				window.opener.location.reload(); }
				window.close()
				</script>";
			} else {
				echo "<script> alert('Unsuccessful. Please try again!')
				window.close()</script>";
			}
	}

		if(isset($_REQUEST['delete']))	{

			$delete = "call delete_staffskgas('".$_REQUEST['staffID']."')";
			$essms_delete = mysqli_query($dba,$delete);
			mysqli_next_result($dba);
		
			if ($essms_delete) {
				echo "<script>alert('Staff has been deleted!')</script>";
				echo "<script>
				window.onunload = refreshParent;
				function refreshParent() {
				window.opener.location.reload(); }
				window.close()
				</script>";
			} else {
				echo "<script> alert('Unsuccessful. Please try again!')</script>";
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=editInfoS.php">';
			}
	}
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
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
				 <img src="assets/img/petronass.png" width="169" height="29" class="img-responsive" />
				</div>
                <font size="+2">&nbsp;&nbsp;Panelman Competency Development Framework </font>
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
							
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php $arr = array(1=> 'Yes', 0 => 'No');?>
									<div id="user-profile-3" class="user-profile row">
										<div class="col-sm-offset-1 col-sm-10">

											<div class="space"></div>

											<form class="form-horizontal" action="" method="post">
												<div class="tabbable">
											
													<div class="tab-content profile-edit-tab-content">
													<div id="edit-basic" class="tab-pane in active">
									
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Staff ID : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<input type="text" name="staffID" id="staffID" readonly
                       												 placeholder="" class="form-control" value="<?php echo $row['staffID'];?>">
																	</span>
																</div>
															</div>
															
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Staff Name : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<input type="text" name="staffName" id="staffName" readonly
                       												 placeholder="" class="form-control" value="<?php echo $row['staffName'];?>">
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Trade : </label>
																<div class="col-sm-9">
																<span class="input-icon input-icon-right">
																	<select name="trade" id="trade" class="form-control" value="<?php echo $row['trade'];?>">
																		<option><?php echo $row['trade'];?></option>
																		<option>Technician (DS-Panel)</option>
																		<option>Technician (DS-Production/Instrument)</option>
																		<option>Technician (DS-Production/Mechanical)</option>
																		<option>Technician (DS-Instrument/Production)</option>
																	</select>
																</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Region : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<input type="text" name="region" id="region" readonly
                       												 placeholder="" class="form-control" value="<?php echo $row['region'];?>">
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Location : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<input type="text" name="locationS" id="locationS" 
                       												 placeholder="" class="form-control" value="<?php echo $row['locationS'];?>">
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Job Grade : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<select name="jobGrade" id="jobGrade" class="form-control">
																		<option><?php echo $row['jobGrade'];?></option>
																		<option>NT2</option>
																		<option>NT3</option>
																		<option>NT4</option>
																		<option>NT5</option>
																	</select>																
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Retirement Date : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">	
																	<input type="date" name="retirementDate" id="retirementDate" value="<?php echo $row['retirementDate'];?>" class="form-control">					
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Status : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<select name="statusA" id="statusA" class="form-control">
																		<option><?php echo $row['statusA'];?></option>
																		<option>Successor</option>
																		<option>Certified</option>
																	</select>																
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">E-Learning : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<select name="eLearning" id="eLearning" class="form-control">
																		<option><?php echo $arr[$row['eLearning']];?></option>
																		<option>Yes</option>
																		<option>No</option>
																	</select>
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Heart & Minds : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<select name="heartMind" id="heartMind" class="form-control">
																		<option><?php echo $arr[$row['heartMind']];?></option>
																		<option>Yes</option>
																		<option>No</option>
																	</select>																
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">DCS : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<select name="DCS" id="DCS" class="form-control">
																		<option><?php echo $arr[$row['DCS']];?></option>
																		<option>Yes</option>
																		<option>No</option>
																	</select>
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">OTS : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<select name="OTS" id="OTS" class="form-control">
																		<option><?php echo $arr[$row['OTS']];?></option>
																		<option>Yes</option>
																		<option>No</option>
																	</select>
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Oral Interview : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<select name="oralInterview" id="oralInterview" class="form-control">
																	<option><?php echo $arr[$row['oralInterview']];?></option>
																		<option>Yes</option>
																		<option>No</option>
																	</select>			
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">MME : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<select name="MME" id="MME" class="form-control" >	
																		<option><?php echo $arr[$row['MME']];?></option>
																		<option>Yes</option>
																		<option>No</option>
																	</select>					
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Remarks : </label>
																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<textarea name="remarks" id="remarks" placeholder="" class="form-control">
																		<?php echo $row['remarks'];?>
																	</textarea>
																	</span>
																</div>
															</div>
															<center>
															<div class="space-4"></div>
																  <input name="submit" type="submit" id="submit" value="Update" />
																	<!-- <input name="submit" type="submit" id="submit" value="Delete" /> -->
																	<input name="delete" type="submit" id="delete" value="Delete" onclick="return confirm('Do you want to delete the Staff ?')" />
															</div>
															</center>
															</form>
														</div>
														</div>
														</div>
										</div><!-- /.span -->
									</div><!-- /.user-profile -->
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
							</a>pcdf</span> &copy; 2019
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



