<?php

// Establish database connection
$hostname = 'localhost';
$user = 'root';
$password = '';
$database = 'learning_profile';

$con = new mysqli($hostname, $user, $password, $database); 

if ($con->connect_errno) {
    die('Database Connection Failed'. $con->connect_error);
}


function getFileName($folder, $file_name)
{
    $file_ext = explode('.', $file_name);
    $file_ext_only = strtolower(end($file_ext));
    $file_name_only = substr($file_name, 0, strrpos($file_name, $file_ext_only)-1);

    $i = 1;
    while($i)
    {
        $new_file_name = $file_name_only."-".$i.".".$file_ext_only;
        if (file_exists($folder.$new_file_name))
        {
            $i++;
            continue;
        } 
        else
            return $new_file_name;
    }
    
}
