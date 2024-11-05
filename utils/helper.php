<?php

/**
 * Summary of getStatusStyle
 * @param string $status
 * @param string $type
 * @return string|string[]
 */
function getStatusStyle(string $status = null, string $type = 'mission_status')
{
    $status_style = [];
    if ($type == 'mission_status') {
        $status_style = [
            'InProgress' => 'blue-700', 
            'Success' => 'green-500', 
            'Failed' => 'red-500'
        ];
    }else if ($type == 'equipment_status') {
        $status_style = [
            'maintenance' => 'bg-[#fff3e0] text-[#f39c12]',
            'available' => 'bg-[#e3fcef] text-[#00b894]',
            'currently_in_use' => 'bg-[#fad2d2] text-[#fb5555]'
        ];
    }
    return $status ? $status_style[$status] : $status_style;
}