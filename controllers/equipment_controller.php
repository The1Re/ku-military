<?php

class EquipmentController
{
    public function index()
    {
        $equipment_list = Equipment::getAll();
        require('views/equipment/index.php');
    }

    public function addForm()
    {
        require('views/equipment/add_form.php');
    }

    public function add()
    {
        $name = $_GET['name'];
        $type = $_GET['type'];
        $status = $_GET['status'];
        $detail = $_GET['detail'];

        Equipment::add($name, $type, $status, $detail);
        $this->index();
    }
    public function deleteForm()
    {
        $id = $_GET['id'];
        $equipment = Equipment::getById($id);
        
        require('views/equipment/delete_form.php');
    }

    public function delete()
    {
        $id = $_GET['id'];

        Equipment::delete($id);
        $this->index();
    }

    public function editForm()
    {
        $id = $_GET['id'];
        $equipment = Equipment::getById($id);

        require('views/equipment/edit_form.php');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $name = $_GET['name'];
        $type = $_GET['type'];
        $status = $_GET['status'];
        $detail = $_GET['detail'];

        Equipment::update($id, $name, $type, $status, $detail);
        $this->index();
    }

    public function search()
    {
        $key = $_GET['key'];

        $equipment_list = Equipment::search($key);
        require('views/equipment/index.php');
    }
}