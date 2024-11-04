<?php

class BorrowEquipmentDetail
{
    public $id, $status, $equipment;

    public function __construct($id, $status, $equipment) 
    {
        $this->id = $id;
        $this->status = $status;
        $this->equipment = $equipment;
    }
}