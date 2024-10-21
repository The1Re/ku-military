<?php

class MissionReportController
{
    public function index()
    {
        $data = MissionReport::getAll();
        print_r($data);
    }
}