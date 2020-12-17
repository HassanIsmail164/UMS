<?php
// controller

require_once("../Model/DatabaseManager.php");
require_once("../Model/modelLogin.php");

// start session
session_start();
 
// new object of the classes
$loginConn = new DatabaseManager();
$Login = new Login($loginConn);
$Password = $_POST["password"];
$hash = hash("sha256", $Password);

// result of the query set in variable $login
$loginAdmin = $Login->verifyLoginAdmin($_POST["userID"], $hash);

// result of the query set in variable $login
$loginTeacher = $Login->verifyLoginTeacher($_POST["userID"], $hash);

// result of the query set in variable $login
$loginStudent = $Login->verifyLoginStudent($_POST["userID"], $hash);

if (count($loginAdmin) == 1)
{
        //save username in a session
        $_SESSION['adminID'] = $loginAdmin[0]["id"];

        //if credential are correct go to student portal
        header("Location:../View/admin/adminCourseOffering.php");

}
elseif (count($loginTeacher) == 1) {
    //save username in a session
    $_SESSION['teacherID'] = $loginTeacher[0]["id"];

    //if credential are correct go to student portal
    header("Location:../View/teacher/teacherClasses.php");
}
elseif (count($loginStudent) == 1)
{
    //save username in a session
    $_SESSION['studentID'] = $loginStudent[0]["id"];

    //if credential are correct go to student portal
    header("Location:../View/student/studentClasses.php");  
}
else
{
    $_SESSION['loginFalse'] = true;

    // if credential are wrong return to login page
    header("Location:../index.php");
}
?>