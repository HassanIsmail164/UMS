<?php
// controller
session_start();

require_once("../../Model/DatabaseManager.php");
require_once("../../Model/student/modelSemester.php");
require_once("../../Model/student/modelStudentClasses.php");
require_once("../../Model/admin/modelCourses.php");
require_once("../../Model/admin/modelSchedule.php");
require_once("../../Model/admin/modelTeacher.php");
require_once("../../Model/admin/modelClasses.php");

// new object of the class    DatabaseManager
$Conn = new DatabaseManager();


// new object of the class GetStudentClasses
$GetStudentClasses = new StudentClasses($Conn);

// get classID from student registration page
$getClassID = $_GET["classID"];
$semesterSelected_val = $_GET['semesterID']; 
$getscheduleSection = $_GET["scheduleSection"];
$getscheduleTime = $_GET["scheduleTime"];

$checkRegistrationDuplication = $GetStudentClasses->checkRegistrationDuplication($getscheduleSection, $getscheduleTime, $_SESSION['studentID']);

if ($checkRegistrationDuplication == true)
{
    $_SESSION['registrationFalse'] = true;
    header("Location:../../View/student/studentRegistration.php");
}
else
{
    // new object   $RegisterClass   of the class   StudentClasses
    $RegisterClass = new StudentClasses($Conn);
    // result of the query set in variable $registerClass
    $registerClass = $RegisterClass->registerClass($getClassID, $_SESSION['studentID']);

    $_SESSION['registrationTrue'] = true;
    header("Location:../../View/student/studentRegistration.php?semesterID=" . $semesterSelected_val);
}



?>