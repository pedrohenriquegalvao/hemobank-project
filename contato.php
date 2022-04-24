<?php

    if(isset($_POST['submit']))
    {
        /*
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
        */

        include_once('../config.php');

        $nomeHemo = $_POST['nomeHemo'];
        $emailHemo = $_POST['emailHemo'];
        $telefoneHemo = $_POST['telefoneHemo'];
        $diretorHemo = $_POST['diretorHemo'];
        $cidadeHemo = $_POST['cidadeHemo'];
        $BairroHemo = $_POST['BairroHemo'];
        $ruaHemo = $_POST['ruaHemo'];
        $numeroHemo = $_POST['numeroHemo'];
        $mensagemCont = $_POST['mensagemCont'];

        // OLHE ENTRE PARENTESES DO HEMOCENTRO SUBSTITUA AQUILO PELOS ATRIBUTOS DA TABELA
        $result = mysqli_query($conexao, "INSERT INTO Hemocentro(nome,email,telefone,diretor,cidade,bairro,rua,numero,mensagem) VALUES ('$nomeHemo', '$emailHemo', '$telefoneHemo', '$diretorHemo', '$cidadeHemo', '$BairroHemo', '$ruaHemo', '$numeroHemo', '$mensagemCont')");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/93d18202e7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../js/ContatoPageScript.js"></script>
</head>
<body>

    <div class="HemocentroCadastro">
        <div class="HemocentroCadastro-container">
            <div class="HemocentroCadastro-content">
                <div class="image-box">
                    <img src="img/blood-work-illustration@3x.png" alt="">
                </div>
                <form action="formulario.php" method="POST">
                    <div class="topic">Cadastro Hemocentro</div>

                    <div class="input-box">
                        <input type="text" required id="nomeHemo" name="nomeHemo">
                        <label>Nome Hemocentro</label>
                    </div>

                    <div class="input-box">
                        <input type="text" required id="emailHemo" name="emailHemo">
                        <label>Email</label>
                    </div>

                    <div class="input-box">
                        <input type="text" required id="telefoneHemo" name="telefoneHemo">
                        <label>Telefone</label>
                    </div>

                    <div class="input-box">
                        <input type="text" required id="diretorHemo" name="diretorHemo">
                        <label>Diretor</label>
                    </div>

                    <div class="input-box">
                        <input type="text" required id="cidadeHemo" name="cidadeHemo">
                        <label>Cidade</label>
                    </div>

                    <div class="input-box">
                        <input type="text" required id="BairroHemo" name="BairroHemo">
                        <label>Bairro</label>
                    </div>

                    <div class="endereco-flex">
                        <div class="input-box ruaHemo">
                            <input type="text" required id="ruaHemo" name="ruaHemo">
                            <label>Rua</label>
                        </div>
                        <div class="input-box numeroHemo">
                            <input type="text" required id="numeroHemo" name="numeroHemo">
                            <label>Número</label>
                        </div>
                    </div>

                    <div class="message-box">
                        <textarea placeholder="Descrição Hemocentro" id="mensagemCont"></textarea>
                    </div>

                    <div class="input-box">
                        <input type="submit" onclick="formulario()" value="Enviar Mensagem">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="popup-check">
</body>
</html>