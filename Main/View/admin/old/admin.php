<?php
require_once("header.php");
?>
<html>

<head>

    <title> Admin Page </title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div id="banner">
                <form class="form-inline">
                    <div class="form-group offset-9 col-4">

                        <h4> <label class="column"> <b> <input type="submit" value="New Semester: "> </b> </label> </h4>

                        <select class="form-control">

                            <option value=""> 2019/2020 </option>
                            <option value=""> Spring 2019 - 2020 </option>
                            <option value=""> Fall 2019 - 2020 </option>
                            <option value=""> Summer 2018 - 2019 </option>
                            <option value=""> Spring 2018 - 2019 </option>

                        </select>
                    </div>
                    <br>


                    <div class="form-group col-4">


                        <h2 label class="column"> <b> Select a Course: </b> </label> </h2>

                        <select class="form-control">

                            <option value=""> Select Course </option>
                            <option value=""> Programming 1 </option>
                            <option value=""> Calsuluss </option>
                            <option value=""> Programming 2 </option>

                        </select>
                    </div>

                    <div class="form-group col-4">
                        <b>
                            <h2 label class="column"> <b> Select a Schedual : </b> </label> </h2>
                        </b>
                        <select class="form-control">

                            <option value=""> Select Schedual </option>
                            <option value=""> MWF 9 - 10:30 AM </option>
                            <option value=""> TTH 3 - 4:30 PM </option>

                        </select>

                    </div>

                    <div class=" form-group col-4">
                        <b>
                            <h2 label class="column"> Select a Teacher :
                        </b> </label> </h2>
                        <select class="form-control">
                            <option value=""> Select Teacher </option>
                            <option value=""> Mr. Shadi </option>
                            <option value=""> Mr. Adham </option>
                            <option value=""> Mr. Samer </option>

                        </select>
                    </div>
                    <br>
                    <div class="form-group offset-6 col-3 ">
                        <input type="submit" value="Offer" id="input">
                    </div>
                </form>
            </div>

            <div class="col-11">
                <div class="containerfluid">


                    <table class=".container-fluid" style="width: 110%" border="2">

                        <tr>

                            <th align="center"> Codes </th>
                            <th align="center"> Course Offering </th>
                            <th align="center"> Schedule </th>
                            <th align="center"> Teacher </th>
                        </tr>

                        <tr>
                            <td> CSP101 </td>
                            <td> Programming 1 </td>
                            <td> MWF 9 - 10:30 AM </td>
                            <td> Mr.Adham </td>
                        </tr>

                        <tr>
                            <td> MCL </td>
                            <td> Calsuluss </td>
                            <td> TTH 3 - 4:30 PM </td>
                            <td> Mr.Samer </td>
                        </tr>

                        <tr>
                            <td> CSP102 </td>
                            <td> Programming 2 </td>
                            <td> MWF 9 - 10:30 AM </td>
                            <td> Mr.Shadi </td>
                        </tr>

                    </table>
                </div>




            </div>





        </div>
    </div>

    <?php require_once("footer.php"); ?>

</body>

</html>