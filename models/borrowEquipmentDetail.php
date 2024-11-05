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

    public static function update_return_status(array $detailId)
    {
        $tmp = join(', ', $detailId);
        $sql = "
            UPDATE borrow_equipment_details
            SET status = 'inactive'
            WHERE borrow_equipment_detail_id IN ($tmp)
        ";
        $result = Database::query($sql);
        return $result;
    }
}