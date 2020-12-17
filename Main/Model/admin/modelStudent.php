<?php
// model
class Student
{
    private $dbConnection;

    function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }


    function getStudentID()
    {
        //select query to check the login 
        $studentIDQuery = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'ums_db' AND TABLE_NAME = 'students' ";

        // result of the query set in variable login
        $getStudentID = $this->dbConnection->selectQuery($studentIDQuery);

        return $getStudentID;
    }

    
    function insertStudent($studentFname, $studentLname, $studentEmail, $studentPassword, $studentPhone)
    {
        //INSERT  query to insert courses offered in class table
        $insertStudentQuery = "INSERT INTO students (Fname, Lname, email, password, phone)
                               VALUES ('$studentFname', '$studentLname', '$studentEmail@park-innovtion.com', '$studentPassword', '$studentPhone')";

        // result of the query set in variable login
        $insertStudent = $this->dbConnection->executeQuery($insertStudentQuery);

        return $insertStudent;
    }

    function studentProfile($studentID)
    {
        //select query to check the login 
        $studentProfileQuery = "SELECT Fname, Lname, password, email, phone FROM students WHERE id = '$studentID'";

        // result of the query set in variable login
        $getStudentProfile = $this->dbConnection->selectQuery($studentProfileQuery);

        return $getStudentProfile;
    }
}
?>