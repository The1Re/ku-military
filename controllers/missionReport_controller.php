<?php

class MissionReportController
{
    public function index()
    {
        $data = MissionReport::getAll();
        var_dump($data);
    }
}