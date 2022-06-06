<?php

    include_once('config.php');
    include_once('agendaHemocentro.php');

    // Pegar código do hemocentro
    if(isset($_POST['create']))
    {
        $CodHemocentro = $_POST['CodHemocentro'];
        $DataAgenda = $_POST['DataAgenda'];
        $HoraAgenda = $_POST['HoraAgenda'] . ":00";
    
        /*print_r($CodHemocentro);
        echo '<br>';
        print_r($DataAgenda);
        echo '<br>';
        print_r($HoraAgenda);*/
        
        $sql = "INSERT INTO agenda(Cod_Hemocentro, DataAgenda, Horario) VALUES ('$CodHemocentro','$DataAgenda','$HoraAgenda')";
        $result = $conexao->query($sql);

        echo "<script> 
            sucessPopUp = document.querySelector('.container-delete-hemo-popup.sucess-form-doacao');
            sucessButton = document.querySelector('.btn-formDoacao');

            sucessPopUp.style.display = 'block';
            sucessButton.addEventListener('click', function(){ 
                window.location.href='agendaHemocentro.php?CodHemocentro=$CodHemocentro';
            })
            </script>";
    }
    else
    {
        header('Location: hemocentros.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

