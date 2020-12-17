<?php
session_start();

require_once("studentHeader.php");
require_once("../../Model/DatabaseManager.php");
require_once("../../Model/student/modelSemester.php");
require_once("../../Model/student/modelStudentClasses.php");
require_once("../../Model/admin/modelStudent.php");
require_once("../../Model/admin/modelSchedule.php");
require_once("../../Model/teacher/modelClassDetails.php");


// new object of the class DatabaseManager
$Conn = new DatabaseManager();

$studentClassID = $_GET["classID"];
                            

// new object of the class GetStudentClasses
$GetStudentClassesDetails = new ClassesDetails($Conn);
// // result of the query set in variable $GetStudentClasses
$getStudentClassesDetails = $GetStudentClassesDetails->showClassDetails($_SESSION['studentID'], $studentClassID);



// condition to check if the user in loged in
if (isset($_SESSION['studentID'])) {
?>
    <title>Class Details</title>
    <div class="header">

        <h2>Class Details :</h2><br>

        <table style="width: 100%" border="1" class="table-striped" cellpadding="7">
            <tr align="center" style="font-size: 20px">
                <td><strong>Grades</strong> </td>
                <td><strong>Documents</strong> </td>

            </tr>
            <?php
            for ($i = 0; $i < count($getStudentClassesDetails); $i++) {
            ?>
            <tr align="center">
                <td><?php echo $getStudentClassesDetails[$i]["grade"]; ?></td>
                <td><?php echo $getStudentClassesDetails[$i]["document"]; ?></td>
                <?php
                }
                ?>
        </table>
    </div>
<?php require_once("studentFooter.php");
} else {
    // if he/she is not logined, return to login page
    header("Location:../../index.php");
}
?>