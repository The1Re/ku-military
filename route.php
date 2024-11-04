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
    'mission' => ['index', 'addForm', 'add', 'deleteForm', 'delete', 'editForm', 'edit', 'search', 'sort'],
    'missionReport' => ['index', 'addForm', 'add', 'deleteForm', 'delete', 'editForm', 'edit'],
    'equipment' => ['return']
];

function call(string $controller, string $action)
{
    require("controllers/" . $controller . "_controller.php");
    switch ($controller)
    {
        case 'page':
            $controller_obj = new PageController();
            break;
        case 'mission':
            require_once('models/mission.php');
            require_once('models/soldier.php');
            $controller_obj = new MissionController();
            break;
        case 'missionReport':
            require_once('models/missionReport.php');
            require_once('models/mission.php');
            $controller_obj = new MissionReportController();
            break;
        case 'equipment':
            require_once('models/mission.php');
            $controller_obj = new EquipmentController();
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