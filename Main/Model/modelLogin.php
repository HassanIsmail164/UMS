<?php
// model
class Login{

    private $dbConnection;

    // Constructor
    function Login($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    function verifyLoginAdmin($userID, $password)
    {

        //select query to check the login   
        $LoginQuery = "SELECT * from admins where id ='".$userID."' and password='".$password."'";

        // result of the query set in variable login
        $loginAdmin = $this->dbConnection->selectQuery($LoginQuery);

        return $loginAdmin;
    }

    function verifyLoginTeacher($userID, $password)
    {

        //select query to check the login   
        $LoginQuery = "SELECT * from teachers where id ='" . $userID . "' and password='" . $password . "'";

        // result of the query set in variable login
        $loginTeacher = $this->dbConnection->selectQuery($LoginQuery);

        return $loginTeacher;
    }

    function verifyLoginStudent($userID, $password)
    {

        //select query to check the login   
        $LoginQuery = "SELECT * from students where id ='" . $userID . "' and password='" . $password . "'";

        // result of the query set in variable login
        $loginStudent = $this->dbConnection->selectQuery($LoginQuery);

        return $loginStudent;
    }
}
?>