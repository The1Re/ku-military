<?php

require_once('utils/helper.php');

class EquipmentController 
{
    public function returnForm($missionId = null)
    {
        $missionId = $_GET['missionId'] ?? $missionId;
        $mission = null;
        $error = null;

        if ($missionId) {
            $mission = Mission::getById($missionId);
            if (!$mission) {
                $error = "There is no mission id in database!";
                goto end;
            }
            $borrowEquipments = BorrowEquipment::getByMissionId($missionId);
        }
        
        end:
        require('views/equipment/return_form.php');
    }

    public function return()
    {
        $missionId = $_POST['missionId'];
        $borrow_list = BorrowEquipment::getByMissionId($missionId);
        $maintenanceId = [];
        $detailId = [];

        // get checkbox maintenance value
        foreach (array_keys($_POST) as $post)
        {
            if (str_contain($post, 'detailId_')) {
                $maintenanceId[] = $_POST[$post];
            }
        }
        
        // get detail id
        foreach($borrow_list as $borrow)
        {
            foreach($borrow->detail as $detail)
            {
                $detailId[] = $detail->id;
            }
        }
        

        // update
        BorrowEquipment::update_return_date($missionId);
        BorrowEquipmentDetail::update_return_status($detailId);

        $availableId = array_diff($detailId, $maintenanceId);

        if ($availableId)
            Equipment::update_status(array_diff($detailId, $maintenanceId), 'available');
        if ($maintenanceId)
            Equipment::update_status($maintenanceId, 'maintenance');

        $this->returnForm($missionId);
    }
}