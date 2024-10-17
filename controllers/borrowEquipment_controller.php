<?php

class BorrowEquipmentController
{
    public function index()
    {
        $borrow_list = BorrowEquipment::getAll();

        require('views/borrow_equipment/index.php');
    }

    public function borrowForm()
    {
        require('views/borrow_equipment/borrow_form.php');
    }
}