<?php 
    if(!empty($_GET['codDoador'])) {

        include_once('config.php');

        $codDoador = $_GET['codDoador'];

        $sql = "SELECT * FROM Doador WHERE CodDoador=$codDoador";

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
            header('Location: perfilDoador.php');
        } 
        
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
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
                <div class="item"><a href="index.html"><i class="fas fa-desktop"></i>Home</a></div>
                <div class="item"><a href="hemocentros.php"><i class="fa-solid fa-house-chimney-medical"></i>Hemocentros</a></div>
                <div class="item"><a href="index.html"><i class="fa-solid fa-building"></i>Sobre Nós</a></div>
                <div class="item"><a href="perfilDoador.php"><i class="fa-solid fa-user"></i>Meu Perfil</a></div>

                <div class="item">
                    <a class="sub-btn"><i class="fa-solid fa-right-to-bracket"></i></i>Cadastro<i
                            class="fas fa-angle-right dropdown"></i> </a>
                    <div class="sub-menu">
                        <a href="formulario.html" class="sub-item">Cadastro Hemocentro</a>
                        <a href="formularioDoador.php" class="sub-item">Login Doador</a>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>
    <div class="wrapper-editar">
        <div class="left">
            <img src="img/profile-pic-animate.svg" 
            alt="user">
            <p class="type-usuario">DOADOR</p>
        </div>
        <div class="right">
            <div class="info">
                <h3>Editar Informações</h3>
        <div class="form-editar-doador">
            <form action="saveEditDoador.php" method="POST">
                <h4>Nome:</h4>
                <input type="text" id="nomeDoador" name="nomeDoador"  class="input-editar-perfil" value="<?php echo $nomeDoador?>">
                <input type="hidden" name="cpfDoador" value="<?php echo $cpfDoador ?>">
                <h4>CPF:</h4>
                <input type="text"  class="input-editar-perfil" disabled value="<?php echo $cpfDoador?>">
                <input type="hidden" name="dataNascDoador" value="<?php echo $dataNascDoador ?>">
                <h4>Data de Nascimento:</h4>
                <input type="text" class="input-editar-perfil"  disabled value="<?php echo $dataNascDoador?>">
                <h4>Email:</h4>
                <input type="text" id="emailDoador" name="emailDoador" class="input-editar-perfil" value="<?php echo $emailDoador?>">
                <input type="hidden" name="codDoador" value="<?php echo $codDoador ?>">
                <div class="button-perfil">
                    <input type="submit" name="update" id="update" class="Cadastrobtn solid" value="Salvar alterações">
                    <input type="submit" name="back" id="back" class="Cadastrobtn solid" value="Voltar">
                </div>
            </form>
            </div>
        </div>          
        </div>
        </div>
    </div>
</body>
</html>