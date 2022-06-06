<?php 

    session_start();

    include_once('config.php');
    
    if(!empty($_GET['CodHemocentro']) and !empty($_GET['CodDoador']) and !empty($_GET['DataAgendamento']) and !empty($_GET['Horario']))
    {
        $CodHemocentro = $_GET['CodHemocentro'];
        $CodDoador = $_GET['CodDoador'];
        $DataAgendamento = $_GET['DataAgendamento'];
        $Horario = $_GET['Horario'];

        $sqlInsertAgendamento = "INSERT INTO Agendamento(Cod_Doador, Cod_Hemocentro, DataAgendamento, Horario) VALUES ('$CodDoador', '$CodHemocentro', '$DataAgendamento','$Horario')";
        
        $result = $conexao->query($sqlInsertAgendamento);
        if(!$result) //Se nao conseguiu executar a query SQL
        {
            echo $conexao->error; //Mostra o porquê de não ter conseguido executar (ex. Error: couldnt find table)
        }

        $sqlDeleteAgenda = "DELETE FROM Agenda WHERE Cod_Hemocentro=$CodHemocentro AND DataAgenda='$DataAgendamento' AND Horario='$Horario'";
        $result = $conexao->query($sqlDeleteAgenda);
    }
    
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
    <div class="sucess-agendamento-doacao">
        <h1 class="Text">Agendamento realizado com sucesso!</h1>
        <img class="" src="img/check.png" alt="">
        <h4 class="Text">Você será redirecionado a página do hemocentro alguns instantes.</h4>
    </div>
</body>

<script>
    /*setTimeout(function() 
    {
        window.location.href = "hemocentros.php";
    }, 3000);*/
    setTimeout(function() 
    {
        window.location.href = "hemocentro.php?CodHemocentro=<?php echo $CodHemocentro?>";
    }, 3000);
</script>

</html>