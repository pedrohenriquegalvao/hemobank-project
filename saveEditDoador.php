<?php 
    if(isset($_POST['update']))
    {
        include_once('config.php');

        $codDoador = $_POST['codDoador'];
        $nomeDoador = $_POST['nomeDoador'];
        $cpfDoador = $_POST['cpfDoador'];
        $emailDoador = $_POST['emailDoador'];
        $dataNascDoador = $_POST['dataNascDoador'];
        echo "<p>$codDoador</p>";
        echo "<p>$nomeDoador</p>";
        echo "<p>$cpfDoador</p>";
        echo "<p>$emailDoador</p>";
        echo "<p>$dataNascDoador</p>";

        $sql = "UPDATE Doador SET Nome='$nomeDoador', CPF='$cpfDoador', Email='$emailDoador', Data_de_Nasc='$dataNascDoador' WHERE CodDoador=$codDoador";
        $result = $conexao->query($sql);

    } 
    
    
    header("Location: perfilDoador.php");
    

?>