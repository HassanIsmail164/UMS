<?php
// model
class StudentClasses
{

    private $dbConnection;

    function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    function showStudentClasses($StudentID, $semesterID)
    {
        //select query to check the login 
        $studentClassesQuery = "SELECT  studentClassID,student_classes.classID, courses.code, courses.courseName, courses.credit, teachers.Fname,teachers.Lname,
         schedule_sections.section, schedule_times.time, semesters.id, semesters.year, semesters.season
          FROM student_classes INNER JOIN classes ON student_classes.classID = classes.classID
                     INNER JOIN courses ON classes.courseID = courses.id
                     INNER JOIN teachers ON classes.teacherID = teachers.id
                     INNER JOIN semesters ON classes.semesterID = semesters.id
                     INNER JOIN schedule_sections ON classes.scheduleSectionID = schedule_sections.id
                     INNER JOIN schedule_times ON classes.scheduleTimeID = schedule_times.id 
                     WHERE student_classes.studentID = '$StudentID' and semesters.id = '$semesterID'";

        // result of the query set in variable login
        $StudentClasses = $this->dbConnection->selectQuery($studentClassesQuery);

        return $StudentClasses;
    }


    function checkRegistrationDuplication($scheduleSection, $scheduleTime, $studentID)
    {
        //select query to check the login 
        $duplicationQuery = "SELECT * FROM student_classes
        INNER JOIN classes ON student_classes.classID = classes.classID 
        INNER JOIN schedule_sections ON classes.scheduleSectionID = schedule_sections.id
        INNER JOIN schedule_times ON classes.scheduleTimeID = schedule_times.id
        WHERE schedule_sections.section = '$scheduleSection' AND schedule_times.time = '$scheduleTime' AND student_classes.studentID = '$studentID'";

        // result of the query set in variable login
        $checkRegistrationDuplication = $this->dbConnection->selectQuery($duplicationQuery);

        return $checkRegistrationDuplication;

        if (mysqli_num_rows($checkRegistrationDuplication) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function registerClass($getClassID, $sessionID)
    {
        //INSERT  query to insert courses offered in studentClass table
        $registerClassQuery = "INSERT INTO student_classes (classID, studentID) VALUES ('$getClassID', '$sessionID')";

        // result of the query set in variable login
        $registerClass = $this->dbConnection->executeQuery($registerClassQuery);

        return $registerClass;
    }


    function dropClass($getClassID)
    {
        //INSERT  query to insert courses offered in studentClass table
        $dropClassQuery = "DELETE FROM student_classes WHERE classID = '$getClassID'";

        // result of the query set in variable login
        $dropClass = $this->dbConnection->executeQuery($dropClassQuery);

        return $dropClass;
    }
}
