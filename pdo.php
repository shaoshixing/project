<?php
    function getpdo()
    {
    $host = '127.0.0.1';
    $user = 'root';
    $pass = 'root';
    $db = 'goods';

    return new PDO("mysql:host=$host;dbname=$db",$user,$pass);

    }
    
?>