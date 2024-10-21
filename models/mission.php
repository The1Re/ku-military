<?php

require_once('utils/database.php');

class Mission
{
    public $id, $leader, $name, $targetArea, $strategy, $status, $dateStart, $dateEnd;

    public function __construct(
        int $id,
        Soldier $leader,
        string $name,
        string $targetArea,
        string $strategy,
        string $status,
        string $dateStart,
        ?string $dateEnd
    ) {
        $this->id = $id;
        $this->leader = $leader;
        $this->name = $name;
        $this->targetArea = $targetArea;
        $this->strategy = $strategy;
        $this->status = $status;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }

    public static function getAll()
    {
        $data = [];
        $sql = "
            SELECT * FROM mission
            INNER JOIN soldier ON soldier.soldierId = mission.leaderId
        ";
        $result = Database::query($sql);
        return Mission::db_to_object($result);
    }

    public static function getById($id)
    {
        $sql = "
            SELECT * FROM mission
            INNER JOIN soldier ON soldier.soldierId = mission.leaderId
            WHERE missionId = ?
        ";
        $params = [$id];
        $result = Database::query($sql, $params);
        return Mission::db_to_object($result)[0];
    }

    public static function add($leaderId, $name, $targetArea, $strategy, $status)
    {
        $sql = "
            INSERT INTO mission(leaderId, missionName, targetArea, strategy, status)
            VALUES (?, ?, ?, ?, ?)
        ";
        $params = [$leaderId, $name, $targetArea, $strategy, $status];
        $result = Database::query($sql, $params);
        return $result;
    }

    public static function update($id, $leaderId, $name, $targetArea, $strategy, $status)
    {
        $sql = "
            UPDATE mission
            SET leaderId = ?, missionName = ?, targetArea = ?, strategy = ?, status = ?, dateEnd = ?
            WHERE missionId = ?
        ";
        $dateEnd = $status == 'Success' || $status == 'Failed' ? date("Y-m-d H:i:s") : null;
        $params = [$leaderId, $name, $targetArea, $strategy, $status, $dateEnd, $id];
        $result = Database::query($sql, $params);
        return $result;
    }

    public static function delete($id)
    {
        $sql = "
            DELETE FROM mission WHERE missionId = ?
        ";
        $params = [$id];
        $result = Database::query($sql, $params);
        return $result;
    }

    public static function search($key)
    {
        $data = [];
        $sql = "
            SELECT * FROM mission
            INNER JOIN soldier ON soldier.soldierId = mission.leaderId
            WHERE 
                missionName LIKE '%$key%' 
                OR CONCAT(firstName, ' ', lastName) LIKE '%$key%'
                OR targetArea LIKE '%$key%' 
                OR strategy LIKE '%$key%' 
                OR status LIKE '%$key%'
                OR dateStart LIKE '%$key%'
                OR dateEnd LIKE '%$key%'
                OR missionId LIKE '%$key%'
        ";
        $result = Database::query($sql);
        return Mission::db_to_object($result);
    }

    public static function count($key)
    {
        $sql = "
            SELECT * FROM mission
            INNER JOIN soldier ON soldier.soldierId = mission.leaderId
            WHERE 
                missionName LIKE '%$key%' 
                OR CONCAT(firstName, ' ', lastName) LIKE '%$key%'
                OR targetArea LIKE '%$key%' 
                OR strategy LIKE '%$key%' 
                OR status LIKE '%$key%'
                OR dateStart LIKE '%$key%'
                OR dateEnd LIKE '%$key%'
                OR missionId LIKE '%$key%'
        ";
        $result = Database::query($sql);
        return $result->num_rows;
    }

    public static function sort($data, $option)
    {
        $sql = "
            SELECT * FROM mission
            INNER JOIN soldier ON soldier.soldierId = mission.leaderId
            ORDER BY $data $option
        ";
        $result = Database::query($sql);
        return Mission::db_to_object($result);
    }

    private static function db_to_object($result_query)
    {
        $data = [];
        while ($row = $result_query->fetch_assoc())
        {
            $data[] = new Mission(
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
            );
        }
        return $data;
    }
}