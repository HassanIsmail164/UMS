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

$semesterSelected_val = $_POST['semester'];
$courseSelected_val = $_POST['course'];
$teacherSelected_val = $_POST['teacher'];
$sectionSelected_val = $_POST['section'];
$timeSelected_val = $_POST['time'];



// new object of the class GetClasses
$GetClasses = new Classes($Conn);
// result of the query set in variable $GetClasses
$getClasses = $GetClasses->showClasses($semesterSelected_val);

$checkDuplication = $GetClasses->checkDuplication($teacherSelected_val, $sectionSelected_val, $timeSelected_val, $semesterSelected_val);

if ($checkDuplication == true)
{  
    $_SESSION['duplicationTrue'] = true;
    header("Location:../../View/admin/adminCourseOffering.php?semesterID=" . $semesterSelected_val);
}
else if(!empty($teacherSelected_val && $sectionSelected_val && $timeSelected_val && $semesterSelected_val))
{
    // new object of the class postCourses
    $PostClass = new Classes($Conn);

    // result of the query set in variable $postCourses
    $postClass = $PostClass->insertClass($courseSelected_val, $teacherSelected_val, $sectionSelected_val, $timeSelected_val, $semesterSelected_val);
  
    $_SESSION['duplicationFalse'] = true;
    header("Location:../../View/admin/adminCourseOffering.php?semesterID=" .$semesterSelected_val);
}
?>
