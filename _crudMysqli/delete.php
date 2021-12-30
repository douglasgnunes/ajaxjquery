<?php
    require('config.php');
    $nome = 'Maria';

    $query_delete = mysqli_query(Conn(),"DELETE FROM USERS WHERE  user_id = '6'");
    if($query_delete){
        echo 'Feito com sucesso!';
    }else{
        echo 'Erro ao processar';
    }