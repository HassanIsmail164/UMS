<html>


<head>
    <title>University Management System</title>

    <link href="CSS/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" />

    <link href="loginCSS.css" rel="stylesheet" type="text/css" media="screen" />

    <script src="CSS/js/bootstrap.min.js"> </script>

</head>
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<center>

    <body class="bg">
        <div class="row loginHeader">
            <div class="col-sm-3"><a target="_blank" rel="noopener noreferrer" href="https://www.park-innovation.com/"><img src="images/logo.png" width="150" height="100"></a>
            </div>
            <!-- <div class="col-sm-5 title" ><h1 style="font-size: 60px" ><strong>Park Innovation - UMS</strong></h1></div> -->
        </div>

        <div class="loginDiv">
            <h4 style="color:red"><?php if (isset($_SESSION['loginFalse']) && ($_SESSION['loginFalse'] == true)) {
                                        echo "Incorrect Username or Password !";
                                        unset($_SESSION['loginFalse']);
                                    }
                                    ?></h4>
            <form class="formLogin" method="POST" action="Controller/verifyLogin.php">
                <table>
                    <tr>
                        <td style="font-size: 35px"><strong>Username:</strong></td>
                        <td><input class="form-control" id="usr" type="text" name="userID" placeholder=" username " required></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>

                    <tr>
                        <td style="font-size: 35px"><strong>Password:</strong></td>
                        <td><input class="form-control" id="pass" type="password" name="password" placeholder=" * * * * * * *" required></td>
                    </tr>

                    <tr>
                        <td><br></td>
                    </tr>

                    <tr>
                        <td colspan="2" style="text-align: center;"><input class="btn btn-secondary" type="submit" value="Login"></td>
                    </tr>

                    <tr>
                        <td><br></td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center"><strong>
                                <p style="font-size: 20px">Website : <a target="_blank" rel="noopener noreferrer" href="https://www.park-innovation.com/home/" style="color:blue">Park-Innovation.com</a></p>
                            </strong></td>
                    </tr>
                </table>

            </form>
        </div>
        <p class="footerLogin">&copy; Design by MTH Team</p>
        <!-- <p style="font-size: 20px" class="footerLogin">&copy; Hassan Ismail</p> -->

    </body>
</center>

</html>