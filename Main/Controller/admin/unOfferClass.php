<?php
session_start();
// controller
require_once("../../Model/DatabaseManager.php");
require_once("../../Model/student/modelSemester.php");
require_once("../../Model/admin/modelCourses.php");
require_once("../../Model/admin/modelSchedule.php");
require_once("../../Model/admin/modelTeacher.php");
require_once("../../Model/admin/modelClasses.php");

// new object of the class DatabaseManager
$Conn = new DatabaseManager();

// new object of the class getSemester
$GetSemester = new Semester($Conn);

// get classID from student registration page
$getClassID = $_GET["classID"];
$getSemesterID = $_GET["semesterID"];

if(isset($getClassID))
{
    // new object of the class GetStudentClasses
    $unOffer = new Classes($Conn);
    $UnOffer = $unOffer->unOffer($getClassID);

    $_SESSION['unOffer'] = true;
    header("Location:../../View/admin/adminCourseOffering.php?semesterID=" . $getSemesterID);
}
?>
