<?php

    // Pegar as configurações de conexão no "config.php"
    include("config.php");

    $nomeDoador = $_POST['nomeDoador'];
    $CPFDoador = $_POST['CPFDoador'];
    $emailDoador = $_POST['emailDoador'];
    $dataNascDoador= trim($_POST["dataNascDoador"]);
    if (strstr($dataNascDoador, "/")){ 

        $aux2 = explode ("/", $dataNascDoador);

        $datai2 = $aux2[2] . "-". $aux2[1] . "-" . $aux2[0];

        }
    
    $senhaDoador = $_POST['senhaDoador'];

    // Realizar o insert dos dados preenchidos no formulário
    $sql = "INSERT INTO doador(Nome, CPF, Email, Data_de_Nasc, Senha) VALUES ('$nomeDoador', '$CPFDoador', '$emailDoador', '$datai2', MD5('$senhaDoador'))";

    if(mysqli_query($conexao, $sql))
    {
        header("Location: formularioDoador.php");
    }
    else
    {
        echo "Erro".mysqli_connect_error();
    }

    mysqli_close($conexao);
?>