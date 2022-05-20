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
    <title>form</title>
</head>
<body>
    <div class="form-editar-doador">
        <form action="saveEditDoador.php" method="POST">
            <label for="nomeDoador">Nome:</label><br>
            <input type="text" id="nomeDoador" name="nomeDoador" value="<?php echo $nomeDoador?>"><br>
            <label for="cpfDoador">CPF:</label><br>
            <input type="text" id="cpfDoador" name="cpfDoador" value="<?php echo $cpfDoador?>"><br>
            <label for="dataNascDoador">Data de Nascimento:</label><br>
            <input type="text" id="dataNascDoador" name="dataNascDoador" value="<?php echo $dataNascDoador?>"><br>
            <label for="emailDoador">Email:</label><br>
            <input type="text" id="emailDoador" name="emailDoador" value="<?php echo $emailDoador?>"><br>
            <input type="hidden" name="codDoador" value="<?php echo $codDoador ?>">
            <input type="submit" name="update" id="update" value="Salvar alterações">
        </form>
    </div>
</body>
</html>