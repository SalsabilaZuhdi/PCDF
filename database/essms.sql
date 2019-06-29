-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 01:34 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `essms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_appointment`(IN `v_appointmentID` INT(225))
BEGIN

delete from appointment where id = v_appointmentID;
               
 
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_finalreport`(IN `v_finalreportID` VARCHAR(35))
BEGIN

delete from finalreport where finalreportID = v_finalreportID  ;
 
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_logbook`(IN `v_logbookID` VARCHAR(35))
BEGIN

delete from logbook where logbookID = v_logbookID;
				
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_proposal`(IN `v_proposalID` VARCHAR(35))
BEGIN

delete from proposal where proposalID = v_proposalID  ;
 
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `importData_student`(IN `v_matricNum` VARCHAR(20), IN `v_studentName` VARCHAR(50), IN `v_studentEmail` VARCHAR(50), IN `v_studentPhoneNum` VARCHAR(15), IN `v_course` VARCHAR(30), IN `v_year` INT(10), IN `v_semester` INT(10), IN `v_typeOfWorkshop` INT(10), `v_lecturerID` VARCHAR(20), IN `v_statusAssign` VARCHAR(30), IN `v_positionID` INT(10), IN `v_password` VARCHAR(10), IN `v_session` VARCHAR(12))
BEGIN

INSERT INTO login (id, password, positionID)values(v_matricNum, v_password, v_positionID);

INSERT INTO student (matricNum, studentName, studentEmail, studentPhoneNum, course, year, semester, typeOfWorkshop, lecturerID, statusAssign, positionID) values (v_matricNum, v_studentName, v_studentEmail, v_studentPhoneNum,v_course,v_year,v_semester,v_typeOfWorkshop, v_lecturerID,v_statusAssign,v_positionID);


INSERT INTO workshopregistration (matricNum, typeOfWorkshop, session, semester)values(v_matricNum, v_typeOfWorkshop, v_session, v_semester);

 
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_appointment`(IN `v_title` VARCHAR(50), IN `v_dateCreated` TIMESTAMP, IN `v_startTime` TIME, IN `v_endTime` TIME, IN `v_start` DATETIME, IN `v_end` DATETIME, IN `v_color` VARCHAR(7), IN `v_status` VARCHAR(50), IN `v_matricNum` VARCHAR(20), IN `v_staffID` VARCHAR(20))
    NO SQL
INSERT INTO appointment(title, date_created, start_time,end_time,start, end, color,status,staffID,matricNum)
values(v_title,v_dateCreated, v_startTime, v_endTime, v_start, v_end, v_color, v_status, v_staffID, v_matricNum)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_finalReport`(IN `v_reportID` VARCHAR(35), IN `v_finalreportID` VARCHAR(35), IN `v_submissionDate` DATE, IN `v_statusProject` VARCHAR(20), IN `v_sourceFR` VARCHAR(100), IN `v_type` VARCHAR(20))
BEGIN



insert into finalReport (finalreportID, submissionDate, statusProject, sourceFR, type, reportID)values
(v_finalreportID, v_submissionDate, v_statusProject, v_sourceFR, v_type,v_reportID);

 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_logbook`(IN `v_reportID` VARCHAR(35), IN `v_logbookID` VARCHAR(35), IN `v_submissionDate` DATE, IN `v_activityDescription` TEXT)
BEGIN

insert into logbook (logbookID, submissionDate, activityDescription, reportID)values(v_logbookID, v_submissionDate, v_activityDescription,v_reportID);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_proposal`(IN `v_reportID` VARCHAR(35), IN `v_title` VARCHAR(60), IN `v_typeOfWorkshop` INT(10), IN `v_matricNum` VARCHAR(20), IN `v_proposalID` VARCHAR(35), IN `v_abstract` TEXT, IN `v_submissionDate` DATE, IN `v_statusProject` VARCHAR(20), IN `v_sourceP` VARCHAR(100), IN `v_type` VARCHAR(20))
BEGIN

insert into report (reportID, title, typeOfWorkshop, matricNum)values (v_reportID, v_title, v_typeOfWorkshop, v_matricNum);

insert into proposal (proposalID, abstract,submissionDate, statusProject, sourceP, type, reportID)values(v_proposalID, v_abstract, v_submissionDate, v_statusProject, v_sourceP, v_type,v_reportID);
 
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_proposalAfterUpdate`(IN `v_proposalID` VARCHAR(35), IN `v_abstract` TEXT, IN `v_submissionDate` DATE, IN `v_statusProject` VARCHAR(20), IN `v_sourceP` VARCHAR(100), IN `v_type` VARCHAR(20), IN `v_reportID` VARCHAR(35))
    NO SQL
insert into proposal (proposalID, abstract,submissionDate, statusProject, sourceP, type, reportID)values(v_proposalID, v_abstract, v_submissionDate, v_statusProject, v_sourceP, v_type,v_reportID)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_reportSubmission`(IN `v_dueSubmission` DATE, IN `v_reportType` VARCHAR(10), IN `v_typeOfWorkshop` VARCHAR(20))
    NO SQL
insert into reportSubmission 
(dueSubmission, reportType, typeOfWorkshop)
values
(v_dueSubmission, v_reportType, v_typeOfWorkshop)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_appoint`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from appointment where matricNum= v_matricNum ORDER BY start DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_appointment`(IN `v_matricNum` VARCHAR(20), IN `v_staffID` VARCHAR(20))
    NO SQL
SELECT * FROM appointment 
LEFT JOIN student ON appointment.matricNum = student.matricNum
where appointment.matricNum=v_matricNum
or appointment.staffid= v_staffID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_appointment2`(IN `v_staffID` VARCHAR(20))
    NO SQL
SELECT * FROM appointment 
where appointment.staffid= v_staffID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_appointmentSupervisor`(IN `v_id` VARCHAR(20))
    NO SQL
SELECT * FROM appointment LEFT JOIN student ON appointment.matricNum = student.matricNum where appointment.matricNum=v_id or appointment.staffid= v_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_appointSupervisor`(IN `v_staffID` VARCHAR(20))
    NO SQL
select * from appointment left join student on appointment.matricNum = student.matricNum where staffID= v_staffID ORDER BY start DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_assignStudent`(IN `v_staffID` VARCHAR(20))
    NO SQL
select * from student where lecturerID=v_staffID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_changePass`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from login left join student ON login.id = student.matricNum where id= v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_changePassL`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from login left join lecturer ON login.id = lecturer.staffID where id= v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_count`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select count(*) as totalAppointment from appointment where matricNum= v_matricNum ORDER BY start DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_count1`(IN `v_staffID` VARCHAR(20))
    NO SQL
select count(*) as totalAppointment from appointment where staffID= v_staffID ORDER BY start DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_countFinalReport`()
    NO SQL
select COUNT(*) as totalRows from finalreport$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_countLogbook`()
    NO SQL
select COUNT(*) as totalRows from logbook$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_countProposal`()
    NO SQL
select COUNT(*) as totalRows from proposal$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_dashboard_assigned`()
    NO SQL
select course,count(*)as total from student where statusAssign ='Assigned' Group By course$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_dashboard_course`()
    NO SQL
select course,count(*)as total from student Group By course$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_dashboard_depart`()
    NO SQL
select department,count(*)as total from lecturer Group By department$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_dashboard_notAssigned`()
    NO SQL
select course,count(*)as total from student where statusAssign ='Not Assigned' Group By course$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_dashboard_reportFR`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from report left join finalreport ON report.reportID = finalreport.reportID where matricNum =v_matricNum ORDER BY finalreportID DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_dashboard_reportP`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from report left join proposal ON report.reportID = proposal.reportID where matricNum =v_matricNum ORDER BY proposalID DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_dashboard_student`(IN `v_staffID` VARCHAR(20))
    NO SQL
select student.matricNum, studentEmail, studentPhoneNum, studentName, title, course, student.typeOfWorkshop from student left join report ON student.matricNum = report.matricNum where lecturerID=v_staffID ORDER BY student.typeOfWorkshop ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_finalReport`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from report left join finalReport ON report.reportID = finalReport.reportID where matricNum= v_matricNum ORDER BY finalreportID DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_finalReport2`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from finalReport left join report ON finalReport.reportID = report.reportID where matricNum= v_matricNum ORDER BY finalreportID desc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_finalReport3`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from report left join finalReport ON report.reportID = finalReport.reportID where matricNum= v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_finalReport4`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from report left join student ON report.matricNum = student.matricNum where report.matricNum =v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_lecturer`(IN `v_staffID` VARCHAR(20))
    NO SQL
select * from lecturer inner join lecturer_position ON 		
				   lecturer.staffID = lecturer_position.staffID
				   inner join position ON lecturer_position.positionID = position.positionID where lecturer.staffID=v_staffID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_lecturerID`(IN `v_id` VARCHAR(20))
    NO SQL
select * from login left join student ON login.id = student.matricNum
left join lecturer  ON  student.lecturerID = lecturer.staffID 
where id= v_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_lecturerID_appointment`(IN `v_staffID` VARCHAR(20))
    NO SQL
select * from login left join lecturer ON login.id = lecturer.staffID where id= v_staffID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_lecturerInfo`(IN `v_dept1` VARCHAR(30), IN `v_dept2` VARCHAR(30), IN `v_dept3` VARCHAR(30), IN `v_dept4` VARCHAR(30))
    NO SQL
select * from lecturer where(department = v_dept1 OR department = v_dept2 OR department = v_dept3 OR department = v_dept4 ) ORDER BY department DESC, staffID ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_lecturerInfo2`()
    NO SQL
select * from lecturer where (department = 'SE' OR department = 'BITC' OR department = 'MI' OR department = 'BITI' ) ORDER BY department DESC, staffID ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_logbook`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from report left join logbook ON report.reportID = logbook.reportID 
where matricNum= v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_logbook2`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from report left join student ON report.matricNum = student.matricNum where report.matricNum = v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_logbook3`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from logbook left join report ON logbook.reportID = report.reportID 
where matricNum= v_matricNum ORDER BY logbookID desc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_logbook4`(IN `v_logbookID` VARCHAR(35))
    NO SQL
select * from report left join logbook ON report.reportID = logbook.reportID where logbookID=v_logbookID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_login`(IN `v_id` VARCHAR(20), IN `v_pass` VARCHAR(10), IN `v_positionID` INT(10))
    NO SQL
BEGIN

select * from login where
id = v_id and password =v_pass and 
positionID = v_positionID;

  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_loginA`(IN `v_id` VARCHAR(20), IN `v_pass` VARCHAR(10), IN `v_positionID` INT(10))
    NO SQL
BEGIN

select * from login where
id = v_id and password =v_pass and 
positionID = v_positionID;

  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_maxCountFinalReport`()
    NO SQL
select max(finalreportID) as maxNumber from finalreport$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_maxCountLogbook`()
    NO SQL
select max(logbookID) as maxNumber from logbook$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_maxCountProposal`()
    NO SQL
select max(proposalID) as maxNumber from proposal$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_previousStudent`(IN `v_sesi` VARCHAR(12), IN `v_sem` INT(10), IN `v_staffID` VARCHAR(20))
    NO SQL
select * from workshopregistration left join student on workshopregistration.matricNum = student.matricNum left join report on workshopregistration.matricNum=report.matricNum where workshopregistration.session=v_sesi and workshopregistration.semester=v_sem and  student.lecturerID=v_staffID and report.matricNum = student.matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_profileLecturer`(IN `v_staffID` VARCHAR(20))
    NO SQL
select * from lecturer where staffID= v_staffID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_profileStudent`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from  student  left join lecturer  ON  student.lecturerID = lecturer.staffID where matricNum= v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_proposal`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from proposal left join report ON proposal.reportID = report.reportID 
where matricNum= v_matricNum  ORDER BY proposalID DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_proposal2`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from report left join student ON report.matricNum = student.matricNum where report.matricNum =v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_reportSubmission`(IN `v_type` VARCHAR(20), IN `v_workshop` INT(10))
    NO SQL
select * from reportSubmission where reportType =v_type and typeOfWorkshop =v_workshop$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_reportSubmissionFR`()
    NO SQL
select * from reportSubmission where reportType = 'Final Report'  ORDER BY typeOfWorKShop ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_reportSubmissionP`()
    NO SQL
select * from reportSubmission where reportType = 'Proposal' ORDER BY typeOfWorKShop ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_resetPassL`(IN `v_staffID` VARCHAR(20))
    NO SQL
select * from lecturer left join login ON lecturer.staffID = login.id where staffID =v_staffID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_resetPassS`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from student left join login ON student.matricNum = login.id where matricNum =v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchCommittee`(IN `v_dept1` VARCHAR(30), IN `v_dept2` VARCHAR(30), IN `v_dept3` VARCHAR(30), IN `v_dept4` VARCHAR(30))
    NO SQL
select * from lecturer 
			left join lecturer_position on lecturer.staffID = lecturer_position.staffID
			left join position on lecturer.positionID = position.positionID
			where
			(department = v_dept1 OR department = v_dept2 OR department = v_dept3 OR department = v_dept4 ) AND 
			(lecturer.positionID = '2' OR lecturer.positionID = '3' )ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchCommittee2`(IN `v_position1` INT(10), IN `v_position2` INT(10))
    NO SQL
select * from lecturer 
			left join lecturer_position on lecturer.staffID = lecturer_position.staffID
			left join position on lecturer.positionID = position.positionID
			where
			(department = 'SE' OR department = 'BITC' OR department = 'MI' OR department = 'BITI' ) AND 
			(lecturer.positionID = v_position1 OR lecturer.positionID = v_position2 )ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchCommittee3`(IN `v_dept1` VARCHAR(30), IN `v_dept2` VARCHAR(30), IN `v_dept3` VARCHAR(30), IN `v_dept4` VARCHAR(30), IN `v_position1` INT(10), IN `v_position2` INT(10))
    NO SQL
select * from lecturer 
			left join lecturer_position on lecturer.staffID = lecturer_position.staffID
			left join position on lecturer.positionID = position.positionID
			where
			(department = v_dept1 OR department = v_dept2 OR department = v_dept3 OR department = v_dept4 ) AND 
			(lecturer.positionID = v_position1 OR lecturer.positionID = v_position2 )ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchCommittee4`()
    NO SQL
select * from lecturer
			left join lecturer_position on lecturer.staffID = lecturer_position.staffID 
			left join position on lecturer.positionID = position.positionID 
			where (department = 'SE' OR department = 'BITC' OR department = 'BITI' OR department = 'MI' ) 
			AND (lecturer.positionID = '2' OR lecturer.positionID = '3' )ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchStudent`(IN `v_name` VARCHAR(50))
    NO SQL
select * from student left join lecturer ON student.lecturerID = lecturer.staffID where studentName LIKE '%v_name%' ORDER BY studentName$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchStudent2`(IN `v_course1` VARCHAR(30), IN `v_course2` VARCHAR(30), IN `v_course3` VARCHAR(30), IN `v_course4` VARCHAR(30), IN `v_course5` VARCHAR(30), IN `v_course6` VARCHAR(30), IN `v_course7` VARCHAR(30), IN `v_name` VARCHAR(50))
    NO SQL
select * from student	
						left join lecturer ON student.lecturerID = lecturer.staffID
						where (statusAssign='Assigned' OR statusAssign='Not Assigned' ) AND
						(course = v_course1 OR course = v_course2 OR course = v_course3 OR course = v_course4 OR course = v_course5 OR course = v_course6 OR course = v_course7)
						AND studentName LIKE '%v_name%'
						ORDER BY studentName$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchStudent3`(IN `v_statusAssign1` VARCHAR(30), IN `v_statusAssign2` VARCHAR(30), IN `v_name` VARCHAR(50))
    NO SQL
select * from student
						left join lecturer ON student.lecturerID = lecturer.staffID
						where (statusAssign=v_statusAssign1 OR statusAssign=v_statusAssign2 ) AND
						(course = 'BITS' OR course = 'BITM' OR course = 'BITE' OR course = 'BITD' OR course = 'BITC' OR course = 'BITZ' OR course = 'BITI')
						AND studentName LIKE '%v_name%' ORDER BY studentName$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchStudent4`(IN `v_statusAssign1` VARCHAR(30), IN `v_statusAssign2` VARCHAR(30), IN `v_course1` VARCHAR(30), IN `v_course2` VARCHAR(30), IN `v_course3` VARCHAR(30), IN `v_course4` VARCHAR(30), IN `v_course5` VARCHAR(30), IN `v_course6` VARCHAR(30), IN `v_course7` VARCHAR(30), IN `v_name` VARCHAR(50))
    NO SQL
select * from student left join lecturer ON student.lecturerID = lecturer.staffID where (statusAssign='v_statusAssign1' OR statusAssign='v_statusAssign2' ) AND (course = 'v_course1' OR course = 'v_course2' OR course = 'v_course3' OR course = 'v_course4' OR course = 'v_course5' OR course = 'v_course6' OR course = 'v_course7') AND studentName LIKE '%v_name%' ORDER BY studentName$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchSupervisor`(IN `v_dept1` VARCHAR(30), IN `v_dept2` VARCHAR(30), IN `v_dept3` VARCHAR(30), IN `v_dept4` VARCHAR(30))
    NO SQL
select *,count(student.lecturerID) as totalSupervisee from lecturer 
left join lecturer_position on lecturer.staffID = lecturer_position.staffID
left join position on lecturer.positionID = position.positionID
left join student on student.lecturerID = lecturer.staffID where
(department = v_dept1 OR department = v_dept2 OR department = v_dept3 OR department = v_dept4 ) AND 
(lecturer.positionID = '2' OR lecturer.positionID = '3' )
GROUP BY lecturer.staffID ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchSupervisor2`(IN `v_position1` INT(10), IN `v_position2` INT(10))
    NO SQL
select *,count(student.lecturerID) as totalSupervisee from lecturer 
			left join lecturer_position on lecturer.staffID = lecturer_position.staffID
			left join position on lecturer.positionID = position.positionID
			left join student on student.lecturerID = lecturer.staffID
			where
			(department = 'SE' OR department = 'BITC' OR department = 'MI' OR department = 'BITI' ) AND 
			(lecturer.positionID = v_position1 OR lecturer.positionID =  v_position2 )
			GROUP BY lecturer.staffID ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchSupervisor3`(IN `v_dept1` VARCHAR(30), IN `v_dept2` VARCHAR(30), IN `v_dept3` VARCHAR(30), IN `v_dept4` VARCHAR(30), IN `v_position1` INT(10), IN `v_position2` INT(10))
    NO SQL
select *,count(student.lecturerID) as totalSupervisee from lecturer 
			left join lecturer_position on lecturer.staffID = lecturer_position.staffID
			left join position on lecturer.positionID = position.positionID
			left join student on student.lecturerID = lecturer.staffID
			where
			(department = v_dept1 OR department = v_dept2 OR department = v_dept3 OR department = v_dept4 ) AND 
			(lecturer.positionID = v_position1 OR lecturer.positionID = v_position2  )
			GROUP BY lecturer.staffID ORDER BY positionName ASC,lecturer.department DESC, lecturer.staffID ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_searchSupervisor4`()
    NO SQL
select *,count(student.lecturerID) as totalSupervisee from lecturer
			left join lecturer_position on lecturer.staffID = lecturer_position.staffID 
			left join position on lecturer.positionID = position.positionID 
			left join student on student.lecturerID = lecturer.staffID
			where (department = 'SE' OR department = 'BITC' OR department = 'BITI' OR department = 'MI' ) 
			AND (lecturer.positionID = '2' OR lecturer.positionID = '3' )
			GROUP BY lecturer.staffID ORDER BY  positionName ASC, lecturer.department DESC, lecturer.staffID ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_session`()
    NO SQL
SELECT session FROM workshopregistration group by session$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_student`(IN `v_matricNum` VARCHAR(20))
    NO SQL
select * from student where matricNum =v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_studentInfo`(IN `v_c1` VARCHAR(30), IN `v_c2` VARCHAR(30), IN `v_c3` VARCHAR(30), IN `v_c4` VARCHAR(30), IN `v_c5` VARCHAR(30), IN `v_c6` VARCHAR(30), IN `v_c7` VARCHAR(30))
    NO SQL
select * from student where(course = v_c1 OR course = v_c2 OR course = v_c3 OR course = v_c4 OR course = v_c5 OR course = v_c6 OR course = v_c7)ORDER BY course ASC, matricNum ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_studentInfo2`()
    NO SQL
select * from student where (course = 'BITS' OR course = 'BITM' OR course = 'BITE' OR course = 'BITD' OR course = 'BITC' OR course = 'BITZ' OR course = 'BITI') ORDER BY course ASC, matricNum ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_studentW1`(IN `v_staffID` VARCHAR(20))
    NO SQL
select student.matricNum, studentName, title, course, student.typeOfWorkshop from student left join report ON student.matricNum = report.matricNum where lecturerID=v_staffID AND student.typeOfWorkshop=1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_studentW2`(IN `v_staffID` VARCHAR(20))
    NO SQL
select student.matricNum, studentName, title, course, student.typeOfWorkshop from student left join report ON student.matricNum = report.matricNum where lecturerID=v_staffID AND student.typeOfWorkshop=2$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_totalAppointment`(IN `v_id` VARCHAR(20))
    NO SQL
SELECT SUM(if(appointment.status = 'accept', 1, 0)) AS totalaccept,
		SUM(if(appointment.status = 'Reject', 1, 0)) AS totalreject,
		SUM(if(appointment.status = 'Pending Approval', 1, 0)) AS totalpending
		FROM appointment 
		LEFT JOIN student ON appointment.matricNum = student.matricNum 
		where  appointment.matricNum=v_id or appointment.staffid= v_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_appointmentStatus`(IN `v_color` VARCHAR(7), IN `v_status` VARCHAR(30), IN `v_location` VARCHAR(50), IN `v_id` INT(225))
    NO SQL
UPDATE appointment SET  
color = v_color, 
status=v_status,
location = v_location 
WHERE id = v_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_assignMarkFR`(IN `v_mark` DOUBLE, IN `v_finalReportID` VARCHAR(15))
    NO SQL
UPDATE finalreport SET 
mark=v_mark 
WHERE finalReportID =v_finalReportID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_assignMarkP`(IN `v_mark` DOUBLE, IN `v_proposalID` VARCHAR(35))
    NO SQL
UPDATE proposal SET 
mark=v_mark 
WHERE proposalID =v_proposalID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_AssignPositionC`(IN `v_staffID` VARCHAR(20), IN `v_positionID` INT(10), IN `assignWorkshop` VARCHAR(10))
BEGIN
update lecturer set positionID = v_positionID where staffID = v_staffID;
update lecturer_position set positionID = v_positionID , assignationWorkshop = assignWorkshop where staffID = v_staffID;
update login set positionID = v_positionID where id = v_staffID;
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_assignSupervisor`(IN `v_lecturerID` VARCHAR(20), IN `v_statusAssign` VARCHAR(30), IN `v_matricNum` VARCHAR(20))
    NO SQL
update student
set lecturerID = v_lecturerID , 
statusAssign=v_statusAssign
where matricNum=v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_changePass`(IN `v_id` VARCHAR(20), IN `v_pass` VARCHAR(10))
    NO SQL
update login left join lecturer
ON login.id = lecturer.staffID
set password= v_pass
where id= v_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_changePassword`(IN `v_id` VARCHAR(20), IN `v_pass` VARCHAR(10))
    NO SQL
update login
set password=v_pass
where id= v_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_finalReport`(IN `v_statusProject` VARCHAR(20), IN `v_mark` DOUBLE, IN `v_remarks` TEXT, IN `v_finalReportID` VARCHAR(15))
    NO SQL
UPDATE finalreport SET 
statusProject=v_statusProject,
mark = v_mark,
remarks=v_remarks
WHERE finalreportID = v_finalReportID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_logbook`(IN `v_logbookID` VARCHAR(35), IN `v_submissionDate` DATE, IN `v_activityDescription` TEXT)
    NO SQL
update logbook
set 
activityDescription=v_activityDescription,
submissionDate=v_submissionDate
where logbookID=v_logbookID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profileLecturer`(IN `v_id` VARCHAR(20), IN `v_email` VARCHAR(50), IN `v_phoneNum` VARCHAR(15), IN `v_bio` VARCHAR(100))
BEGIN

update lecturer
set 
lecturerEmail= v_email,
lecturerPhoneNum= v_phoneNum,
bio = v_bio 
where staffID= v_id ;
				
 
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_profileStudent`(IN `v_id` VARCHAR(20), IN `v_email` VARCHAR(50), IN `v_phoneNum` VARCHAR(15))
BEGIN
update student set 
studentEmail= v_email,
studentPhoneNum= v_phoneNum
where matricNum = v_id;
 
  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_proposal`(IN `v_statusProject` VARCHAR(20), IN `v_mark` DOUBLE, IN `v_remarks` TEXT, IN `v_proposalID` VARCHAR(35))
    NO SQL
UPDATE proposal SET 
statusProject=v_statusProject,
mark = v_mark,
remarks= v_remarks
WHERE proposalID =v_proposalID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_report`(IN `v_title` VARCHAR(60), IN `v_matricNum` VARCHAR(20))
    NO SQL
UPDATE report SET
title = v_title
WHERE matricNum = v_matricNum$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_reportSubmission`(IN `v_dueSubmission` DATE, IN `v_typeOfWorkshop` INT(10), IN `v_reportType` VARCHAR(20))
    NO SQL
UPDATE reportSubmission SET 
dueSubmission = v_dueSubmission,
typeOfWorkshop = v_typeOfWorkshop
WHERE reportType = v_reportType AND typeOfWorkshop = v_typeOfWorkshop$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `allocation_student`
--

CREATE TABLE IF NOT EXISTS `allocation_student` (
  `ID` int(11) NOT NULL,
  `staffID` varchar(20) NOT NULL,
  `allocationWorkshop1` int(11) NOT NULL,
  `allocationWorkshop2` int(11) NOT NULL,
  `totalSuperviseeWorkshop1` int(11) NOT NULL,
  `totalSuperviseeWorkshop2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `allocation_student`
--

INSERT INTO `allocation_student` (`ID`, `staffID`, `allocationWorkshop1`, `allocationWorkshop2`, `totalSuperviseeWorkshop1`, `totalSuperviseeWorkshop2`) VALUES
(1, '00077', 3, 7, 0, 0),
(2, '00078', 3, 6, 3, 3),
(3, '00079', 3, 6, 3, 6),
(4, '00097', 3, 6, 3, 1),
(5, '00112', 3, 6, 0, 0),
(6, '00120', 3, 6, 0, 0),
(7, '00121', 3, 6, 0, 0),
(8, '00124', 3, 6, 0, 0),
(9, '00132', 3, 6, 0, 0),
(10, '00171', 3, 7, 0, 0),
(11, '00333', 3, 6, 0, 0),
(12, '00431', 3, 6, 0, 0),
(13, '00443', 3, 7, 0, 5),
(14, '00444', 3, 7, 0, 0),
(15, '00621', 3, 6, 0, 0),
(16, '00714', 3, 6, 0, 0),
(17, '00761', 3, 6, 0, 0),
(18, '00921', 3, 6, 0, 0),
(19, '01212', 3, 7, 0, 0),
(20, '01214', 3, 7, 0, 0),
(21, '02124', 3, 6, 0, 0),
(22, '03112', 3, 10, 0, 0),
(23, '03127', 3, 10, 0, 0),
(24, '03162', 3, 7, 0, 0),
(25, '03240', 3, 7, 0, 0),
(26, '03322', 3, 6, 0, 0),
(27, '04127', 3, 6, 2, 0),
(28, '04142', 3, 6, 0, 0),
(29, '04240', 3, 7, 0, 0),
(30, '05214', 3, 10, 0, 0),
(31, '06214', 3, 10, 0, 0),
(32, '06421', 3, 6, 0, 0),
(33, '07241', 3, 10, 0, 0),
(34, '07312', 3, 10, 0, 0),
(35, '08692', 3, 7, 0, 0),
(36, '09212', 3, 6, 0, 0),
(37, '09287', 3, 7, 0, 0),
(38, '09421', 3, 6, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(7) NOT NULL,
  `status` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `matricNum` varchar(20) NOT NULL,
  `staffID` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `date_created`, `start_time`, `end_time`, `start`, `end`, `color`, `status`, `title`, `location`, `matricNum`, `staffID`) VALUES
(1, '2017-08-12 08:41:11', '05:40:00', '06:40:00', '2017-08-12 17:40:00', '2017-08-12 18:40:00', '#008000', 'Accept', 'Meet sv', 'at my office', 'B031510733', '00078');

-- --------------------------------------------------------

--
-- Table structure for table `finalreport`
--

CREATE TABLE IF NOT EXISTS `finalreport` (
  `finalreportID` varchar(15) NOT NULL,
  `submissionDate` date DEFAULT NULL,
  `statusSubmission` varchar(20) DEFAULT NULL,
  `statusProject` varchar(20) DEFAULT NULL,
  `remarks` text,
  `mark` double NOT NULL,
  `sourceFR` varchar(100) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `reportID` varchar(35) DEFAULT NULL,
  `reportSubmissionID` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finalreport`
--

INSERT INTO `finalreport` (`finalreportID`, `submissionDate`, `statusSubmission`, `statusProject`, `remarks`, `mark`, `sourceFR`, `type`, `reportID`, `reportSubmissionID`) VALUES
('FR01_2017_0', '2017-07-24', 'On Time', 'Pending Approval', NULL, 0, 'PSM REPORT.docx', 'Final Report', 'R01_2017_0', 4);

--
-- Triggers `finalreport`
--
DELIMITER $$
CREATE TRIGGER `after_delete_finalreport` AFTER DELETE ON `finalreport`
 FOR EACH ROW BEGIN

DECLARE v_reportID varchar(35);

select reportID into v_reportID from report where reportID = OLD.reportID;


UPDATE report set countFinalReport = countFinalReport - 1 where reportID = v_reportID;


END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_finalreport` AFTER INSERT ON `finalreport`
 FOR EACH ROW BEGIN

DECLARE v_reportID varchar(35);

select reportID into v_reportID from report where reportID = NEW.reportID;

UPDATE report set countFinalReport = countFinalReport + 1 where reportID = v_reportID;


END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_insert_finalReport` BEFORE INSERT ON `finalreport`
 FOR EACH ROW BEGIN

   declare v_typeworkshop varchar(50);

   declare v_dueDate date;

   declare v_subDate date;

   declare v_typeP varchar(50);

   declare v_reportID varchar(50);

   declare v_status varchar(50);
   
    declare v_reportSubmissionID int;

   

   select typeOfWorkshop into v_typeworkshop from report where reportID = NEW.reportID;


    select dueSubmission,reportSubmissionID into v_dueDate,v_reportSubmissionID from reportSubmission where reportType = NEW.type and typeOfWorkshop = v_typeworkshop;

   if (NEW.submissionDate >= v_dueDate)
   then
    
	set NEW.statusSubmission = 'Late';
        set NEW.reportSubmissionID = v_reportSubmissionID;
    
    
   else
	
	set NEW.statusSubmission = 'On Time';
        set NEW.reportSubmissionID = v_reportSubmissionID;

    end if;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
  `staffID` varchar(20) NOT NULL,
  `lecturerName` varchar(50) NOT NULL,
  `lecturerEmail` varchar(50) NOT NULL,
  `lecturerPhoneNum` varchar(15) NOT NULL,
  `department` varchar(30) NOT NULL,
  `bio` varchar(100) NOT NULL,
  `positionID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`staffID`, `lecturerName`, `lecturerEmail`, `lecturerPhoneNum`, `department`, `bio`, `positionID`) VALUES
('00077', 'Nazrulazhar Bin Bahaman', 'nazrul@gmail.com', '0136897778', 'BITC', 'Interesting title :\r\nHotel Management System\r\nBus tracking system', 3),
('00078', 'Mohd Fadzil Bin Zulkifli', 'fadzil@utem.edu.my', '0198201913', 'SE', 'programming language such as php, jsp and also java', 2),
('00079', 'Nor Mas Aina Md. Bohari', '', '', 'SE', '', 2),
('00097', 'Safiza Suhana Binti Kamal Baharin', 'safiza@utem.edu.my', '0196685808', 'SE', '', 3),
('00112', 'Ahmad Naim Bin Che Pee @ Cne Hanapi', '', '', 'MI', '', 3),
('00120', 'Rosleen Abd. Samad', 'rosleen@utem.edu.my', '0136217911', 'SE', '', 3),
('00121', 'Norhaziah Binti Md Salleh', '', '', 'SE', '', 3),
('00124', 'Nazreen Bin Abdullasim', '', '', 'MI', '', 3),
('00132', 'Yahya Binti Ibrahim', '', '', 'SE', '', 3),
('00171', 'Irda Binti Roslan', '', '', 'BITC', '', 3),
('00333', 'Maslita Binti Abd Aziz', '', '', 'SE', '', 3),
('00431', 'Tarisa Makina Kintakaningrum', '', '', 'MI', '', 3),
('00443', 'Othman Bin Mohd', '', '', 'BITC', '', 2),
('00444', 'Haniza Binti Nahar', '', '', 'BITC', '', 3),
('00621', 'Wan Sazli Nasaruddin Bin Saifudin', '', '', 'MI', '', 3),
('00714', 'Mokhtar Bin Mohd Yusof', '', '', 'SE', '', 3),
('00761', 'Ibrahim Bin Ahmad', '', '', 'MI', '', 3),
('00921', 'Hamzah Asyrani Bin Sulaiman', '', '', 'MI', '', 3),
('01212', 'Syahrul Bin Azhar', 'syahrul@utem.edu.my', '0193264512', 'BITC', '  ', 3),
('01214', 'Nor Azman Bin Abu', '', '', 'BITC', '', 3),
('02124', 'Shahrul Badariah Binti Mat Sah', '', '', 'MI', '', 3),
('03112', 'Zuraida Binti Abal Abas', '', '', 'BITI', '', 2),
('03127', 'Mohd Sanusi Bin Azmi', '', '', 'BITI', '', 3),
('03162', 'Erman Bin Hamid', '', '', 'BITC', '', 3),
('03240', 'Zaheera Zainal Bin Abidin', '', '', 'BITC', '', 3),
('03322', 'Shahdan Bin Md. Lani', '', '', 'SE', '', 3),
('04127', 'Wan Sazli Nasaruddin Bin Safiuddin', '', '', 'MI', '', 2),
('04142', 'Zarita Binti Mohd Kosnin', '', '', 'SE', '', 3),
('04240', 'Mohd Zaki Bin Mas''ud', '', '', 'BITC', '', 3),
('05214', 'IG. Pramudya Ananta', '', '', 'BITI', '', 3),
('06214', 'Ahmad Fadzli Nizam Bin Abdul Rahman', '', '', 'BITI', '', 3),
('06421', 'Norazlin Binti Mohamed', '', '', 'MI', '', 2),
('07241', 'Norzihani Binti Yusof', '', '', 'BITI', '', 3),
('07312', 'Abd. Samad Bin Hasan Basari', '', '', 'BITI', '', 3),
('08692', 'Mohd Rizuan Bin Baharon', '', '', 'BITC', '', 3),
('09212', 'Siti Nurul Mahluzah Binti Mohammad', '', '', 'MI', '', 3),
('09287', 'Siti Rahayu Binti Selamat', '', '', 'BITC', '', 3),
('09421', 'Mohd Hafiz Bin Zakaria', '', '', 'MI', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_position`
--

CREATE TABLE IF NOT EXISTS `lecturer_position` (
  `positionID` int(10) NOT NULL,
  `staffID` varchar(20) NOT NULL,
  `assignationWorkshop` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer_position`
--

INSERT INTO `lecturer_position` (`positionID`, `staffID`, `assignationWorkshop`) VALUES
(2, '00078', '1'),
(2, '00079', '2'),
(2, '00443', '1'),
(2, '03112', '2'),
(2, '04127', '2'),
(2, '06421', '1'),
(3, '00077', '0'),
(3, '00097', '0'),
(3, '00112', '0'),
(3, '00120', '0'),
(3, '00121', '0'),
(3, '00124', '0'),
(3, '00132', '0'),
(3, '00171', '0'),
(3, '00333', '0'),
(3, '00431', '0'),
(3, '00444', '0'),
(3, '00621', '0'),
(3, '00714', '0'),
(3, '00761', '0'),
(3, '00921', '0'),
(3, '01212', '0'),
(3, '01214', '0'),
(3, '02124', '0'),
(3, '03127', '0'),
(3, '03162', '0'),
(3, '03240', '0'),
(3, '03322', '0'),
(3, '04142', '0'),
(3, '04240', '0'),
(3, '05214', '0'),
(3, '06214', '0'),
(3, '07241', '0'),
(3, '07312', '0'),
(3, '08692', '0'),
(3, '09212', '0'),
(3, '09287', '0'),
(3, '09421', '0');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE IF NOT EXISTS `logbook` (
  `logbookID` varchar(35) NOT NULL,
  `submissionDate` date NOT NULL,
  `activityDescription` text NOT NULL,
  `reportID` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `positionID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `password`, `positionID`) VALUES
('00077', 'abc123', 3),
('00078', 'abc123', 2),
('00079', 'abc123', 2),
('00097', 'abc123', 3),
('00112', 'abc123', 3),
('00120', 'abc123', 3),
('00121', 'abc123', 3),
('00124', 'abc123', 3),
('00132', 'abc123', 3),
('00171', 'abc123', 3),
('00333', 'abc123', 3),
('00431', 'abc123', 3),
('00443', 'abc123', 2),
('00444', 'abc123', 3),
('00621', 'abc123', 3),
('00714', 'abc123', 3),
('00761', 'abc123', 3),
('00921', 'abc123', 3),
('01212', 'abc123', 3),
('01214', 'abc123', 3),
('02124', 'abc123', 3),
('03112', 'abc123', 2),
('03127', 'abc123', 3),
('03162', 'abc123', 3),
('03240', 'abc123', 3),
('03322', 'abc123', 3),
('04127', 'abc123', 2),
('04142', 'abc123', 3),
('04240', 'abc123', 3),
('05214', 'abc123', 3),
('06214', 'abc123', 3),
('06421', 'abc123', 2),
('07241', 'abc123', 3),
('07312', 'abc123', 3),
('08692', 'abc123', 3),
('09212', 'abc123', 3),
('09287', 'abc123', 3),
('09421', 'abc123', 3),
('admin', 'admin', 1),
('B021310095', 'abc123', 4),
('B031410148', 'abc123', 4),
('B031410339', 'abc123', 4),
('B031510', 'abc123', 4),
('B031510006', 'abc123', 4),
('B031510017', 'abc123', 4),
('B031510020', 'abc123', 4),
('B031510029', 'abc123', 4),
('B031510036', 'abc123', 4),
('B031510037', 'abc123', 4),
('B031510049', 'abc123', 4),
('B031510054', 'abc123', 4),
('B031510057', 'abc123', 4),
('B031510060', 'abc123', 4),
('B031510068', 'abc123', 4),
('B031510072', 'abc123', 4),
('B031510082', 'abc123', 4),
('B031510083', 'abc123', 4),
('B031510085', 'abc123', 4),
('B031510086', 'abc123', 4),
('B031510087', 'abc123', 4),
('B031510094', 'abc123', 4),
('B031510099', 'abc123', 4),
('B031510100', 'abc123', 4),
('B031510101', 'abc123', 4),
('B031510109', 'abc123', 4),
('B031510120', 'abc123', 4),
('B031510123', 'abc123', 4),
('B031510125', 'abc123', 4),
('B031510126', 'abc123', 4),
('B031510128', 'abc123', 4),
('B031510129', 'abc123', 4),
('B031510133', 'abc123', 4),
('B031510138', 'abc123', 4),
('B031510142', 'abc123', 4),
('B031510148', 'abc123', 4),
('B031510153', 'abc123', 4),
('B031510155', 'abc123', 4),
('B031510166', 'abc123', 4),
('B031510173', 'abc123', 4),
('B031510175', 'abc123', 4),
('B031510176', 'abc123', 4),
('B031510181', 'abc123', 4),
('B031510182', 'abc123', 4),
('B031510184', 'abc123', 4),
('B031510190', 'abc123', 4),
('B031510191', 'abc123', 4),
('B031510204', 'abc123', 4),
('B031510206', 'abc123', 4),
('B031510209', 'abc123', 4),
('B031510215', 'abc123', 4),
('B031510221', 'abc123', 4),
('B031510223', 'abc123', 4),
('B031510229', 'abc123', 4),
('B031510234', 'abc123', 4),
('b031510241', 'abc123', 4),
('B031510242', 'abc123', 4),
('B031510243', 'abc123', 4),
('B031510244', 'abc123', 4),
('B031510251', 'abc123', 4),
('B031510255', 'abc123', 4),
('B031510263', 'abc123', 4),
('B031510265', 'abc123', 4),
('B031510269', 'abc123', 4),
('B031510273', 'abc123', 4),
('B031510281', 'abc123', 4),
('B031510303', 'abc123', 4),
('B031510313', 'abc123', 4),
('B031510318', 'abc123', 4),
('B031510324', 'abc123', 4),
('B031510326', 'abc123', 4),
('B031510330', 'abc123', 4),
('B031510336', 'abc123', 4),
('B031510337', 'abc123', 4),
('B031510338', 'abc123', 4),
('B031510340', '1234', 4),
('B031510341', 'abc123', 4),
('B031510346', 'abc123', 4),
('B031510352', 'abc123', 4),
('B031510356', 'abc123', 4),
('B031510357', 'abc123', 4),
('B031510366', 'abc123', 4),
('B031510367', 'abc123', 4),
('B031510377', 'abc123', 4),
('B031510385', 'abc123', 4),
('B031510386', 'abc123', 4),
('B031510387', 'abc123', 4),
('B031510392', 'abc123', 4),
('B031510398', 'abc123', 4),
('B031510400', 'abc123', 4),
('B031510405', 'abc123', 4),
('B031510412', 'abc123', 4),
('B031510426', 'abc123', 4),
('B031510430', 'abc123', 4),
('B031510435', 'abc123', 4),
('B031510444', 'abc123', 4),
('B031510445', 'abc123', 4),
('B031510448', 'abc123', 4),
('B031510456', 'abc123', 4),
('B031510464', 'abc123', 4),
('B031510470', 'abc123', 4),
('B031510471', 'abc123', 4),
('B031510477', 'abc123', 4),
('B031510480', 'abc123', 4),
('B031510489', 'abc123', 4),
('B031510498', 'abc123', 4),
('B031510502', 'abc123', 4),
('B031510503', 'abc123', 4),
('B031510507', 'abc123', 4),
('B031510509', 'abc123', 4),
('B031510513', 'abc123', 4),
('B031510519', 'abc123', 4),
('B031510520', 'abc123', 4),
('B031510534', 'abc123', 4),
('B031510543', 'abc123', 4),
('B031510544', 'abc123', 4),
('B031510545', 'abc123', 4),
('B031510547', 'abc123', 4),
('B031510548', 'abc123', 4),
('B031510557', 'abc123', 4),
('B031510561', 'abc123', 4),
('B031510565', 'abc123', 4),
('B031510571', 'abc123', 4),
('B031510577', 'abc123', 4),
('B031510583', 'abc123', 4),
('B031510587', 'abc123', 4),
('B031510591', 'abc123', 4),
('B031510603', 'abc123', 4),
('B031510610', 'abc123', 4),
('B031510635', 'abc123', 4),
('B031510650', 'abc123', 4),
('B031510670', 'abc123', 4),
('B031510674', 'abc123', 4),
('B031510692', 'abc123', 4),
('B031510704', 'abc123', 4),
('B031510709', 'abc123', 4),
('B031510716', 'abc123', 4),
('B031510719', 'abc123', 4),
('B031510731', 'abc123', 4),
('B031510732', 'abc123', 4),
('B031510733', 'abc123', 4),
('B031510735', 'abc123', 4),
('B031510750', 'abc123', 4),
('B031510751', 'abc123', 4),
('B031510764', 'abc123', 4),
('B031510766', 'abc123', 4),
('B031510780', 'abc123', 4),
('B031510789', 'abc123', 4),
('B031510794', 'abc123', 4),
('B031510807', 'abc123', 4),
('B031510813', 'abc123', 4),
('B031510822', 'abc123', 4),
('B031510848', 'abc123', 4),
('B031510849', 'abc123', 4),
('B031510863', 'abc123', 4),
('B031510869', 'abc123', 4),
('B031510874', 'abc123', 4),
('B031510888', 'abc123', 4),
('B031510908', 'abc123', 4),
('B031510924', 'abc123', 4),
('B031510925', 'abc123', 4),
('B031510948', 'abc123', 4),
('B031511005', 'abc123', 4),
('B031511068', 'abc123', 4),
('B031511236', 'abc123', 4),
('B031511255', 'abc123', 4),
('B031511297', 'abc123', 4),
('B031511391', 'abc123', 4),
('B031511564', 'abc123', 4),
('B031512267', 'abc123', 4),
('B031514068', 'abc123', 4),
('B031515021', 'abc123', 4),
('B031515023', 'abc123', 4),
('B031515041', 'abc123', 4),
('B031515045', 'abc123', 4),
('B031515052', 'abc123', 4),
('B031515057', 'abc123', 4),
('B031515059', 'abc123', 4),
('B031515068', 'abc123', 4),
('B031515070', 'abc123', 4),
('B031515095', 'abc123', 4),
('B031515096', 'abc123', 4),
('B031515101', 'abc123', 4),
('B031515108', 'abc123', 4),
('B031515110', 'abc123', 4),
('B031515112', 'abc123', 4),
('B031515115', 'abc123', 4),
('B031515119', 'abc123', 4),
('B031515120', 'abc123', 4),
('B031515145', 'abc123', 4),
('B031515149', 'abc123', 4),
('B031515152', 'abc123', 4),
('B031515157', 'abc123', 4),
('B031515165', 'abc123', 4),
('B031515168', 'abc123', 4),
('B031515170', 'abc123', 4),
('B031515182', 'abc123', 4),
('B031515189', 'abc123', 4),
('B031515205', 'abc123', 4),
('B031515207', 'abc123', 4),
('B031515211', 'abc123', 4),
('B031515213', 'abc123', 4),
('B031515216', 'abc123', 4),
('B031515217', 'abc123', 4),
('B031515222', 'abc123', 4),
('B031515229', 'abc123', 4),
('B031515234', 'abc123', 4),
('B031515235', 'abc123', 4),
('B031515245', 'abc123', 4),
('B031515265', 'abc123', 4),
('B031515276', 'abc123', 4),
('B031515306', 'abc123', 4),
('B031515310', 'abc123', 4),
('B031515317', 'abc123', 4),
('B031515329', 'abc123', 4),
('B031515332', 'abc123', 4),
('B031515337', 'abc123', 4),
('B031515352', 'abc123', 4),
('B031515369', 'abc123', 4),
('B031515382', 'abc123', 4),
('B031515385', 'abc123', 4),
('B031515389', 'abc123', 4),
('B031515398', 'abc123', 4),
('B031515399', 'abc123', 4),
('B031515410', 'abc123', 4),
('B031515415', 'abc123', 4),
('B031515416', 'abc123', 4),
('B031515418', 'abc123', 4),
('B031515429', 'abc123', 4),
('B031515431', 'abc123', 4),
('B031515440', 'abc123', 4),
('B031515451', 'abc123', 4),
('B031515453', 'abc123', 4),
('B031515473', 'abc123', 4),
('B031515480', 'abc123', 4),
('B031515498', 'abc123', 4),
('B031515502', 'abc123', 4),
('B031515506', 'abc123', 4),
('B031515521', 'abc123', 4),
('B031515524', 'abc123', 4),
('B031515529', 'abc123', 4),
('B031515533', 'abc123', 4),
('B031515594', 'abc123', 4),
('B031515609', 'abc123', 4),
('B031515636', 'abc123', 4),
('B031515643', 'abc123', 4),
('B031515676', 'abc123', 4),
('B031515701', 'abc123', 4),
('B031515712', 'abc123', 4),
('B031515716', 'abc123', 4),
('B031515738', 'abc123', 4),
('B031515739', 'abc123', 4),
('B031515756', 'abc123', 4),
('B031515780', 'abc123', 4),
('B031515789', 'abc123', 4),
('B031515793', 'abc123', 4),
('B031515801', 'abc123', 4),
('B031515814', 'abc123', 4),
('B031515817', 'abc123', 4),
('B031515829', 'abc123', 4),
('B031515848', 'abc123', 4),
('B031515860', 'abc123', 4),
('B031515868', 'abc123', 4),
('B031515873', 'abc123', 4),
('B031515882', 'abc123', 4),
('B031515885', 'abc123', 4),
('B031515912', 'abc123', 4),
('B031515916', 'abc123', 4),
('B031515927', 'abc123', 4),
('B031515935', 'abc123', 4),
('B031515952', 'abc123', 4),
('B031515972', 'abc123', 4),
('B031515975', 'abc123', 4),
('B031515977', 'abc123', 4),
('B031515985', 'abc123', 4),
('B031516006', 'abc123', 4),
('B031516016', 'abc123', 4),
('B031516022', 'abc123', 4),
('B031516051', 'abc123', 4),
('B031516063', 'abc123', 4),
('B031516071', 'abc123', 4),
('B031516119', 'abc123', 4),
('B031516181', 'abc123', 4),
('B031516199', 'abc123', 4),
('B031516235', 'abc123', 4),
('B031516270', 'abc123', 4),
('B031516293', 'abc123', 4),
('B031516301', 'abc123', 4),
('B031516328', 'abc123', 4),
('B031516331', 'abc123', 4),
('B031516382', 'abc123', 4),
('B031516399', 'abc123', 4),
('B031516519', 'abc123', 4),
('B031516580', 'abc123', 4),
('B031516591', 'abc123', 4),
('B031516710', 'abc123', 4),
('B031516723', 'abc123', 4),
('B031516754', 'abc123', 4),
('B031516808', 'abc123', 4),
('B031516823', 'abc123', 4),
('B031516855', 'abc123', 4),
('B031516924', 'abc123', 4),
('B031516939', 'abc123', 4),
('B031516946', 'abc123', 4),
('B031517035', 'abc123', 4),
('B031517069', 'abc123', 4),
('B031517078', 'abc123', 4),
('B031517180', 'abc123', 4),
('B031517218', 'abc123', 4),
('B031517391', 'abc123', 4),
('B031517953', 'abc123', 4),
('B031518011', 'abc123', 4),
('B031518423', 'abc123', 4),
('B031518902', 'abc123', 4),
('B031519893', 'abc123', 4),
('B031610362', 'abc123', 4);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `positionID` int(10) NOT NULL,
  `positionName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`positionID`, `positionName`) VALUES
(1, 'Superadmin'),
(2, 'Committee'),
(3, 'Supervisor'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE IF NOT EXISTS `proposal` (
  `proposalID` varchar(35) NOT NULL,
  `abstract` text NOT NULL,
  `submissionDate` date NOT NULL,
  `statusSubmission` varchar(20) NOT NULL,
  `statusProject` varchar(20) NOT NULL,
  `remarks` text NOT NULL,
  `mark` double NOT NULL,
  `sourceP` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `reportID` varchar(35) NOT NULL,
  `reportSubmissionID` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`proposalID`, `abstract`, `submissionDate`, `statusSubmission`, `statusProject`, `remarks`, `mark`, `sourceP`, `type`, `reportID`, `reportSubmissionID`) VALUES
('P01_2017_0', 'The purpose of this project proposal is to design and development of Student Project Management System (e-SPMS) for students and lecturers who involved in the Workshop 1 and Workshop 2 courses. The system will be consists of functions such as project planning, appointment scheduler, project progress tracker, uploading current project progress, online discussion between supervisor and supervisee and task delegation between group leader and members for Workshop 2. Currently, there are no system existed to assist student and lecturer to communicate efficiently and hence resulted difficulty in tracking workshop progress, lack of proper record of discussion and difficulty in scheduling appointment with supervisor. \r\n         The objective of this project is to develop studentsâ€™ project management system that enables students and lecturer to manage their information effectively, to provide a platform to assist students and lecture to schedule an appointment for their project discussion and to create database to keep track previous documents and task effectively.\r\n         The methodologies used to develop the system is by using Agile Development for the System Development Life Cycle (SDLC). There are going to be many testing conducted as this project is being developed to detect the defects of earlier system. As for the database methodology on Database Development Life Cycle (DBLC), it is going to be developed as a top down approach and implemented together with SDLC.\r\n         The primary aim of the task was to design and develop such system which functioned to efficiently manage and track communications between student and lecturers.', '2017-07-24', 'On Time', 'Approve', '', 4.3, 'PROPOSAL PSM B031510006.pdf', 'Proposal', 'R01_2017_0', 2);

--
-- Triggers `proposal`
--
DELIMITER $$
CREATE TRIGGER `after_delete_proposal` AFTER DELETE ON `proposal`
 FOR EACH ROW BEGIN

DECLARE v_reportID varchar(35);

select reportID into v_reportID from report where reportID = OLD.reportID;


UPDATE report set countProposal = countProposal - 1 where reportID = v_reportID;


END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_proposal` AFTER INSERT ON `proposal`
 FOR EACH ROW BEGIN

DECLARE v_reportID varchar(35);

select reportID into v_reportID from proposal where proposalID = NEW.proposalID;

UPDATE report set countProposal = countProposal + 1 where reportID = v_reportID;


END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_insert_proposal` BEFORE INSERT ON `proposal`
 FOR EACH ROW BEGIN

   declare v_typeworkshop varchar(50);

   declare v_dueDate date;

   declare v_subDate date;

   declare v_typeP varchar(50);

   declare v_reportID varchar(50);

   declare v_status varchar(50);
   
    declare v_reportSubmissionID int;

   

   select typeOfWorkshop into v_typeworkshop from report where reportID = NEW.reportID;


    select dueSubmission,reportSubmissionID into v_dueDate,v_reportSubmissionID from reportSubmission where reportType = NEW.type and typeOfWorkshop = v_typeworkshop;

   if (NEW.submissionDate >= v_dueDate)
   then
    
	set NEW.statusSubmission = 'Late';
        set NEW.reportSubmissionID = v_reportSubmissionID;
    
    
   else
	
	set NEW.statusSubmission = 'On Time';
        set NEW.reportSubmissionID = v_reportSubmissionID;

    end if;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `reportID` varchar(35) NOT NULL,
  `title` varchar(60) NOT NULL,
  `typeOfWorkshop` int(10) NOT NULL,
  `matricNum` varchar(20) NOT NULL,
  `countProposal` int(11) NOT NULL,
  `countFinalReport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `title`, `typeOfWorkshop`, `matricNum`, `countProposal`, `countFinalReport`) VALUES
('R01_2017_0', 'Student Supervision Management System (eSSMS)', 1, 'B031510006', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reportsubmission`
--

CREATE TABLE IF NOT EXISTS `reportsubmission` (
  `reportSubmissionID` int(255) NOT NULL,
  `dueSubmission` date NOT NULL,
  `reportType` varchar(20) NOT NULL,
  `typeOfWorkshop` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportsubmission`
--

INSERT INTO `reportsubmission` (`reportSubmissionID`, `dueSubmission`, `reportType`, `typeOfWorkshop`) VALUES
(1, '2017-09-15', 'Proposal', 2),
(2, '2017-07-29', 'Proposal', 1),
(3, '2017-09-18', 'Final Report', 2),
(4, '2017-07-31', 'Final Report', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `matricNum` varchar(20) NOT NULL,
  `studentName` varchar(50) NOT NULL,
  `studentEmail` varchar(50) NOT NULL,
  `studentPhoneNum` varchar(15) NOT NULL,
  `course` varchar(30) NOT NULL,
  `year` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `typeOfWorkshop` int(10) NOT NULL,
  `lecturerID` varchar(20) NOT NULL,
  `statusAssign` varchar(30) NOT NULL,
  `positionID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`matricNum`, `studentName`, `studentEmail`, `studentPhoneNum`, `course`, `year`, `semester`, `typeOfWorkshop`, `lecturerID`, `statusAssign`, `positionID`) VALUES
('B021310095', 'Muhammad Amirul Aqeem Bin Amran', 'amirulaqeem93@gmail.com', '0193953912', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031410148', 'Nur Asma Farihah Binti Mohamad', 'farihahmohamad27@yahoo.com', '0182354115', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031410339', 'Azmanura Binti Tahar', 'azmanura.tahar@gmail.com', '0196306497', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510', 'Muhammad Khairil Bin Abdul Manaf', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031510006', 'Umi Amira Binti Norizan', 'ameeraNor93@gmail.com', '0182846012', 'BITD', 2, 1, 1, '00078', 'Assigned', 4),
('B031510017', 'Mohamad Syawal Bin Abas', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510020', 'Umi Norfatihah Binti Abdul Razak', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031510029', 'Nur Shuhada Nuzaifa Binti Ismail', 'nsni93@gmail.com', '0145415838', 'BITD', 3, 1, 1, '', 'Not Assigned', 4),
('B031510036', 'Chau Wan Ching', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031510037', 'Muhamad Khairuddin B. Che Rosli', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031510049', 'Bovanah A/P Tamil Salvan', 'bovanahtamilsalvan@gmail.com', '60166332203', 'BITD', 3, 1, 2, '00079', 'Assigned', 4),
('B031510054', 'Goh Wen Lin', '', '', 'BITC', 3, 1, 2, '00443', 'Assigned', 4),
('B031510057', 'Teh Jia Hung', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031510060', 'Barbara Anne A/P Joseph Varghese', '', '', 'BITD', 3, 1, 2, '00097', 'Assigned', 4),
('B031510068', 'Nuradibah Bt. Muhamad Yusop', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510072', 'Baarsheila A/P Saravanan', '', '', 'BITC', 2, 1, 1, '00097', 'Assigned', 4),
('B031510082', 'Nur Nasywa Binti Sofi', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031510083', 'Faiz Athirah Binti Hazri', 'faizathirah95@gmail.com', '0125761969', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510085', 'Ummi Najihah Binti Sulaiman', 'najihahalfiqh@gmail.com', '0136598709', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510086', 'Nur Liyana Solehah Binti Arifin', 'anateciq95@gmail.com', '01125404725', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510087', 'Ilya Yasmine Binti Ahmad Shukri', 'ilyayasminee95@gmail.com', '01133405116', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031510094', 'Siti Nurshahira Binti Musa', 'shirashah95@gmail.com', '01126037965', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510099', 'Janagan Nair A/L Kannan', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031510100', 'Intan Suriani Binti Abd Majid', 'rianabdul19@gmail.com', '0127534725', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510101', 'Muhammad Al Fatih Bin Zaidi', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510109', 'Nurul Atiqah Binti Hasbullah', 'atiqahhasbullah2827@gmail.com', '0127825845', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510120', 'Elaine Chy Xin Pin', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510123', 'Kyle Brendan Fernandez', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510125', 'Thanes A/L Sukumaran', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510126', 'Farah Diyana Binti Mohd Sazali ', 'fara17895@gmail.com', '01119994136', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510128', 'Yee Yan Jin', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510129', 'Fathonah Binti Bukhari', 'fathonahbukhari95@gmail.com', '0174683106', 'BITS', 2, 1, 1, '00078', 'Assigned', 4),
('B031510133', 'Mohamad Danial Iman Bin Mohamadriza', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031510138', 'Nur Natasya Atilia Bt Mazni', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510142', 'Nur Fathirah Binti Arani', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510148', 'Choo Zhi Yan', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031510153', 'Norsyazwani Binti Abdual Latiwf', 'zaysron@gmail.com', '0129765558', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510155', 'Nurul Najwa Binti Zaidi', 'mismyung726@gmail.com', '0148076922', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510166', 'Noor Azleen Binti Anuar', 'azleen96@gmail.com', '0129937022', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510173', 'Ezekiel Teo Hong Ming', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510175', 'Azmin B Lazarubi', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510176', 'Beh Ci Feng', '', '', 'BITS', 3, 1, 2, '00079', 'Assigned', 4),
('B031510181', 'Lim Calson', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031510182', 'Fatin Amiera Nadhirah Binti Shamshol', 'amieranadhirah96@gmail.com', '0193122435', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510184', 'Junaidah Binti Idrus', 'junaidah.zairus@gmail.com', '0174593058', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510190', 'Nur Izatti Binti Mohd Nazir', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510204', 'Kaarthiani A/L Rajendran', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510206', 'Fatin Amirah Binti Ngadiran', 'fatin2amirah.me@gmail.com', '0137271322', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510209', 'Sakthivel A/L Kannan', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510215', 'Yuvanesan  A/L  Somasundram', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510221', 'Nur Adlina Batrisyia Binti Rosli', 'adlinabatrisyia@outlook.com', '0123548981', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510223', 'Vijayah Suriya Varman A/L Manimaran', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510229', 'Elfereena Sannie Anak Majang', 'yugurehikari96@gmail.com', '0168725526', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510234', 'Lim Yi Shi', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510241', 'Rosnina Binti Husin', ' rosninahusin@gmail.com', '0173899260', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510242', 'Olga Vivian John', 'olgaiden@gmail.com', '0138522605', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510243', 'Nur Salsadila Darween Bitti Mohd Nawi', 'salsadiladarween@gmail.com', '01139890562', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510244', 'Nurshazlia Binti Ahmad Alias', 'noraliashazliaalias@gmail.com', '0134866344', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510251', 'Wong Lin Tatt', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510255', 'Muhammad Khairul Bin Abdul Manaf', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031510263', 'Nur Najwa Nazihah Binti Lokman', 'nurnajwanazihah@gmail.com', '0173719695', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510265', 'Jackson Sow Wei Song', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510269', 'Muhamad Hafiy B. Afandi', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510273', 'Navindra A/L Ramaya', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510281', 'Neeraj Haarish Thevar', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510303', 'Nur Syarafana Binti Mihsin', 'syarafanamihsin@gmail.com', '0143123291', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031510313', 'Cheah Yew Siang', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031510318', 'Noor Atika Izwani Binti Izhar', 'aizwani10@gmail.com', '0133791220', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510324', 'Nurinazila Binti Shahlan', ' nuriendshahlan@gmail.com', '0147764707', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510326', 'Hemakassturi A/P Rajaratinam', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510330', 'Siti Ayunazura Binti Jamali @Jamani', 'ayunazurajamani@yahoo.com', '0177198554', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510336', 'Nor Shahira Bt. Md. Anuar', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510337', 'Ayusrina Zahiri Binti Imam', 'inazahiri12@gmail.com', '01114209020', 'BITE', 2, 1, 1, '00079', 'Assigned', 4),
('B031510338', 'Inka Qurratuayyun', 'inka.kiu@gmail.com', '0196730427', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510340', 'Nurul Ida Farhana Binti Abdull Hadi', 'nurulidafarhana@gmail.com', '0122975387', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510341', 'Hanis Wadiha Binti Azhar', 'haniswadiha@gmail.com', '0176571458', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510346', 'Hooi Mun Fung', '', '', 'BITC', 3, 1, 2, '00443', 'Assigned', 4),
('B031510352', 'Nurul Najwa Liyana Binti Mazlan', 'nurulnajwaliyanamazlan@gmail.com', '0172017479', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510356', 'Nurul Najwa Bt. Nordin', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510357', 'Nor Hafizah Binti Ibrahim', 'norhafizahibrahim3@gmail.com', '0184013761', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510366', 'Nurulfatihah Izzaty Binti Naruamran', 'izzatyamran96@gmail.com', '0176756758', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510367', 'Muhammad Johan Bin Tohir', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510377', 'Denilson Hooi Phng Lun', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510385', 'Azmira Binti Abdul Wahid', 'azmira.abdulwahid@gmail.com', '0147010126', 'BITD', 3, 1, 2, '00078', 'Assigned', 4),
('B031510386', 'Sivaneswari A/P Krishnan', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031510387', 'Nazliatul Nadua Binti Kamarudin', 'nazliatulnadua@gmail.com', '0172457096', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510392', 'Nurul Izah Binti Zulkefle', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510398', 'Santhinin A/P Raja', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510400', 'Ang Hui Chin', '', '', 'BITS', 3, 1, 2, '00079', 'Assigned', 4),
('B031510405', 'Teoh Chee Shen', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510412', 'Shalini A/P Sangar', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510426', 'Norfazlyane Binti Mohd Zamri', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031510430', 'Rajieswary A/P Gunasegaran', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510435', 'Tan Zhi Sen', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510444', 'Nurul Hafitah Binti Khairilanuar', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510445', 'Surendran A/L Kumaran', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031510448', 'Siti Noor Atikah Bt Md Saad', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510456', 'Nur Emyshazliana Binti Roselan', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510464', 'Melisa Sri A/P Tamil Selvan', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510470', 'Dheepaa  A/P Subramaniam', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510471', 'Muhamad Amir Al-Hakim B Mohd Asri', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031510477', 'Joshua Loh Ka Kin', '', '', 'BITC', 3, 1, 2, '00443', 'Assigned', 4),
('B031510480', 'Priya Lachmy A/P Supermaniam', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510489', 'Navin Raj A/L Subramaniam', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510498', 'Nurul Aina Anis Bt. Alis', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510502', 'Diyaashini  A/P Muniandy', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510503', 'Kevin Raj A/L  Christoper', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510507', 'Punaneswaran A/L Ramu', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510509', 'Munindran A/L Yugumaran', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031510513', 'Muhammad Yusri Bin Mohd Yusoff', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510519', 'Gajendran A/L Ravi', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031510520', 'Faslina Fajar Btabd Azis', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510534', 'Sherrin Ooi Ann Gee', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510543', 'Lim Jia Hee', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510544', 'Lim Chia Ern', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031510545', 'Sri Raman A/L Manimaran', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510547', 'Muhammad Aliff Amirul B. Ahmad Sofi', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510548', 'Vijayetharsiny A/P Marimuthu', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510557', 'Surenthiren A/L Vasau', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031510561', 'Ang Ken Xen', '', '', 'BITC', 3, 1, 2, '00443', 'Assigned', 4),
('B031510565', 'Muhammad Danial Hakimi Bin Mohamad Kassim Kaesevan', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510571', 'Tinesh A/L Ganeson', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510577', 'Tharvinth A/L Kumereshwaran', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510583', 'Au Jia Kyn', '', '', 'BITS', 3, 1, 2, '00078', 'Assigned', 4),
('B031510587', 'Tan Boon Pin', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510591', 'Cheah Ruey Yang', '', '', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031510603', 'Micheal Shan  A/L  William Jayaraj', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510610', 'Annushia A/P Masilamoney', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510635', 'Tan Zi Ying', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510650', 'Tatchayeeny   A/P  Ganesan', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510670', 'Tevatarusi  A/P  Rajadran', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510674', 'Rupne A/P Kalaselvam', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510692', 'Revathi A/P Marathandavar', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510704', 'Santhini A/P Bernadick', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510709', 'Thines Kumar A/L Arumugam', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031510716', 'Bhrunthashini A/P Karhikesan', '', '', 'BITS', 3, 1, 2, '00079', 'Assigned', 4),
('B031510719', 'Sanjitharan A/L Tageraju', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510731', 'Karannagaraj  A/L  Subramaniam', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510732', 'Siti Nur Darwishah Bt Azahar', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031510733', 'Arun  A/L  Kummar', 'arun11@yahoo.com', '0139578989', 'BITS', 3, 1, 2, '00078', 'Assigned', 4),
('B031510735', 'Muhammad Firdaus Bin Hashim', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510750', 'Nurul Izzah Bt. Roslan', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510751', 'Yagesrajah  A/L  Ragoo', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510764', 'Ravenya A/P Muniandy', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510766', 'Kaarthini A/P Subramaniam', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510780', 'Siti Aishah Bt Omar', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510789', 'Mohamad Aiman Danial Bin Mohamad Azri', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031510794', 'Thenarasi A/P Karonagaran', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031510807', 'Yakaskumar  A/L  Ragoo', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510813', 'Lim Jia Wei', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031510822', 'Noorzamira Bt Kaliq Jamal', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510848', 'Kharthika A/P Kalaiselvan', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031510849', 'Jayalaxmanan  A/L  Krishnan', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031510863', 'Dineswaran A/L Murugan', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031510869', 'Muhamad Faizridzuan Bin Osman', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031510874', 'Yageswary  A/ P  Ragoo', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510888', 'Uthaya A/P Saravanan', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510908', 'Kanchana A/P Thamotharan', '', '', 'BITC', 3, 1, 2, '00443', 'Assigned', 4),
('B031510924', 'Vaishnavi A/P Aruldas', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031510925', 'Navindran A/L S. Karnen', '', '', 'BITD', 2, 1, 1, '', 'Not Assigned', 4),
('B031510948', 'Thurga A/L Rajoo', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031511005', 'Kanagaveeran A/L Kuppusamy', '', '', 'BITD', 3, 1, 2, '', 'Not Assigned', 4),
('B031511068', 'Trisha A/P Paranthaman', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031511236', 'Jananee A/P Murti', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031511255', 'Kok Boon Chen', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031511297', 'Muhammad Hasjefri Bin Nasir', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031511391', 'Kabillannan A/L Thiagarajan', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031511564', 'Yashwiny A/P Munusamy', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031512267', 'Tamichelvan A/L Meenachi Sundram', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031514068', 'Lim Yen Gee', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031515021', 'Muhammad Nizam Omar', '', '', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031515023', 'Vinodraj A/L Munusamy', '', '', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031515041', 'Mohamad Azmannuddin Bin Mohd Yusof', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515045', 'Gunaseelan A/L Meenachisundram', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031515052', 'Looi Sen Mei', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515057', 'Lee Xi Su', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031515059', 'Uthayashangkari  A/P  Subramaniam', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515068', 'Nur Syerina Azlin Binti Mohamad Jamil', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031515070', 'Megeshree A/P Muniswaran', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031515095', 'Lee Yong Wei', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031515096', 'Saranya A/P Gunalan', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031515101', 'Ng Weng Meng', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031515108', 'Siti Nur Alia Binti Mohamad Rosli', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515110', 'Yegathrashini A/P Morali', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031515112', 'Puspa A/P Mogan', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031515115', 'Dinesh A/L Sive Selvam', '', '', 'BITZ', 2, 1, 1, '', 'Not Assigned', 4),
('B031515119', 'Lim Yuan Poh', '', '', 'BITS', 2, 1, 1, '00097', 'Assigned', 4),
('B031515120', 'Mohamad Danial Bin Sazali', '', '', 'BITS', 2, 1, 1, '04127', 'Assigned', 4),
('B031515145', 'Mohamad Shah Nawawi Bin Roslan', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031515149', 'Lee Chun Ming', '', '', 'BITZ', 2, 1, 1, '', 'Not Assigned', 4),
('B031515152', 'Yashilawathi A/P Manivelen', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031515157', 'Wong Jia Shen', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031515165', 'Thiam Ji Hau', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515168', 'Choo Zhi Ying', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031515170', 'Sivaranjini A/P Shingaravelan', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031515182', 'Tharshini A/P Muniandy', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031515189', 'Thevakumaran A/L Raman', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031515205', 'Sharvin A/L Narayanasamy', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515207', 'Puneswaran A/L Kalaichelvam', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031515211', 'Shobenesh  A/L Asogan', '', '', 'BITS', 2, 1, 1, '04127', 'Assigned', 4),
('B031515213', 'Mimie Ezzaty Binti Zulkefli', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515216', 'Yuvarajan A/L  Pandian', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515217', 'Vesagen A/L Vitalingam', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515222', 'Sivakarthiyani A/P Karthikesen', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515229', 'Mohammad Ezwan Bin Rosdi', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515234', 'Kavithha A/P Muniandy', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031515235', 'Pragas Kumar A/L Krishnamoorthy', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031515245', 'Durgeswaran A/L Ravitheran', '', '', 'BITZ', 2, 1, 1, '', 'Not Assigned', 4),
('B031515265', 'Khaw Kai Chin', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515276', 'Hemavathy  A/P  Padmanabhan', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031515306', 'Nur Syahirah Binti Mohd Ghazali', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515310', 'Kirubagarry A/P Sarathamany', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515317', 'Poovarasen A/L Murrugan (Pa)', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031515329', 'Tan Qing Zhan', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031515332', 'Rossheinee A/P Parthiban', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031515337', 'Dipenraj A/L Suchu', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515352', 'Chew Chuan Tong', '', '', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031515369', 'Devendram  A/L  Mohansundram', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515382', 'Kau Pik Qin', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031515385', 'Harihareshwar A/L Manivelen', '', '', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031515389', 'Mugilan A/L Ramachdran', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515398', 'Revadhy A/P Danasingam', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031515399', 'Jagatis A/L Thorairaji', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031515410', 'Tan Ruo Jing', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515415', 'Fong Ching Yong', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515416', 'Tang Mann Qi', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031515418', 'Gugaanesvaary A/P Doraraj', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031515429', 'Kiren Raj A/L Gur Bak Shis Singh', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031515431', 'Chee Kee Chueng', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515440', 'Tan Hui Yun', '', '', 'BITZ', 2, 1, 1, '', 'Not Assigned', 4),
('B031515451', 'Mohamad Syafiin Bin Firman', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031515453', 'Ligen Kumar A/L Tamil Selvan', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031515473', 'Steve Victor A/L Alex Terry', '', '', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031515480', 'Nur Nabila Natasya Binti Mohd Ridzuan', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031515498', 'Nor Farisha Dayana Binti A''Azizan', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031515502', 'Daranniya A/P Thiagarajan', '', '', 'BITC', 2, 1, 1, '00078', 'Assigned', 4),
('B031515506', 'Mahaletchumi A/P Raman', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031515521', 'Vicnesshwaran A/L Subramaniam', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031515524', 'Vannashrre A/P Veloo', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031515529', 'Lim Kai Hong', '', '', 'BITZ', 2, 1, 1, '', 'Not Assigned', 4),
('B031515533', 'P''Ng Boon Aik', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031515594', 'Lim Chia Er', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031515609', 'Teo Yee Siang', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515636', 'Christina Tan Pyee Ying', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031515643', 'Cheah Ruey Shien', '', '', 'BITE', 2, 1, 1, '00097', 'Assigned', 4),
('B031515676', 'Vashvini A/P Subramaniam', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031515701', 'Sharvin A/L Renggarajoo', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031515712', 'Tan Jia Jia', '', '', 'BITM', 2, 1, 1, '', 'Not Assigned', 4),
('B031515716', 'Keethashini A/P Ganeson', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515738', 'Nannthini  A/P  Thiagarajan', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515739', 'Leon Wei Heng', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031515756', 'Tanusha A/P Parasraman', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031515780', 'Ooi Mei Kim', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031515789', 'Muhammad Arif Bin A Zahrin', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031515793', 'Mohamad Nazirul Mubin Bin Mohd Talib', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515801', 'Muhamad Ajmal Bin Yacop', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515814', 'Khesvini Nair A/P Kannan', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515817', 'Liw Kai Rou', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515829', 'Mohammad Firdaus Faiq Bin Alis', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031515848', 'Tan Min Yi', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031515860', 'Sharanya A/P Manogaran', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515868', 'Revsyashini  A/P  Marimuthu', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031515873', 'Chong Wai Khuan', '', '', 'BITS', 2, 1, 1, '00079', 'Assigned', 4),
('B031515882', 'Tan Siew Chin', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031515885', 'Navin Raj A/L Gunalan', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515912', 'Nishaanthinie A/P Thirumoorthi Rao', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031515916', 'Jevendan A/L Athere', '', '', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031515927', 'Thor He Jin', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031515935', 'Ooi Wooi Siang', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031515952', 'Nur Amirah Bt Abd Majid', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515972', 'Leeviyahsree A/P Magindran', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515975', 'Vikneswaran A/L Ganeson', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515977', 'Muhamad Zulfaqar Bin Yusoff', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031515985', 'Jprakash Thevar A/L Jai Rajkumar', '', '', 'BITZ', 2, 1, 1, '', 'Not Assigned', 4),
('B031516006', 'Siti Nur Zaleha  Binti Abdullah', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031516016', 'Kasturi A/P Kalidass', '', '', 'BITS', 3, 1, 2, '', 'Not Assigned', 4),
('B031516022', 'Muhammad Syazwan Bin Suhaimi', '', '', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031516051', 'Mohamad Haikal Nazarul Mukminin B Mokhtar', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031516063', 'Praveen Raj A/L Gunasegaran', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031516071', 'Goh Cheng Xian', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031516119', 'Elanmaran A/L Kanniekumar', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031516181', 'Darshan A/L Siva', '', '', 'BITZ', 2, 1, 1, '', 'Not Assigned', 4),
('B031516199', 'Saminthara  Raaj  A/L Umabathy', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031516235', 'Teoh Jia Hong', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031516270', 'Siti Noor Anisshah', '', '', 'BITZ', 2, 1, 1, '', 'Not Assigned', 4),
('B031516293', 'Arvin A/L Angineera', '', '', 'BITE', 2, 1, 1, '00079', 'Assigned', 4),
('B031516301', 'Madhavanaiker A/L  Balakrishnan', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031516328', 'Shalini A/P Andy', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031516331', 'Sheyran A/L Perathewanan', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031516382', 'Venus Choong Ching', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031516399', 'Mohd. Afiq Afifi Bin Abdullah', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031516519', 'Yugendran A/L Parameswaran', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031516580', 'Yogethini A/P Nareinteran', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031516591', 'Muhammad Suryadi Bin Karsiti', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031516710', 'Siti Ainn Athira Binti Azmi', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031516723', 'Sughanraj A/L Ravindran', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031516754', 'Nur Shazlina Izzati Binti Shaifulnizam', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031516808', 'Povarasan  Raj A/L Muniandy', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031516823', 'Mathuri A/P Chandran', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031516855', 'Mohd Asmawi Bakiri Bin Ramli', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031516924', 'Dasharathan A/L Manimaran', '', '', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031516939', 'Boon Kai  Wing', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031516946', 'Kaanjjanaa  A/P Somasundaram', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031517035', 'Muhammad Joni Bin Tohir', '', '', 'BITC', 2, 1, 1, '', 'Not Assigned', 4),
('B031517069', 'Sooria A/L Balakrishnan', '', '', 'BITS', 2, 1, 1, '', 'Not Assigned', 4),
('B031517078', 'Saarmithaa A/P Avli', '', '', 'BITC', 3, 1, 2, '', 'Not Assigned', 4),
('B031517180', 'Kirtanah A/P Karonagaran', '', '', 'BITE', 3, 1, 2, '', 'Not Assigned', 4),
('B031517218', 'Thanes A/L Krishnan', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031517391', 'Loheswaran A/L Aruldas', '', '', 'BITM', 3, 1, 2, '', 'Not Assigned', 4),
('B031517953', 'Mathivanan A/L Loganathan', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031518011', 'Pugeneswari A/P Sethubathi', '', '', 'BITZ', 3, 1, 2, '', 'Not Assigned', 4),
('B031518423', 'Jiwaa A/L Devan', '', '', 'BITI', 3, 1, 2, '', 'Not Assigned', 4),
('B031518902', 'Mohamad Amirul Daniel B Mohamad Jamil', '', '', 'BITE', 2, 1, 1, '', 'Not Assigned', 4),
('B031519893', 'Rhamadani Bin Ansan', '', '', 'BITI', 2, 1, 1, '', 'Not Assigned', 4),
('B031610362', 'Muhammad Zarif Binti Zulkafli', 'zarif.zulkafli@gmail.com', '0162422846', 'BITM', 3, 1, 2, '', 'Not Assigned', 4);

-- --------------------------------------------------------

--
-- Table structure for table `workshopregistration`
--

CREATE TABLE IF NOT EXISTS `workshopregistration` (
  `id` int(225) NOT NULL,
  `matricNum` varchar(20) NOT NULL,
  `typeOfWorkshop` int(10) NOT NULL,
  `session` varchar(12) NOT NULL,
  `semester` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=317 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshopregistration`
--

INSERT INTO `workshopregistration` (`id`, `matricNum`, `typeOfWorkshop`, `session`, `semester`) VALUES
(1, 'B031410148', 1, '2017/2018', 1),
(2, 'B031410339', 1, '2017/2018', 2),
(3, 'B031510006', 1, '2017/2018', 1),
(4, 'B031510029', 1, '2017/2018', 1),
(5, 'B031510083', 1, '2017/2018', 1),
(6, 'B031510085', 1, '2017/2018', 1),
(7, 'B031510086', 1, '2017/2018', 1),
(8, 'B031510087', 1, '2017/2018', 1),
(9, 'B031510094', 1, '2017/2018', 1),
(10, 'B031510100', 1, '2017/2018', 1),
(11, 'B031510109', 1, '2017/2018', 1),
(12, 'B031510126', 1, '2017/2018', 1),
(13, 'B031510129', 1, '2017/2018', 1),
(14, 'B031510153', 2, '2017/2018', 1),
(15, 'B031510155', 1, '2017/2018', 1),
(16, 'B031510166', 1, '2017/2018', 1),
(17, 'B031510182', 2, '2017/2018', 1),
(18, 'B031510184', 2, '2017/2018', 1),
(19, 'B031510191', 1, '2017/2018', 1),
(20, 'B031510206', 2, '2017/2018', 1),
(21, 'B031510221', 1, '2017/2018', 1),
(22, 'B031510229', 2, '2017/2018', 1),
(23, 'B031510241', 2, '2017/2018', 1),
(24, 'B031510242', 2, '2017/2018', 1),
(25, 'B031510243', 2, '2017/2018', 1),
(26, 'B031510244', 2, '2017/2018', 1),
(27, 'B031510263', 2, '2017/2018', 1),
(28, 'B031510303', 1, '2017/2018', 1),
(29, 'B031510318', 2, '2017/2018', 1),
(30, 'B031510324', 2, '2017/2018', 1),
(31, 'B031510330', 2, '2017/2018', 1),
(32, 'B031510337', 1, '2017/2018', 1),
(33, 'B031510338', 2, '2017/2018', 1),
(34, 'B031510340', 2, '2017/2018', 1),
(35, 'B031510341', 2, '2017/2018', 1),
(36, 'B031510352', 2, '2017/2018', 1),
(37, 'B031510357', 2, '2017/2018', 1),
(38, 'B031510366', 2, '2017/2018', 1),
(39, 'B031510385', 2, '2017/2018', 1),
(40, 'B031510387', 2, '2017/2018', 1),
(41, 'B031610362', 2, '2017/2018', 1),
(42, 'B021310095', 2, '2017/2018', 1),
(44, 'B031510591', 1, '2017/2018', 1),
(45, 'B031515352', 1, '2017/2018', 1),
(46, 'B031515873', 1, '2017/2018', 1),
(47, 'B031516924', 1, '2017/2018', 1),
(48, 'B031515385', 1, '2017/2018', 1),
(49, 'B031515916', 1, '2017/2018', 1),
(50, 'B031515119', 1, '2017/2018', 1),
(51, 'B031515120', 1, '2017/2018', 1),
(52, 'B031515021', 1, '2017/2018', 1),
(53, 'B031516022', 1, '2017/2018', 1),
(54, 'B031515211', 1, '2017/2018', 1),
(55, 'B031517069', 1, '2017/2018', 1),
(56, 'B031515473', 1, '2017/2018', 1),
(57, 'B031515023', 1, '2017/2018', 1),
(58, 'B031515636', 2, '2017/2018', 1),
(59, 'B031516016', 2, '2017/2018', 1),
(60, 'B031515382', 2, '2017/2018', 1),
(61, 'B031515234', 2, '2017/2018', 1),
(62, 'B031515868', 2, '2017/2018', 1),
(63, 'B031515524', 2, '2017/2018', 1),
(64, 'B031515676', 2, '2017/2018', 1),
(65, 'B031515152', 2, '2017/2018', 1),
(66, 'B031510733', 2, '2017/2018', 1),
(67, 'B031510583', 2, '2017/2018', 1),
(68, 'B031510313', 2, '2017/2018', 1),
(69, 'B031510099', 2, '2017/2018', 1),
(70, 'B031510181', 2, '2017/2018', 1),
(71, 'B031510813', 2, '2017/2018', 1),
(72, 'B031510557', 2, '2017/2018', 1),
(73, 'B031510057', 2, '2017/2018', 1),
(74, 'B031510400', 2, '2017/2018', 1),
(75, 'B031510176', 2, '2017/2018', 1),
(76, 'B031510716', 2, '2017/2018', 1),
(77, 'B031510036', 2, '2017/2018', 1),
(78, 'B031510148', 2, '2017/2018', 1),
(79, 'B031511236', 2, '2017/2018', 1),
(80, 'B031510544', 2, '2017/2018', 1),
(81, 'B031514068', 2, '2017/2018', 1),
(82, 'B031510430', 1, '2017/2018', 1),
(83, 'B031510692', 1, '2017/2018', 1),
(84, 'B031510398', 1, '2017/2018', 1),
(85, 'B031510650', 1, '2017/2018', 1),
(86, 'B031510670', 1, '2017/2018', 1),
(87, 'B031510888', 1, '2017/2018', 1),
(88, 'B031510173', 1, '2017/2018', 1),
(89, 'B031510265', 1, '2017/2018', 1),
(90, 'B031510547', 1, '2017/2018', 1),
(91, 'B031510565', 1, '2017/2018', 1),
(92, 'B031510513', 1, '2017/2018', 1),
(93, 'B031510273', 1, '2017/2018', 1),
(94, 'B031510925', 1, '2017/2018', 1),
(95, 'B031510281', 1, '2017/2018', 1),
(96, 'B031510507', 2, '2017/2018', 1),
(97, 'B031510587', 2, '2017/2018', 1),
(98, 'B031510435', 2, '2017/2018', 1),
(99, 'B031510635', 2, '2017/2018', 1),
(100, 'B031510405', 2, '2017/2018', 1),
(101, 'B031510125', 2, '2017/2018', 1),
(102, 'B031510060', 2, '2017/2018', 1),
(103, 'B031510502', 2, '2017/2018', 1),
(104, 'B031510120', 2, '2017/2018', 1),
(105, 'B031510234', 2, '2017/2018', 1),
(106, 'B031510464', 2, '2017/2018', 1),
(107, 'B031510456', 2, '2017/2018', 1),
(108, 'B031510142', 2, '2017/2018', 1),
(109, 'B031510190', 2, '2017/2018', 1),
(110, 'B031510750', 2, '2017/2018', 1),
(111, 'B031510480', 2, '2017/2018', 1),
(112, 'B031510448', 2, '2017/2018', 1),
(113, 'B031510128', 2, '2017/2018', 1),
(114, 'B031510377', 2, '2017/2018', 1),
(115, 'B031510849', 2, '2017/2018', 1),
(116, 'B031511005', 2, '2017/2018', 1),
(117, 'B031510731', 2, '2017/2018', 1),
(118, 'B031510017', 2, '2017/2018', 1),
(119, 'B031510367', 2, '2017/2018', 1),
(120, 'B031517035', 1, '2017/2018', 1),
(121, 'B031510251', 1, '2017/2018', 1),
(122, 'B031510751', 1, '2017/2018', 1),
(123, 'B031510072', 1, '2017/2018', 1),
(124, 'B031510470', 1, '2017/2018', 1),
(125, 'B031510520', 1, '2017/2018', 1),
(126, 'B031510326', 1, '2017/2018', 1),
(127, 'B031510204', 1, '2017/2018', 1),
(128, 'B031510766', 1, '2017/2018', 1),
(129, 'B031510336', 1, '2017/2018', 1),
(130, 'B031510356', 1, '2017/2018', 1),
(131, 'B031510794', 1, '2017/2018', 1),
(132, 'B031510924', 2, '2017/2018', 1),
(133, 'B031511564', 2, '2017/2018', 1),
(134, 'B031510561', 2, '2017/2018', 1),
(135, 'B031510346', 2, '2017/2018', 1),
(136, 'B031510477', 2, '2017/2018', 1),
(137, 'B031510503', 2, '2017/2018', 1),
(138, 'B031510489', 2, '2017/2018', 1),
(139, 'B031510719', 2, '2017/2018', 1),
(140, 'B031510545', 2, '2017/2018', 1),
(141, 'B031510571', 2, '2017/2018', 1),
(142, 'B031510807', 2, '2017/2018', 1),
(143, 'B031510215', 2, '2017/2018', 1),
(144, 'B031510054', 2, '2017/2018', 1),
(145, 'B031510908', 2, '2017/2018', 1),
(146, 'B031510138', 2, '2017/2018', 1),
(147, 'B031510444', 2, '2017/2018', 1),
(148, 'B031510674', 2, '2017/2018', 1),
(149, 'B031510704', 2, '2017/2018', 1),
(150, 'B031510780', 2, '2017/2018', 1),
(151, 'B031511068', 2, '2017/2018', 1),
(152, 'B031510874', 2, '2017/2018', 1),
(153, 'B031511255', 2, '2017/2018', 1),
(154, 'B031510123', 2, '2017/2018', 1),
(155, 'B031510269', 2, '2017/2018', 1),
(156, 'B031510101', 2, '2017/2018', 1),
(157, 'B031515207', 2, '2017/2018', 1),
(158, 'B031510209', 1, '2017/2018', 1),
(159, 'B031512267', 1, '2017/2018', 1),
(160, 'B031510577', 1, '2017/2018', 1),
(161, 'B031510223', 1, '2017/2018', 1),
(162, 'B031515157', 1, '2017/2018', 1),
(163, 'B031510610', 1, '2017/2018', 1),
(164, 'B031510848', 1, '2017/2018', 1),
(165, 'B031510822', 1, '2017/2018', 1),
(166, 'B031510068', 1, '2017/2018', 1),
(167, 'B031510498', 1, '2017/2018', 1),
(168, 'B031510764', 1, '2017/2018', 1),
(169, 'B031510412', 1, '2017/2018', 1),
(170, 'B031510534', 1, '2017/2018', 1),
(171, 'B031515712', 1, '2017/2018', 1),
(172, 'B031515416', 2, '2017/2018', 1),
(173, 'B031516382', 2, '2017/2018', 1),
(174, 'B031510175', 2, '2017/2018', 1),
(175, 'B031516939', 2, '2017/2018', 1),
(176, 'B031516071', 2, '2017/2018', 1),
(177, 'B031511391', 2, '2017/2018', 1),
(178, 'B031515429', 2, '2017/2018', 1),
(179, 'B031515095', 2, '2017/2018', 1),
(180, 'B031515739', 2, '2017/2018', 1),
(181, 'B031510543', 2, '2017/2018', 1),
(182, 'B031517391', 2, '2017/2018', 1),
(183, 'B031510603', 2, '2017/2018', 1),
(184, 'B031510789', 2, '2017/2018', 1),
(185, 'B031510735', 2, '2017/2018', 1),
(186, 'B031515317', 2, '2017/2018', 1),
(187, 'B031516808', 2, '2017/2018', 1),
(188, 'B031515329', 2, '2017/2018', 1),
(189, 'B031516235', 2, '2017/2018', 1),
(190, 'B031516823', 2, '2017/2018', 1),
(191, 'B031510392', 2, '2017/2018', 1),
(192, 'B031515780', 2, '2017/2018', 1),
(193, 'B031515112', 2, '2017/2018', 1),
(194, 'B031515882', 2, '2017/2018', 1),
(195, 'B031510548', 2, '2017/2018', 1),
(196, 'B031515110', 2, '2017/2018', 1),
(197, 'B031516580', 2, '2017/2018', 1),
(198, 'B031516293', 1, '2017/2018', 1),
(199, 'B031515643', 1, '2017/2018', 1),
(200, 'B031516119', 1, '2017/2018', 1),
(201, 'B031510519', 1, '2017/2018', 1),
(202, 'B031515057', 1, '2017/2018', 1),
(203, 'B031518902', 1, '2017/2018', 1),
(204, 'B031510869', 1, '2017/2018', 1),
(205, 'B031510037', 1, '2017/2018', 1),
(206, 'B031515101', 1, '2017/2018', 1),
(207, 'B031515935', 1, '2017/2018', 1),
(208, 'B031516331', 1, '2017/2018', 1),
(209, 'B031510445', 1, '2017/2018', 1),
(210, 'B031510709', 1, '2017/2018', 1),
(211, 'B031516946', 1, '2017/2018', 1),
(212, 'B031510426', 2, '2017/2018', 1),
(213, 'B031516328', 2, '2017/2018', 1),
(214, 'B031510732', 2, '2017/2018', 1),
(215, 'B031515170', 2, '2017/2018', 1),
(216, 'B031515848', 2, '2017/2018', 1),
(217, 'B031515756', 2, '2017/2018', 1),
(218, 'B031515182', 2, '2017/2018', 1),
(219, 'B031510948', 2, '2017/2018', 1),
(220, 'B031510863', 2, '2017/2018', 1),
(221, 'B031516301', 2, '2017/2018', 1),
(222, 'B031510133', 2, '2017/2018', 1),
(223, 'B031510471', 2, '2017/2018', 1),
(224, 'B031511297', 2, '2017/2018', 1),
(225, 'B031510', 2, '2017/2018', 1),
(226, 'B031510255', 2, '2017/2018', 1),
(227, 'B031510509', 2, '2017/2018', 1),
(228, 'B031515701', 2, '2017/2018', 1),
(229, 'B031515927', 2, '2017/2018', 1),
(230, 'B031515276', 2, '2017/2018', 1),
(231, 'B031517180', 2, '2017/2018', 1),
(232, 'B031515506', 2, '2017/2018', 1),
(233, 'B031510082', 2, '2017/2018', 1),
(234, 'B031515398', 2, '2017/2018', 1),
(235, 'B031515332', 2, '2017/2018', 1),
(236, 'B031510386', 2, '2017/2018', 1),
(237, 'B031510020', 2, '2017/2018', 1),
(238, 'B031515045', 1, '2017/2018', 1),
(239, 'B031515399', 1, '2017/2018', 1),
(240, 'B031515453', 1, '2017/2018', 1),
(241, 'B031517953', 1, '2017/2018', 1),
(242, 'B031515145', 1, '2017/2018', 1),
(243, 'B031515451', 1, '2017/2018', 1),
(244, 'B031515829', 1, '2017/2018', 1),
(245, 'B031515789', 1, '2017/2018', 1),
(246, 'B031516591', 1, '2017/2018', 1),
(247, 'B031515533', 1, '2017/2018', 1),
(248, 'B031515235', 1, '2017/2018', 1),
(249, 'B031519893', 1, '2017/2018', 1),
(250, 'B031515189', 1, '2017/2018', 1),
(251, 'B031515521', 1, '2017/2018', 1),
(252, 'B031516519', 2, '2017/2018', 1),
(253, 'B031515716', 2, '2017/2018', 1),
(254, 'B031515310', 2, '2017/2018', 1),
(255, 'B031515972', 2, '2017/2018', 1),
(256, 'B031515052', 2, '2017/2018', 1),
(257, 'B031515738', 2, '2017/2018', 1),
(258, 'B031515952', 2, '2017/2018', 1),
(259, 'B031515306', 2, '2017/2018', 1),
(260, 'B031515860', 2, '2017/2018', 1),
(261, 'B031516710', 2, '2017/2018', 1),
(262, 'B031515108', 2, '2017/2018', 1),
(263, 'B031516006', 2, '2017/2018', 1),
(264, 'B031515222', 2, '2017/2018', 1),
(265, 'B031515431', 2, '2017/2018', 1),
(266, 'B031515369', 2, '2017/2018', 1),
(267, 'B031515337', 2, '2017/2018', 1),
(268, 'B031518423', 2, '2017/2018', 1),
(269, 'B031515265', 2, '2017/2018', 1),
(270, 'B031515041', 2, '2017/2018', 1),
(271, 'B031516051', 2, '2017/2018', 1),
(272, 'B031515793', 2, '2017/2018', 1),
(273, 'B031515977', 2, '2017/2018', 1),
(274, 'B031515205', 2, '2017/2018', 1),
(275, 'B031516723', 2, '2017/2018', 1),
(276, 'B031515165', 2, '2017/2018', 1),
(277, 'B031515975', 2, '2017/2018', 1),
(278, 'B031515168', 1, '2017/2018', 1),
(279, 'B031515502', 1, '2017/2018', 1),
(280, 'B031515418', 1, '2017/2018', 1),
(281, 'B031515594', 2, '2017/2018', 1),
(282, 'B031515070', 2, '2017/2018', 1),
(283, 'B031515498', 2, '2017/2018', 1),
(284, 'B031515480', 2, '2017/2018', 1),
(285, 'B031516754', 2, '2017/2018', 1),
(286, 'B031515068', 2, '2017/2018', 1),
(287, 'B031517078', 2, '2017/2018', 1),
(288, 'B031515096', 2, '2017/2018', 1),
(289, 'B031516270', 1, '2017/2018', 1),
(290, 'B031515440', 1, '2017/2018', 1),
(291, 'B031516181', 1, '2017/2018', 1),
(292, 'B031515115', 1, '2017/2018', 1),
(293, 'B031515245', 1, '2017/2018', 1),
(294, 'B031515985', 1, '2017/2018', 1),
(295, 'B031515149', 1, '2017/2018', 1),
(296, 'B031515529', 1, '2017/2018', 1),
(297, 'B031515229', 2, '2017/2018', 1),
(298, 'B031516855', 2, '2017/2018', 1),
(299, 'B031516399', 2, '2017/2018', 1),
(300, 'B031515389', 2, '2017/2018', 1),
(301, 'B031515801', 2, '2017/2018', 1),
(302, 'B031515885', 2, '2017/2018', 1),
(303, 'B031516063', 2, '2017/2018', 1),
(304, 'B031516199', 2, '2017/2018', 1),
(305, 'B031515609', 2, '2017/2018', 1),
(306, 'B031517218', 2, '2017/2018', 1),
(307, 'B031515217', 2, '2017/2018', 1),
(308, 'B031515216', 2, '2017/2018', 1),
(309, 'B031515415', 2, '2017/2018', 1),
(310, 'B031515814', 2, '2017/2018', 1),
(311, 'B031515817', 2, '2017/2018', 1),
(312, 'B031515213', 2, '2017/2018', 1),
(313, 'B031515912', 2, '2017/2018', 1),
(314, 'B031518011', 2, '2017/2018', 1),
(315, 'B031515410', 2, '2017/2018', 1),
(316, 'B031515059', 2, '2017/2018', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation_student`
--
ALTER TABLE `allocation_student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finalreport`
--
ALTER TABLE `finalreport`
  ADD PRIMARY KEY (`finalreportID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `lecturer_position`
--
ALTER TABLE `lecturer_position`
  ADD PRIMARY KEY (`positionID`,`staffID`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`logbookID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`,`positionID`),
  ADD KEY `positionID` (`positionID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`positionID`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`proposalID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `reportsubmission`
--
ALTER TABLE `reportsubmission`
  ADD PRIMARY KEY (`reportSubmissionID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`matricNum`);

--
-- Indexes for table `workshopregistration`
--
ALTER TABLE `workshopregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocation_student`
--
ALTER TABLE `allocation_student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reportsubmission`
--
ALTER TABLE `reportsubmission`
  MODIFY `reportSubmissionID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `workshopregistration`
--
ALTER TABLE `workshopregistration`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=317;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD CONSTRAINT `lecturer_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `login` (`id`);

--
-- Constraints for table `lecturer_position`
--
ALTER TABLE `lecturer_position`
  ADD CONSTRAINT `lecturer_position_ibfk_1` FOREIGN KEY (`positionID`) REFERENCES `position` (`positionID`),
  ADD CONSTRAINT `lecturer_position_ibfk_2` FOREIGN KEY (`staffID`) REFERENCES `lecturer` (`staffID`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`positionID`) REFERENCES `position` (`positionID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
