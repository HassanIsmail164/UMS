<?php
// model
class Classes
{
    private $dbConnection;

    function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    function showClasses($semesterID)
    {
        //select query to check the login 
        $classesQuery = "SELECT classID, courses.code, courses.courseName, courses.credit, teachers.Fname,teachers.Lname,
          schedule_sections.section, schedule_times.time, semesters.id, semesters.year, semesters.season
          FROM classes INNER JOIN courses ON classes.CourseID = courses.id
                     INNER JOIN teachers ON classes.teacherID = teachers.id
                     INNER JOIN semesters ON classes.semesterID = semesters.id
                     INNER JOIN schedule_sections ON classes.scheduleSectionID = schedule_sections.id
                     INNER JOIN schedule_times ON classes.scheduleTimeID = schedule_times.id
                     WHERE semesters.id = '$semesterID'";

        // result of the query set in variable login
        $getClasses = $this->dbConnection->selectQuery($classesQuery);

        return $getClasses;
    }
    
    
    function checkDuplication($teacherSelected_val, $sectionSelected_val, $timeSelected_val, $semesterSelected_val)
    {
        //select query to check the login 
        $duplicationQuery = "SELECT * FROM classes WHERE teacherID = '$teacherSelected_val' AND
                             scheduleSectionID = '$sectionSelected_val' AND scheduleTimeID = '$timeSelected_val' AND
                              semesterID = '$semesterSelected_val'";

        // result of the query set in variable login
        $checkDuplication = $this->dbConnection->selectQuery($duplicationQuery);

        return $checkDuplication;

        if(mysqli_num_rows($checkDuplication) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function insertClass($courseSelected_val, $teacherSelected_val, $sectionSelected_val, $timeSelected_val, $semesterSelected_val)
    {
        //INSERT  query to insert courses offered in class table
        $insertClassesQuery = "INSERT INTO classes (courseID, teacherID, scheduleSectionID, scheduleTimeID, semesterID)
                               VALUES ('$courseSelected_val', '$teacherSelected_val', '$sectionSelected_val', '$timeSelected_val', '$semesterSelected_val')";

        // result of the query set in variable login
        $postClasses = $this->dbConnection->executeQuery($insertClassesQuery);

        return $postClasses;
    }


    function unOffer($getClassID)
    {
        //INSERT  query to insert courses offered in studentClass table
        $unOfferQuery = "DELETE FROM classes WHERE classID = '$getClassID'";

        // result of the query set in variable login
        $unOffer = $this->dbConnection->executeQuery($unOfferQuery);

        return $unOffer;
    }
}
