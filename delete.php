<?php 
    if(!empty($_GET['CodHemocentro'])) {

        include_once('config.php');

        $CodHemocentro = $_GET['CodHemocentro'];

        $sql = "DELETE FROM Hemocentro WHERE CodHemocentro=$CodHemocentro";

        $result = $conexao->query($sql);
        
        header('Location: hemocentros.php');
        
    }

?>