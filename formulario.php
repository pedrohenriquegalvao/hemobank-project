<?php

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
     
    switch ($_FILES['fotoHemo']['error']) 
    {
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
    <title>Agendamento</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/65ea520fa5.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/93d18202e7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/navbar.js"></script>
</head>
<body class="agendamento-doacao-body">
    <div class="sucess-agendamento-doacao">
        <h1 class="Text">Hemocentro cadastrado com sucesso!</h1>
        <img class="cadastro-hemo" src="img/health-professional-team-animate.svg" alt="">
        <h4 class="Text">Você será redirecionado a página de hemocentros em alguns instantes.</h4>
    </div>
    <!---->
</body>

<script>
    /*setTimeout(function() 
    {
        window.location.href = "hemocentros.php";
    }, 3000);
    */
    setTimeout(function() 
    {
        window.location.href = "criaEstoque.php";
    }, 3000);
</script>

</html>