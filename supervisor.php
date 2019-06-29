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

	  <div id="sidebar" class="sidebar responsive ace-save-state">
			  <script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script><!-- /.sidebar-shortcuts -->
                                                        <!----navigation-->
				<ul class="nav nav-list">
				<!-- admin   -->
					<?php
					if(@$_SESSION['position'] == "1" ) 
					{ ?>
					<li class="">
						<a href="main.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

                    <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-info "></i>
							<span class="menu-text"> Information </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="lecturerInfo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Lecturer
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="studentInfo.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Student
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-group "></i>
							<span class="menu-text"> Assignation </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="supervisor.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Supervisor
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="committee.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Committee
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
										
					<li class="">
						<a href="changePassword.php">
							<i class="menu-icon fa fa-lock"></i>
							<span class="menu-text"> Change Password </span>
						</a>

						<b class="arrow"></b>
					</li>	

					<li class="">
						<a href="logoutAdmin.php">
							<i class="menu-icon fa fa-sign-out"></i>
							<span class="menu-text"> Sign Out </span>
						</a>

						<b class="arrow"></b>
					</li>
         			<!-- committee   -->
					<?php
					}
					else if(@$_SESSION['position'] == "2" ) 
					{ ?>
					<li class="">
						<a href="main.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					<li class="">
						<a href="profile.php">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> My Profile </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="appointmentSupervisor.php">
							<i class="menu-icon fa fa-calendar-o "></i>
							<span class="menu-text"> Appointment </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> List </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="listStudent_Supervise.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Student to Supervise
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="proposalS.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Student's Proposal
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="finalReportS.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Student's Final Report
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-group"></i>
							<span class="menu-text"> Assignation </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="supervisor1.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Workshop 1
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
							<ul class="submenu">
							<li class="">
								<a href="supervisor2.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Workshop 2
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="changePassword.php">
							<i class="menu-icon fa fa-lock"></i>
							<span class="menu-text"> Change Password </span>
						</a>

						<b class="arrow"></b>
					</li>	

					<li class="">
						<a href="logout.php">
							<i class="menu-icon fa fa-sign-out"></i>
							<span class="menu-text"> Sign Out </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					
					
					<!-- supervisor  -->
					<?php }
					else if (@$_SESSION['position'] == "3" )
					{ ?>
					<li class="">
						<a href="main.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					<li class="">
						<a href="profile.php">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> My Profile </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					<li class="">
						<a href="appointmentSupervisor.php">
							<i class="menu-icon fa fa-calendar-o "></i>
							<span class="menu-text"> Appointment </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> List of Student </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="listStudent_Supervise.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Supervise
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="changePassword.php">
							<i class="menu-icon fa fa-lock"></i>
							<span class="menu-text"> Change Password </span>
						</a>

						<b class="arrow"></b>
					</li>	
					<li class="">
						<a href="logout.php">
							<i class="menu-icon fa fa-sign-out"></i>
							<span class="menu-text"> Sign Out </span>
						</a>

						<b class="arrow"></b>
					</li>
					<!-- student  -->
					<?php }
					else if (@$_SESSION['position'] == "4" )
					{ ?>
					
					<li class="">
						<a href="main.php">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					<li class="">
						<a href="profile.php">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> My Profile </span>
						</a>

						<b class="arrow"></b>
					</li>
					
					<li class="">
						<a href="appointment.php">
							<i class="menu-icon fa fa-calendar-o "></i>
							<span class="menu-text"> Appointment </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-folder-o "></i>
							<span class="menu-text"> Documents </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="proposal.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Proposal
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="logbook.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Log Book
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
								<a href="finalReport.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Final Report
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
										<li class="">
						<a href="changePassword.php">
							<i class="menu-icon fa fa-lock"></i>
							<span class="menu-text"> Change Password </span>
						</a>

						<b class="arrow"></b>
					</li>	
					<li class="">
						<a href="logout.php">
							<i class="menu-icon fa fa-sign-out"></i>
							<span class="menu-text"> Sign Out </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php }?>
			  </ul>
              
              <!-- /.nav-list -->



				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

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
		 @$department2=$_POST['department2'];
		 @$department3=$_POST['department3'];
		 @$department4=$_POST['department4'];
		
		 @$position1=$_POST['position1'];
		 @$position2=$_POST['position2'];
		
		if($position1 == '' && $position2=='' )
		{
			$query=mysqli_query($dba,"call select_searchSupervisor('".$department1."','".$department2."','".$department3."' ,'".$department4."')")or die();	
			mysqli_next_result($dba);
		}
		else if ($department1 == '' && $department2=='' && $department3 == '' && $department4=='' )
		{
			$query=mysqli_query($dba,"call select_searchSupervisor2('".$position1."','".$position2."' )")or die();
			mysqli_next_result($dba);
			
		}
		else
		{
			$query=mysqli_query($dba,"call select_searchSupervisor3('".$department1."', '".$department2."','".$department3."','".$department4."','".$position1."' ,'".$position2."'  )") or die();	
			mysqli_next_result($dba);
				
		}
		}
		else
		{
			$query=mysqli_query($dba,"call select_searchSupervisor4") or die();
			mysqli_next_result($dba);
		}

?> 
	<div class="page-header">
							<h1>
								Supervisor Assignation
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
										
								
								
									<div class="tab-content profile-edit-tab-content">
		                            <div id="edit-basic" class="tab-pane in active">
							
									<form class="form-horizontal" role="form" method="post" action="supervisor.php">
										<div class="form-group">
										
										<div class="col-xs-12 col-sm-9">
								    
								        	<table width="300" border="0">
											  <tbody>
												<tr>
												  <td width="113">Department</td>
												  											 
												
												  <td width="84"><input type="checkbox" name="department1" value="SE" <?php if(isset($_POST['department1'])) echo "checked='checked'"; ?> >SE</td>
												  
												  <td width="91"><input type="checkbox" name="department2" value="BITC" <?php if(isset($_POST['department2'])) echo "checked='checked'"; ?>>BITC</td>
												</tr>
												<tr>
												  <td>&nbsp;</td>
												
												  <td><input type="checkbox" name="department3" value="BITI" <?php if(isset($_POST['department3'])) echo "checked='checked'"; ?>>BITI</td>
												
												  <td><input type="checkbox" name="department4" value="MI" <?php if(isset($_POST['department4'])) echo "checked='checked'"; ?>>MI </td>
												</tr>
											  </tbody>
											</table>
									  
										</div>
									    </div>
										<div class="form-group">
									
										<div class="col-xs-12 col-sm-9">
										<table width="334" border="0">
											  <tbody>
												<tr>
												  <td width="113">Position</td>
												
												  <td width="84"><input type="checkbox" name="position1" value="3" <?php if(isset($_POST['position1'])) echo "checked='checked'"; ?>>Supervisor</td>
												  
												  <td width="123"><input type="checkbox" name="position2" value="2" <?php if(isset($_POST['position2'])) echo "checked='checked'"; ?>>Committee</td>
												</tr>
											
											  </tbody>
											</table>
				
											  <input name="search" type="submit" id="search" value="Search" />
										</div>
										
									    </div>
										
									</form>			

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
														<th>Assignation</th>
													</tr>
												</thead>
												  <?php
													$num = 0;
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
														<td align="center"><?php echo $row['totalSupervisee'];?></td>
														
															<td>
														<p><a href="javascript:window.open('assignSupervisee.php?staff_ID=<?php echo $row['staffID'];?>','mywindowtitle','width=1200,height=800')"><input type="button" value="Assign Supervisee"></a></p>
														
														</td>
								
								
														
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
