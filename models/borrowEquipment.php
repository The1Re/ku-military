<?php

require_once('utils/database.php');

class BorrowEquipment
{
    public $id, $missionId, $borrowDate, $returnDate;

    public function __construct(
        int $id,
        int $missionId,
        DateTime $borrowDate,
        DateTime $returnDate,
    ) {
        $this->id = $id;
        $this->missionId = $missionId;
        $this->borrowDate = $borrowDate;
        $this->returnDate = $returnDate;
    }

    public static function getAll(): array
    {
        $data = [];
        $sql = "SELECT * FROM borrowequipment";
        $result = Database::query($sql);
        while ($row = $result->fetch_assoc())
        {
            $data[] = new BorrowEquipment(
                $row['borrowEquipmentId'],
                $row['missionId'],
                new DateTime($row['borrowDate']),
                new DateTime($row['returnDate'])
            );
        }
        return $data;
    }

    public static function add($missionId): bool
    {
        $sql = "INSERT INTO borrowequipment(missionId, borrowDate) VALUES (?, ?)";
        $params = [$missionId, new DateTime()];
        $result = Database::query($sql, $params);
        return $result > 0;
    }

    public static function delete(int $id): bool
    {
        $sql = "DELETE FROM borrowequipment WHERE borrowEquipmentId = ?";
        $params = [$id];
        $result = Database::query($sql, $params);
        return $result > 0;
    }

    public static function update(int $id, BorrowEquipment $b): bool
    {
        $sql = "
            UPDATE borrowequipment 
            SET 
            WHERE borrowEquipmentId = ?
        ";
        $params = [];
        $result = Database::query($sql, $params);
        return $result > 0;
    }
}