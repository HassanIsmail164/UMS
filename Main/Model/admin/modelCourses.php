<?php
// model
class Courses
{
    private $dbConnection;

    function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    
    function showCourses()
    {
        //select query to check the login 
        $coursesQuery = "SELECT * from courses ORDER BY id";

        // result of the query set in variable login
        $getCourses = $this->dbConnection->selectQuery($coursesQuery);

        return $getCourses;
    }


    function insertCourse($CourseName, $CourseCode, $CourseCredit)
    {
        //INSERT  query to insert courses offered in class table
        $insertCourseQuery = "INSERT INTO courses (code, coursename, credit)
                               VALUES ('$CourseCode', '$CourseName', '$CourseCredit')";

        // result of the query set in variable login
        $insertCourse = $this->dbConnection->executeQuery($insertCourseQuery);

        return $insertCourse;
    }
}

