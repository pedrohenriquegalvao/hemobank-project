<?php

include_once("config.php");

$sql = "SELECT * FROM Hemocentro ORDER BY CodHemocentro DESC";

$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hemocentros</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/65ea520fa5.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/93d18202e7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/navbar.js"></script>
</head>
<body>

    <nav>
        <a href="#"><img src="img/logo.png" class="nav-logo"></a>

        <!-- BOTAO PARA ABRIR O MENU -->
        <div class="menu-btn">
            <i class="fas fa-bars"></i>
        </div>

        <div class="side-bar">

            <!-- BOTAO PARA FECHAR O MENU -->
            <div class="close-btn">
                <i class="fas fa-times"></i>
            </div>

            <div class="menu">
                <div class="item"><a href="#"><i class="fas fa-desktop"></i>Home</a></div>
                <div class="item"><a href="hemocentro.html"><i class="fa-solid fa-screwdriver-wrench"></i>Interface Tela Hemocentro</a></div>
                <div class="item"><a href="hemocentros.php"><i class="fa-solid fa-house-chimney-medical"></i>Hemocentros</a></div>
                <div class="item"><a href="#"><i class="fa-solid fa-building"></i>Sobre Nós</a></div>

                <div class="item">
                    <a class="sub-btn"><i class="fas fa-globe-americas"></i>Cadastro<i
                            class="fas fa-angle-right dropdown"></i> </a>
                    <div class="sub-menu">
                        <a href="formulario.html" class="sub-item">Cadastro Hemocentro</a>
                        <a href="#" class="sub-item">Cadastro Doador</a>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>

    <div class="flex-box-card-container">
        <?php while($user_data = mysqli_fetch_assoc($result)) { ?>
        <div class="card-hemo">
            <?php if ($user_data['FotoHemo']) { ?>
            <img class="img-hemo col-foto-hemo" id="imagemSelecionada" src="data:image/png;base64,<?= base64_encode($user_data['FotoHemo']) ?>" />
            <?php } ?>
            <h2 class="title"><?php echo $user_data['Nome'] ?></h2>
            <!--<?php echo "h2 class='title'>".$user_data['Nome']."</h2>"; ?>-->
            <div class="icon-flex-cards">
                <i class="fa-solid fa-location-dot"></i>
                <span>Localização: </span><p><?php echo $user_data['Cidade'] ?></p>
            </div>
            <div class="icon-flex-cards">
                <i class="fa-solid fa-phone"></i>
                <span>Telefone: </span><p><?php echo $user_data['Telefone'] ?></p>
            </div>
            <button class="card-btn">Saiba Mais</button>
            <?php 
            echo "<button class='card-btn edit-btn'>
                    <a href='edit.php?CodHemocentro=$user_data[CodHemocentro]'>
                        <i class='fa-solid fa-pen-to-square edit-icon'></i>
                        Editar Hemocentro
                    </a>
                </button>";
            echo "<button class='card-btn delete-btn'>
                    <a href='delete.php?CodHemocentro=$user_data[CodHemocentro]'>
                        <i class='fa-solid fa-trash delete-icon'></i>
                        Deletar
                    </a>
                </button>"
            ?>
        </div>
        <?php } ?>
    </div>

</body>
</html>