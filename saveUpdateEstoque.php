<?php /*
    include_once('config.php');

    if(isset($_POST['update'])) {
        $SangueAPositivo = $_POST['1'];
        $nomeHemo = $_POST['nomeHemo'];
        $emailHemo = $_POST['emailHemo'];
        $telefoneHemo = $_POST['telefoneHemo'];
        $diretorHemo = $_POST['diretorHemo'];
        $cidadeHemo = $_POST['cidadeHemo'];
        $BairroHemo = $_POST['BairroHemo'];
        $ruaHemo = $_POST['ruaHemo'];
        $numeroHemo = $_POST['numeroHemo'];
        $mensagemCont = $_POST['mensagemCont'];
        //$fotoHemo = NULL;
        $sqlUpdate = "UPDATE Hemocentro SET Nome='$nomeHemo',Email='$emailHemo',Telefone='$telefoneHemo',Diretor='$diretorHemo',Cidade='$cidadeHemo',Bairro='$BairroHemo',Rua='$ruaHemo',Numero='$numeroHemo',Mensagem='$mensagemCont',FotoHemo='$fotoHemo' WHERE CodHemocentro='$CodHemocentro'";
        }
        $result = $conexao->query($sqlUpdate);
         
    header("Location: hemocentro.php?CodHemocentro=" . $CodHemocentro);
        /*header('Location: hemocentro.php');
         hemocentro.php?CodHemocentro=$CodHemocentro
        header("Location: admin-viewacc.php?id=" . $result['id']); */
?>