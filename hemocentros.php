<?php

include('config.php');

$Consulta = 'SELECT * FROM hemocentro';
$con = $mysql->query($Consulta) or die ($mysql->error);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hemocentros</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/93d18202e7.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="flex-box-card-container">
        <?php while($dado = $con->fetch_array()){ ?>
        <div class="card-hemo">
            <img src="DSC03039.jpg" alt="">
            <h2 class="title"><?php echo $dado["Nome"]; ?></h2>
            <div class="endereco">
                <i class="fa-solid fa-location-dot"></i>
                <p>Localização: <?php echo $dado["Cidade"]; ?></p>
            </div>
            <button>Saiba Mais</button>
        </div>
        <?php } ?>
    </div>
    
</body>
</html>