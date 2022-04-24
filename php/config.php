<?php

    $dbHost = '';
    $dbUsername = '';
    $dbPassword = '';
    $dbName = '';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    /*
    if($conexao->connect_errno)
    {
        echo "Erro!";
    }
    else
    {
        echo "Conexão efetuada com sucesso!"
    }
    */

?>