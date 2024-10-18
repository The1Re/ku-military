<?php

require_once('utils/database.php');

class Mission
{
    public $id, $leaderId, $name, $targetArea, $strategy, $status, $dateStart, $dateEnd;

    public function __construct(
        $id,
        $leaderId,
        $name,
        $targetArea,
        $strategy,
        $status,
        $dateStart,
        $dateEnd
    ) {
        $this->id = $id;
        $this->leaderId = $leaderId;
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
        ";
        $result = Database::query($sql);
        while($row = $result->fetch_assoc())
        {
            $data[] = new Mission(
                $row['missionId'],
                $row['leaderId'],
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

    public static function getById($id)
    {
        $sql = "
            SELECT * FROM mission
            WHERE missionId = ?
        ";
        $params = [$id];
        $result = Database::query($sql, $params);
        $row = $result->fetch_assoc();
        return new Mission(
            $row['missionId'],
            $row['leaderId'],
            $row['missionName'],
            $row['targetArea'],
            $row['strategy'],
            $row['status'],
            $row['dateStart'],
            $row['dateEnd']
        );
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

    public static function update($id, $leaderId, $name, $targetArea, $strategy, $status, $dateEnd)
    {
        $sql = "
            UPDATE mission
            SET leaderId = ?, missionName = ?, targetArea = ?, strategy = ?, status = ?, dateEnd = ?
            WHERE missionId = ?
        ";
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
            WHERE 
                missionName LIKE '%$key%' 
                OR leaderId LIKE '%$key%' 
                OR targetArea LIKE '%$key%' 
                OR strategy LIKE '%$key%' 
                OR status LIKE '%$key%'
                OR dateStart LIKE '%$key%'
                OR dateEnd LIKE '%$key%'
                OR missionId LIKE '%$key%'
        ";
        $result = Database::query($sql);
        while($row = $result->fetch_assoc())
        {
            $data[] = new Mission(
                $row['missionId'],
                $row['leaderId'],
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