<?php

require_once('utils/database.php');

class BorrowEquipment
{
    public $id, $missionId, $borrowDate, $returnDate, $detail;

    public function __construct(
        $id,
        $missionId,
        $borrowDate,
        $returnDate,
        $detail
    )
    {
        $this->id = $id;
        $this->missionId = $missionId;
        $this->borrowDate = $borrowDate;
        $this->returnDate = $returnDate;
        $this->detail = $detail;
    }

    public static function getByMissionId($missionId)
    {
        $sql = "
            SELECT 
                b.borrow_equipment_id AS bid, 
                b.mission_id AS mid, 
                b.borrow_date, 
                b.return_date, 
                d.borrow_equipment_detail_id AS detail_id, 
                d.status AS detail_status, 
                e.equipment_id AS eid, 
                e.equipment_name AS ename, 
                e.equipment_type AS etype, 
                e.equipment_status AS estatus, 
                e.equipment_detail AS edetail 
            FROM borrow_equipment AS b
            INNER JOIN borrow_equipment_details AS d ON d.borrow_equipment_id = b.borrow_equipment_id
            INNER JOIN equipment AS e ON e.equipment_id = d.equipment_id
            WHERE mission_id = $missionId
        ";
        $result = Database::query($sql);
        return BorrowEquipment::db_to_object($result);
    }

    public static function update_return_date($missionId)
    {
        $sql = "
            UPDATE borrow_equipment
            SET return_date = ?
            WHERE mission_id = ?
        ";
        $params = [date("Y-m-d H:i:s"), $missionId];
        $result = Database::query($sql, $params);
        return $result;
    }

    public static function db_to_object($result_query)
    {
        $data = [];
        while ($row = $result_query->fetch_assoc())
        {   
            // check if borrow_equipment_id exists then add borrowEquipmentDetial
            foreach ($data as $d)
            {
                if ($d->id == $row['bid']) {
                    $d->detail[] = new BorrowEquipmentDetail(
                        $row['detail_id'],
                        $row['detail_status'],
                        new Equipment(
                            $row['eid'], 
                            $row['ename'], 
                            $row['etype'],
                            $row['estatus'],
                            $row['edetail']
                        )
                    );
                    goto endloop;
                }
            }

            // if borrow_equipment_id not exists then create new BorrowEquipment 
            $data[] = new BorrowEquipment(
                $row['bid'],
                $row['mid'],
                $row['borrow_date'],
                $row['return_date'],
                [
                    new BorrowEquipmentDetail(
                        $row['detail_id'],
                        $row['detail_status'],
                        new Equipment(
                            $row['eid'], 
                            $row['ename'], 
                            $row['etype'],
                            $row['estatus'],
                            $row['edetail']
                        )
                    )
                ]
            );
            endloop:
        }
        return $data;
    }
}