<?php 

    session_start();

    include_once('config.php');

    if(!empty($_GET['CodHemocentro']) and !empty($_GET['CodDoador']) and !empty($_GET['DataAgendamento']) and !empty($_GET['Horario']))
    {
        $CodHemocentro = $_GET['CodHemocentro'];
        $CodDoador = $_GET['CodDoador'];
        $DataAgendamento = $_GET['DataAgendamento'];
        $Horario = $_GET['Horario'];

        print_r($CodHemocentro);
        echo '<br>';
        print_r($CodDoador);
        echo '<br>';
        print_r($DataAgendamento);
        echo '<br>';
        print_r($Horario);
        echo '<br>';
        $sql = "INSERT INTO Agendamento(Cod_Doador, Cod_Hemocentro, DataAgendamento, Horario) VALUES ('$CodDoador', '$CodHemocentro', '$DataAgendamento', '$Horario')";
        print_r($sql);
        echo '<br>';
        $result = $conexao->query($sql);
        print_r($result);

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
    <h1>Agendamento Realizado!</h1>
</body>
</html>