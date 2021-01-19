<?php
    $id = $_GET['id'];
    $status = true;
    if($status)
    {
        $response = [
            'errno' => 0,
            'mag'   => 'ok'
        ];
    }else{
        $response = [
            'errno'  => 400006,
            'mag'    => '已被预订'
        ];
    }
    die(json_encode($response));
?>