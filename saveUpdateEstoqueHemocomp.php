<?php 
    include_once('config.php');
    echo "<h2>OI</h2>";
    if(isset($_POST['updateEstoque'])) {

        /* --- STATUS DOS SANGUES PASSADOS PELA URL, METODO POST ATRAVES DOS SELECTS --- */

        $StatusHemacias = $_POST['status1'];
        $StatusPlasma = $_POST['status2'];
        $StatusPlaquetas = $_POST['status3'];
        $StatusCrioprecipitado = $_POST['status4'];
       

        /* --- CODIGO DE CADA ESTOQUE PASSADOS PELA URL, METODO POST ATRAVES DOS INPUTS HIDDEN --- */

        $EstoqueHemacias = $_POST['estoque1'];
        $EstoquePlasma = $_POST['estoque2'];
        $EstoquePlaquetas = $_POST['estoque3'];
        $EstoqueCrioprecipitado = $_POST['estoque4'];
   

        /* -- CODIGO DO HEMOCENTRO PASSADO PELA URL, METODO POST ATRAVES DE UM INPUT HIDDEN NAME=CodHemocentro -- */
       
        $CodHemocentro = $_POST['CodHemocentro'];

        echo "<h1>Hemocentro $CodHemocentro</h1>";

        echo "<p>Estoque $EstoqueHemacias => Concentrado de hemácias: $StatusHemacias</p>";
        echo "<p>Estoque $EstoquePlasma => Plasma Fresco congelado: $StatusPlasma</p>";
        echo "<p>Estoque $EstoquePlaquetas => Concentrado de plaquetas: $StatusPlaquetas</p>";
        echo "<p>Estoque $EstoqueCrioprecipitado => Crioprecipitado: $StatusCrioprecipitado</p>";
    

        
        
        $sqlUpdate = "UPDATE Estoque_Hemocomponentes SET Cod_Estoque_Hemo='$EstoqueHemacias', Cod_Hemocentro='$CodHemocentro', Hemocomponente ='Concentrado de hemácias', Status_Estoque='$StatusHemacias', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Hemo='$EstoqueHemacias'";

        $result = $conexao->query($sqlUpdate);

      
        $sqlUpdate = "UPDATE Estoque_Hemocomponentes SET Cod_Estoque_Hemo='$EstoquePlasma', Cod_Hemocentro='$CodHemocentro', Hemocomponente ='Plasma fresco congelado', Status_Estoque='$StatusPlasma', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Hemo='$EstoquePlasma'";

        $result = $conexao->query($sqlUpdate);

        $sqlUpdate = "UPDATE Estoque_Hemocomponentes SET Cod_Estoque_Hemo='$EstoquePlaquetas', Cod_Hemocentro='$CodHemocentro', Hemocomponente ='Concentrado de plaquetas', Status_Estoque='$StatusPlaquetas', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Hemo='$EstoquePlaquetas'";

        $result = $conexao->query($sqlUpdate);

        $sqlUpdate = "UPDATE Estoque_Hemocomponentes SET Cod_Estoque_Hemo='$EstoqueCrioprecipitado', Cod_Hemocentro='$CodHemocentro', Hemocomponente ='Crioprecipitado', Status_Estoque='$StatusCrioprecipitado', Data_Horario_Att=CURRENT_TIMESTAMP WHERE Cod_Estoque_Hemo='$EstoqueCrioprecipitado'";

        $result = $conexao->query($sqlUpdate);
        
        }
        
         
    header("Location: hemocentro.php?CodHemocentro=" . $CodHemocentro);
        /*header('Location: hemocentro.php');
         hemocentro.php?CodHemocentro=$CodHemocentro
        header("Location: admin-viewacc.php?id=" . $result['id']); */
?>