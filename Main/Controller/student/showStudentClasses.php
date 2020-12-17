<?php
session_start();
// controller

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
$DropClass = new StudentClasses($Conn);

// get classID from student registration page
$getClassID = $_GET["classID"];

$dropClass = $DropClass->dropClass($getClassID);
$_SESSION['dropTrue'] = true;
header("Location:../../View/student/studentClasses.php");
?>