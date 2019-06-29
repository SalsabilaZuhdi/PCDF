<?php
session_start();
include 'conn/dbconnection.php';

require_once('conn/bdd.php');

$id = $_SESSION['id'];

 if (@$_SESSION['password'] == "")
 {
	echo "<script> alert('Log In unsuccessful.');</script>";
	echo'<META HTTP-EQUIV="Refresh" CONTENT="0.001; URL=index.php">';
 }

 else {}
		
		//$select = "select * from login left join student ON login.id = student.matricNum left join lecturer  ON  student.lecturerID = lecturer.staffID where id= '".$id."'";
		$select = "call select_lecturerID('".$id."')";
		$essms_select =mysqli_query($dba,$select) or die (mysqli_error());
		mysqli_next_result($dba);
		$row = mysqli_fetch_array($essms_select);
		
		$lecturerID=$row['staffID'];
		
		 //$sql = "SELECT * FROM appointment LEFT JOIN student ON appointment.matricNum = student.matricNum where appointment.matricNum='".$id."' or appointment.staffid= '".$lecturerID."' ";
		 $sql = "call select_appointment('".$id."','".$lecturerID."' )";

		$req = $bdd->prepare($sql);
		$req->execute();
		mysqli_next_result($dba);

		$events = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>eSSMS</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<meta name="description" content="with draggable and editable events" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>


		<!-- /.container -->
		<!-- jQuery Version 1.11.1 -->
		<script src="js/jquery.min.js"></script>


		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		
		<!-- FullCalendar -->
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<link href='css/fullcalendar.css' rel='stylesheet' />

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		
		<!--load jQuery timepicker CSS theme -->
		
		
		
		<script src="js/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.css">  
		
		<!-- inline scripts related to this page -->
		<link rel="stylesheet" href="js/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />

	    <link rel="stylesheet" href="jquery.ui.timepicker.css?v=0.3.3" type="text/css" />

		<script type="text/javascript" src="js/jquery.ui.timepicker.js?v=0.3.3"></script>
	

    <style type="text/css">
    .no-skin #navbar #navbar-container font {
	color: #FFFFFF;
}
    </style>
	<style>

	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>
	</head>
	<!-- date pickerscript -->
	<script>
	  $(function() {
		$('#datepicker').datepicker({dateFormat: "dd/mm/yy"});
		
	  });
	</script>
	<!-- javascript timepicker coding -->
   <script type="text/javascript">

            $(document).ready(function() {
                $('#timepicker').timepicker({
                    showPeriod: true,
                  
                });
            });



        </script> 
	<link rel="icon" type="image/png" href="icon.png"/>
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
	  <div class="page-content"><!-- /.ace-settings-container -->
		<div class="page-header">
							<h1>
								Schedule Appointment
							</h1>
		</div><!-- /.page-header -->
   

   <div class="container">

        <div class="row"><!-- /.row -->
            <div class="col-sm-8"">
             <form method="post" id="calendarform" >
                <div id="calendar" ">
                </div>
            </div>
			</form>
			<div class="col-sm-4">
				<div class="widget-box ">
				<div class="widget-header">
				<h4>Add Appointment</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main ">
						<div id="external-events"  >
					
							<form method="post" action="addappointment.php" >
							<div class="form-group">
							<label for="lecturer_name" >Lecturer Name</label>
							<div>
							<input type="text" name="lecturer_name" class="form-control" id="lecturer_name"  value="<?php echo $row['lecturerName'];?>" disabled>
							<input type="hidden" name="staffID" class="form-control" id="staffID" value="<?php echo $row['staffID'];?>"  >
							<input type="hidden" name="matricNum" class="form-control" id="matricNum" value="<?php echo $row['matricNum'];?>"  >
							</div>
							</div>
							<div class="form-group">
							<label for="title" >Agenda</label>
							<div >
							<input type="text" name="title" class="form-control" id="title" placeholder="Agenda" required="">
							</div>
							</div>
						
							<div class="form-group">
							<label for="start" >Date</label>
							<div >
							<input type='text' required name='datepicker' style='height:25px;' size='30' id='datepicker' placeholder='Please choose date' >
							<input type='hidden'  name='startdatefinal'  size='30' id='startdatefinal'  >
							
							<input type="hidden" name="color" class="form-control" id="color" value="#FFD700"  >
							</div>
							 </div>
							<div class="form-group">
							<label for="color" >Start Time</label>
							<div >
							<input type='text' required name='timepicker' style='height:25px;' size='30' id='timepicker' placeholder='Please choose time'  >
							<input type='hidden'  name='starttime'  size='30' id='starttime'  >
							<input type='hidden'  name='starttimefinal'  size='30' id='starttimefinal'  >
							</div>
							</div>
							<div class="form-group">
							<label for="color" >End Time</label>
							<div >
							<input type='text'  name='endtime' size='30' id='endtime'  placeholder='Please choose time' disabled>
							<input type='hidden'  name='endtime1' size='30' id='endtime1'  >
							<input type='hidden'  name='endtimefinal'  size='30' id='endtimefinal'  >
							</div>
							</div>
							<div align="center" >
							<button type="submit" class="btn btn-primary" >Submit Appointment</button>
							</div>
							</form>
						</div><!-- /.external-events -->
					</div><!-- /.widget-main  -->
				</div><!-- /.widget-body -->
			</div> <!-- /.widget-box -->
			<div class="widget-box ">
				<div class="widget-header">
				<h4>Legend</h4>
				</div>

						<div >
								<div class="external-event label-yellow" data-class="label-yellow" style="background-color:yellow">
								<i class="ace-icon fa fa-arrows"></i>
								Pending Approval
						</div>
								<div class="external-event label-success" data-class="label-success" style="background-color:green">
								<i class="ace-icon fa fa-arrows"></i>
								Accepted Appointment
						</div>
						<div class="external-event label-danger" data-class="label-danger" style="background-color:red">
							<i class="ace-icon fa fa-arrows"></i>
							Rejected Appointment
						</div>
					
					</div>
			</div><!-- /.widget-box -->
			
		</div><!-- /.col-sm-8 -->
	</div><!-- /.row -->
		
	<!-- Modal -->
	<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
			
		<form class="form-horizontal" method="POST" action="">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Appointment</h4>
			  </div>
			  <div class="modal-body">
				 <div class="form-group">
					<label for="lecturer_name" class="col-sm-2 control-label">Lecturer </label>
					<div class="col-sm-10">
					  <input type="text" name="lecturer_name" class="form-control" id="lecturer_name" value="<?php echo $row['lecturerName'];?>"  disabled>
					 <input type="hidden" name="staffID" class="form-control" id="staffID" value="<?php echo $row['staffID'];?>"  >
					 <input type="hidden" name="matricNum" class="form-control" id="matricNum" value="<?php echo $row['matricNum'];?>"  >
					</div>
				  </div>
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Agenda</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Agenda" required="">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Time</label>
					<div class="col-sm-10">
					<select id="timepick" name="timepick" class="form-control" >
					<?php 
					for($hours=0; $hours<24; $hours++)
					{
						for($mins=0; $mins<60; $mins+=30)
						{ 
							$time = str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT).':00';
							echo '<option value= "'.$time.'">'.$time.'</option>';
						}
					}
					?>
					</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					  <input type="hidden" name="color" class="form-control" id="color" value="#FFD700"  >
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					   <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
	
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			
		<form class="form-horizontal" method="POST" action="">
	
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">View Appointment</h4>
			  </div>
			  <div class="modal-body">
				 <div class="form-group">
					<label for="lecturer_name" class="col-sm-2 control-label">Lecturer </label>
					<div class="col-sm-10">
					  <input type="text" name="lecturer_name" class="form-control" id="lecturer_name" value="<?php echo $row['lecturerName'];?>"  disabled>
					 <input type="hidden" name="staffID" class="form-control" id="staffID" value="<?php echo $row['staffID'];?>"  >
					 <input type="hidden" name="id" class="form-control" id="id"  >
					</div>
				  </div>
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Student </label>
					<div class="col-sm-10">
					  <input type="text" name="studentName" class="form-control" id="studentName" disabled>
					</div>
				  </div>
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Agenda</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" disabled>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start Date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" disabled>
					  <input type="hidden" name="color" class="form-control" id="color" value="#FFD700"  >
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Start Time</label>
					<div class="col-sm-10">
					<input type="text" name="start_time" class="form-control" id="start_time"  disabled>
					</div>
				  </div>
				    <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End Date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" disabled>
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">End Time</label>
					<div class="col-sm-10">
					<input type="text" name="end_time" class="form-control" id="end_time"  disabled>
					</div>
				  </div>
			
				
			
				 
				  <input type="hidden" name="id" class="form-control" id="id">
			  </div>
			  <div class="modal-footer">
			  </div>
			</form>
			</div>
		  </div>
		</div>
	
		<a data-toggle="tab" href="#edit-basic">
		<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
		 Appointment History
		</a>
		<?php
				  $selectAppointment = "call select_appoint('".$id."')";
				  
				  $selectCount = "call select_count('".$id."')";
		?>
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
			<tr>
				<th>No. </th>
				<th>Appointment Date</th>
				<th>Appointment Time</th>
				<th>Location</th>
				<th>Agenda</th>
				<th>Status</th>
				<th></th>
				
													
			</tr>
			</thead>
			<tbody>
		<?php
			$essms_selectAppointment =mysqli_query($dba,$selectAppointment) or die (mysql_error());
			mysqli_next_result($dba);
			$essms_selectCount =mysqli_query($dba,$selectCount) or die (mysql_error());
			mysqli_next_result($dba);
			$count=1;
			
			$rowCount=mysqli_fetch_assoc($essms_selectCount);
		
		if($rowCount['totalAppointment']==0)
		{ ?>
			<tr>
				<td colspan=7" align="center"> No Appointment </td>
			</tr>
		<?php }
		else{
		while($rowAppointment=mysqli_fetch_assoc($essms_selectAppointment))
		{
		
			
			$originalDate =  $rowAppointment['start'];
			$newDate = date("d/m/Y", strtotime($originalDate));
		
		?>
		
			<tr>
				<td><?php echo $count++; ?></td>
				<td><?php echo $newDate;?></td>
				<td><?php echo $rowAppointment['start_time'];?></td>
				<td><?php echo $rowAppointment['location'];?></td>
				<td><?php echo $rowAppointment['title'];?></td>
				<td><?php echo $rowAppointment['status'];?></td>
			    <?php if($rowAppointment['status']=='Pending Approval'){ ?>
				<td align="center" onclick = "return confirm('Are you sure ?');">
	            <div class="hidden-sm hidden-xs action-buttons">
				<?php echo "<a class='red' href=deleteAppointment.php?deleteID=".$rowAppointment['id'].">"?>
				<i class="ace-icon fa fa-trash-o bigger-120"></i>
				</a></div></td>
				<?php }else{ ?>
				<td></td>
				<?php } ?>
			</tr>
		<?php }	}?>
			</tbody>
	        </table>
			
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

<script>
$("#datepicker").change(function () {


	var selectedDate = $('#datepicker').datepicker('getDate');
	var now = new Date();
	now.setHours(0,0,0,0);
	if (selectedDate < now) {
	  alert('Date is in the past, please choose different date');
	 var finaldate = "" ;
	 $("#datepicker").val(finaldate);
	}else{
	var initialdate = $("#datepicker").val();
	var newdate = initialdate.split("/").reverse().join("-");
	var finaldate = newdate ;
	$("#startdatefinal").val(finaldate);
		
	}
	
});
$("#timepicker").change(function () {
	var initialtime = $("#timepicker").val();
	
	
	test(initialtime, 1, 0);
		function addTimeToString(timeString, addHours, addMinutes) {
		  // The third argument is optional.
		  if (addMinutes === undefined) {
			addMinutes = 0;
		  }
		  // Parse the time string. Extract hours, minutes, and am/pm.
		  var match = /(\d+):(\d+)\s+(\w+)/.exec(timeString),
			  hours = parseInt(match[1], 10) % 12,
			  minutes = parseInt(match[2], 10),
			  modifier = match[3].toLowerCase();
		  // Convert the given time into minutes. Add the desired amount.
		  if (modifier[0] == 'p') {
			hours += 12;
		  }
		  var newMinutes = (hours + addHours) * 60 + minutes + addMinutes,
			  newHours = Math.floor(newMinutes / 60) % 24;
		  // Now figure out the components of the new date string.
		  newMinutes %= 60;
		  var newModifier = (newHours < 12 ? 'AM' : 'PM'),
			  hours12 = (newHours < 12 ? newHours : newHours % 12);
		  if (hours12 == 0) {
			hours12 = 12;
		  }
		  // Glue it all together.
		  var minuteString = (newMinutes >= 10 ? '' : '0') + newMinutes;
		  return hours12 + ':' + minuteString + ' ' + newModifier;
		}
	
		function test(timeString, addHours, addMinutes) {
			
		    var finaltime = addTimeToString(timeString, addHours, addMinutes);
			$("#endtime").val(finaltime);
			$("#endtime1").val(finaltime);
			var momentObj = moment(finaltime, ["h:mm A"])
			var convertTime = momentObj.format("HH:mm:ss");
			var dateTime= $(startdatefinal).val()+ ' ' + convertTime;
			$("#endtimefinal").val(dateTime);
		
			$("#starttime").val(timeString);
			var momentObj1 = moment(timeString, ["h:mm A"])
			var convertTime1 = momentObj1.format("HH:mm:ss");
			var dateTime1= $(startdatefinal).val()+ ' ' + convertTime1;
			$("#starttimefinal").val(dateTime1);
		}
		
});

</script>

<script type="text/javascript">

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

today = yyyy +'-'+ mm +'-'+ dd

$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: today,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: false,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);status
					$('#ModalEdit #start_time').val(event.start_time);
					$('#ModalEdit #end_time').val(event.end_time);
					$('#ModalEdit #start').val(event.start.format('DD-MM-YYYY'));
					$('#ModalEdit #end').val(event.end.format('DD-MM-YYYY'));
					$('#ModalEdit #studentName').val(event.studentName);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					
					color: '<?php echo $event['color']; ?>',
					start_time: '<?php echo $event['start_time']; ?>',
					end_time: '<?php echo $event['end_time']; ?>',
					studentName: '<?php echo $event['studentName']; ?>',
					
					
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Saved');
					}else{
						alert('Could not be saved. try again.'); 
					}
				}
			});
		}
		
	});
</script>			
		
	</body>
</html>







