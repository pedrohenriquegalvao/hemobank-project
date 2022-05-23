<?php
    session_start(); //Utilizado *sempre* que iniciar uma sessão 
    print_r($_SESSION);
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
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/65ea520fa5.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/93d18202e7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/navbar.js"></script>
</head>
<body>
    <button class="logout-doador-btn">
        <a href="logout.php">Sair</a>
    </button>

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
                <div class="item"><a href="hemocentros.php"><i class="fa-solid fa-house-chimney-medical"></i>Hemocentros</a></div>
                <div class="item"><a href="#"><i class="fa-solid fa-building"></i>Sobre Nós</a></div>
                <div class="item"><a href="perfilDoador.php"><i class="fa-solid fa-user"></i>Meu Perfil</a></div>

                <div class="item">
                    <a class="sub-btn"><i class="fa-solid fa-right-to-bracket"></i>Cadastro<i
                            class="fas fa-angle-right dropdown"></i> </a>
                    <div class="sub-menu">
                        <a href="formulario.html" class="sub-item">Cadastro Hemocentro</a>
                        <a href="formularioDoador.php" class="sub-item">Cadastro Doador</a>
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
            <?php 
            echo "<button class='card-btn saiba-mais-btn'>
                    <a href='hemocentro.php?CodHemocentro=$user_data[CodHemocentro]'>
                        Saiba Mais
                    </a>
                </button>";
                
            echo "<button class='card-btn delete-btn' onclick='alerta(".$user_data['CodHemocentro'].")'>
                    <a>
                        <i class='fa-solid fa-trash delete-icon'></i>
                        Deletar
                    </a>
                </button>";
            ?>
        </div>
        <?php } ?>
    </div>

    <!-- POP UP ALERTA DELETAR -->
    
    <div class="container-delete-hemo-popup">

        <div class="delete-hemo-popup-box">
          <i class="fas fa-exclamation"></i>
          <h1>O Hemocentro será removido permanentemente!</h1>
          <label>Tem certeza que deseja realizar essa ação?</label>
          <div class="delete-hemo-btns">
            <a href="#" class="delete-hemo-btn1">Cancelar</a>
            <a href="#" class="delete-hemo-btn2">Deletar Hemocentro</a>
          </div>
        </div>

    </div>

</body>
</html>
<script>
    var codPendente = -1;

    var btn_delete = document.querySelector('.delete-btn');
    var btn_cancel = document.querySelector('.delete-hemo-btn1');
    var btn_confirm = document.querySelector('.delete-hemo-btn2');
    var pop_up_box = document.querySelector('.container-delete-hemo-popup');

    btn_cancel.addEventListener('click', function(){
        pop_up_box.style.display = 'none';
        //document.location.reload(true);
    });
    btn_confirm.addEventListener('click', function(){
        pop_up_box.style.display = 'none';
        window.location.href='/hemobank-project/delete.php?CodHemocentro=' + codPendente;
    });

        
    
    function alerta(CodHemocentro) 
    {
        codPendente = CodHemocentro;
        pop_up_box.style.display = 'block';
         
    }
    </script>
   