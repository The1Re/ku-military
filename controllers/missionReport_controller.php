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
            $detail = $_POST['detail'];
            MissionReport::add($missionId, $detail);
        }

        $this->index($missionId);
    }

    public function editForm()
    {
        $mission_report_id = $_GET['id'];
        $mission_report = MissionReport::getById($mission_report_id);

        require('views/mission_report/edit_form.php');
    }

    public function edit()
    {
        $missionId = $_POST['missionId'];
        if (isset($_POST['action']) && $_POST['action'] == 'edit') {
            $mission_report_id = $_POST['id'];
            $detail = $_POST['detail'];
            MissionReport::update($mission_report_id, $detail);
        }

        $this->index($missionId);
    }

    public function deleteForm()
    {
        $mission_report_id = $_GET['id'];
        $mission_report = MissionReport::getById($mission_report_id);

        require('views/mission_report/delete_form.php');
    }

    public function delete()
    {
        $mission_report_id = $_GET['id'];
        $missionId = $_GET['missionId'];
        MissionReport::delete($mission_report_id);

        $this->index($missionId);
    }
}