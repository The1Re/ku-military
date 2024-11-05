<?php

require_once('utils/database.php');

class Equipment
{
    public $id, $name, $type, $status, $detail;

    public function __construct(
        $id,
        $name,
        $type,
        $status,
        $detail
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->status = $status;
        $this->detail = $detail;
    }

    public static function update_status(array $detailIid, string $status)
    {
        $tmp = join(', ', $detailIid);
        $sql = "
            UPDATE equipment
            JOIN borrow_equipment_details ON borrow_equipment_details.equipment_id = equipment.equipment_id
            SET equipment.equipment_status = '$status'
            WHERE borrow_equipment_details.borrow_equipment_detail_id IN ($tmp)
        ";
        $result = Database::query($sql);
        return $result;
    }
}