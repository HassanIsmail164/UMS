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

$courseName = $_POST['name'];
$courseCode = $_POST['code'];
$courseCredit = $_POST['credit'];
 
if (!empty($courseName && $courseCode && $courseCredit))
{
    // new object of the class getTeacher
    $PostCourse = new Courses($Conn);
    // result of the query set in variable $getTeacher
    $postCourse = $PostCourse->insertCourse($courseName, $courseCode, $courseCredit);

    $_SESSION['courseAdded'] = true;
    header("Location:../../View/admin/newCourse.php");
}
else{
    $_SESSION['courseFalse'] = true;
    header("Location:../../View/admin/newCourse.php");
}
?>
