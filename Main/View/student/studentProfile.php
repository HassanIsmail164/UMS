<?php
session_start();

require_once("studentHeader.php");
require_once("../../Model/DatabaseManager.php");
require_once("../../Model/student/modelSemester.php");
require_once("../../Model/admin/modelSchedule.php");
require_once("../../Model/admin/modelStudent.php");


// new object of the class DatabaseManager
$Conn = new DatabaseManager();

$GetStudentProfile = new Student($Conn);

$getStudentProfile = $GetStudentProfile->studentProfile($_SESSION['studentID']);


// condition to check if the user in loged in
if (isset($_SESSION['studentID'])) {
  echo "<h3 align='center'><strong>" . "ID: " . $_SESSION['studentID'] . "</h3></strong>"
?>
<title>Student Profile</title>
  <?php
  for ($i = 0; $i < count($getStudentProfile); $i++) {
  ?>
    <table align="center" style="width: 50%"><br>
      <tr style="padding: 10px">
        <td class="form-group">
          <h2 for="sel1">First Name:</h2>
        </td>
        <td class="form-group">
          <h2 ><?php echo $getStudentProfile[$i]["Fname"]; ?></h2>
        </td>
      </tr>
      <tr>
        <td><br></td>
      </tr>

      <tr>
        <td class="form-group">
          <h2 for="sel1">Last Name:</h2>
        </td>
        <td class="form-group">
          <h2 ><?php echo $getStudentProfile[$i]["Lname"]; ?></h2>
        </td>
      </tr>
      <tr>
        <td><br></td>
      </tr>

      <tr>
        <td class="form-group">
          <h2 for="sel1">Email Address:</h2>
        </td>
        <td>
          <h2 ><?php echo $getStudentProfile[$i]["email"]; ?></h2>
        </td>
      </tr>
      <tr>
        <td><br></td>
      </tr>

      <tr>
        <td class="form-group">
          <h2  for="sel1">Phone Number:</h2>
        </td>
        <td>
          <h2 ><?php echo $getStudentProfile[$i]["phone"]; ?></h2>
        </td>
      </tr>
    </table>

<?php require_once("studentFooter.php");
  }
} else {
  // if he/she is not logined, return to login page
  header("Location:../../index.php");
}
?>