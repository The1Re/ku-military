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