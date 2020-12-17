<?php
session_start();

require_once("adminHeader.php");
require_once("../../Model/DatabaseManager.php");
require_once("../../Model/student/modelSemester.php");
require_once("../../Model/admin/modelClasses.php");
require_once("../../Model/admin/modelCourses.php");
require_once("../../Model/admin/modelSchedule.php");
require_once("../../Model/admin/modelTeacher.php");

// new object of the class DatabaseManager
$Conn = new DatabaseManager();

// new object of the class getSemester
$GetSemester = new Semester($Conn);
$getSemester = $GetSemester->showSemesters();

if (isset($_GET['semesterID'])) {  // check if inetger ?A???!?!?
    $semesterID = $_GET['semesterID'];
} else if (count($getSemester)) {

    $semesterID = $getSemester[0]['id'];
}

// new object of the class GetClasses
$GetClasses = new Classes($Conn);
$getClasses = $GetClasses->showClasses($semesterID);

// new object of the class GetCourses
$GetCourses = new Courses($Conn);
$getCourses = $GetCourses->showCourses();

// new object of the class getScheduleSection
$GetScheduleSection = new Schedule($Conn);
$getScheduleSection = $GetScheduleSection->showShceduleSection();

// new object of the class getScheduleTime
$GetScheduleTime = new Schedule($Conn);
$getScheduleTime = $GetScheduleTime->showShceduleTime();

// new object of the class getTeacher
$GetTeacher = new Teacher($Conn);
$getTeacher = $GetTeacher->showTeacher();



// FIXME: I think the views are better be pure html files. Maybe check templating engines for php (e.g. smarty). 

// check if logged in 
if (isset($_SESSION['adminID'])) {
?>
    <script>
        function onSemesterChange() {
            var semesterID = $('#semesterID').val();
            window.location.href = "adminCourseOffering.php?semesterID=" + semesterID;
        }
    </script>


    <center>
        <h4 style="color:red"><?php if (isset($_SESSION['duplicationTrue']) && ($_SESSION['duplicationTrue'] == true)) {
                                    echo "This Class already exist !";
                                    unset($_SESSION['duplicationTrue']);
                                }
                                ?></h4>
            <h4 style="color: green"><?php if (isset($_SESSION['duplicationFalse']) && ($_SESSION['duplicationFalse'] == true)) {
                                            echo "Class offered succesfuly !";
                                            unset($_SESSION['duplicationFalse']);
                                        }
                                        if (isset($_SESSION['unOffer']) && ($_SESSION['unOffer'] == true)) {
                                            echo "Class unoffered succesfuly !";
                                            unset($_SESSION['unOffer']);
                                        }
                                        ?></h4>
    </center>
    <title>Course Offerings</title>
    <!-- form to offer the courses -->
    <form action="../../Controller/admin/addCourseOffering.php" method="POST">
            <div class="header">

            <div class="row ">

                <div class="col-sm-9">

                    <h4 for="sel1">Select a Semester:</h4>

                    <select class="form-control" id="semesterID" name="semester" onchange="onSemesterChange()">

                        <?php //Put semester in the select box
                        foreach ($getSemester as $semester) {
                            echo "<option value=" . $semester["id"] . ">" . $semester["year"] . " " . $semester["season"] . "</option>";
                        }
                        ?>

                    </select>
                    <script>
                        $('#semesterID').val(<?php echo $semesterID; ?>);
                    </script>
                </div>

                <div class=" col-sm-3">
                    <!-- botton to add new semester is as link to go to new semester page -->
                    <center><a style="margin-top: 30px" class="btn btn-secondary" href="../admin/newSemester.php">New Semester</a></center>
                </div>

            </div><br>

            <div class="row studentHeader">

                <div class="col-sm-3">

                    <h4 for="sel1">Select a Course:</h4>

                    <select class="form-control" id="sel1" name="course">

                        <?php  // loop to put courses in the select box 
                        foreach ($getCourses as $course) {
                            echo "<option value=" . $course["id"] . ">" . $course["code"] . " : " . $course["courseName"] . "</option>";
                        }
                        ?>

                    </select>
                </div>

                <div class="col-sm-3 ">

                    <h4 for="sel1">Select a Teacher:</h4>

                    <select class="form-control" id="sel1" name="teacher">

                        <?php  //  loop to put teachers in the select box 
                        foreach ($getTeacher as $teacher) {
                            echo "<option value=" . $teacher["id"] . ">" .  $teacher["Fname"] ." " . $teacher["Lname"] . "</option>";
                        }
                        ?>

                    </select>
                </div>

                <div class="col-sm-3 ">

                    <h4 for="sel1">Select a Section:</h4>

                    <select class="form-control" id="sel1" name="section">

                        <?php   //   loop to put schedule Section in the select box 
    3                    foreach ($getScheduleSection as $schedule) {
                            echo "<option value=" . $schedule["id"] . ">" . $schedule["section"] . "</option>";
                        }
                        ?>

                    </select>
                </div>

                <div class="col-sm-3 ">

                    <h4 for="sel1">Select a Time:</h4>

                    <select class="form-control" id="sel1" name="time">

                        <?php   // loop to put Schedule Time in the select box 
                        foreach ($getScheduleTime as $schedule) {
                            echo "<option value=" . $schedule["id"] . ">" . $schedule["time"] . "</option>";
                        }
                        ?>

                    </select>
                </div>
            </div><br>
            <!-- botton submit to put the selected course, teacher and schedule in the class table  -->
            <center><input class="btn btn-secondary" type="submit" value="Offer"></center>

    </form>

    <h3>Offered Courses:</h3><br>

    <!-- table showing all classes in table class  -->
    <table style="width: 100%" border="1" class="table-striped" cellpadding="7">

        <tr align="center" style="font-size: 20px">
            <td><strong>Codes</strong> </td>
            <td><strong>Course</strong></td>
            <td><strong>Credit</strong></td>
            <td><strong>Teacher</strong> </td>
            <td><strong>Section</strong> </td>
            <td><strong>Time</strong> </td>
            <td><strong>Semester</strong> </td>
            <td><strong>Action</strong> </td>
        </tr>

        <?php  // loop to get info from class table and put tham in the table
        for ($i = 0; $i < count($getClasses); $i++) {

        ?>
            <tr align="center">
                <td><?php echo $getClasses[$i]["code"]; ?></td>
                <td><?php echo $getClasses[$i]["courseName"]; ?></td>
                <td><?php echo $getClasses[$i]["credit"]; ?></td>
                <td><?php echo $getClasses[$i]["Fname"]; echo" ";echo $getClasses[$i]["Lname"] ?></td>
                <td><?php echo $getClasses[$i]["section"]; ?></td>
                <td><?php echo $getClasses[$i]["time"]; ?></td>
                <td><?php echo $getClasses[$i]["year"];
                    echo " - ";
                    echo $getClasses[$i]["season"]; ?></td>
                <td><a class="btn btn-secondary" href="../../Controller/admin/unOfferClass.php?classID=<?php echo $getClasses[$i]["classID"]; ?>
                                                                                                     &semesterID=<?php echo $semesterID; ?>">Withdraw</a>
            </tr>
        <?php
        }
        ?>
    </table>
    </div>

<?php require_once("adminFooter.php");
} else {
    // if he/she is not logined, return to login page
    header("Location:../../index.php");
}
?>