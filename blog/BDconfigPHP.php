<?php
    /*Faz a conexao do Banco de Dados com o PHP*/
    $mysql = new mysqli('localhost', 'root', '', 'blog');
    $mysql->set_charset('utf8');

    if($mysql == FALSE){
        echo 'ERRO NA CONEXÃO';
    }
?>