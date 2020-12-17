<?php
// model
class Schedule
{
    private $dbConnection;

    function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    function showShceduleSection()
    {
        //select query to check the login 
        $scheduleSectionQuery = "SELECT * from schedule_sections ORDER BY id";

        // result of the query set in variable login
        $getScheduleSection = $this->dbConnection->selectQuery($scheduleSectionQuery);

        return $getScheduleSection;

    }

    
    function showShceduleTime()
    {
        //select query to check the login 
        $scheduleTimeQuery = "SELECT * from schedule_times ORDER BY id";

        // result of the query set in variable login
        $getScheduleTime = $this->dbConnection->selectQuery($scheduleTimeQuery);

        return $getScheduleTime;
    }
}
