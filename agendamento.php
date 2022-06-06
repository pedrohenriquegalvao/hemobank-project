<?php

// Iniciando uma sessão
session_start();

// Realizando conexão com o BD
include_once('config.php');

// Verificar se está pegando o cod do Hemocentro pela URL
if (isset($_GET['CodHemocentro'])) {
    $CodHemocentro = $_GET['CodHemocentro'];
}

// Verifica se possui uma senha com algum CPF ou senha cadastrada
if (!isset($_SESSION['cpf']) == true and (!isset($_SESSION['senha'])) == true) {
    unset($_SESSION['cpf']);
    unset($_SESSION['senha']);
    header("Location: hemocentro.php?CodHemocentro=$CodHemocentro");
} else {
    $CpfDoador = $_SESSION['cpf'];
    //print_r($CpfDoador);
    //echo '<br>';
    $sql = "SELECT CodDoador FROM doador WHERE CPF='$CpfDoador'";
    //print_r($sql);
    //echo '<br>';
    $result = $conexao->query($sql);
    //print_r($result);

    if ($result->num_rows > 0) {
        while ($dadosDoador = mysqli_fetch_assoc($result)) {
            $CodDoador = $dadosDoador['CodDoador'];
        }
    }
    //echo '<br>';
    //print_r($CodDoador);

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
    <script src="js/agendamento.js"></script>
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
                <div class="item"><a href="hemocentros.php"><i class="fa-solid fa-house-chimney-medical"></i>Hemocentros</a></div>
                <div class="item"><a href="#"><i class="fa-solid fa-building"></i>Sobre Nós</a></div>
                <div class="item"><a href="perfilDoador.php"><i class="fa-solid fa-user"></i>Meu Perfil</a></div>

                <div class="item">
                    <a class="sub-btn"><i class="fa-solid fa-right-to-bracket"></i>Login<i class="fas fa-angle-right dropdown"></i> </a>
                    <div class="sub-menu">
                        <a href="formulario.html" class="sub-item">Login Hemocentro</a>
                        <a href="formularioDoador.php" class="sub-item">Login Doador</a>
                    </div>
                </div>

                <div class="item sair-btn"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Sair</a></div>

            </div>
        </div>
    </nav>

    <h1 class="agendamento-title">Selecione um horário para realizar um agendamento!</h1>
    <div class='flex-box-card-container'>
        <?php

        $sql = "SELECT * FROM Agenda WHERE Cod_Hemocentro=$CodHemocentro";
        $result = $conexao->query($sql);
        //print_r($result);

        if ($result->num_rows > 0) {
            while ($dadosAgenda = mysqli_fetch_assoc($result)) {
                $DataAgenda = $dadosAgenda['DataAgenda'];
                $HorarioAgenda = $dadosAgenda['Horario'];

                /*
                echo 
                "
                <button style=background:Red;>
                    <a href='criaAgendamento.php?CodHemocentro=$CodHemocentro&CodDoador=$CodDoador&DataAgendamento=$DataAgenda&Horario=$HorarioAgenda'>
                        <div>
                        <p>Data: $DataAgenda</p>
                        <p>Horario: $HorarioAgenda</p>
                        </div>
                    </a>
                </button>

                ";
                */
                echo
                "
                <button onclick='popUpConfirmagendamento()' class='card-hemo agendamento'>
                    <h2 class='title'><span>Data:</span> $DataAgenda</h2>
                    <h2 class='title'><span>Horario:</span> $HorarioAgenda</h2>
                    <h1 class='agendar-hover'>Agendar</h1>
                </button>
                ";
            }
        }

        ?>
    </div>

    
    <!-- POP UP CONFIRMAR AGENDAMENTO -->
    <div class="container-delete-hemo-popup agendamento">

        <div class="delete-hemo-popup-box">
            <img src="img/confirmed-animate.svg" alt="">
            <h1>Deseja Confirmar o Agedamento?</h1>
            <label>Você realmente deseja confirmar o seu agendamento?</label>
            <div class="delete-hemo-btns">
                <a href="#" class="delete-hemo-btn1 cancelar-agendamento">Cancelar</a>
                <a href="#" class="delete-hemo-btn2 confirmar-agendamento">Confirmar Agendamento</a>
            </div>
        </div>

    </div>

</body>

</html>

<?php

if (isset($_SESSION['cpf']) == true and (isset($_SESSION['senha'])) == true) 
{
    echo
    '  
        <style>
        .item.sair-btn
        {
            display: block;
        }
        </style>
    ';
}

?>