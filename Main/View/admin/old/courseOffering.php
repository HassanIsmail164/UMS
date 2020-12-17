<?php
require_once("adminHeader.php");
?>
<html>

<head>
    <title> Course Offering </title>
</head>

<body>
    <div class="container">
        <div class="row">

            <div id="banner">
                <h1> Select course for next semester </h1>
                <br>

                <form class="form-inline">
                    <h3> Select semester </h3>
                    <div class="form-group offset-9 col-2">

                        <label class="column"> <b> <input type="submit" value="New Semester: "> </b> </label>

                        <select class="form-control">

                            <option value=""> 2019/2020 </option>
                            <option value=""> Spring 2019 - 2020 </option>
                            <option value=""> Fall 2019 - 2020 </option>
                            <option value=""> Summer 2018 - 2019 </option>
                            <option value=""> Spring 2018 - 2019 </option>

                        </select>
                    </div>
                    <br>



                    <div class="form-group col-2">

                        <strong> <label class="column"> Select a Course: </label> </strong>
                        <select class="form-control">

                            <option value=""> Select Course </option>
                            <option value=""> Programming 1 </option>
                            <option value=""> Calsuluss </option>
                            <option value=""> Programming 2 </option>

                        </select>
                    </div>

                    <div class="form-group offset-2 col-2">
                        <label class="column"> Select a Schedual : </label>
                        <select class="form-control">

                            <option value=""> Select Schedual </option>
                            <option value=""> MWF 9 - 10:30 AM </option>
                            <option value=""> TTH 3 - 4:30 PM </option>

                        </select>

                    </div>

                    <div class=" form-group offset-2 col-2">
                        <label class="column"> Select a Teacher : </label>
                        <select class="form-control">
                            <option value=""> Select Teacher </option>
                            <option value=""> Mr. Shadi </option>
                            <option value=""> Mr. Adham </option>
                            <option value=""> Mr. Samer </option>

                        </select>
                    </div>


                    <div class="form-group offset-6 col-3 ">
                        <input type="submit" value="Offer" id="input">
                    </div>

                </form>
            </div>


            <div class="col-11">

                <table class=".th" style="width: 110%" border="1">

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


</body>

</html>