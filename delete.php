<?php 

    if(!empty($_GET['CodHemocentro'])) {

        include_once('config.php');

        $CodHemocentro = $_GET['CodHemocentro'];
        $sqlSelect = "SELECT * FROM Hemocentro WHERE CodHemocentro=$CodHemocentro";
        $result = $conexao->query($sqlSelect);


        if ($result->num_rows > 0){
            $sqlDeleteEstoque = "DELETE FROM Estoque_Sangue_Total WHERE Cod_Hemocentro=$CodHemocentro";
            $resultDeleteEstoque = $conexao->query($sqlDeleteEstoque) or die("morra");
            $sqlDeleteEstoque = "DELETE FROM Estoque_Hemocomponentes WHERE Cod_Hemocentro=$CodHemocentro";
            $resultDeleteEstoque = $conexao->query($sqlDeleteEstoque) or die("morra");
            $sqlDelete = "DELETE FROM Hemocentro WHERE CodHemocentro=$CodHemocentro";
            $resultDelete = $conexao->query($sqlDelete) or die("error");
        }
        
        header('Location: hemocentros.php');
    }

?>