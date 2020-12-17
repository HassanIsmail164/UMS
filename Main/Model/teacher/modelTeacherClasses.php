<?php
// model
class TeacherClasses
{
    private $dbConnection;

    function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    function showTeacherClasses($teacherID, $semesterID)
    {
        //select query to check the login 
        $teacherClassesQuery = "SELECT classID, classes.courseID, classes.teacherID, classes.semesterID, courses.code, courses.courseName, courses.credit,
         teachers.Fname,teachers.Lname,schedule_sections.section, schedule_times.time, semesters.id, semesters.year, semesters.season
          FROM classes INNER JOIN courses ON classes.courseID = courses.id
                     INNER JOIN teachers ON classes.teacherID = teachers.id
                     INNER JOIN semesters ON classes.semesterID = semesters.id
                     INNER JOIN schedule_sections ON classes.scheduleSectionID = schedule_sections.id
                     INNER JOIN schedule_times ON classes.scheduleTimeID = schedule_times.id
                     WHERE classes.teacherID = '$teacherID' and classes.semesterID = '$semesterID'";

        // result of the query set in variable login
        $getTeacherClasses = $this->dbConnection->selectQuery($teacherClassesQuery);

        return $getTeacherClasses;
    }


    function showClassesStudent($classID)
    {
        //select query to check the login 
        $classesStudent = "SELECT studentClassID, student_classes.studentID, Fname, Lname FROM student_classes INNER JOIN classes ON student_classes.classID = classes.classID
        INNER JOIN students ON student_classes.studentID = students.id WHERE student_classes.classID = '$classID'";

        // result of the query set in variable login
        $getTeacherClasses = $this->dbConnection->selectQuery($classesStudent);

        return $getTeacherClasses;
    }


}
