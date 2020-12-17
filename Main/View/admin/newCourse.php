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
        <h4 style="color: green"><?php if (isset($_SESSION['courseAdded']) && ($_SESSION['courseAdded'] == true)){
            echo "Course added succesfuly !";
            unset($_SESSION['courseAdded']);
        }
        ?>
        <h4 style="color: red"><?php if (isset($_SESSION['courseFalse']) && ($_SESSION['courseFalse'] == true)){
            echo "Invalid Input !";
            unset($_SESSION['courseFalse']);
        }
        ?></h4>
    </center>
<!-- 
    /<script>
        function validateForm() {
            var fname = document.forms["newStudent"]["fname"].value;
            var lname = document.forms["newStudent"]["lname"].value;
            var phone = document.forms["newStudent"]["phone"].value;
            var email = document.forms["newStudent"]["email"].value;
            var password = document.forms["newStudent"]["password"].value;

            if (fname == "") {
                alert("First Name must be filled out");
                return false;
            } else if (lname == "") {
                alert("Last Name must be filled out");
                return false;
            } else if (phone == "") {
                alert("Phone must be filled out");
                return false;
            } else if (email == "") {
                alert("Email must be filled out");
                return false;
            } else if (password == "") {
                alert("Password must be filled out");
                return false;
            } else if (!/^[a-zA-Z]*$/g.test(fname)) {
                alert("Invalid characters");
                document.newStudent.name.focus();
                return false;
            } else if (!/^[a-zA-Z]*$/g.test(lname)) {
                alert("Invalid characters");
                document.newStudent.name.focus();
                return false;
            }
        }
    </script> -->

    <title>Add New Courses</title>

    <form action="../../Controller/admin/addNewCourse.php" method="POST">
        <table align="center" style="width: 50%"><br>
            <tr>
                <td class="form-group">
                    <h3 for="sel1">Course Name:</h3>
                    <input type="text" class="form-control" name="name" placeholder="Course Name" required>
                </td>
            </tr>
            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td class="form-group">
                    <h3 for="sel1">Course Code:</h3>
                    <input type="text" class="form-control" name="code" placeholder="Course Code" required>
                </td>
            </tr>
            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td class="form-group">
                    <h3 for="sel1">Course Credit:</h3>
                    <input type="text" class="form-control" name="credit" placeholder="Number of Credit" required>
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