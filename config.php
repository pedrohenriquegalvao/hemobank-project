<?php

    $servername = 'localhost:3307';
    $username = 'Hemobank';
    $password = '123';
    $database = 'hemobank';

    $conexao = mysqli_connect($servername, $username, $password, $database);

    /*
    if($conexao->connect_errno)
    {
        echo "Erro!";
    }
    else
    {
        echo "Conexão efetuada com sucesso!";
    }
    */

?>