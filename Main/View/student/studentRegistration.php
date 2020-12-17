<?php
session_start();

require_once("studentHeader.php");
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
// result of the query set in variable $getSemester
$getSemester = $GetSemester->showSemesters();

if (isset($_GET['semesterID'])) {  // check if inetger ?A???!?!?
  $semesterID = $_GET['semesterID'];
} else if (count($getSemester)) {

  $semesterID = $getSemester[0]['id'];
}

// new object of the class GetClasses
$GetClasses = new Classes($Conn);
// result of the query set in variable $GetClasses
$getClasses = $GetClasses->showClasses($semesterID);


// condition to check if the user in loged in
if (isset($_SESSION['studentID'])) {
?>

  <script>
    function onSemesterChange() {
      var semesterID = $('#semesterID').val();
      window.location.href = "studentRegistration.php?semesterID=" + semesterID;
    }
  </script>

  <center>
    <h4 style="color: green"><?php if (isset($_SESSION['registrationTrue']) && ($_SESSION['registrationTrue'] == true)) {
                                echo "Class registred succesfuly !";
                                unset($_SESSION['registrationTrue']);
                              }
                              ?>
      <h4 style="color: red"><?php if (isset($_SESSION['registrationFalse']) && ($_SESSION['registrationFalse'] == true)) {
                                echo "Class already exist !";
                                unset($_SESSION['registrationFalse']);
                              }
                              ?></h4>
  </center>
  <title>Registration</title>

  <div class="header">
    <div class="form-group">
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
    </div><br>

    <h2>Offered Courses:</h2><br>
    <!-- table showing all classes in table class  -->
    <table style="width: 100%" align="center" border="1" class="table-striped" cellpadding="7">
      <tr align="center" style="font-size: 20px">
        <td><strong>Codes</strong> </td>
        <td><strong>Course</strong></td>
        <td><strong>Credit</strong></td>
        <td><strong>Teacher</strong> </td>
        <td><strong>Section</strong> </td>
        <td><strong>Time</strong> </td>
        <td><strong>Semester</strong> </td>
        <td><strong>Add</strong> </td>

      </tr>

      <?php  // loop to get info from class table and put tham in the table
      for ($i = 0; $i < count($getClasses); $i++) {
      ?>
        <tr align="center">
          <td><?php echo $getClasses[$i]["code"]; ?></td>
          <td><?php echo $getClasses[$i]["courseName"]; ?></td>
          <td><?php echo $getClasses[$i]["credit"]; ?></td>
          <td><?php echo $getClasses[$i]["Fname"];
              echo " ";
              echo $getClasses[$i]["Lname"]; ?></td>
          <td><?php echo $getClasses[$i]["section"]; ?></td>
          <td><?php echo $getClasses[$i]["time"]; ?></td>
          <td><?php echo $getClasses[$i]["year"];
              echo " - ";
              echo $getClasses[$i]["season"]; ?></td>
          <td><a class="btn btn-secondary" href="../../Controller/student/showStudentCourseOffering.php?scheduleSection=<?php echo $getClasses[$i]["section"]; ?>
          &classID=<?php echo $getClasses[$i]["classID"]; ?>
          &semesterID=<?php echo $getClasses[$i]["id"]; ?>
          &scheduleTime=<?php echo $getClasses[$i]["time"]; ?>">Add</a></td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>
  </div>

<?php require_once("studentFooter.php");
} else {
  // if he/she is not logined, return to login page
  header("Location:../../index.php");
}
?>