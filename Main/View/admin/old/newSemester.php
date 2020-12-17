<?php
require_once("adminHeader.php");
?>
<html>

<head>
    <title> New Semester </title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="offset-4 col-4">
                <div class=" ml-md-auto">
                    <br>
                    <br>


                    <h1> New Semester </h1>
                    <br>
                    <form>
                        <div class="form-group">


                            <label> Semester Year :</label> <input class="form-control" type="text" name="semestername">

                            <label> Semester Season :</label> <input class="form-control" type="text" name="seasonname">
                            <br>
                            <input type="submit" value="Done" class="offset-3 col-4" name="addname">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>