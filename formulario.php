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
    $mensagemCont = htmlspecialchars($_POST['mensagemCont']);
     
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
        $sql = "INSERT INTO hemocentro(Nome,Email,Telefone,Diretor,Cidade,Bairro,Rua,Numero,Mensagem,FotoHemo) 
        VALUES ('$nomeHemo', '$emailHemo', '$telefoneHemo', '$diretorHemo', '$cidadeHemo', '$BairroHemo', '$ruaHemo', '$numeroHemo', '$mensagemCont', NULL)";
        $result = $conexao->query($sql);
    } else {                              // Recebeu uma imagem binária
        $fotoHemo = addslashes(file_get_contents($_FILES['fotoHemo']['tmp_name'])); // Prepara para salvar em BD
        $sql = "INSERT INTO hemocentro(Nome,Email,Telefone,Diretor,Cidade,Bairro,Rua,Numero,Mensagem,FotoHemo) 
        VALUES ('$nomeHemo', '$emailHemo', '$telefoneHemo', '$diretorHemo', '$cidadeHemo', '$BairroHemo', '$ruaHemo', '$numeroHemo', '$mensagemCont', '$fotoHemo')";
        $result = $conexao->query($sql);
    }
    

    /*if(mysqli_query($conexao, $result))
    {
        echo '';
    }
    else
    {
        echo "erro".mysqli_connect_errno($conexao);
    }*/
    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="sucess-form-hemo">
        <h1 class="Text">Hemocentro Cadastrado com sucesso!</h1>
        <img class="" src="img/check.png" alt="">
        <h4 class="Text">Você será redirecionado a home do site em alguns segundos.</h4>
    </div>
</body>

<script>
    /*setTimeout(function() 
    {
        window.location.href = "hemocentros.php";
    }, 3000);*/
    setTimeout(function() 
    {
        window.location.href = "criaEstoque.php";
    }, 3000);
</script>

</html>