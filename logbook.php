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
		
    $select2 = "call select_logbook('".$id."')";

	$essms_select2 =mysqli_query($dba,$select2) or die (mysqli_error());
	mysqli_next_result($dba);
	$row2 = mysqli_fetch_array($essms_select2);

	$sem = $row['semester'];
	if(isset($_REQUEST['submit']))
	{
		
		$selectC = "call select_countLogbook";
	    $essms_selectC =mysqli_query($dba,$selectC) or die (mysqli_error());
		mysqli_next_result($dba);
		$row = mysqli_fetch_array($essms_selectC);
		$totalRows = $row['totalRows'];
		@$count += $totalRows;
		
		//select last numbering
		$selectN = "call select_maxCountLogbook";
	    $essms_selectN=mysqli_query($dba,$selectN) or die (mysqli_error());
				mysqli_next_result($dba);
		$numbering = mysqli_fetch_array($essms_selectN);
		$number = $numbering['maxNumber'];

		@list($part1, $part2,$part3) = explode('_', @$number);
		@$maxNumber=$part3;
		if($count<1)
		{
			$lastcount= $count;
		}
		else
		{
			
			$lastcount = $maxNumber + 1;
		}
	
	    $year = date("Y");

		$Ins_title = $row2['title'];
		@$Ins_typeOfWorkshop = $_REQUEST['typeOfWorkshop']; 
		@$Ins_matricNum = $_SESSION['id']; 

 		@$logbookID_insert =  "L0".$sem."_".$year."_".$lastcount; 
        $Ins_activityDescription = $_REQUEST['activityDescription'];
		$Ins_submissiondate = $_REQUEST['submissiondate'];
	
	
		$selectcheck = "call select_logbook2('".$Ins_matricNum."')";
		$essms_selectcheck =mysqli_query($dba,$selectcheck) or die (mysqli_error());
		mysqli_next_result($dba);
		$rowcheck = mysqli_fetch_array($essms_selectcheck);
		$Ins_reportID= $rowcheck['reportID'];
		if ($Ins_reportID =='' )
		{
			echo "<script>alert('Please upload proposal first.')</script>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=logbook.php">'; 
		}
	else{
		
		$insertLogbook = "call insert_logbook('".$Ins_reportID ."','".$logbookID_insert ."','".$Ins_submissiondate ."','".$Ins_activityDescription ."')";
		$essms_insertLogbook = mysqli_query($dba,$insertLogbook);
		mysqli_next_result($dba);

		if(@$essms_insertLogbook)
		{
	
			echo "<script>alert('Upload Successful')</script>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=logbook.php">'; 
		}
		else
		{
			echo "<script>alert('Process Unsuccessful')</script>";
			echo '<META HTTP-EQUIV="Refresh" CONTENT="0.01; URL=logbook.php">';

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
								Log Book
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" action="" method="post">
                                    <h5>&nbsp;&nbsp;&nbsp;Title : <?php echo @$row2['title'];?></h5>
									<h5>&nbsp;&nbsp;&nbsp;Date :  <input type="date" name="submissiondate" id="submissiondate" required=""/></h5>
								    <div class="space"></div>
									<div class="col-sm-12">
										<div class="widget-box widget-color-blue">
											<div class="widget-header widget-header-small">Activity Description</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<textarea name="activityDescription" id="activityDescription" rows="10" cols="150%" required=""></textarea>
												</div>

												<div class="widget-toolbox padding-4 clearfix">
										
													 <input name="submit" type="submit" id="submit" value="Submit" />
													<input name="reset" type="reset" id="reset" value="Reset" />
												</div>
											</div>
										</div>
									</div>
									
									</form>
						          
											<?php
											$selectLogbook = "select * from logbook left join report ON logbook.reportID = report.reportID 
											where matricNum= '".$id."' ORDER BY logbookID desc";
											?>
											
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
										
														<th>No. </th>
														<th>Date</th>
														<th>Activity Description</th>
														<th></th>
														<th></th>
													
											
													</tr>
												</thead>
												<tbody>
													<?php
												$essms_selectLogbook =mysqli_query($dba,$selectLogbook) or die (mysqli_error());
												$count=1;
												while($rowLogbook=mysqli_fetch_assoc($essms_selectLogbook))
												{
												?>
													<tr>
														<td><?php echo $count++; ?></td>
														<td><?php echo date("d-m-Y", strtotime($rowLogbook['submissionDate']));?></td>
														<td><?php echo $rowLogbook['activityDescription'];?></td>
														<td align="center" onclick = "return confirm('Are you sure ?');">
	                                                        <div class="hidden-sm hidden-xs action-buttons">
																    <?php echo "<a class='red' href=deleteLogbook.php?deleteID=".$rowLogbook['logbookID'].">"?>
																	<i class="ace-icon fa fa-trash-o bigger-120"></i>
																</a>
															
															
															</div>	</td>
																<td align="center">
																<a class="green" href="javascript:window.open('editLogbook.php?logbookID=<?php echo $rowLogbook['logbookID'];?>','mywindowtitle','width=800,height=700')">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a></td>
													
													</tr>
											
												</tbody>
												 <?php };?>
		                        </table>
							<?php
							
							

							?>
						
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

		<script src="assets/js/markdown.min.js"></script>
		<script src="assets/js/bootstrap-markdown.min.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>



