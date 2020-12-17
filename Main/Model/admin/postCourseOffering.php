<?php
// model
class postClasses
{
    private $dbConnection;

    function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    
    function insertCourse($courseSelected_val, $teacherSelected_val, $sectionSelected_val, $timeSelected_val, $semesterSelected_val)
    {
        //INSERT  query to insert courses offered in class table
        $insertClassesQuery = "INSERT INTO class (courseID, teacherID, scheduleSectionID, scheduleTimeID, semesterID)
                               VALUES ('$courseSelected_val', '$teacherSelected_val', '$sectionSelected_val', '$timeSelected_val', '$semesterSelected_val')";

        // result of the query set in variable login
        $postClasses = $this->dbConnection->executeQuery($insertClassesQuery);

        return $postClasses;
    }
}
?>