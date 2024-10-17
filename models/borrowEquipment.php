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

    /**
     * Get All methods
     * get all borrowEquipment on database
     * 
     * @return BorrowEquipment[] array of borrowEquipment
     */
    public static function getAll(): array
    {
        $data = [];
        $sql = "SELECT * FROM borrowEquiment";
        $result = Database::query($sql);
        while ($row = $result->fetch_assoc())
        {
            $data[] = new borrowEquipment(
                $row['borrowEquipmentId'],
                $row['missionId'],
                new DateTime($row['borrowDate']),
                new DateTime($row['returnDate'])
            );
        }
        return $data;
    }

    /**
     * Add borrowEquipment methods
     * add borrowEquipment to database
     * 
     * @param BorrowEquipment $borrowEquipment
     * @return bool if add success return true else false
     */
    public static function add(BorrowEquipment $b): bool
    {
        $sql = "INSERT INTO borrowEquiment VALUES (?, ?, ?, ?)";
        $params = [$b->id, $b->missionId, $b->borrowDate, $b->returnDate];
        $result = Database::query($sql, $params);
        return $result > 0;
    }

    /**
     * Delete borrowEquipment methods
     * delete borrowEquipment on database by id
     * 
     * @param int $id
     * @return bool if delete succss return true else false
     */
    public static function delete(int $id): bool
    {
        $sql = "DELETE FROM borrowEquipment WHERE borrowEquipmentId = ?";
        $params = [$id];
        $result = Database::query($sql, $params);
        return $result > 0;
    }

    /**
     * Update borrowEquipment methods
     * update borrowEquipment on database by id
     * 
     * @param int $id
     * @param BorrowEquipment $borrowEquipment
     * @return bool if update success return true else false
     */
    public static function update(int $id, BorrowEquipment $b): bool
    {
        $sql = "
            UPDATE borrowEquipment 
            SET 
            WHERE borrowEquipmentId = ?
        ";
        $params = [];
        $result = Database::query($sql, $params);
        return $result > 0;
    }
}