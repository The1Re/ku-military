<?php

require_once('utils/database.php');

class MissionReport
{
    public $id, $missionId, $detail, $date;

    public function __construct(
        int $id, 
        int $missionId, 
        ?string $detail, 
        string $date
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
            SELECT * FROM missionreport
        ";
        $result = Database::query($sql);
        return MissionReport::db_to_object($result);
    }

    public static function getById($id)
    {
        $sql = "
            SELECT * FROM missionreport
            WHERE missionReportId = ?
        ";
        $params = [$id];
        $result = Database::query($sql, $params);
        return MissionReport::db_to_object($result);
    }

    public static function getBy($data, $value)
    {
        $sql = "
            SELECT * FROM missionreport
            WHERE $data = $value
        ";
        $result = Database::query($sql);
        return MissionReport::db_to_object($result);
    }
    
    public static function add($missionId, $detail, $date)
    {
        $sql = "
            INSERT INTO missionreport
            VALUES (?, ?, ?)
        ";
        $params = [$missionId, $detail, $date];
        $result = Database::query($sql, $params);
        return MissionReport::db_to_object($result);
    }
    
    public static function update($id, $missionId, $detail, $date)
    {
        $sql = "
            UPDATE missionreport
            SET missionId = ?, detail = ?, date = ?
            WHERE missionReportId = ?
        ";
        $params = [$missionId, $detail, $date, $id];
        $result = Database::query($sql, $params);
        return MissionReport::db_to_object($result);
    }

    public static function delete($id)
    {
        $sql = "
            DELETE FROM missionreport WHERE missionReportId = ?
        ";
        $params = [$id];
        $result = Database::query($sql, $params);
        return MissionReport::db_to_object($result);
    }


    public static function db_to_object($result_query)
    {
        $data = [];
        while ($row = $result_query->fetch_assoc())
        {
            $data[] = new MissionReport(
                $row['missionReportId'],
                $row['missionId'],
                $row['detail'],
                $row['date']
            );
        }
        return $data;
    }
}