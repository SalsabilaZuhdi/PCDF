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
								<h1>Welcome to PCDF</h1></br>
								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Panelman 
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
											 $selectPMA = "SELECT staffID, count(*) as totalPMA FROM staffpma";
											 $selectSKOIL = "SELECT staffID, count(*) as totalSKOIL FROM staffskoil";
											 $selectSKGAS = "SELECT staffID, count(*) as totalSKGAS FROM staffskgas";
											 $selectSBA = "SELECT staffID, count(*) as totalSBA FROM staffsba";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>													
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectPMA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
																<td>PMA</td>
																<td><b class="black"><?php echo $total1=$row['totalPMA'];?></b></td>
															</tr>
															<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectSKOIL) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
																<td>SK OIL</td>
																<td><b class="black"><?php echo $total2=$row['totalSKOIL'];?></b></td>
															</tr>
															<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectSKGAS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
																<td>SK GAS</td>
																<td><b class="black"><?php echo $total3=$row['totalSKGAS'];?></b></td>
															</tr>
															<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectSBA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
																<td>SBA</td>
																<td><b class="black"><?php echo $total4=$row['totalSBA'];?></b></td>
															</tr>
															<?php };?>
															<tr>
																<td><b>Total All Panelman</b></td>
																<td><b class="black"><?php echo $total1+$total2+$total3+$total4?></b></td>
															</tr>
														</tbody>
													
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<div class="col-sm-5">
										<div class="widget-box transparent">
										
											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<tbody>
													
														</tbody>
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
													Total Panelman <span class="label label-success arrowed-in arrowed-in-right">Certified</span>
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
													$selectPMA = "SELECT staffID, count(*) as totalPMA FROM staffpma  where statusA ='Certified'";
													$selectSKOIL = "SELECT staffID, count(*) as totalSKOIL FROM staffskoil where statusA ='Certified'";
													$selectSKGAS = "SELECT staffID, count(*) as totalSKGAS FROM staffskgas where statusA ='Certified'";
													$selectSBA = "SELECT staffID, count(*) as totalSBA FROM staffsba where statusA ='Certified'";
													// $selectALL= $selectPMA+$selectSKOIL
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectPMA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>PMA</td>
															<td><b class="green"><?php echo $totalPMA=$row['totalPMA'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectSKOIL) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SK OIL</td>
															<td><b class="green"><?php echo $totalSKOIL=$row['totalSKOIL'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectSKGAS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SK GAS</td>
															<td><b class="green"><?php echo $totalSKGAS=$row['totalSKGAS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectSBA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SBA</td>
															<td><b class="green"><?php echo $totalSBA=$row['totalSBA'];?></b></td>
															</tr>
														  <?php };?>
															<tr>
															<td><b>Total All Certified</b></td>
															<td><b class="green"><?php echo $totalSBA+$totalSKGAS+$totalSKOIL+$totalPMA?></b></td>
															</tr>
														  </tbody>
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
													Total Panelman 	<span class="label label-primary arrowed-in arrowed-in-right">Successor</span>
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
											//  $select = "call select_dashboard_assigned";
											 $selectPMA = "SELECT staffID, count(*) as totalPMA FROM staffpma  where statusA ='Successor'";
											 $selectSKOIL = "SELECT staffID, count(*) as totalSKOIL FROM staffskoil where statusA ='Successor'";
											 $selectSKGAS = "SELECT staffID, count(*) as totalSKGAS FROM staffskgas where statusA ='Successor'";
											 $selectSBA = "SELECT staffID, count(*) as totalSBA FROM staffsba where statusA ='Successor'";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>														
														<tbody>
														<?php
															$essms_select =mysqli_query($dba,$selectPMA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>PMA</td>
															<td><b class="blue"><?php echo $totalPMA2=$row['totalPMA'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectSKOIL) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SK OIL</td>
															<td><b class="blue"><?php echo $totalSKOIL2=$row['totalSKOIL'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectSKGAS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SK GAS</td>
															<td><b class="blue"><?php echo $totalSKGAS2=$row['totalSKGAS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectSBA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SBA</td>
															<td><b class="blue"><?php echo $totalSBA2=$row['totalSBA'];?></b></td>
															</tr>
														  <?php };?>
															<tr>
															<td><b>Total All Successor</b></td>
															<td><b class="blue"><?php echo $totalSBA2+$totalSKGAS2+$totalSKOIL2+$totalPMA2?></b></td>
															</tr>
														</tbody>
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
													Total PMA <span class="label label-danger">Elements</span>
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
													$selectLearning1 = "SELECT staffID, count(*) as totalLearning1 FROM staffpma  where eLearning = 1 AND statusA='Certified'";
													$selectLearning2 = "SELECT staffID, count(*) as totalLearning2 FROM staffpma  where eLearning = 1 AND statusA='Successor'";

													$selectHeartMind1 = "SELECT staffID, count(*) as totalHeartMind1 FROM staffpma  where heartMind = 1 AND statusA='Certified'";
													$selectHeartMind2 = "SELECT staffID, count(*) as totalHeartMind2 FROM staffpma  where heartMind = 1 AND statusA='Successor'";

													$selectDCS1 = "SELECT staffID, count(*) as totalDCS1 FROM staffpma  where DCS = 1 AND statusA='Certified'";
													$selectDCS2 = "SELECT staffID, count(*) as totalDCS2 FROM staffpma  where DCS = 1 AND statusA='Successor'";

													$selectOTS1 = "SELECT staffID, count(*) as totalOTS1 FROM staffpma  where OTS = 1 AND statusA='Certified'";
													$selectOTS2 = "SELECT staffID, count(*) as totalOTS2 FROM staffpma  where OTS = 1 AND statusA='Successor'";

													$selectInterview1 = "SELECT staffID, count(*) as totalInterview1 FROM staffpma  where oralInterview = 1 AND statusA='Certified'";
													$selectInterview2 = "SELECT staffID, count(*) as totalInterview2 FROM staffpma  where oralInterview = 1 AND statusA='Successor'";

													$selectMME1 = "SELECT staffID, count(*) as totalMME1 FROM staffpma  where MME = 1 AND statusA='Certified'";
													$selectMME2 = "SELECT staffID, count(*) as totalMME2 FROM staffpma  where MME = 1 AND statusA='Successor'";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Elements
																</th>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Certified
																</th>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Successor
																</th>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectLearning1) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
																{ ?>
																<tr>
																	<td>E-Learning</td>
																	<td><b class="green"><?php echo $learning1=$row['totalLearning1'];?></b></td>
																<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectLearning2) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{ ?>
																	<td><b class="blue"><?php echo $learning2=$row['totalLearning2'];?></b></td>
																	<td><b class="red"><?php echo $totalLearning=$learning1+$learning2?></b></td>
																</tr>
															<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectHeartMind1) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
																{ ?>
																<tr>
																	<td>Heart & Minds</td>
																	<td><b class="green"><?php echo $heart1=$row['totalHeartMind1'];?></b></td>
																<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectHeartMind2) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{ ?>
																	<td><b class="blue"><?php echo $heart2=$row['totalHeartMind2'];?></b></td>
																	<td><b class="red"><?php echo $totalHeart=$heart1+$heart2?></b></td>
																</tr>
															<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectDCS1) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
																{ ?>
																<tr>
																	<td>DCS</td>
																	<td><b class="green"><?php echo $DCS1=$row['totalDCS1'];?></b></td>
																<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectDCS2) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{ ?>
																	<td><b class="blue"><?php echo $DCS2=$row['totalDCS2'];?></b></td>
																	<td><b class="red"><?php echo $totalDCS=$DCS1+$DCS2?></b></td>
																</tr>
															<?php };?>
														  
															<?php
															$essms_select =mysqli_query($dba,$selectOTS1) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
																{ ?>
																<tr>
																	<td>OTS</td>
																	<td><b class="green"><?php echo $OTS1=$row['totalOTS1'];?></b></td>
																<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectOTS2) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{ ?>
																	<td><b class="blue"><?php echo $OTS2=$row['totalOTS2'];?></b></td>
																	<td><b class="red"><?php echo $totalOTS=$OTS1+$OTS2?></b></td>
																</tr>
															<?php };?>
														  
															<?php
															$essms_select =mysqli_query($dba,$selectInterview1) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
																{ ?>
																<tr>
																	<td>Oral Interview</td>
																	<td><b class="green"><?php echo $interview1=$row['totalInterview1'];?></b></td>
																<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectInterview2) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{ ?>
																	<td><b class="blue"><?php echo $interview2=$row['totalInterview2'];?></b></td>
																	<td><b class="red"><?php echo $totalInterview=$interview1+$interview2?></b></td>
																</tr>
															<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectMME1) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
																{ ?>
																<tr>
																	<td>MME</td>
																	<td><b class="green"><?php echo $MME1=$row['totalMME1'];?></b></td>
																<?php };?>
															<?php
															$essms_select =mysqli_query($dba,$selectMME2) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{ ?>
																	<td><b class="blue"><?php echo $MME2=$row['totalMME2'];?></b></td>
																	<td><b class="red"><?php echo $totalMME=$MME1+$MME2?></b></td>
																</tr>
															<?php };?>														
															<!-- <tr>
															<td><b>Grand Total</b></td>
															<td><b class="green"><?php echo $learning1 + $heart1 + $DCS1 + $OTS1 + $interview1 + $MME1?></b></td>
															<td><b class="blue"><?php echo $learning2 + $heart2 + $DCS2 + $OTS2 + $interview2 + $MME2?></b></td>
															<td><b class="black"><?php echo $totalLearning + $totalHeart + $totalDCS + $totalOTS + $totalInterview + $totalMME?></b></td>
															</tr> -->
														  </tbody>
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
													Total SK OIL <span class="label label-danger">Elements</span>
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
													$selectLearning = "SELECT staffID, count(*) as totalLearning FROM staffskoil  where eLearning = 1";
													$selectHeartMind = "SELECT staffID, count(*) as totalHeartMind FROM staffskoil  where heartMind = 1";
													$selectDCS = "SELECT staffID, count(*) as totalDCS FROM staffskoil  where DCS = 1";
													$selectOTS = "SELECT staffID, count(*) as totalOTS FROM staffskoil  where OTS = 1";
													$selectInterview = "SELECT staffID, count(*) as totalInterview FROM staffskoil  where oralInterview = 1";
													$selectMME = "SELECT staffID, count(*) as totalMME FROM staffskoil  where MME = 1";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Elements
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectLearning) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>E-Learning</td>
															<td><b class="red"><?php echo $row['totalLearning'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectHeartMind) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Heart & Minds</td>
															<td><b class="red"><?php echo $row['totalHeartMind'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectDCS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>DCS</td>
															<td><b class="red"><?php echo $row['totalDCS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectOTS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>OTS</td>
															<td><b class="red"><?php echo $row['totalOTS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectInterview) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Oral Interview</td>
															<td><b class="red"><?php echo $row['totalInterview'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectMME) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>MME</td>
															<td><b class="red"><?php echo $row['totalMME'];?></b></td>
															</tr>
														  <?php };?>
														  </tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									</div>
									<div class="hr hr32 hr-dotted"></div>
									<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total SK GAS <span class="label label-danger">Elements</span>
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
													$selectLearning = "SELECT staffID, count(*) as totalLearning FROM staffskgas  where eLearning = 1";
													$selectHeartMind = "SELECT staffID, count(*) as totalHeartMind FROM staffskgas  where heartMind = 1";
													$selectDCS = "SELECT staffID, count(*) as totalDCS FROM staffskgas  where DCS = 1";
													$selectOTS = "SELECT staffID, count(*) as totalOTS FROM staffskgas  where OTS = 1";
													$selectInterview = "SELECT staffID, count(*) as totalInterview FROM staffskgas  where oralInterview = 1";
													$selectMME = "SELECT staffID, count(*) as totalMME FROM staffskgas  where MME = 1";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Elements
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectLearning) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>E-Learning</td>
															<td><b class="red"><?php echo $row['totalLearning'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectHeartMind) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Heart & Minds</td>
															<td><b class="red"><?php echo $row['totalHeartMind'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectDCS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>DCS</td>
															<td><b class="red"><?php echo $row['totalDCS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectOTS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>OTS</td>
															<td><b class="red"><?php echo $row['totalOTS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectInterview) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Oral Interview</td>
															<td><b class="red"><?php echo $row['totalInterview'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectMME) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>MME</td>
															<td><b class="red"><?php echo $row['totalMME'];?></b></td>
															</tr>
														  <?php };?>
														  </tbody>
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
													Total SBA <span class="label label-danger">Elements</span>
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
													$selectLearning = "SELECT staffID, count(*) as totalLearning FROM staffsba  where eLearning = 1";
													$selectHeartMind = "SELECT staffID, count(*) as totalHeartMind FROM staffsba  where heartMind = 1";
													$selectDCS = "SELECT staffID, count(*) as totalDCS FROM staffsba  where DCS = 1";
													$selectOTS = "SELECT staffID, count(*) as totalOTS FROM staffsba  where OTS = 1";
													$selectInterview = "SELECT staffID, count(*) as totalInterview FROM staffsba  where oralInterview = 1";
													$selectMME = "SELECT staffID, count(*) as totalMME FROM staffsba  where MME = 1";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Elements
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectLearning) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>E-Learning</td>
															<td><b class="red"><?php echo $row['totalLearning'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectHeartMind) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Heart & Minds</td>
															<td><b class="red"><?php echo $row['totalHeartMind'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectDCS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>DCS</td>
															<td><b class="red"><?php echo $row['totalDCS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectOTS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>OTS</td>
															<td><b class="red"><?php echo $row['totalOTS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectInterview) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Oral Interview</td>
															<td><b class="red"><?php echo $row['totalInterview'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectMME) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>MME</td>
															<td><b class="red"><?php echo $row['totalMME'];?></b></td>
															</tr>
														  <?php };?>
														  </tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div>
								<div class="hr hr32 hr-dotted"></div>
								

								<!-- PAGE CONTENT ENDS (ADMIN) -->
								
								<?php }else if(@$_SESSION['position'] == "2" ) { ?>
								<!-- PAGE CONTENT BEGINS (ADMIN PMA) -->
								<h1>Welcome to PCDF</h1></br>
								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Panelman 
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
											 $selectPMA = "SELECT staffID, count(*) as totalPMA FROM staffpma";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>													
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectPMA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
																<td>PMA</td>
																<td><b class="black"><?php echo $row['totalPMA'];?></b></td>
															</tr>
															<?php };?>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total PMA <span class="label label-danger">Elements</span>
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
													$selectLearning = "SELECT staffID, count(*) as totalLearning FROM staffpma  where eLearning = 1";
													$selectHeartMind = "SELECT staffID, count(*) as totalHeartMind FROM staffpma  where heartMind = 1";
													$selectDCS = "SELECT staffID, count(*) as totalDCS FROM staffpma  where DCS = 1";
													$selectOTS = "SELECT staffID, count(*) as totalOTS FROM staffpma  where OTS = 1";
													$selectInterview = "SELECT staffID, count(*) as totalInterview FROM staffpma  where oralInterview = 1";
													$selectMME = "SELECT staffID, count(*) as totalMME FROM staffpma  where MME = 1";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Elements
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectLearning) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>E-Learning</td>
															<td><b class="red"><?php echo $row['totalLearning'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectHeartMind) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Heart & Minds</td>
															<td><b class="red"><?php echo $row['totalHeartMind'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectDCS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>DCS</td>
															<td><b class="red"><?php echo $row['totalDCS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectOTS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>OTS</td>
															<td><b class="red"><?php echo $row['totalOTS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectInterview) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Oral Interview</td>
															<td><b class="red"><?php echo $row['totalInterview'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectMME) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>MME</td>
															<td><b class="red"><?php echo $row['totalMME'];?></b></td>
															</tr>
														  <?php };?>
														  </tbody>
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
													Total Panelman <span class="label label-success arrowed-in arrowed-in-right">Certified</span>
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
													$selectPMA = "SELECT staffID, count(*) as totalPMA FROM staffpma  where statusA ='Certified'";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectPMA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>PMA</td>
															<td><b class="green"><?php echo $row['totalPMA'];?></b></td>
															</tr>
														  <?php };?>
														  </tbody>
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
													Total Panelman 	<span class="label label-primary arrowed-in arrowed-in-right">Successor</span>
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
											//  $select = "call select_dashboard_assigned";
											 $selectPMA = "SELECT staffID, count(*) as totalPMA FROM staffpma  where statusA ='Successor'";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>														
														<tbody>
														<?php
															$essms_select =mysqli_query($dba,$selectPMA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>PMA</td>
															<td><b class="blue"><?php echo $row['totalPMA'];?></b></td>
															</tr>
														  <?php };?>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->
								<div class="hr hr32 hr-dotted"></div>
								
								<!-- PAGE CONTENT ENDS (ADMIN PMA) -->
								
								<?php } else if(@$_SESSION['position'] == "3" ) { ?>
								
									<!-- PAGE CONTENT BEGINS (ADMIN SKOIL) -->
								<h1>Welcome to PCDF</h1></br>
								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Panelman 
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
											 $selectSKOIL = "SELECT staffID, count(*) as totalSKOIL FROM staffskoil";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>													
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectSKOIL) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SK OIL</td>
																<td><b class="black"><?php echo $row['totalSKOIL'];?></b></td>
															</tr>
															<?php };?>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total SK OIL <span class="label label-danger">Elements</span>
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
													$selectLearning = "SELECT staffID, count(*) as totalLearning FROM staffskoil  where eLearning = 1";
													$selectHeartMind = "SELECT staffID, count(*) as totalHeartMind FROM staffskoil  where heartMind = 1";
													$selectDCS = "SELECT staffID, count(*) as totalDCS FROM staffskoil  where DCS = 1";
													$selectOTS = "SELECT staffID, count(*) as totalOTS FROM staffskoil  where OTS = 1";
													$selectInterview = "SELECT staffID, count(*) as totalInterview FROM staffskoil  where oralInterview = 1";
													$selectMME = "SELECT staffID, count(*) as totalMME FROM staffskoil  where MME = 1";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Elements
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectLearning) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>E-Learning</td>
															<td><b class="red"><?php echo $row['totalLearning'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectHeartMind) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Heart & Minds</td>
															<td><b class="red"><?php echo $row['totalHeartMind'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectDCS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>DCS</td>
															<td><b class="red"><?php echo $row['totalDCS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectOTS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>OTS</td>
															<td><b class="red"><?php echo $row['totalOTS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectInterview) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Oral Interview</td>
															<td><b class="red"><?php echo $row['totalInterview'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectMME) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>MME</td>
															<td><b class="red"><?php echo $row['totalMME'];?></b></td>
															</tr>
														  <?php };?>
														  </tbody>
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
													Total Panelman <span class="label label-success arrowed-in arrowed-in-right">Certified</span>
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
														$selectSKOIL = "SELECT staffID, count(*) as totalSKOIL FROM staffskoil where statusA ='Certified'";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectSKOIL) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SK OIL</td>
															<td><b class="green"><?php echo $row['totalSKOIL'];?></b></td>
															</tr>
														  <?php };?>
														  </tbody>
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
													Total Panelman 	<span class="label label-primary arrowed-in arrowed-in-right">Successor</span>
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
											//  $select = "call select_dashboard_assigned";
											$selectSKOIL = "SELECT staffID, count(*) as totalSKOIL FROM staffskoil where statusA ='Successor'";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>														
														<tbody>
														<?php
															$essms_select =mysqli_query($dba,$selectSKOIL) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SK OIL</td>
															<td><b class="blue"><?php echo $row['totalSKOIL'];?></b></td>
															</tr>
														  <?php };?>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->
								<div class="hr hr32 hr-dotted"></div>
								
								<!-- PAGE CONTENT ENDS (ADMIN SKOIL) -->
								
								<?php }else if(@$_SESSION['position'] == "4" ) { ?>
									<!-- PAGE CONTENT BEGINS (ADMIN SKGAS) -->
									<h1>Welcome to PCDF</h1></br>
								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Panelman 
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
											 $selectSKGAS = "SELECT staffID, count(*) as totalSKGAS FROM staffskgas";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>													
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectSKGAS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SK GAS</td>
																<td><b class="black"><?php echo $row['totalSKGAS'];?></b></td>
															</tr>
															<?php };?>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total SK GAS <span class="label label-danger">Elements</span>
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
													$selectLearning = "SELECT staffID, count(*) as totalLearning FROM staffskgas  where eLearning = 1";
													$selectHeartMind = "SELECT staffID, count(*) as totalHeartMind FROM staffskgas  where heartMind = 1";
													$selectDCS = "SELECT staffID, count(*) as totalDCS FROM staffskgas  where DCS = 1";
													$selectOTS = "SELECT staffID, count(*) as totalOTS FROM staffskgas  where OTS = 1";
													$selectInterview = "SELECT staffID, count(*) as totalInterview FROM staffskgas  where oralInterview = 1";
													$selectMME = "SELECT staffID, count(*) as totalMME FROM staffskgas  where MME = 1";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Elements
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectLearning) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>E-Learning</td>
															<td><b class="red"><?php echo $row['totalLearning'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectHeartMind) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Heart & Minds</td>
															<td><b class="red"><?php echo $row['totalHeartMind'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectDCS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>DCS</td>
															<td><b class="red"><?php echo $row['totalDCS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectOTS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>OTS</td>
															<td><b class="red"><?php echo $row['totalOTS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectInterview) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Oral Interview</td>
															<td><b class="red"><?php echo $row['totalInterview'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectMME) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>MME</td>
															<td><b class="red"><?php echo $row['totalMME'];?></b></td>
															</tr>
														  <?php };?>
														  </tbody>
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
													Total Panelman <span class="label label-success arrowed-in arrowed-in-right">Certified</span>
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
														$selectSKGAS = "SELECT staffID, count(*) as totalSKGAS FROM staffskgas where statusA ='Certified'";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectSKGAS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SK GAS</td>
															<td><b class="green"><?php echo $row['totalSKGAS'];?></b></td>
															</tr>
														  <?php };?>
														  </tbody>
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
													Total Panelman 	<span class="label label-primary arrowed-in arrowed-in-right">Successor</span>
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
											//  $select = "call select_dashboard_assigned";
											$selectSKGAS = "SELECT staffID, count(*) as totalSKGAS FROM staffskgas where statusA ='Successor'";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>														
														<tbody>
														<?php
															$essms_select =mysqli_query($dba,$selectSKGAS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SK GAS</td>
															<td><b class="blue"><?php echo $row['totalSKGAS'];?></b></td>
															</tr>
														  <?php };?>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->
								<div class="hr hr32 hr-dotted"></div>
								
								<!-- PAGE CONTENT ENDS (ADMIN SKGAS) -->

								<?php }else if(@$_SESSION['position'] == "5" ) { ?>
									<!-- PAGE CONTENT BEGINS (ADMIN SBA) -->
									<h1>Welcome to PCDF</h1></br>
								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total Panelman 
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
											 $selectSBA = "SELECT staffID, count(*) as totalSBA FROM staffsba";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>													
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectSBA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SBA</td>
																<td><b class="black"><?php echo $row['totalSBA'];?></b></td>
															</tr>
															<?php };?>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Total SBA <span class="label label-danger">Elements</span>
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
													$selectLearning = "SELECT staffID, count(*) as totalLearning FROM staffsba  where eLearning = 1";
													$selectHeartMind = "SELECT staffID, count(*) as totalHeartMind FROM staffsba  where heartMind = 1";
													$selectDCS = "SELECT staffID, count(*) as totalDCS FROM staffsba  where DCS = 1";
													$selectOTS = "SELECT staffID, count(*) as totalOTS FROM staffsba  where OTS = 1";
													$selectInterview = "SELECT staffID, count(*) as totalInterview FROM staffsba  where oralInterview = 1";
													$selectMME = "SELECT staffID, count(*) as totalMME FROM staffsba  where MME = 1";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Elements
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectLearning) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>E-Learning</td>
															<td><b class="red"><?php echo $row['totalLearning'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectHeartMind) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Heart & Minds</td>
															<td><b class="red"><?php echo $row['totalHeartMind'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectDCS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>DCS</td>
															<td><b class="red"><?php echo $row['totalDCS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectOTS) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>OTS</td>
															<td><b class="red"><?php echo $row['totalOTS'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectInterview) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>Oral Interview</td>
															<td><b class="red"><?php echo $row['totalInterview'];?></b></td>
															</tr>
														  <?php };?>
														  <?php
															$essms_select =mysqli_query($dba,$selectMME) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>MME</td>
															<td><b class="red"><?php echo $row['totalMME'];?></b></td>
															</tr>
														  <?php };?>
														  </tbody>
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
													Total Panelman <span class="label label-success arrowed-in arrowed-in-right">Certified</span>
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
														$selectSBA = "SELECT staffID, count(*) as totalSBA FROM staffsba where statusA ='Certified'";
												?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															$essms_select =mysqli_query($dba,$selectSBA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SBA</td>
															<td><b class="green"><?php echo $row['totalSBA'];?></b></td>
															</tr>
														  <?php };?>
														  </tbody>
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
													Total Panelman 	<span class="label label-primary arrowed-in arrowed-in-right">Successor</span>
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
											//  $select = "call select_dashboard_assigned";
											$selectSBA = "SELECT staffID, count(*) as totalSBA FROM staffsba where statusA ='Successor'";
											?>
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Region 
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Total
																</th>
															</tr>
														</thead>														
														<tbody>
														<?php
															$essms_select =mysqli_query($dba,$selectSBA) or die (mysqli_error());
															mysqli_next_result($dba);
															while($row=mysqli_fetch_assoc($essms_select))
															{
															?>
															<tr>
															<td>SBA</td>
															<td><b class="blue"><?php echo $row['totalSBA'];?></b></td>
															</tr>
														  <?php };?>
														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->
								<div class="hr hr32 hr-dotted"></div>
								<!-- PAGE CONTENT ENDS (ADMIN SBA) -->
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
							</a>PCDF</span> &copy; 2019
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
