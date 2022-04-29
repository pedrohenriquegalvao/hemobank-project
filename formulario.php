<?php

    /*
    if(isset($_POST['submit']))
    {
        print_r('Nome: ' . $_POST['nomeHemo']);
        print_r('<br>');
        print_r('Email: ' . $_POST['emailHemo']);
        print_r('<br>');
        print_r('Telefone: ' . $_POST['telefoneHemo']);
        print_r('<br>');
        print_r('Diretor: ' . $_POST['diretorHemo']);
        print_r('<br>');
        print_r('Cidade: ' . $_POST['cidadeHemo']);
        print_r('<br>');
        print_r('Bairro: ' . $_POST['BairroHemo']);
        print_r('<br>');
        print_r('Rua: ' . $_POST['ruaHemo']);
        print_r('<br>');
        print_r('Numero: ' . $_POST['numeroHemo']);
        print_r('<br>');
        print_r('Mensagem: ' . $_POST['mensagemCont']);
        
        
        
        include_once('config.php');

        $nomeHemo = $_POST['nomeHemo'];
        $emailHemo = $_POST['emailHemo'];
        $telefoneHemo = $_POST['telefoneHemo'];
        $diretorHemo = $_POST['diretorHemo'];
        $cidadeHemo = $_POST['cidadeHemo'];
        $BairroHemo = $_POST['BairroHemo'];
        $ruaHemo = $_POST['ruaHemo'];
        $numeroHemo = $_POST['numeroHemo'];
        $mensagemCont = $_POST['mensagemCont'];

        $result = mysqli_query($conexao, "INSERT INTO hemocentro(Nome,Email,Telefone,Diretor,Cidade,Bairro,Rua,Numero,Mensagem) VALUES ('$nomeHemo', '$emailHemo', '$telefoneHemo', '$diretorHemo', '$cidadeHemo', '$BairroHemo', '$ruaHemo', '$numeroHemo', '$mensagemCont')");        
    }
    */

    include_once("config.php");

    $nomeHemo = $_POST['nomeHemo'];
    $emailHemo = $_POST['emailHemo'];
    $telefoneHemo = $_POST['telefoneHemo'];
    $diretorHemo = $_POST['diretorHemo'];
    $cidadeHemo = $_POST['cidadeHemo'];
    $BairroHemo = $_POST['BairroHemo'];
    $ruaHemo = $_POST['ruaHemo'];
    $numeroHemo = $_POST['numeroHemo'];
    $mensagemCont = $_POST['mensagemCont'];
     
    switch ($_FILES['fotoHemo']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

    if ($_FILES['fotoHemo']['size'] == 0) { // Não recebeu uma imagem binária
        $result = "INSERT INTO hemocentro(Nome,Email,Telefone,Diretor,Cidade,Bairro,Rua,Numero,Mensagem,FotoHemo) 
    VALUES ('$nomeHemo', '$emailHemo', '$telefoneHemo', '$diretorHemo', '$cidadeHemo', '$BairroHemo', '$ruaHemo', '$numeroHemo', '$mensagemCont', NULL)";
    } else {                              // Recebeu uma imagem binária
        $fotoHemo = addslashes(file_get_contents($_FILES['fotoHemo']['tmp_name'])); // Prepara para salvar em BD
        $result = "INSERT INTO hemocentro(Nome,Email,Telefone,Diretor,Cidade,Bairro,Rua,Numero,Mensagem,FotoHemo) 
    VALUES ('$nomeHemo', '$emailHemo', '$telefoneHemo', '$diretorHemo', '$cidadeHemo', '$BairroHemo', '$ruaHemo', '$numeroHemo', '$mensagemCont', '$fotoHemo')";
    }
   
    if(mysqli_query($conexao, $result))
    {
        echo "Hemocentro Cadastrado com sucesso!";

    }
    else
    {
        echo "erro".mysqli_connect_errno($conexao);
    }

?>