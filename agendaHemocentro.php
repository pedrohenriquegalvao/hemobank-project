<?php

    include_once('config.php');

    // Pegar código do hemocentro
    if(isset($_GET['CodHemocentro']))
    {
        $CodHemocentro = $_GET['CodHemocentro'];
        print_r($CodHemocentro);
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Agenda</title>
</head>
<body>

    <form action="criaAgenda.php" method="POST">
        <input type="date" name="DataAgenda" id="DataAgenda">
        <input type="time" name="HoraAgenda" id="HoraAgenda">

        <div class="submitAgenda">
            <input type="hidden" name="CodHemocentro" value="<?php echo $CodHemocentro?>">
            <input type="submit" name="create" id="create" value="Criar Agenda">
        </div>
        
    </form>
    
</body>
</html>