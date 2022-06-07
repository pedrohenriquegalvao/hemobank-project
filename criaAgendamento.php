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
        <h1 class="Text">Agendamento realizado com sucesso!</h1>
        <img class="" src="img/agendamento-animated.svg" alt="">
        <h4 class="Text">Você será redirecionado a página do hemocentro em alguns instantes.</h4>
    </div>
</body>

<script>
    /*setTimeout(function() 
    {
        window.location.href = "hemocentros.php";
    }, 3000);
    */
    setTimeout(function() 
    {
        window.location.href = "hemocentro.php?CodHemocentro=<?php echo $CodHemocentro?>";
    }, 3000);
</script>

</html>