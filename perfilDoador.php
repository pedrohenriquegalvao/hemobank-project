<?php 
    session_start(); //Utilizado *sempre* que iniciar uma sessão 
    //print_r($_SESSION);

    include_once('config.php');

    if(!isset($_SESSION['cpf']) == true and (!isset($_SESSION['senha'])) == true) 
    { //verifica se a sessão iniciada acima possui CPF e SENHA. Caso não possuam:
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
        header("Location: formularioDoador.php");
    }

    $sql = "SELECT * FROM Doador WHERE CPF='" . $_SESSION['cpf'] . "' AND Senha=MD5('" .$_SESSION['senha']. "')";
    $result = $conexao->query($sql);

    if($result->num_rows > 0) {
        while($dados_doador = mysqli_fetch_assoc($result)) {
            $codDoador = $dados_doador['CodDoador'];
            $nomeDoador = $dados_doador['Nome'];
            $cpfDoador = $dados_doador['CPF'];
            $emailDoador = $dados_doador['Email'];
            $dataNascDoador = $dados_doador['Data_de_Nasc'];
           
        }
    } else {
        header('Location: formularioDoador.php');
    }

    
    
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
                    <a class="sub-btn"><i class="fa-solid fa-right-to-bracket"></i>Login<i
                            class="fas fa-angle-right dropdown"></i> </a>
                    <div class="sub-menu">
                        <a href="formulario.html" class="sub-item">Login Hemocentro</a>
                        <a href="formularioDoador.php" class="sub-item">Login Doador</a>
                    </div>
                </div>

                <div class="item sair-btn"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Sair</a></div>
                
            </div>
        </div>
    </nav>
    <!--<div class="container">
        <h3>Informações do Usuário</h3>
        <div class="informacao-container">
            <p id="nomeUsuario">Código do doador: <?php echo $codDoador?></p>
            <p id="nomeUsuario">Nome do doador: <?php echo $nomeDoador?></p>
            <p id="cpfUsuario">CPF do doador: <?php echo $cpfDoador?></p>
            <p id="dataNascimentoUsuario">Data de Nascimento do doador: <?php echo $dataNascDoador?></p>
            <p id="emailUsuario">Email do doador: <?php echo $emailDoador?></p>

        </div>
        <div class="button-perfil">
            <br>
            <button class="edit-doador-btn">
                <a href="editDoador.php?codDoador=<?php echo $codDoador ?>">Editar informações</a>
            </button>
        </div>
    </div>
    <button class="logout-doador-btn">
        <a href="logout.php">Sair</a>
    </button>-->
    

    <div class="wrapper">
    <div class="left">
        <img src="img/profile-pic-animate.svg" 
        alt="user">
        <p class="type-usuario">DOADOR</p>
    </div>
    <div class="right">
        <div class="info">
            <h3>Informações</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Nome:</h4>
                    <p><?php echo $nomeDoador?></p>
                 </div>
                 <div class="data">
                    <h4>CPF:</h4>
                    <p><?php echo $cpfDoador?></p>
              </div>
              <div class="data">
                <h4>Data de Nascimento:</h4>
                <p><?php echo $dataNascDoador?></p>
            </div>
            <div class="data">
                <h4>Email:</h4>
                <p><?php echo $emailDoador?></p>
            </div>
            </div>
        </div>
        <div class="button-perfil">
            <input type="submit" name="submit" value="Editar Informações" class="Cadastrobtn solid" onclick="window.location.href='editDoador.php?codDoador=<?php echo $codDoador ?>'"/>
            <input type="submit" name="submit" value="Sair" class="Cadastrobtn solid" onclick="window.location.href='logout.php'"/>
        </div>
        
    </div>
</div>
</body>
</html>
<?php 
    /* A verificação de sessão foi feita antes do html dessa pagina. Caso tenha uma sessão com CPF e senha,
     a pagina não irá voltar para formularioDoador.php e irá rodar essa parte do codigo: */
    echo 
    '  
        <style>
        .item.sair-btn
        {
            display: block;
        }
        </style>
    '; // Altera o display do item de sair do menu lateral para Block, fazendo ele aparecer.
?>