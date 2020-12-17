<?php
require_once("adminHeader.php");
?>
<html>

<head>
    <title> Student Page </title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="offset-4 col-4">

                <center>
                    <h1> New Student</h1>
                </center>
                <br>
                <form>
                    <div class="form-group">


                        <label> First Name :</label> <input class="form-control" type="text" name="username">

                        <label> Last Name :</label> <input class="form-control" type="text" name="lastname">

                        <label> Phone Number :</label> <input class="form-control" type="text" name="number">

                        <label> Password :</label> <input class="form-control" type="text" name="number">

                        <label> Gender :</label>
                        <br>


                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="teacher_gender" value="male">
                            <label class="form-check-label"> Male </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="teacher_gender" value="female">
                            <label class="form-check-label"> Female </label>
                        </div>

                        <br>
                        <label> Major :</label>
                        <select class="form-control">

                            <option value=""> Select Major </option>
                            <option value=""> Programming 1 </option>
                            <option value=""> Calsuluss </option>
                            <option value=""> Programming 2 </option>

                        </select>

                        <label> Email Domain :</label>
                        <input class="form-control" type="text" name="email">

                        <br>
                        <input type="submit" value="Done" class="offset-4 col-4" name="addname">


                    </div>


                </form>








            </div>


        </div>

    </div>

</body>

</html>