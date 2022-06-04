<?php

    include_once('config.php');

    // Pegar código do hemocentro
    if(isset($_POST['create']))
    {
        $CodHemocentro = $_POST['CodHemocentro'];
        $DataAgenda = $_POST['DataAgenda'];
        $HoraAgenda = $_POST['HoraAgenda'] . ":00";
        

        print_r($CodHemocentro);
        echo '<br>';
        print_r($DataAgenda);
        echo '<br>';
        print_r($HoraAgenda);
        
        $result = "INSERT INTO agenda(Cod_Hemocentro, DataAgenda, Horario) VALUES ('$CodHemocentro','$DataAgenda','$HoraAgenda')";

        echo '<br>';
        print_r($result);
        $sql = $conexao->query($result);
        echo '<br>';
        header("Location: agendaHemocentro.php?CodHemocentro=$CodHemocentro");
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

