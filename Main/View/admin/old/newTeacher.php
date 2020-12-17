<?php
require_once("adminHeader.php");
?>
<html>

<head>
    <title> teacher Page </title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="offset-4 col-4">
                <div class="dropdown-item">

                    <table>
                        <tr>
                            <td>
                            </td>
                            <td width="90"></td>
                            <td>
                                <h1> <b> New Teacher </b> </h1>
                            <td>
                        </tr>
                    </table>

                    <br>
                    <form>
                        <div class="form-group">


                            <label> First Name :</label> <input class="form-control" type="text" name="username">

                            <label> Last Name :</label> <input class="form-control" type="text" name="lastname">


                            <label> Email :</label>
                            <input class="form-control" type="text" name="email">


                            <label> Number :</label> <input class="form-control" type="text" name="number">



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
                            <br>
                            <input type="submit" value="ADD" class="offset-4 col-4" name="addname">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>