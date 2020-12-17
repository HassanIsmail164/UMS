<?php
// model
class Semester
{
    private $dbConnection;

    function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    function showSemesters()
    {
        //select query to check the login 
        $semesterQuery = "SELECT * from semesters order by id desc";

        // result of the query set in variable login
        $getSemester = $this->dbConnection->selectQuery($semesterQuery);

        return $getSemester;
    }

    function isDuplicate($semesterYear, $semesterSeason)
    {
        //select query to check the login 
        $isDuplicateQuery = "SELECT * FROM semesters WHERE year = '$semesterYear' AND
                             season = '$semesterSeason'";

        // result of the query set in variable login
        $isDuplicate = $this->dbConnection->selectQuery($isDuplicateQuery);

        return $isDuplicate;

        if (mysqli_num_rows($isDuplicate) > 0) {
            return true;
        } else {
            return false;
        }
    }

    function insertSemester($semesterYear, $semesterSeason)
    {
        //INSERT  query to insert courses offered in class table
        $insertSemesterQuery = "INSERT INTO semesters (year, season)
                               VALUES ('$semesterYear', '$semesterSeason')";

        // result of the query set in variable login
        $insertSemester = $this->dbConnection->executeQuery($insertSemesterQuery);

        return $insertSemester;
    }
}
?>