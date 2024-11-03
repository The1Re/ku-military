<?php

require_once('utils/database.php');

class MissionReport
{
    public $id, $missionId, $detail, $date;

    public function __construct(
        $id, 
        $missionId, 
        $detail, 
        $date
    )
    {
        $this->id = $id;
        $this->missionId = $missionId;
        $this->detail = $detail;
        $this->date = $date;
    }

    public static function getAll()
    {
        $sql = "
            SELECT * FROM mission_report
        ";
        $result = Database::query($sql);
        return MissionReport::db_to_object($result);
    }

    public static function getById($id)
    {
        $sql = "
            SELECT * FROM mission_report
            WHERE mission_report_id = ?
        ";
        $params = [$id];
        $result = Database::query($sql, $params);
        $mission_report = MissionReport::db_to_object($result);
        return $mission_report ? $mission_report[0] : null;
    }

    public static function getBy($data, $value)
    {
        $sql = "
            SELECT * FROM mission_report
            WHERE $data = $value
        ";
        $result = Database::query($sql);
        return MissionReport::db_to_object($result);
    }
    
    public static function add($missionId, $detail)
    {
        $sql = "
            INSERT INTO mission_report(mission_id, detail)
            VALUES (?, ?)
        ";
        $params = [$missionId, $detail];
        $result = Database::query($sql, $params);
        return $result;
    }
    
    public static function update($id, $detail)
    {
        $sql = "
            UPDATE mission_report
            SET detail = ?
            WHERE mission_report_id = ?
        ";
        $params = [$detail, $id];
        $result = Database::query($sql, $params);
        return $result;
    }

    public static function delete($id)
    {
        $sql = "
            DELETE FROM mission_report WHERE mission_report_id = ?
        ";
        $params = [$id];
        $result = Database::query($sql, $params);
        return $result;
    }


    public static function db_to_object($result_query)
    {
        $data = [];
        while ($row = $result_query->fetch_assoc())
        {
            $data[] = new MissionReport(
                $row['mission_report_id'],
                $row['mission_id'],
                $row['detail'],
                $row['date']
            );
        }
        return $data;
    }
}