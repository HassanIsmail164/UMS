<?php
session_start();

require_once("studentHeader.php");
require_once("../../Model/DatabaseManager.php");
require_once("../../Model/student/modelSemester.php");
require_once("../../Model/student/modelStudentClasses.php");
require_once("../../Model/admin/modelSchedule.php");

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

// new object of the class GetStudentClasses
$GetStudentClasses = new StudentClasses($Conn);
// result of the query set in variable $GetStudentClasses
$getStudentClasses = $GetStudentClasses->showStudentClasses($_SESSION['studentID'], $semesterID);

// condition to check if the user in loged in
if (isset($_SESSION['studentID'])) {
?>
  <script>
    function onSemesterChange() {
      var semesterID = $('#semesterID').val();
      window.location.href = "studentClasses.php?semesterID=" + semesterID;
    }
  </script>

  <center>
    <h4 style="color: green"><?php if (isset($_SESSION['dropTrue']) && ($_SESSION['dropTrue'] == true)) {
                                echo "Class droped succesfuly !";
                                unset($_SESSION['dropTrue']);
                              }
                              ?></h4>
  </center>
  <title>Student Classes</title>

  <div class="header">

    <div class="form-group">
      <h4 for="sel1">Select a Semester:</h4>
      <select class="form-control" id="semesterID" name="semester" onchange="onSemesterChange()">

        <?php
        foreach ($getSemester as $semester) {
          echo "<option value=" . $semester["id"] . ">" . $semester["year"] . " " . $semester["season"] . "</option>";
        }
        ?>

      </select>
      <script>
        $('#semesterID').val(<?php echo $semesterID; ?>);
      </script>
    </div><br>

    <h2>Registered Courses:</h2><br>

    <table style="width: 100%" border="1" class="table-striped" cellpadding="7">
      <tr align="center" style="font-size: 20px">
        <td><strong>Code</strong> </td>
        <td><strong>Course</strong></td>
        <td><strong>Credit</strong> </td>
        <td><strong>Teacher</strong> </td>
        <td><strong>Section</strong></td>
        <td><strong>Time</strong> </td>
        <td><strong>Details</strong> </td>
        <td><strong>Drop</strong> </td>
      </tr>

      <?php
      for ($i = 0; $i < count($getStudentClasses); $i++) {
      ?>
        <tr align="center">
          <td><?php echo $getStudentClasses[$i]["code"]; ?></td>
          <td><?php echo $getStudentClasses[$i]["courseName"]; ?></td>
          <td><?php echo $getStudentClasses[$i]["credit"]; ?></td>
          <td><?php echo $getStudentClasses[$i]["Fname"];
              echo " ";
              echo $getStudentClasses[$i]["Lname"]; ?></td>
          <td><?php echo $getStudentClasses[$i]["section"]; ?></td>
          <td><?php echo $getStudentClasses[$i]["time"]; ?></td>
          <td><a class="btn btn-secondary" href="../../View/student/classDetails.php?classID=<?php echo $getStudentClasses[$i]["studentClassID"]; ?>">Details</a></td>
          <td><a class="btn btn-secondary" href="../../Controller/student/showStudentClasses.php?classID=<?php echo $getStudentClasses[$i]["classID"]; ?>">Drop</a></td>
        </tr>
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