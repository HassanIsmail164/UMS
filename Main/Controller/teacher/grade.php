<?php
// controller
session_start();
require_once("../../Model/DatabaseManager.php");
require_once("../../Model/teacher/modelTeacherClasses.php");
require_once("../../Model/teacher/modelClassDetails.php");
require_once("../../Model/student/modelStudentClasses.php");


// new object of the class    DatabaseManager
$Conn = new DatabaseManager();
$studentClassID = $_SESSION['studentClassID'];
$classID = $_GET['classID'];

// new object of the class GetStudentClasses
$GetClassesStudent = new TeacherClasses($Conn);
$getClassesStudent = $GetClassesStudent->showClassesStudent($classID);

$InsertDetails = new ClassesDetails($Conn);


for ($i = 0; $i < count($getClassesStudent); $i++) {

    $studentID = $getClassesStudent[$i]["studentID"];

    // Retrieving each selected option 
    foreach ($_POST['grade'] as $grade) {
        $insertDetails = $InsertDetails->insertDetails($studentID, $studentClassID, $grade);
    break;
    }
}

header("Location:../../View/teacher/teacherClasses.php");

?>