<?php
    $data= $_POST['data'];
    $col= $_POST['col'];
    $result= 'OK';
    if ($col=='#fname'|| $col=='#lname'){
        if (!ctype_alpha($data)) {
            $result= "not OK";
        }
    } elseif ($col== '#age') {
        if (strlen($data)==2){
            if (!is_numeric("$data")) {
                $result= "not OK";
            }
        }else {
            $result= "not OK";
        }
    } elseif ($col== '#phn') {
        if (strlen($data)==10){
            if (!is_numeric("$data")) {
                $result= "not OK";
            }
        }else {
            $result= "not OK";
        }
    }
    echo json_encode($result);