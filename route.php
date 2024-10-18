<?php

#  show error information
error_reporting(E_ALL);
ini_set('display_errors', true);

/* 
    Get controller and action in query params
    if not assign default controller = page & action = home
*/
$controller = $_GET['controller'] ?? 'page';
$action = $_GET['action'] ?? 'home';

#   customize controllers
$controllers = [
    'page' => ['home', 'error'],
    'equipment' => ['index', 'addForm', 'add', 'deleteForm', 'delete', 'editForm', 'edit', 'search'],
    'borrowEquipment' => ['index', 'borrowForm'],
    'mission' => ['index', 'addForm', 'add', 'deleteForm', 'delete', 'editForm', 'edit', 'search'],
];

function call(string $controller, string $action)
{
    require("controllers/" . $controller . "_controller.php");
    switch ($controller)
    {
        case 'page':
            $controller_obj = new PageController();
            break;
        case 'equipment':
            require_once('models/equipment.php');
            $controller_obj = new EquipmentController();
            break;
        case 'borrowEquipment':
            require_once('models/borrowEquipment.php');
            $controller_obj = new BorrowEquipmentController();
            break;
        case 'mission':
            require_once('models/mission.php');
            require_once('models/soldierModel.php');
            $controller_obj = new MissionController();
            break;
    }
    $controller_obj->$action();
}

if (key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller]))
        call($controller, $action);
    else
        call('page', 'error');
} else
    call('page', 'error');