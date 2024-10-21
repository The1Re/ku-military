<?php

require_once('utils/database.php');

class MissionReport
{
    public $id, $mission, $detail, $date;

    public function __construct(
        int $id, 
        Mission $mission, 
        string $detail, 
        string $date
    )
    {
        $this->id = $id;
        $this->mission = $mission;
        $this->detail = $detail;
        $this->date = $date;
    }

    public static function getAll()
    {
        $sql = "
            SELECT * FROM missionreport
            INNER JOIN mission ON mission.missionId = missionreport.missionId
            INNER JOIN soldier ON soldier.soldierId = mission.leaderId
        ";

        $result = Database::query($sql);
        return MissionReport::db_to_object($result);
    }

    public static function db_to_object($result_query)
    {  
        $data = [];
        while($row = $result_query->fetch_assoc())
        {
            $data[] = new MissionReport(
                $row['missionReportId'],
                new Mission(
                    $row['missionId'],
                    new Soldier(
                        $row['soldierId'],
                        $row['firstName'],
                        $row['lastName'],
                        $row['rank'],
                        $row['dob'],
                        (new DateTime())->diff(new DateTime($row['dob']))->y,
                        $row['department']
                    ),
                    $row['missionName'],
                    $row['targetArea'],
                    $row['strategy'],
                    $row['status'],
                    $row['dateStart'],
                    $row['dateEnd']
                ),
                $row['detail'],
                $row['date']
            );
        }
        return $data;
    }
}