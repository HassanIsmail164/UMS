<?php
session_start();

require_once("adminHeader.php");
require_once("../../Model/DatabaseManager.php");
require_once("../../Model/student/modelSemester.php");
require_once("../../Model/admin/modelClasses.php");
require_once("../../Model/admin/modelCourses.php");
require_once("../../Model/admin/modelSchedule.php");
require_once("../../Model/admin/modelTeacher.php");
require_once("../../Model/admin/modelStudent.php");

// new object of the class DatabaseManager
$Conn = new DatabaseManager();


if (isset($_SESSION['adminID'])) {
?>
    <center>
        <h4 style="color: red"><?php if (isset($_SESSION['isDuplicateTrue']) && ($_SESSION['isDuplicateTrue'] == true)) {
        echo "This Semester already exist !";
        unset($_SESSION['isDuplicateTrue']);
    } ?></h4>
        <h4 style="color: green"><?php if (isset($_SESSION['isDuplicateFalse']) && ($_SESSION['isDuplicateFalse'] == true)){
        echo "Semester added succesfuly !";
        unset($_SESSION['isDuplicateFalse']);
        }
        ?></h4>
    </center>

    <title>New Semester</title>

    <form action="../../Controller/admin/addNewSemester.php" method="POST" name="newSemester">
        <table align="center" style="width: 50%"><br>
            <tr>
                <td class="form-group">
                    <h3 for="sel1">Semester Year:</h3>
                    <input type="text" class="form-control" name="year" placeholder="2019/2020" required>
                </td>
            </tr>
            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td class="form-group">
                    <h3 for="sel1">Semester Season:</h3>
                    <input type="text" class="form-control" name="season" placeholder="Spring" required>
                </td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input class="btn btn-secondary" type="submit" value="Add"></td>
            </tr>

            <tr>
                <td><br></td>
            </tr>
        </table>
    </form>

<?php require_once("adminFooter.php");
} else {
    // if he/she is not logined, return to login page
    header("Location:../../index.php");
}
?>