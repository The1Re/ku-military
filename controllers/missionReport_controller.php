<?php

class MissionReportController
{
    public function index()
    {
        $missionId = $_GET['missionId'] ?? null;
        $mission = null;
        $error = null;

        if ($missionId) {
            $mission = Mission::getById($missionId);
            if (!$mission) {
                $error = "There is no mission id in database!";
                goto end;
            }
            // $mission_report_list = MissionReport::getBy("missionId", $missionId);
            $mission_report_list = true;
        }
        
        end:
        require('views/mission_report/index.php');
    }
}