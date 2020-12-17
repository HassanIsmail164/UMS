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


$studentFname = $_POST['fname'];

$studentLname = $_POST['lname'];

$studentEmail = $_POST['email'];

$studentPassword = $_POST['password'];

$hash = hash("sha256", $studentPassword);

$studentPhone = $_POST['phone']; 

if (!empty($studentFname && $studentLname && $studentEmail && $studentPassword && $studentPhone))
{
    // new object of the class getTeacher
    $PostStudent = new Student($Conn);
    // result of the query set in variable $getTeacher
    $postStudent = $PostStudent->insertStudent($studentFname, $studentLname, $studentEmail, $hash, $studentPhone);

    $_SESSION['studentAdded'] = true;
    header("Location:../../View/admin/newStudent.php");
}
else{
    $_SESSION['studentFalse'] = true;
    header("Location:../../View/admin/newStudent.php");
}
?>
