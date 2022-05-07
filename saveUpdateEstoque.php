<?php 
    include_once('config.php');
    echo "<h2>OI</h2>";
    if(isset($_POST['updateEstoque'])) {

        /* --- STATUS DOS SANGUES PASSADOS PELA URL, METODO POST ATRAVES DOS SELECTS --- */

        $StatusAPositivo = $_POST['status1'];
        $StatusANegativo = $_POST['status2'];
        $StatusBPositivo = $_POST['status3'];
        $StatusBNegativo = $_POST['status4'];
        $StatusOPositivo = $_POST['status5'];
        $StatusONegativo = $_POST['status6'];
        $StatusABPositivo = $_POST['status7'];
        $StatusABNegativo = $_POST['status8'];

        /* --- CODIGO DE CADA ESTOQUE PASSADOS PELA URL, METODO POST ATRAVES DOS INPUTS HIDDEN --- */

        $EstoqueAPositivo = $_POST['estoque1'];
        $EstoqueANegativo = $_POST['estoque2'];
        $EstoqueBPositivo = $_POST['estoque3'];
        $EstoqueBNegativo = $_POST['estoque4'];
        $EstoqueOPositivo = $_POST['estoque5'];
        $EstoqueONegativo = $_POST['estoque6'];
        $EstoqueABPositivo = $_POST['estoque7'];
        $EstoqueABNegativo = $_POST['estoque8'];

        /* -- CODIGO DO HEMOCENTRO PASSADO PELA URL, METODO POST ATRAVES DE UM INPUT HIDDEN NAME=CodHemocentro -- */
       
        $CodHemocentro = $_POST['CodHemocentro'];

        echo "<h1>Hemocentro $CodHemocentro</h1>";

        echo "<p>Estoque $EstoqueAPositivo => Sangue A+: $StatusAPositivo</p>";
        echo "<p>Estoque $EstoqueANegativo => Sangue A-: $StatusANegativo</p>";
        echo "<p>Estoque $EstoqueBPositivo => Sangue B+: $StatusBPositivo</p>";
        echo "<p>Estoque $EstoqueBNegativo => Sangue B-: $StatusBNegativo</p>";
        echo "<p>Estoque $EstoqueOPositivo => Sangue O+: $StatusOPositivo</p>";
        echo "<p>Estoque $EstoqueONegativo => Sangue O-: $StatusONegativo</p>";
        echo "<p>Estoque $EstoqueABPositivo => Sangue AB+: $StatusABPositivo</p>";
        echo "<p>Estoque $EstoqueABNegativo => Sangue AB-: $StatusABNegativo</p>";

        /* UPDATE Estoque A+ */
        $sqlUpdate = "UPDATE Estoque_Sangue_Total SET Cod_Estoque_Sangue='$EstoqueAPositivo', Cod_Hemocentro='$CodHemocentro', Cod_Tipo_Sang ='1', Status_Estoque='$StatusAPositivo', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Sangue='$EstoqueAPositivo'";

        $result = $conexao->query($sqlUpdate);

        /* UPDATE Estoque A- */
        $sqlUpdate = "UPDATE Estoque_Sangue_Total SET Cod_Estoque_Sangue='$EstoqueANegativo', Cod_Hemocentro='$CodHemocentro', Cod_Tipo_Sang ='2', Status_Estoque='$StatusANegativo', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Sangue='$EstoqueANegativo'";

        $result = $conexao->query($sqlUpdate);

        /* UPDATE Estoque B+ */
        $sqlUpdate = "UPDATE Estoque_Sangue_Total SET Cod_Estoque_Sangue='$EstoqueBPositivo', Cod_Hemocentro='$CodHemocentro', Cod_Tipo_Sang ='3', Status_Estoque='$StatusBPositivo', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Sangue='$EstoqueBPositivo'";

        $result = $conexao->query($sqlUpdate);

        /* UPDATE Estoque B- */
        $sqlUpdate = "UPDATE Estoque_Sangue_Total SET Cod_Estoque_Sangue='$EstoqueBNegativo', Cod_Hemocentro='$CodHemocentro', Cod_Tipo_Sang ='4', Status_Estoque='$StatusBNegativo', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Sangue='$EstoqueBNegativo'";

        $result = $conexao->query($sqlUpdate);

        /* UPDATE Estoque O+ */
        $sqlUpdate = "UPDATE Estoque_Sangue_Total SET Cod_Estoque_Sangue='$EstoqueOPositivo', Cod_Hemocentro='$CodHemocentro', Cod_Tipo_Sang ='5', Status_Estoque='$StatusOPositivo', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Sangue='$EstoqueOPositivo'";

        $result = $conexao->query($sqlUpdate);
        
        /* UPDATE Estoque O- */
        $sqlUpdate = "UPDATE Estoque_Sangue_Total SET Cod_Estoque_Sangue='$EstoqueONegativo', Cod_Hemocentro='$CodHemocentro', Cod_Tipo_Sang ='6', Status_Estoque='$StatusONegativo', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Sangue='$EstoqueONegativo'";

        $result = $conexao->query($sqlUpdate);

        /* UPDATE Estoque AB+ */
        $sqlUpdate = "UPDATE Estoque_Sangue_Total SET Cod_Estoque_Sangue='$EstoqueABPositivo', Cod_Hemocentro='$CodHemocentro', Cod_Tipo_Sang ='7', Status_Estoque='$StatusABPositivo', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Sangue='$EstoqueABPositivo'";

        $result = $conexao->query($sqlUpdate);


        /* UPDATE Estoque AB- */
        $sqlUpdate = "UPDATE Estoque_Sangue_Total SET Cod_Estoque_Sangue='$EstoqueABNegativo', Cod_Hemocentro='$CodHemocentro', Cod_Tipo_Sang ='8', Status_Estoque='$StatusABNegativo', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Sangue='$EstoqueABNegativo'";

        $result = $conexao->query($sqlUpdate);
        }
        
         
    header("Location: hemocentro.php?CodHemocentro=" . $CodHemocentro);
        /*header('Location: hemocentro.php');
         hemocentro.php?CodHemocentro=$CodHemocentro
        header("Location: admin-viewacc.php?id=" . $result['id']); */
?>