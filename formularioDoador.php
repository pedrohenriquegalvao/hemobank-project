<?php

    // Pegar as configurações de conexão no "config.php"
    include("config.php");

    $nomeDoador = $_POST['nomeDoador'];
    $CPFDoador = $_POST['CPFDoador'];
    $emailDoador = $_POST['emailDoador'];
    $dataNascDoador = $_POST['dataNascDoador'];
    $senhaDoador = md5$_POST['senhaDoador'];

    // Realizar o insert dos dados preenchidos no formulário
    $sql = "INSERT INTO doador(Nome, CPF, Email, Data_de_Nasc, Senha) VALUES ('$nomeDoador', '$CPFDoador', '$emailDoador', '$dataNascDoador', '$senhaDoador')";

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