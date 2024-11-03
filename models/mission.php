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
        $sql = "
            SELECT * FROM mission
        ";
        $result = Database::query($sql);
        return Mission::db_to_object($result);
    }

    public static function getById($id)
    {
        $sql = "
            SELECT * FROM mission
            WHERE mission_id = ?
        ";
        $params = [$id];
        $result = Database::query($sql, $params);
        $mission = Mission::db_to_object($result);
        return $mission ? $mission[0] : null;
    }

    public static function add($leaderId, $name, $targetArea, $strategy, $status)
    {
        $sql = "
            INSERT INTO mission(leader_id, mission_name, target_area, strategy, status)
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
            SET leader_id = ?, mission_name = ?, target_area = ?, strategy = ?, status = ?, date_end = ?
            WHERE mission_id = ?
        ";
        $dateEnd = $status == 'Success' || $status == 'Failed' ? date("Y-m-d H:i:s") : null;
        $params = [$leaderId, $name, $targetArea, $strategy, $status, $dateEnd, $id];
        $result = Database::query($sql, $params);
        return $result;
    }

    public static function delete($id)
    {
        $sql = "
            DELETE FROM mission WHERE mission_id = ?
        ";
        $params = [$id];
        $result = Database::query($sql, $params);
        return $result;
    }

    public static function search($key)
    {
        $sql = "
            SELECT * FROM mission
            WHERE 
                mission_name LIKE '%$key%' 
                OR leader_id LIKE '%$key%' 
                OR target_area LIKE '%$key%' 
                OR strategy LIKE '%$key%' 
                OR status LIKE '%$key%'
                OR date_start LIKE '%$key%'
                OR date_end LIKE '%$key%'
                OR mission_id LIKE '%$key%'
        ";
        $result = Database::query($sql);
        return Mission::db_to_object($result);
    }

    public static function count($key)
    {
        $sql = "
            SELECT * FROM mission
            WHERE 
                mission_name LIKE '%$key%' 
                OR leader_id LIKE '%$key%' 
                OR target_area LIKE '%$key%' 
                OR strategy LIKE '%$key%' 
                OR status LIKE '%$key%'
                OR date_start LIKE '%$key%'
                OR date_end LIKE '%$key%'
                OR mission_id LIKE '%$key%'
        ";
        $result = Database::query($sql);
        return $result->num_rows;
    }

    public static function sort($data, $option)
    {
        $sql = "
            SELECT * FROM mission
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
                $row['mission_id'],
                $row['leader_id'],
                $row['mission_name'],
                $row['target_area'],
                $row['strategy'],
                $row['status'],
                $row['date_start'],
                $row['date_end']
            );
        }
        return $data;
    }
}