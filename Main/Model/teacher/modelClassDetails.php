<?php

// model
class ClassesDetails
{
    private $dbConnection;

    function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    function insertDetails($studentID, $studentClassID, $grade)
    {
        //INSERT  query to insert courses offered in studentClass table
        $insertDetailsQuery = "INSERT INTO class_details (studentID, studentClassID, grade, document) VALUES ($studentID, $studentClassID, $grade, 'File')";

        // result of the query set in variable login
        $insertDetails = $this->dbConnection->executeQuery($insertDetailsQuery);

        return $insertDetails;
    }

    function showClassDetails($studentID, $studentClassID)
    {
        //select query to check the login 
        $classesDetailsQuery = "SELECT  grade, document FROM class_details INNER JOIN student_classes ON class_details.studentClassID = student_classes.studentClassID
         WHERE class_details.studentID = '$studentID' and class_details.studentClassID = '$studentClassID' ";

        // result of the query set in variable login
        $ClassesDetails = $this->dbConnection->selectQuery($classesDetailsQuery);

        return $ClassesDetails;
    }
}

