<?php
session_start();
if (isset($_SESSION['teacherID'])) {
require_once("teacherHeader.php");
require_once("../../Model/DatabaseManager.php");
require_once("../../Model/student/modelSemester.php");
require_once("../../Model/teacher/modelTeacherClasses.php");
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
$GetTeacherClasses = new TeacherClasses($Conn);

$getTeacherClasses = $GetTeacherClasses->showTeacherClasses($_SESSION['teacherID'], $semesterID);


// condition to check if the user in loged in

?>

  <script>
    function onSemesterChange() {
      var semesterID = $('#semesterID').val();
      window.location.href = "teacherClasses.php?semesterID=" + semesterID;
    }
  </script>

  <title>Teacher Classes</title>
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
    <h2>Your Classes:</h2><br>

    <table style="width: 100%" border="1" class="table-striped" cellpadding="7">
      <tr align="center" style="font-size: 20px">
        <td><strong>Code</strong> </td>
        <td><strong>Course</strong></td>
        <td><strong>Credit</strong> </td>
        <td><strong>Section</strong></td>
        <td><strong>Time</strong> </td>
        <td><strong>Details</strong> </td>
      </tr>

      <?php
      for ($i = 0; $i < count($getTeacherClasses); $i++) {
      ?>
        <tr align="center">
          <td><?php echo $getTeacherClasses[$i]["code"]; ?></td>
          <td><?php echo $getTeacherClasses[$i]["courseName"]; ?></td>
          <td><?php echo $getTeacherClasses[$i]["credit"]; ?></td>
          <td><?php echo $getTeacherClasses[$i]["section"]; ?></td>
          <td><?php echo $getTeacherClasses[$i]["time"]; ?></td>
          <td><a class="btn btn-secondary" href="../../View/teacher/teacherStudentList.php?classID=<?php echo $getTeacherClasses[$i]['classID'];?>">Details</a>
          <?php
        }
          ?>
    </table>
  </div>

<?php require_once("teacherFooter.php");
} else {
  // if he/she is not logined, return to login page
  header("Location:../../index.php");
}
?>