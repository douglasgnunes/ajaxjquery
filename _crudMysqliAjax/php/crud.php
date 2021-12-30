<?php
    session_start();
    ob_start();
    require_once '../class/conn.php';

    $acao = addslashes(trim(strip_tags($_POST['acao'])));

    if($acao == 'create'){
        $nome = addslashes(trim(strip_tags($_POST['user_nome'])));
       
        if($nome == ''){
            $json_return = array(
                'type' => 'error',
                'msg' => 'Opsss, campos não podem ser vazios'
            );
        }else{
            $query = mysqli_query(Conn(),"INSERT INTO users (user_nome) VALUES ('".$nome."')");

            if($query){
                $json_return =  array(
                    'type' => 'ok',
                    'msg' => 'Parabéns, operação realizada com sucesso.'
                );
            }else{
                $json_return =  array(
                    'type' => 'error',
                    'msg' => 'Obsss, houve um problema.'
                ); 
            }
        }
        echo json_encode($json_return);
    }elseif($acao == 'read'){
        $read_user = mysqli_query(Conn(),"SELECT * FROM users ORDER BY user_id DESC");

        if(mysqli_num_rows($read_user) > '0'){
            echo '<table class="table">';
            echo '<thead>
            <tr>
              <td><strong>ID</strong></td>
              <td><strong>NOME</strong></td>
              <td><strong colspan="2">AÇÕES</strong></td>
            </tr>
          </thead>';
          echo '<tbody>';
            foreach($read_user as $read_user_view){
                echo '<tr>';
                    echo '<td>'.$read_user_view['user_id'].'</td>';
                    echo '<td>'.$read_user_view['user_nome'].'</td>';
                    echo '<td><a href="update.php?id='.$read_user_view['user_id'].'">Editar</a></td>';
                    echo '<td><a href="#" onclick="deletar('.$read_user_view['user_id'].');">Excluir</a></td>';
                    echo '';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';

        }
    }elseif($acao == 'load_update'){
        $post_id = addslashes($_POST['id']);
        $read = mysqli_query(Conn(),"SELECT * FROM users WHERE user_id = '".$post_id."' ORDER BY user_id DESC");
        if(mysqli_num_rows($read_user) > '0'){
            foreach($read_user as $read_user_view){
                echo json_encode($read_user_view);
            }
        }
    }elseif($acao == 'update'){
        $nome = addslashes(trim(strip_tags($_POST['user_nome'])));
        $post_id = addslashes(trim(strip_tags($_POST['id'])));

        if($nome == ''){
            $json_return = array(
                'type' => 'error',
                'msg' => 'Opsss, campos não podem ser vazios'
            );
        }else{
            $query = mysqli_query(Conn(),"UPDATE users SET user_nome = '".$nome."' WHERE user_id = '".$post_id."'");

            if($query){
                $json_return =  array(
                    'type' => 'ok',
                    'msg' => 'Parabéns, operação realizada com sucesso.'
                );
            }else{
                $json_return =  array(
                    'type' => 'error',
                    'msg' => 'Obsss, houve um problema.'
                ); 
            }
        }
        echo json_encode($json_return);
    }elseif($acao == 'deletar'){
        $post_id = addslashes($_POST['id']);

        $query = mysqli_query(Conn(),"DELETE FROM users WHERE user_id = '".$post_id."'");
    }