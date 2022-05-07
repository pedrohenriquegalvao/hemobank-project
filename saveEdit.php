<?php
    include_once('config.php');

    if(isset($_POST['update'])) {
        $CodHemocentro = $_POST['CodHemocentro'];
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
            $sqlUpdate = "UPDATE Hemocentro SET Nome='$nomeHemo',Email='$emailHemo',Telefone='$telefoneHemo',Diretor='$diretorHemo',Cidade='$cidadeHemo',Bairro='$BairroHemo',Rua='$ruaHemo',Numero='$numeroHemo',Mensagem='$mensagemCont',FotoHemo=NULL WHERE CodHemocentro='$CodHemocentro'";
        } else {                              // Recebeu uma imagem binária
            $fotoHemo = addslashes(file_get_contents($_FILES['fotoHemo']['tmp_name'])); // Prepara para salvar em BD
            $sqlUpdate = "UPDATE Hemocentro SET Nome='$nomeHemo',Email='$emailHemo',Telefone='$telefoneHemo',Diretor='$diretorHemo',Cidade='$cidadeHemo',Bairro='$BairroHemo',Rua='$ruaHemo',Numero='$numeroHemo',Mensagem='$mensagemCont',FotoHemo='$fotoHemo' WHERE CodHemocentro='$CodHemocentro'";
        }
        $result = $conexao->query($sqlUpdate);
        
        } 
    header("Location: hemocentro.php?CodHemocentro=" . $CodHemocentro);
        /*header('Location: hemocentro.php');
         hemocentro.php?CodHemocentro=$CodHemocentro
        header("Location: admin-viewacc.php?id=" . $result['id']); */
?>