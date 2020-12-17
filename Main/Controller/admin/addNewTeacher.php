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


$teacherFname = $_POST['fname'];
$teacherLname = $_POST['lname'];
$teacherEmail = $_POST['email'];
$teacherPassword = $_POST['password'];
$hash = hash("sha256", $teacherPassword);
$teacherPhone = $_POST['phone'];

if (!empty($teacherFname && $teacherLname && $teacherEmail && $teacherPassword && $teacherPhone)) {
    // new object of the class getTeacher
    $PostTeacher = new teacher($Conn);
    // result of the query set in variable $getTeacher
    $postTeacher = $PostTeacher->insertTeacher($teacherFname, $teacherLname, $teacherEmail, $hash, $teacherPhone);

    $_SESSION['teacherAdded'] = true;
    header("Location:../../View/admin/newTeacher.php");
}
else {
    $_SESSION['teacherFalse'] = true;
    header("Location:../../View/admin/newTeacher.php");
}
?>