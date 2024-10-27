<?php

class MissionReportController
{
    public function index()
    {
        $data = MissionReport::getAll();
        
        require('views/mission_report/index.php');
    }
}