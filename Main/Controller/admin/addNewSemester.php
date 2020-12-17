<?php
session_start();
// controller

require_once("../../Model/DatabaseManager.php");
require_once("../../Model/student/modelSemester.php");
require_once("../../Model/admin/modelCourses.php");
require_once("../../Model/admin/modelSchedule.php");
require_once("../../Model/admin/modelTeacher.php");
require_once("../../Model/admin/modelClasses.php");
require_once("../../Model/admin/modelStudent.php");

// new object of the class DatabaseManager
$Conn = new DatabaseManager();

// new object of the class getSemester
$GetSemester = new Semester($Conn);

$semesterYear= $_POST['year'];
$semesterSeason = $_POST['season'];


$isduplicate = $GetSemester->isDuplicate($semesterYear, $semesterSeason);

if ($isduplicate == true) {
    $_SESSION['isDuplicateTrue'] = true;
    header("Location:../../View/admin/newSemester.php");
}
 else if (!empty($semesterYear && $semesterSeason))
{
    // new object of the class getTeacher
    $PostSemester = new Semester($Conn);
    // result of the query set in variable $getTeacher
    $postSemester = $PostSemester->insertSemester($semesterYear, $semesterSeason);

    $_SESSION['isDuplicateFalse'] = true;
    header("Location:../../View/admin/newSemester.php");
}
?>
