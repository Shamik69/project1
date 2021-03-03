<?php
    /*
    error code
        0: no error
        1: no input
        2: non-text in text only field
        3: non-number in number only field
        4: unaccepted length of charechters in age
        5: unaccepted length of charechters in phn
    */

    $data= $_POST['data'];
    $col= $_POST['col'];
    $result= 0;
    if ($col=='#fname'|| $col=='#lname'){
        if(strlen($data)>0){
            if (!ctype_alpha($data)) {
                $result= 2;
            }
        }else {
            $result= 1;
        }
    } elseif ($col== '#age') {
        if (strlen($data)==2){
            if (!is_numeric("$data")) {
                $result= 3;
            }
        }else if(strlen($data)==0) {
            $result= 1;
        } else {
            $result= 4;
        }
    } elseif ($col== '#phn') {
        if (strlen($data)==10){
            if (!is_numeric("$data")) {
                $result= 3;
            }
        }else if(strlen($data)==0) {
            $result= 1;
        } else {
            $result= 4;
        }
    }
    echo json_encode($result);