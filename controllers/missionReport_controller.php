<?php

require_once('utils/helper.php');

class MissionReportController
{
    public function index($missionId = null)
    {
        $missionId = $_GET['missionId'] ?? $missionId ?? null;
        $mission = null;
        $error = null;

        if ($missionId) {
            $mission = Mission::getById($missionId);
            if (!$mission) {
                $error = "There is no mission id in database!";
                goto end;
            }
            $mission_report_list = MissionReport::getBy("mission_id", $missionId);
        }
        
        end:
        require('views/mission_report/index.php');
    }

    public function addForm()
    {
        $missionId = $_GET['missionId'];

        require('views/mission_report/add_form.php');
    }

    public function add()
    {
        $missionId = $_POST['missionId'];
        if (isset($_POST['action']) && $_POST['action'] == 'add') {
            echo 'Add success';
        }

        $this->index($missionId);
    }
}