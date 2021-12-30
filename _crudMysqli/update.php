<?php
    require('config.php');
    $nome = 'Maria';

    $query_update = mysqli_query(Conn(),"UPDATE USERS SET user_nome = '".$nome."' WHERE  user_id = '6'");
    if($query_update){
        echo 'Feito com sucesso!';
    }else{
        echo 'Erro ao processar';
    }