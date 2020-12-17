<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['teacherID'])) {
    require_once("teacherHeader.php");
    require_once("../../Model/DatabaseManager.php");
    require_once("../../Model/student/modelSemester.php");
    require_once("../../Model/teacher/modelTeacherClasses.php");
    require_once("../../Model/admin/modelSchedule.php");

    // new object of the class DatabaseManager
    $Conn = new DatabaseManager();

    $classID = $_GET['classID'];

    // new object of the class GetStudentClasses
    $GetClassesStudent = new TeacherClasses($Conn);

    $getClassesStudent = $GetClassesStudent->showClassesStudent($classID);

    // condition to check if the user in loged in

?>
    <title>Class Details</title>
    <div class="header">
        <div class="row ">

            <div class="col-sm-9">
                <h2 for="sel1">Class Details :</h2>
            </div>
            <div class=" col-sm-3">
                <!-- botton to add new semester is as link to go to new semester page -->
                <center><input class="btn btn-secondary" type="file" name="fileToUpload"></center>
            </div>

        </div><br>

        <form action="../../Controller/teacher/grade.php?classID=<?php echo $classID;?>" method="POST">
            <table style="width: 100%" border="1" class="table-striped" cellpadding="7">
                <tr align="center" style="font-size: 20px">
                    <td><strong>IDs</strong> </td>
                    <td><strong>Names</strong></td>
                    <td><strong>Grades</strong></td>
                </tr>

                <?php
                for ($i = 0; $i < count($getClassesStudent); $i++) {
                ?>
                    <tr align="center">
                        <td><?php echo $getClassesStudent[$i]["studentID"];?></td>
                        <td><?php echo $getClassesStudent[$i]["Fname"] . " " . $getClassesStudent[$i]["Lname"]; ?></td>
                        <td><input type="number" name="grade[]" multiple></td>
                    <?php
                $_SESSION['studentClassID'] = $getClassesStudent[$i]["studentClassID"];
                }
                    ?>
            </table><br>
            <center><input class="btn btn-secondary" type="submit" value="Save"></center>
        </form>
    </div>


<?php require_once("teacherFooter.php");
} else {
    // if he/she is not logined, return to login page
    header("Location:../../index.php");
}
?>