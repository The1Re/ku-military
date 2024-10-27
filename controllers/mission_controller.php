<?php

class MissionController
{
    private $status_style = [
        'InProgress' => 'text-blue-700', 
        'Success' => 'text-green-500', 
        'Failed' => 'text-red-500'
    ];

    private function getCardsDetail()
    {
        return 
        [
            [
                'text' => 'IN PROGRESS MISSION',
                'count' => Mission::count('InProgress'), 
                'icon' => 'fa-solid fa-spinner',
                'color' => 'bg-blue',
                'key' => 'InProgress'
            ],
            [
                'text' => 'SUCCESS MISSION',
                'count' => Mission::count('Success'),
                'icon' => 'fa-solid fa-check',
                'color' => 'bg-green',
                'key' => 'Success'
            ],
            [
                'text' => 'FAILED MISSION',
                'count' => Mission::count('Failed'),
                'icon' => 'fa-solid fa-xmark',
                'color' => 'bg-red',
                'key' => 'Failed'
            ]
        ];
    }

    public function index(array $mission_list = null)
    {
        $mission_list = $mission_list ?? Mission::getAll();

        $status_style = $this->status_style;
        $cards = $this->getCardsDetail();

        require('views/mission/index.php');
    }

    public function addForm()
    {
        $status_style = $this->status_style;
        $soldier_list = Soldier::getAll();

        require('views/mission/add_form.php');
    }

    public function add()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'add') {
            $leaderId = $_POST['leaderId'];
            $name = $_POST['name'];
            $targetArea = $_POST['targetArea'];
            $strategy = $_POST['strategy'];
            $status = $_POST['status'];
    
            Mission::add($leaderId, $name, $targetArea, $strategy, $status);
        }
        $this->index();
    }
    public function deleteForm()
    {
        $id = $_GET['id'];
        $mission = Mission::getById($id);
        
        require('views/mission/delete_form.php');
    }

    public function delete()
    {
        $id = $_GET['id'];
        Mission::delete($id);
        
        $this->index();
    }

    public function editForm()
    {
        $id = $_GET['id'];
        $mission = Mission::getById($id);
        $soldier_list = Soldier::getAll();
        
        $status_style = $this->status_style;

        require('views/mission/edit_form.php');
    }

    public function edit()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'edit') {
            $id = $_POST['id'];
            $leaderId = $_POST['leaderId'];
            $name = $_POST['name'];
            $targetArea = $_POST['targetArea'];
            $strategy = $_POST['strategy'];
            $status = $_POST['status'];

            Mission::update($id, $leaderId, $name, $targetArea, $strategy, $status);
        }
        $this->index();
    }

    public function search()
    {
        $key = $_GET['key'];
        $mission_list = Mission::search($key);

        $this->index($mission_list);
    }

    public function sort()
    {
        $title = $_GET['title'];
        $mission_list = Mission::sort($title, 'DESC');

        $this->index($mission_list);
    }
}