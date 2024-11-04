<?php

require_once('utils/helper.php');

class EquipmentController 
{
    public function return($missionId = null)
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
            
        }
        
        end:
        require('views/equipment/return_form.php');
    }
}