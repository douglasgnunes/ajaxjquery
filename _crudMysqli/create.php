<?php
    require('config.php');
    $nome = 'Elizete';

    $query_create = mysqli_query(Conn(),"INSERT INTO USERS (user_nome) VALUES ('".$nome."')");
    if($query_create){
        echo 'Feito com sucesso!';
    }else{
        echo 'Erro ao processar';
    }