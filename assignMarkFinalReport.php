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

			<div class="main-content">
				<div class="main-content-inner">

				  <div class="page-content">
					  
		<div class="page-header">
							<h1>
							
							</h1>
						</div><!-- /.page-header -->
<?php

	 @$updateMark = $_REQUEST['totalMark'];
	 @$updatefinalReportID = $_REQUEST['finalreportID'];
	
	if(isset($_REQUEST['submit']))
	{
	
	 @$updateMark = $_REQUEST['totalMark'];
	 @$updatefinalReportID = $_REQUEST['finalreportID'];
	 
	 $updateFinalReport ="call update_assignMarkFR('".$updateMark."','".$updatefinalReportID."')";
	 $essms_updateFinalReport = mysqli_query($dba,$updateFinalReport);
	
	if ($essms_updateFinalReport) 
	{
	
	echo "<script>alert('Mark Submitted')</script>";
		
	
		echo "<script>
		window.onunload = refreshParent;
		function refreshParent() {
		window.opener.location.reload(); }
		window.close()
		
		</script>"; 

	}
	}
?>

<script type="text/javascript">
        function DisplayMark(mark)
		{
			
            var val1 = 0;
            for( i = 0; i < document.form1.row1.length; i++ ){
                if( document.form1.row1[i].checked == true ){
                    val1 = document.form1.row1[i].value * 2;
                }
            }
			
            var val2 = 0;
            for( i = 0; i < document.form2.row2.length; i++ ){
                if( document.form2.row2[i].checked == true ){
                    val2 = document.form2.row2[i].value * 1;
                }
            }
			
			var val3 = 0;
            for( i = 0; i < document.form3.row3.length; i++ ){
                if( document.form3.row3[i].checked == true ){
                    val3 = document.form3.row3[i].value * 1;
                }
            }
			    var val4 = 0;
            for( i = 0; i < document.form4.row4.length; i++ ){
                if( document.form4.row4[i].checked == true ){
                    val4 = document.form4.row4[i].value * 2;
                }
            }
			
            var val5 = 0;
            for( i = 0; i < document.form5.row5.length; i++ ){
                if( document.form5.row5[i].checked == true ){
                    val5 = document.form5.row5[i].value * 3;
                }
            }
			
			var val6 = 0;
            for( i = 0; i < document.form6.row6.length; i++ ){
                if( document.form6.row6[i].checked == true ){
                    val6 = document.form6.row6[i].value * 1;
                }
            }
		

            var sum=parseInt(val1) + parseInt(val2)+ parseInt(val3) + parseInt(val4) + parseInt(val5)+ parseInt(val6);
			var percentage= sum / 3.333333333;
			percentage = percentage.toFixed(2);
            document.getElementById('totalSum').value=sum;
			document.getElementById('totalMark').value=percentage;
			document.getElementById('percentage').value=percentage;
        }
		
	function check_value(value,form) 
	{ 
		if (value == 0)	{
		  form.score1.value = "0";
		  form.mark1.value = "0";
		} else if (value == 1){
		  form.score1.value = "1";
		  form.mark1.value = "2";
		} else if (value == 2){
		  form.score1.value = "2";
		  form.mark1.value = "4";
		} else if (value == 3){
		  form.score1.value = "3"; 
		  form.mark1.value = "6";
		} else if (value == 4){
		  form.score1.value = "4"; 
		  form.mark1.value = "8";
		}else if (value == 5){
		  form.score1.value = "5"; 
		  form.mark1.value = "10";
		}
	}
	function check_valueR2 (value,form)
	{ 
		if (value == 0) {
		  form.score2.value = "0";
		  form.mark2.value = "0";
		} else if (value == 1){
		  form.score2.value = "1";
		  form.mark2.value = "1";
		} else if (value == 2){
		  form.score2.value = "2";
		  form.mark2.value = "2";
		} else if (value == 3){
		  form.score2.value = "3";
			form.mark2.value = "3";	  
		} else if (value == 4){
		  form.score2.value = "4"; 
		  form.mark2.value = "4";
		} else if (value == 5){
		  form.score2.value = "5";
		  form.mark2.value = "5";	  
		}
	}
	function check_valueR3 (value,form) 
	{ 
		if (value == 0) {
		  form.score3.value = "0";
		   form.mark3.value = "0";	
		} else if (value == 1){
		  form.score3.value = "1";
		   form.mark3.value = "1";	
		} else if (value == 2){
		  form.score3.value = "2";
		   form.mark3.value = "2";	
		} else if (value == 3){
		  form.score3.value = "3"; 
		   form.mark3.value = "3";	
		} else if (value == 4){
		  form.score3.value = "4"; 
		   form.mark3.value = "4";	
		} else if (value == 5){
		  form.score3.value = "5"; 
		   form.mark3.value = "5";	
		}
	}
		function check_valueR4 (value,form) 
	{ 
		if (value == 0) {
		  form.score4.value = "0";
		   form.mark4.value = "0";	
		} else if (value == 1){
		  form.score4.value = "1";
		   form.mark4.value = "2";	
		} else if (value == 2){
		  form.score4.value = "2";
		   form.mark4.value = "4";	
		} else if (value == 3){
		  form.score4.value = "3"; 
		   form.mark4.value = "6";	
		} else if (value == 4){
		  form.score4.value = "4"; 
		   form.mark4.value = "8";	
		} else if (value == 5){
		  form.score4.value = "5"; 
		   form.mark4.value = "10";	
		}
	}
		function check_valueR5 (value,form) 
	{ 
		if (value == 0) {
		  form.score5.value = "0";
		   form.mark5.value = "0";	
		} else if (value == 1){
		  form.score5.value = "1";
		   form.mark5.value = "3";	
		} else if (value == 2){
		  form.score5.value = "2";
		   form.mark5.value = "6";	
		} else if (value == 3){
		  form.score5.value = "3"; 
		   form.mark5.value = "9";	
		} else if (value == 4){
		  form.score5.value = "4"; 
		   form.mark5.value = "12";	
		} else if (value == 5){
		  form.score5.value = "5"; 
		   form.mark5.value = "15";	
		}
	}
		function check_valueR6 (value,form) 
	{ 
		if (value == 0) {
		  form.score6.value = "0";
		   form.mark6.value = "0";	
		} else if (value == 1){
		  form.score6.value = "1";
		   form.mark6.value = "1";	
		} else if (value == 2){
		  form.score6.value = "2";
		   form.mark6.value = "2";	
		} else if (value == 3){
		  form.score6.value = "3"; 
		   form.mark6.value = "3";	
		} else if (value == 4){
		  form.score6.value = "4"; 
		   form.mark6.value = "4";	
		} else if (value == 5){
		  form.score6.value = "5"; 
		   form.mark6.value = "5";	
		}
	}
</script>


						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
														
		                            <div id="edit-basic" class="tab-pane in active">
									
										<table width="87%" border="0" class="table  table-bordered table-hover" id="simple-table">
											<tbody>
												<tr>
													<th width="25%" rowspan="2"> Category </th>
													<th colspan="6"> RUBRIC </th>
													<th width="5%" rowspan="2"> <p>&nbsp;</p>
												    <p>SCORE </p></th>		
													<th width="7%" rowspan="2"> <p>&nbsp;</p>
												    <p>Weightage </p></th>
													<th width="5%" rowspan="2"> <p>&nbsp;</p>
													  <p>MARK </p></th>	
												</tr>
                                               	<tr>
													
												  <th width="11%" > <p align="center">Unacceptable</p>
											      <p align="center">(0) </p></th>
													<th width="14%" ><p align="center"> Substandard </p><p align="center"> (1) </p></th>
													<th colspan="2"> <p align="center"> Adequate</p><p align="center">(2/3)</p> </th>
													<th colspan="2"> <p align="center">Exellent</p><p align="center">(4/5)</p> </th>
												</tr>
												
												
												
												<form name="form1" id="form1" runat="server">
                                               	<tr>
                                                    <td rowspan="2"><b>Structure</b></td>
													<td align="center"><input type="radio" name="row1" value="0" onclick="DisplayMark(this.value);check_value(0,this.form);">0<br/></td>
													<td align="center"><input type="radio" name="row1" value="1" onclick='DisplayMark(this.value);check_value(1,this.form)'>1<br/></td>
													<td width="10%" align="center"><input type="radio" name="row1" value="2" onclick='DisplayMark(this.value);check_value(2,this.form)'>2<br/></td>
													<td width="10%" align="center"><input type="radio" name="row1" value="3" onclick='DisplayMark(this.value);check_value(3,this.form)'>3</td>
													<td width="10%" align="center"><input type="radio" name="row1" value="4" onclick='DisplayMark(this.value);check_value(4,this.form)'>4  <br/></td>
													<td width="10%" align="center"><input type="radio" name="row1" value="5" onclick='DisplayMark(this.value);check_value(5,this.form)'>5</td>
                                                    <td rowspan="2"><input type="text" id="score1" name="score1"  size="2" disabled  ></td>
													
                                                    <td rowspan="2" align="center"><input type="text" id="weightage1" name="weightage1" value="2" size="2" disabled></td>
													
                                                    <td rowspan="2"><input type="text" id="mark1" name="mark1" size="2" disabled></td>
												</tr>
												</form>
                                               	<tr>
                                               	  <td align="center">Very poor or not available</td>
                                               	  <td align="center">Paragraphs are poorly organized; use of sections is illogical and hinders document navigation</td>
                                               	  <td colspan="2" align="center">Paragraphs are usually well-organized; use of sections is logical and generally allows easy navigation of the document</td>
                                               	  <td colspan="2" align="center">All paragraphs are well-organized; use of sections is logical and aloows easy navigation through the document</td>
                                   	          </tr>
											  
											  
											  
											  <form name="form2" id="form2" runat="server">
												<tr>
                                                    <td rowspan="2"><b>Graphics </b> </td>
													<td align="center"><input type="radio" name="row2" value="0" onclick='DisplayMark(this.value);check_valueR2(0,this.form)'>0<br/></td>
													<td align="center"><input type="radio" name="row2" value="1" onclick='DisplayMark(this.value);check_valueR2(1,this.form)'>1<br/></td>
													<td align="center"><input type="radio" name="row2" value="2" onclick='DisplayMark(this.value);check_valueR2(2,this.form)'>2<br/></td>
													<td align="center"><input type="radio" name="row2" value="3" onclick='DisplayMark(this.value);check_valueR2(3,this.form)'>3</td>
													<td align="center"><input type="radio" name="row2" value="4" onclick='DisplayMark(this.value);check_valueR2(4,this.form)'>4<br/></td>
													<td align="center"><input type="radio" name="row2" value="5" onclick='DisplayMark(this.value);check_valueR2(5,this.form)'>5</td>
                                                     <td rowspan="2"><input type="text" id="score2" name="score2" size="2" disabled></td>
                                                    <td rowspan="2" align="center"><input type="text" id="weightage2" name="weightage2" value="1" size="2" disabled></td>
                                                    <td rowspan="2"><input type="text" id="mark2" name="mark2" value="" size="2" disabled></td>
												</tr>
												</form>
												<tr>
												  <td align="center">Very poor or not avaiable</td>
												  <td align="center">Graphical documents, structured chart, flowcharts, pseudocode, etc. are of poor quality and fail to support the text</td>
												  <td colspan="2" align="center">Graphical documents, structured chart, flowcharts, pseudocode, etc. are of good quality and adequately support the text</td>
												  <td colspan="2" align="center">Graphical documents, structured chart, flowcharts, pseudocode, etc. are creative, professional and strongly support the text</td>
								              </tr>
									
											  
											  	  <form name="form3" id="form3" runat="server">
												<tr>
                                                    <td rowspan="2"><b>Figures, Table and equations</b></td>
													<td align="center"><input type="radio" name="row3" value="0" onclick='DisplayMark(this.value);check_valueR3(0,this.form)'>0<br/></td>
													<td align="center"><input type="radio" name="row3" value="1" onclick='DisplayMark(this.value);check_valueR3(1,this.form)'>1<br/></td>
													<td align="center"><input type="radio" name="row3" value="2" onclick='DisplayMark(this.value);check_valueR3(2,this.form)'>2<br/></td>
													<td align="center"><input type="radio" name="row3" value="3" onclick='DisplayMark(this.value);check_valueR3(3,this.form)'>3</td>
													<td align="center"><input type="radio" name="row3" value="4" onclick='DisplayMark(this.value);check_valueR3(4,this.form)'>4<br/></td>
													<td align="center"><input type="radio" name="row3" value="5" onclick='DisplayMark(this.value);check_valueR3(5,this.form)'>5</td>
                                                     <td rowspan="2"><input type="text" id="score3" name="score3"  size="2" disabled></td>
                                                    <td rowspan="2" align="center"><input type="text" id="weightage3" name="weightage3" value="1" size="2" disabled></td>
                                                    <td rowspan="2"><input type="text" id="mark3" name="mark3" value="" size="2" disabled></td>
												</tr>
												</form>
												<tr>
												  <td align="center">Very poor or not available</td>
												  <td align="center">Figures, tables and equations are not clearly or logically identified and fail to support the text</td>
												  <td colspan="2" align="center">Some figures, tables and equations are clearly and logically identified and adequately support the text</td>
												  <td colspan="2" align="center">All figures, tables and equations are clearly and logically identified and strongly support the text</td>
								              </tr>
											  
											  
											  
											  
											  		  
											  
											  
											  <form name="form4" id="form4" runat="server">
												<tr>
                                                    <td rowspan="2"><b>Formatting</b></td>
													<td align="center"><input type="radio" name="row4" value="0" onclick='DisplayMark(this.value);check_valueR4(0,this.form)'>0<br/></td>
													<td align="center"><input type="radio" name="row4" value="1" onclick='DisplayMark(this.value);check_valueR4(1,this.form)'>1<br/></td>
													<td align="center"><input type="radio" name="row4" value="2" onclick='DisplayMark(this.value);check_valueR4(2,this.form)'>2<br/></td>
													<td align="center"><input type="radio" name="row4" value="3" onclick='DisplayMark(this.value);check_valueR4(3,this.form)'>3</td>
													<td align="center"><input type="radio" name="row4" value="4" onclick='DisplayMark(this.value);check_valueR4(4,this.form)'>4<br/></td>
													<td align="center"><input type="radio" name="row4" value="5" onclick='DisplayMark(this.value);check_valueR4(5,this.form)'>5</td>
                                                     <td rowspan="2"><input type="text" id="score4" name="score4" size="2" disabled></td>
                                                    <td rowspan="2" align="center"><input type="text" id="weightage4" name="weightage4" value="2" size="2" disabled></td>
                                                    <td rowspan="2"><input type="text" id="mark4" name="mark4" value="" size="2" disabled></td>
												</tr>
												</form>
												
												<tr>
												  <td align="center">Very poor or not available</td>
												  <td align="center">Document is formatted poorly and lacks a quality cover page and index</td>
												  <td colspan="2" align="center">Formatting of the document is generally consistent and adequate, and includes a good quality cover page and index</td>
												  <td colspan="2" align="center">		  
													Formatting of the document is professional and includes a professional cover page and index</td>
											  
											  
											  
											  <form name="form5" id="form5" runat="server">
												<tr>
                                                    <td rowspan="2"><b>Language skils</b></td>
													<td align="center"><input type="radio" name="row5" value="0" onclick='DisplayMark(this.value);check_valueR5(0,this.form)'>0<br/></td>
													<td align="center"><input type="radio" name="row5" value="1" onclick='DisplayMark(this.value);check_valueR5(1,this.form)'>1<br/></td>
													<td align="center"><input type="radio" name="row5" value="2" onclick='DisplayMark(this.value);check_valueR5(2,this.form)'>2<br/></td>
													<td align="center"><input type="radio" name="row5" value="3" onclick='DisplayMark(this.value);check_valueR5(3,this.form)'>3</td>
													<td align="center"><input type="radio" name="row5" value="4" onclick='DisplayMark(this.value);check_valueR5(4,this.form)'>4<br/></td>
													<td align="center"><input type="radio" name="row5" value="5" onclick='DisplayMark(this.value);check_valueR5(5,this.form)'>5</td>
                                                     <td rowspan="2"><input type="text" id="score5" name="score5"  size="2" disabled></td>
                                                    <td rowspan="2" align="center"><input type="text" id="weightage5" name="weightage5" value="3" size="2" disabled></td>
                                                    <td rowspan="2"><input type="text" id="mark5" name="mark5" value="" size="2" disabled></td>
												</tr>
												</form>
												<tr>
												  <td align="center">Very poor or not available</td>
												  <td align="center">Sentences are poorly written; there re numerous incorrect word choices and errors in grammar, punctuation and spelling</td>
												  <td colspan="2" align="center">Sentences are generally well-written; there are a few incorrect word choices and errors in grammar, punctiotions and spelling</td>
												  <td colspan="2" align="center">Sentences are well-written; there are no incorrect word choices and the text is free of errors in grammar, punctiotions and spelling</td>
								              </tr></td>
								              </tr>
											  
											  			  <form name="form6" id="form56" runat="server">
												<tr>
                                                    <td rowspan="2"><b>Documentation and references</b></td>
													<td align="center"><input type="radio" name="row6" value="0" onclick='DisplayMark(this.value);check_valueR6(0,this.form)'>0<br/></td>
													<td align="center"><input type="radio" name="row6" value="1" onclick='DisplayMark(this.value);check_valueR6(1,this.form)'>1<br/></td>
													<td align="center"><input type="radio" name="row6" value="2" onclick='DisplayMark(this.value);check_valueR6(2,this.form)'>2<br/></td>
													<td align="center"><input type="radio" name="row6" value="3" onclick='DisplayMark(this.value);check_valueR6(3,this.form)'>3</td>
													<td align="center"><input type="radio" name="row6" value="4" onclick='DisplayMark(this.value);check_valueR6(4,this.form)'>4<br/></td>
													<td align="center"><input type="radio" name="row6" value="5" onclick='DisplayMark(this.value);check_valueR6(5,this.form)'>5</td>
                                                     <td rowspan="2"><input type="text" id="score6" name="score6" size="2" disabled></td>
                                                    <td rowspan="2" align="center"><input type="text" id="weightage6" name="weightage6" value="1" size="2" disabled></td>
                                                    <td rowspan="2"><input type="text" id="mark6" name="mark6" value="" size="2" disabled></td>
												</tr>
												</form>
												<tr>
												  <td align="center">Very poor or not available</td>
												  <td align="center">Fails to correctly document any sources or to utilize appropriate citation forms</td>
												  <td colspan="2" align="center">Most sources are correctly documented; appropriate citation forms are generally utilized</td>
												  <td colspan="2" align="center">All sources are correctly and thoroughly documented; appropraite  citations forms are utilized throughput</td>
								              </tr></td>
								              </tr>
											  
											  
											  
											  
											  
											    <tr>
                                                    <td colspan="5"></td>
													<td colspan="4">TOTAL MARK</td>
                                                    <td><input type="text" id="totalSum" name="totalSum" size="4" disabled "></td>
                                             
												</tr>
											    <tr>
                                                    <td colspan="5"></td>
													<td colspan="4">Percentage</td>
                                                    <td><input type="text" id="percentage" name="percentage" value="" size="4" disabled>
													</td>
                                             
												</tr>
												
												
												
												<form class="form-horizontal" role="form" method="post" name="form7" id="form7">
												<tr align="right">
													<td colspan="10">
													<input type="hidden" id="totalMark" name="totalMark" value="<?php  ?>" size="2" >
													<input type="hidden" id="finalreportID" name="finalreportID" value="<?php echo $_REQUEST['finalreport_ID']; ?>" size="20" >
													<input name="submit" type="submit" id="submit" value="Submit Marks" /></td>
												</tr>
												</form>
										
										
												</tbody>
											</table>
										
									</div>
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
