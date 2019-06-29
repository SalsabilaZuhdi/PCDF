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
	$select = "call select_changePass('".$id."')";

	$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
	mysqli_next_result($dba);
	$row = mysqli_fetch_array($essms_select);
		if(isset($_REQUEST['submit']))
		{
				$update = "call update_changePassword('".$id."','".$_REQUEST['pass']."')";
				
				$essms_update = mysqli_query($dba,$update);
				mysqli_next_result($dba);
				if ($essms_update) 
				{
				    echo "<script> alert('Your password has been change!')</script>";
					echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=changePassword.php">';
				}
				else
				{
					echo "<script> alert('Unsuccessful. Please try again!')</script>";
					echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=changePassword.php">';
				}
		}
	}
	else
	{
		
	$select = "call select_changePassL('".$id."')";

	$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
	mysqli_next_result($dba);
	$row = mysqli_fetch_array($essms_select);
	    if(isset($_REQUEST['submit']))
		{
				$update = "call update_changePass('".$id."','".$_REQUEST['pass']."')";
				
				$essms_update = mysqli_query($dba,$update);
				mysqli_next_result($dba);
			  
				if ($essms_update) 
				{
		
					echo "<script> alert('Your password has been change!')</script>";
					echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=changePassword.php">';
				}
				else
				{
					echo "<script> alert('Unsuccessful. Please try again!')</script>";
					echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=changePassword.php">';
				}
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
	<script type="text/javascript">
function checkPass()
{
    //Store the password field objects into variables ...
    var password = document.getElementById('pass');
    var confirmPassword = document.getElementById('confirmPass');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(password.value == confirmPassword.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        confirmPassword.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        confirmPassword.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  
</script>
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
		<div class="page-header">
							<h1>
								Change Password
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                      
									<div id="user-profile-3" class="user-profile row">
										<div class="col-sm-offset-1 col-sm-10">

											<div class="space"></div>

											<form class="form-horizontal" action="" method="post">
												<div class="tabbable">
													<ul class="nav nav-tabs padding-16">
														<li class="active">
															<a data-toggle="tab" href="#edit-basic">
																<i class="blue ace-icon fa fa-key bigger-125"></i>
																Change Password
															</a>
														</li>
													</ul>

													<div class="tab-content profile-edit-tab-content">
																						<?php
													if(@$_SESSION['position'] == "1" ) 
													{ ?>
													<div id="edit-basic" class="tab-pane in active">
														<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right">Current Password : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																		<h5><?php echo $row['password'];?></h5>
																	</span>
																</div>
															</div>
														<div class="space-4"></div>
													     <div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">New Password : </label>

																<div class="col-sm-9">
																	<input type="password"  name="pass"  id="pass" required=""/>
																</div>
															</div>

															<div class="space-4"></div>

															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Confirm Password : </label>

																<div class="col-sm-9">
																	<input type="password" name="confirmPass"  id="confirmPass" onKeyUp="checkPass(); return false;" required=""/>
																</div>
															</div>

														

														</div>
											
														
													<?php }
													else if(@$_SESSION['position'] == "4" ) 
													{ ?>
													<div id="edit-basic" class="tab-pane in active">
														<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" >Current Password : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																		<h5><?php echo $row['password'];?></h5>
																	</span>
																</div>
															</div>
														<div class="space-4"></div>
													     <div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">New Password : </label>

																<div class="col-sm-9">
																	<input type="password"  name="pass"  id="pass" required=""/>
																</div>
															</div>

															<div class="space-4"></div>

															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Confirm Password : </label>

																<div class="col-sm-9">
																	<input type="password" name="confirmPass"  id="confirmPass" onKeyUp="checkPass(); return false;" required=""/>
																</div>
															</div>

														

														</div>
											
														
														<?php }
														else 
														{ ?>
													<div id="edit-basic" class="tab-pane in active">
													<div class="space-4"></div>
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" >Current Password : </label>

																<div class="col-sm-9">
																	<span class="input-icon input-icon-right">
																		<h5><?php echo $row['password'];?></h5>
																	</span>
																</div>
															</div>		
													<div class="space-4"></div>
													     <div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">New Password : </label>

																<div class="col-sm-9">
																	<input type="password" name="pass"  id="pass" required=""/>
																</div>
															</div>

															<div class="space-4"></div>

															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Confirm Password : </label>

																<div class="col-sm-9">
																	<input type="password" name="confirmPass"  id="confirmPass" onKeyUp="checkPass(); return false;"required=""/>
																</div>
															</div>

													
														</div>
								
														
														<?php } ?>
														</div>
																			<div class="clearfix form-actions">
																<div class="col-md-offset-3 col-md-9">
		                                                        <input name="submit" type="submit" id="submit" value="Change Password" />

																	&nbsp; &nbsp;
																	
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



