<?php
    require('config.php');

    $read_user = mysqli_query(Conn(),"SELECT * FROM USERS");
    $count_user = mysqli_num_rows($read_user);
    //print_r($read_user);

    if($count_user > '0'){
        foreach($read_user as $read_user_view){
            echo $read_user_view['user_id'].' - '.$read_user_view['user_nome'].'<hr>';
        }
    }