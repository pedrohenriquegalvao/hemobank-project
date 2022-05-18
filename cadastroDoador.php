<?php

    // Pegar as configurações de conexão no "config.php"
    include("config.php");

    $nomeDoador = $_POST['nomeDoador'];
    $CPFDoador = $_POST['CPFDoador'];
    $emailDoador = $_POST['emailDoador'];
    $dataNascDoador = $_POST['dataNascDoador'];
    $senhaDoador = $_POST['senhaDoador'];

    // Realizar o insert dos dados preenchidos no formulário
    $sql = "INSERT INTO doador(Nome, CPF, Email, Data_de_Nasc, Senha) VALUES ('$nomeDoador', '$CPFDoador', '$emailDoador', '$dataNascDoador', MD5('$senhaDoador'))";

    if(mysqli_query($conexao, $sql))
    {
        echo "Usuário Cadastrado com sucesso!";
    }
    else
    {
        echo "Erro".mysqli_connect_error($conexao);
    }

    mysqli_close($conexao);
?>