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
		
		$select = "call select_lecturerID('".$id."')";
		$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
		mysqli_next_result($dba);
		$row = mysqli_fetch_array($essms_select);
		$sem = $row['semester'];
			
			$select2 = "call select_finalReport3('".$id."')";
			$essms_select2 =mysqli_query($dba,$select2) or die (mysqli_error());
			mysqli_next_result($dba);
			$row2 = mysqli_fetch_array($essms_select2);
		
	
	if(isset($_REQUEST['submit']))
	{
			$selectL = "call select_finalReport3('".$id."')";
			$essms_selectL =mysqli_query($dba,$selectL) or die (mysqli_error());
			mysqli_next_result($dba);
			$rowL = mysqli_fetch_array($essms_selectL);
			if ($rowL['countFinalReport'] >= 1)
		{echo "<script>alert('You can upload final report 5 times only!')</script>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=finalreport.php">'; 
		}
		else
		{
		$selectC = "call select_countFinalReport";
	    $essms_selectC =mysqli_query($dba,$selectC) or die (mysqli_error());
		mysqli_next_result($dba);
		$row = mysqli_fetch_array($essms_selectC);
		$totalRows = $row['totalRows'];
		@$count += $totalRows;
		
		//select last numbering
		$selectN = "call select_maxCountFinalReport";
	    $essms_selectN=mysqli_query($dba,$selectN) or die (mysqli_error());
		mysqli_next_result($dba);
		$numbering = mysqli_fetch_array($essms_selectN);
		$number = $numbering['maxNumber'];

		@list($part1, $part2,$part3) = explode('_', @$number);
		$maxNumber=$part3;
		if($count<1)
		{
			$lastcount= $count;
		}
		else
		{
			
			$lastcount = $maxNumber + 1;
		}
		
	    $year = date("Y");
		
		//Data dalam Report table
		//reportID
		//title
		//typeOfWorkshop
		//matricNum
		
		$Ins_title = $row2['title'];
		$Ins_typeOfWorkshop = $_REQUEST['typeOfWorkshop']; 
		$Ins_matricNum = $_REQUEST['id']; 
		//$Ins_lecturerID = $row['lecturerID']; 
		
		//Data dalam table proposal
		/* proposalID
		reportID
		abstract
		sourceP
		submissiondate
		statusSubmission
		
		remarks (taknak)
		reportType
		workshopType
		mark
		*/
		
 		@$finalReportID_insert =  "FR0".$sem."_".$year."_".$lastcount; 
		@$Ins_fileFR= $_FILES['fileFR']['name']; 
		@$target ="Documents/Final Report/";
		@$target=$target.basename(@$_FILES['fileFR']['name']);
		move_uploaded_file(@$_FILES['fileFR']['name'],$target);
		$Ins_submissiondate = $_REQUEST['submissiondate'];
		$Ins_statusProject= "Pending Approval"; 
		$Ins_type="Final Report";

		
		//First time upload proposal, check dulu dalam table report existed or tak,kalau existed just update title dalam table report
		$selectcheck = "call select_finalreport4('".$Ins_matricNum."')";
		$essms_selectcheck =mysqli_query($dba,$selectcheck) or die (mysqli_error());
		mysqli_next_result($dba);
		$rowcheck = mysqli_fetch_array($essms_selectcheck);
	
			$Ins_reportID= $rowcheck['reportID'];
			
			$insertreport = "call insert_finalReport('".$Ins_reportID ."','".$finalReportID_insert ."','".$Ins_submissiondate ."','".$Ins_statusProject ."','".$Ins_fileFR ."','".$Ins_type ."')";
			$essms_insertfinalReport = mysqli_query($dba,$insertreport);
			mysqli_next_result($dba);
			
	
		if(@$essms_insertfinalReport)
		{
			move_uploaded_file($_FILES['fileFR']['tmp_name'], $target);
			echo "<script>alert('Upload Successful')</script>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=finalReport.php">'; 
		}
		else
		{
			echo "<script>alert('Process Unsuccessful')</script>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=finalReport.php">';

		} 
	}
	}
	
	//}
	
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
								Final Report
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
                      
									<div id="user-profile-3" class="user-profile row">
										<div class="col-sm-offset-1 col-sm-10">

												<div class="space"></div>


											<form class="form-horizontal" action="finalReport.php" method="post" >
											<button class="btn btn-primary">
												<i class="ace-icon fa fa-undo align-top bigger-125"></i>
												Back
											</button>
											</form>
											<div class="space"></div>
											<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
												<div class="tabbable">
													<ul class="nav nav-tabs padding-16">
														<li class="active">
															<a data-toggle="tab" href="#edit-basic">
																<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
															 Details of Final Report
															</a>
														</li>
													</ul>

													<div class="tab-content profile-edit-tab-content">
												
													<div id="edit-basic" class="tab-pane in active">
														
														   <div class="space-4"></div>
															<h6><b>Supervisor Name</b></h6>
																<p><?php echo @$row['lecturerName'];?>
																<input type="hidden" name="staffID" id="staffID" value="<?php echo $row['staffID'];?>" />
																<input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>" />
																</p>
																	<div class="space"></div>
																<h6><b>Date of submission</b></h6>
																<p><?php echo date("d-m-Y"); ?><input type="hidden" name="submissiondate" id="submissiondate" value="<?php echo date("Y-m-d"); ?>" /></p>		
																			<div class="space"></div>
																<h6><b>Type of Workshop</b></h6>
																<p>  
															    	<p>Workshop <?php echo @$row['typeOfWorkshop'];?>
																<input type="hidden" name="typeOfWorkshop" id="typeOfWorkshop" value="<?php echo @$row['typeOfWorkshop'];?>" />
																<p>
																			<div class="space"></div>
																<h6><b>Project Title</b></h6>
																<p><?php echo @$row2['title'];?>
																            <div class="space"></div>
						
																<h6><b>Final Report File</b></h6>
																<p><input type="file" name="fileFR" id="fileFR" required=""></p>
																			<div class="space"></div>
														</div>
											
												
														</div>
																			<div class="clearfix form-actions">
																<div class="col-md-offset-3 col-md-9">	 
		                                                        <input name="submit" type="submit" id="submit" value="Submit Form" />
																<input name="reset" type="reset" id="reset" value="Reset Form" />

																	&nbsp; &nbsp;
																	
																</div>
															</div>
															</form>
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






