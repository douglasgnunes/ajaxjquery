<?php
    function Conn(){
        $conexao = mysqli_connect('localhost','root','','frameworkphp');
        return $conexao;
    }
    