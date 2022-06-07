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

            $sqlDeleteAgenda = "DELETE FROM Agenda WHERE Cod_Hemocentro=$CodHemocentro";
            $resultDeleteAgenda = $conexao->query($sqlDeleteAgenda) or die("morra");

            $sqlDeleteAgendamento = "DELETE FROM Agendamento WHERE Cod_Hemocentro=$CodHemocentro";
            $resultDeleteAgendamento = $conexao->query($sqlDeleteAgendamento) or die("morra");
            
            $sqlDelete = "DELETE FROM Hemocentro WHERE CodHemocentro=$CodHemocentro";
            $resultDelete = $conexao->query($sqlDelete);

            if(!$resultDelete) //Se nao conseguiu executar a query SQL
            {
            echo $conexao->error; //Mostra o porquê de não ter conseguido executar (ex. Error: couldnt find table)
            }
            print_r($resultDelete);
        }
        
        header('Location: hemocentros.php');
    }

?>