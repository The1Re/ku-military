<?php

/**
 * Get status style
 * if set param return string status style
 * else return list of status style
 * 
 * @param string $status
 * @return string|string[]
 */
function getStatusStyle(string $status = null)
{
    $status_style = [
        'InProgress' => 'text-blue-700', 
        'Success' => 'text-green-500', 
        'Failed' => 'text-red-500'
    ];
    return $status ? $status_style[$status] : $status_style;
}