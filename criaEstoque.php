<?php 
    include_once('config.php');

    $sql = "SELECT LAST_INSERT_ID(CodHemocentro) from Hemocentro ORDER BY LAST_INSERT_ID(CodHemocentro) DESC LIMIT 1";

    $result = $conexao->query($sql);
    print_r($result);
    if($result->num_rows > 0) { 
        while($user_data = mysqli_fetch_assoc($result)) { 
            $CodHemocentro = $user_data['LAST_INSERT_ID(CodHemocentro)'];
        }
    }
    print_r($CodHemocentro);

    $sql2 = "SELECT * FROM Tipo_Sanguineo ORDER BY Cod_Tipo_Sang";
    $result2 = $conexao->query($sql2);
    echo "<br>";
    print_r($result2);
    echo "<br><br>";
    if ($result2->num_rows > 0) {
        while($tipo_sang_data = mysqli_fetch_assoc($result2)) {
            $Cod_Tipo_Sang = $tipo_sang_data['Cod_Tipo_Sang'];
            $Tipo_Sang = $tipo_sang_data['Tipo_Sang'];
            $Fator_Rh = $tipo_sang_data['Fator_Rh'];
            $sql3 = "INSERT INTO estoque_sangue_total(Cod_Hemocentro,Cod_Tipo_Sang,Status_Estoque,Data_Horario_Att) VALUES ('$CodHemocentro', '$Cod_Tipo_Sang', 'Estável', '2022-05-05 13:30:00')";
            $result3 = $conexao->query($sql3);
            echo "Codigo do Tipo Sanguineo: " . $Cod_Tipo_Sang;
            echo "<br>";
            echo "Tipo Sanguineo: " . $Tipo_Sang;
            echo "<br>";
            echo "Fator Rh: " . $Fator_Rh;
            echo "<br><br>";
        }
        
    }

    header("Location: hemocentros.php");



?>