<?php 
    session_start(); //Utilizado *sempre* que iniciar uma sessão 
    //print_r($_SESSION);

    include_once('config.php');

    if(!isset($_SESSION['cpf']) == true and (!isset($_SESSION['senha'])) == true) 
    {
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

    echo "<h1>Bem vindo $nomeDoador</h1>";
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
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
    </button>
    
</body>
</html>