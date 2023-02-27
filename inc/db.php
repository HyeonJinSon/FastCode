<?php
    $hostname = 'localhost';
    $dbuserid = 'fastcode';
    $dbpasswd = 'yumi1212*';
    $dbname = 'fastcode';

    $mysqli = new mysqli($hostname,$dbuserid, $dbpasswd,$dbname);
    if($mysqli -> connect_errno){
        die('Connect Error:'.$mysqli->connect_error);
    } 
    // echo 'connect successfully';
?>