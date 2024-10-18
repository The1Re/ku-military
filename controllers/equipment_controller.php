<?php

class EquipmentController
{
    private $type_list = ['weapon', 'vehicle'];
    private $status_list = ['avaliable', 'maintenance', 'currently in use'];
    public function index()
    {
        $equipment_list = Equipment::getAll();
        require('views/equipment/index.php');
    }

    public function addForm()
    {
        $type_list = $this->type_list;
        $status_list = $this->status_list;

        require('views/equipment/add_form.php');
    }

    public function add()
    {
        if ($_POST['action'] == 'add') {
            $name = $_POST['name'];
            $type = $_POST['type'];
            $status = $_POST['status'];
            $detail = $_POST['detail'];
    
            Equipment::add($name, $type, $status, $detail);
        }
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
        
        $status_list = $this->status_list;
        $type_list = $this->type_list;

        require('views/equipment/edit_form.php');
    }

    public function edit()
    {
        if ($_POST['action'] != 'cancel') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $type = $_POST['type'];
            $status = $_POST['status'];
            $detail = $_POST['detail'];

            Equipment::update($id, $name, $type, $status, $detail);
        }
        $this->index();
    }

    public function search()
    {
        $key = $_GET['key'];

        $equipment_list = Equipment::search($key);
        require('views/equipment/index.php');
    }
}