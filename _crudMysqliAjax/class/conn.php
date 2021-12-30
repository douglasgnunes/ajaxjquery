<?php
    require_once('config.php');
    function Conn(){
        $conecta = mysqli_connect(HOST,USER,PASS,DBSA);
        return $conecta;
    }