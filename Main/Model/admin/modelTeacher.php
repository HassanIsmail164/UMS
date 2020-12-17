<?php
// model
class Teacher{

    private $dbConnection;

    function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    
    function showTeacher()
    {
        //select query to check the login 
        $teacherQuery = "SELECT * from teachers";

        // result of the query set in variable login
        $getTeacher = $this->dbConnection->selectQuery($teacherQuery);

        return $getTeacher;
    }


    function getTeacherID()
    {
        //select query to check the login 
        $teacherIDQuery = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'ums_db' AND TABLE_NAME = 'teachers' ";

        // result of the query set in variable login
        $getTeacherID = $this->dbConnection->selectQuery($teacherIDQuery);

        return $getTeacherID;
    }


    function insertTeacher($teacherFname, $teacherLname, $teacherEmail, $hash, $teacherPhone)
    {
        //INSERT  query to insert courses offered in class table
        $insertTeacherQuery = "INSERT INTO teachers (Fname, Lname, email, password, phone)
                               VALUES ('$teacherFname', '$teacherLname', '$teacherEmail@park-innovtion.com', '$hash', '$teacherPhone')";

        // result of the query set in variable login
        $insertTeacher = $this->dbConnection->executeQuery($insertTeacherQuery);

        return $insertTeacher;
    }


    function teacherProfile($teacherID)
    {
        //select query to check the login 
        $teacherProfileQuery = "SELECT Fname, Lname, password, email, phone FROM teachers WHERE id = '$teacherID'";

        // result of the query set in variable login
        $getTeacherProfile = $this->dbConnection->selectQuery($teacherProfileQuery);

        return $getTeacherProfile;
    }
}
