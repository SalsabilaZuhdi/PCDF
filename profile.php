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
   if(@$_SESSION['position'] == "4" ) 
	{
		$select = "call select_profileStudent('".$id."')";
		//$select = "select * from  student  left join lecturer  ON  student.lecturerID = lecturer.staffID where matricNum= '".$id."'";

		$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
		mysqli_next_result($dba);
		$row = mysqli_fetch_array($essms_select);
		
		if(isset($_REQUEST['submit']))
		{
			$update = "call update_profileStudent('".$id."','".$_REQUEST['email']."','".$_REQUEST['phonenum']."')";
			$essms_update = mysqli_query($dba,$update);
			mysqli_next_result($dba);
			
				if ($essms_update) 
				{
				    echo "<script> alert('Your profile has been updated!')</script>";
					echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=profile.php">';
				}
				else
				{
					echo "<script> alert('Unsuccessful. Please try again!')</script>";
					echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=profile.php">';
				}
		}
	}
	    //supervisor and committee
	else
	{
		
		$select = "call select_profileLecturer('".$id."')";
		$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
		mysqli_next_result($dba);
		$row = mysqli_fetch_array($essms_select);
	    if(isset($_REQUEST['submit']))
		{
				$update = $update = "call update_profileLecturer('".$id."','".$_REQUEST['email']."','".$_REQUEST['phonenum']."', '".$_REQUEST['bio']."')";
				
				$essms_update = mysqli_query($dba,$update);
				mysqli_next_result($dba);
			
			  
				if ($essms_update) 
				{
		
					echo "<script> alert('Your profile has been updated!')</script>";
					echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=profile.php">';
				}
				else
				{
					echo "<script> alert('Unsuccessful. Please try again!')</script>";
					echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=profile.php">';
				}
		}

	}
		
	

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
								My Profile
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                      
									<div id="user-profile-3" class="user-profile row">
										<div class="col-sm-offset-1 col-sm-10">

											<div class="space"></div>

											<form class="form-horizontal" action="" method="post">
												
													<?php
										            if(@$_SESSION['position'] == "4" ) 
													{ ?>
												<div class="tabbable">
													<ul class="nav nav-tabs padding-16">
														<li class="active">
															<a data-toggle="tab" href="#edit-basic">
																<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
																Student Info
															</a>
														</li>
														<li>
															<a data-toggle="tab" href="#edit-infoL">
															<i class="purple ace-icon fa fa-pencil-square-o bigger-125"></i>
																Supervisor Info
															</a>
														</li>
													</ul>

													<div class="tab-content profile-edit-tab-content">
													<div id="edit-basic" class="tab-pane in active">
														
														    <div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" >Matric Number : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																		<h5><?php echo $row['matricNum'];?></h5>
														
																	</span>
																</div>
															</div>

															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" >Name : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<h5><?php echo $row['studentName'];?></h5>
																		
														
																	</span>
																</div>
															</div>

															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-email">Email : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																		<input type="email" name="email" id="email" size="40"  value="<?php echo $row['studentEmail'];?>" required=""/>
																		<i class="ace-icon fa fa-envelope"></i>
																	</span>
																</div>
															</div>

															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-phone">Phone : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	
																		<input type="text"  name="phonenum" id="phonenum" onKeyPress="return IsNumeric(event);" onpaste="return false;" ondrop = "return false;" placeholder="eg: 012xxxxxxx" value="<?php echo $row['studentPhoneNum'];?>" required=""/>
																		</br>
																		<span id="error1" style="color: Red; display: none"><b>* Input Digits (0 - 9)</b></span>
																				<script type="text/javascript">
																					var specialKeys = new Array();
																					specialKeys.push(8); //Backspace
																					function IsNumeric(e) {
																						var keyCode = e.which ? e.which : e.keyCode
																						var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
																						document.getElementById("error1").style.display = ret ? "none" : "inline";
																						return ret;
																					}
																				</script>
																		<i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
																	</span>
																</div>
															</div>

			                                                <div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Supervisor : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																		<h5><?php echo $row['lecturerName'];?></h5>
														
																	</span>
																</div>
															</div>
															
															 <div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Status : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																		<h5><?php echo $row['statusAssign'];?></h5>
														
																	</span>
																</div>
															</div>

														</div>
																<div id="edit-infoL" class="tab-pane">
														<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Name : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<h5><?php echo $row['lecturerName'];?></h5>
														
																	</span>
																</div>
															</div>

															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-email">Email : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<h5><?php echo $row['lecturerEmail'];?></h5>
															
																	</span>
																</div>
															</div>

															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-phone">Phone : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<h5><?php echo $row['lecturerPhoneNum'];?></h5>
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<h4 class="widget-title smaller"><i class="ace-icon fa fa-check-square-o bigger-110"></i>Interesting with : </h4>
																
										                        <textarea cols="100" rows="5" name="bio" id="bio" placeholder="<?php echo $row['bio'];?>" disabled></textarea>
															</div>
														</div>
														</div>
														
												</div>
																			<div class="clearfix form-actions">
																<div class="col-md-offset-3 col-md-9">
		                                                        <input name="submit" type="submit" id="submit" value="Update Profile" />

																	&nbsp; &nbsp;
																	
																</div>
															</div>
															</form>

														<?php }
														else 
														{ ?>
													<div class="tabbable">
													<ul class="nav nav-tabs padding-16">
														<li class="active">
															<a data-toggle="tab" href="#edit-basic">
																<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
																Lecturer Info
															</a>
														</li>
												
													</ul>

													<div class="tab-content profile-edit-tab-content">
													<div id="edit-basic" class="tab-pane in active">
														
														    <div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Staff ID : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<h5><?php echo $_SESSION['id'];?></h5>
														
																	</span>
																</div>
															</div>

															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Name : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	<h5><?php echo $row['lecturerName'];?></h5>
														
																	</span>
																</div>
															</div>

															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-email">Email : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																		<input type="email" name="email" id="email" size="40" value="<?php echo $row['lecturerEmail'];?>" required=""/>
																		<i class="ace-icon fa fa-envelope"></i>
																	</span>
																</div>
															</div>

															<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-phone">Phone : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																	
																		<input type="text"  name="phonenum" id="phonenum" onKeyPress="return IsNumeric(event);" onpaste="return false;" ondrop = "return false;" placeholder="eg: 012xxxxxxx" value="<?php echo $row['lecturerPhoneNum'];?>" required=""/>
																		</br>
																		<span id="error1" style="color: Red; display: none"><b>* Input Digits (0 - 9)</b></span>
																				<script type="text/javascript">
																					var specialKeys = new Array();
																					specialKeys.push(8); //Backspace
																					function IsNumeric(e) {
																						var keyCode = e.which ? e.which : e.keyCode
																						var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
																						document.getElementById("error1").style.display = ret ? "none" : "inline";
																						return ret;
																					}
																				</script>
																		<i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
																	</span>
																</div>
															</div>
															<div class="space-4"></div>
															<div class="form-group">
																<h4 class="widget-title smaller"><i class="ace-icon fa fa-check-square-o bigger-110"></i>Interesting</h4>
																<p><font color="red">*Place your interesting title and programming language for your student's project.</font></p>
										                        <textarea cols="100" rows="5" name="bio" id="bio" required=""><?php echo $row['bio'];?></textarea>
															</div>
														</div>
								
															</div>
																			<div class="clearfix form-actions">
																<div class="col-md-offset-3 col-md-9">
		                                                        <input name="submit" type="submit" id="submit" value="Update Profile" />

																	&nbsp; &nbsp;
																	
																</div>
															</div>
															</form>
														
								
								

														</div>
														<?php } ?>
													
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
							</a>eSSMS</span> &copy; 2017
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



