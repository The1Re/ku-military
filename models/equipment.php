<?php

require_once('utils/database.php');

class Equipment
{
    public $id, $name, $type, $status, $detail;

    public function __construct($id, $name, $type, $status, $detail)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->status = $status;
        $this->detail = $detail;
    }

    public static function getAll()
    {
        $data = [];
        $sql = "
            SELECT * FROM equipment
        ";
        $result = Database::query($sql);
        while($row = $result->fetch_assoc())
        {
            $data[] = new Equipment(
                $row['equipmentId'],
                $row['name'],
                $row['type'],
                $row['status'],
                $row['detail']
            );
        }
        return $data;
    }

    public static function getById($id)
    {
        $sql = "
            SELECT * FROM equipment
            WHERE equipmentId = ?
        ";
        $params = [$id];
        $result = Database::query($sql, $params);
        $row = $result->fetch_assoc();
        return new Equipment(
            $row['equipmentId'],
            $row['name'],
            $row['type'],
            $row['status'],
            $row['detail']
        );
    }

    public static function add($name, $type, $status, $detail)
    {
        $sql = "
            INSERT INTO equipment(name, type, status, detail)
            VALUES (?, ?, ?, ?)
        ";
        $params = [$name, $type, $status, $detail];
        $result = Database::query($sql, $params);
        return $result;
    }

    public static function update($id, $name, $type, $status, $detail)
    {
        $sql = "
            UPDATE equipment
            SET name = ?, type = ?, status = ?, detail = ?
            WHERE equipmentId = ?
        ";
        $params = [$name, $type, $status, $detail, $id];
        $result = Database::query($sql, $params);
        return $result;
    }

    public static function delete($id)
    {
        $sql = "
            DELETE FROM equipment WHERE equipmentId = ?
        ";
        $params = [$id];
        $result = Database::query($sql, $params);
        return $result;
    }

    public static function search($key)
    {
        $data = [];
        $sql = "
            SELECT * FROM equipment
            WHERE name like '%$key%'
        ";
        $result = Database::query($sql);
        while($row = $result->fetch_assoc())
        {
            $data[] = new Equipment(
                $row['equipmentId'],
                $row['name'],
                $row['type'],
                $row['status'],
                $row['detail']
            );
        }
        return $data;
    }
}