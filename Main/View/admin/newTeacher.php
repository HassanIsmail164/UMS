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


// new object of the class getTeacher
$GetTeacherID = new teacher($Conn);
// result of the query set in variable $getTeacher
$getTeacherID = $GetTeacherID->getTeacherID();


if (isset($_SESSION['adminID'])) {
?>
    <center>
        <h4 style="color: green"><?php if (isset($_SESSION['teacherAdded']) && ($_SESSION['teacherAdded'] == true)) {
                                        echo "Teacher added succesfuly !";
                                        unset($_SESSION['teacherAdded']);
                                    }
                                    ?>
            <h4 style="color: red"><?php if (isset($_SESSION['teacherFalse']) && ($_SESSION['teacherFalse'] == true)) {
                                        echo "Invalid Input !";
                                        unset($_SESSION['teacherFalse']);
                                    }
                                    ?></h4>
    </center>
    <script>
        function validateForm() {
            var fname = document.forms["newTeacher"]["fname"].value;
            var lname = document.forms["newTeacher"]["lname"].value;
            var phone = document.forms["newTeacher"]["phone"].value;
            var email = document.forms["newTeacher"]["email"].value;
            var password = document.forms["newTeacher"]["password"].value;

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
                document.newTeacher.name.focus();
                return false;
            } else if (!/^[a-zA-Z]*$/g.test(lname)) {
                alert("Invalid characters");
                document.newTeacher.name.focus();
                return false;
            }
        }
    </script>

    <title>New Teacher</title>
    <h3 align="center"><strong> ID: <?php echo $getTeacherID[0]["AUTO_INCREMENT"]; ?></strong></h3>
    <form action="../../Controller/admin/addNewTeacher.php" method="POST" name="newTeacher" onsubmit="return validateForm()">
        <table align="center" style="width: 50%"><br>
            <tr>
                <td class="form-group">
                    <h3 for="sel1">First Name:</h3>
                    <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                </td>
            </tr>
            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td class="form-group">
                    <h3 for="sel1">Last Name:</h3>
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                </td>
            </tr>
            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td class="form-group">
                    <h3 for="sel1">Phone Number:</h3>
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                </td>
            <tr>
                <td><br>
                    <h3 for="sel1">Email Address:</h3>
                </td>
            <tr>
                <td class="input-group mb-6">
                    <input type="text" class="form-control" name="email" placeholder="name.family" required>
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">@park-innovation.com</span>
                </td>
                </div>
            </tr>
            <tr>
                <td><br></td>
            </tr>

            <tr>
                <td class="form-group">
                    <h3 for="sel1">Password:</h3>
                    <input type="password" class="form-control" name="password" placeholder="* * * * * * * *" required>
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