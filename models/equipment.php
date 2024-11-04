<?php

require_once('utils/database.php');

class Equipment
{
    public $id, $name, $type, $status, $detail;

    public function __construct(
        $id,
        $name,
        $type,
        $status,
        $detail
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->status = $status;
        $this->detail = $detail;
    }
}