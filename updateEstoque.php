<?php 
    if(!empty($_GET['CodHemocentro'])) {
        include_once('config.php');

        $CodHemocentro = $_GET['CodHemocentro'];

        $sql = "SELECT * FROM Estoque_Sangue_Total WHERE Cod_Hemocentro=$CodHemocentro";
        
        $result = $conexao->query($sql);
        
        /*if($result->num_rows > 0) { 
            echo 'HEMOCENTRO: ' . $CodHemocentro;
            echo '<br><br>';
            while($estoque_data = mysqli_fetch_assoc($result)) { 
                $Cod_Estoque_Sang = $estoque_data['Cod_Estoque_Sangue'];
                $Cod_Tipo_Sang = $estoque_data['Cod_Tipo_Sang'];
                $Status_Estoque = $estoque_data['Status_Estoque'];
                $Data_Horario_Att = $estoque_data['Data_Horario_Att'];
                echo 'Codigo do estoque: ' . $Cod_Estoque_Sang;
                        echo '<br>';
                        echo 'Codigo do Tipo Sanguíneo: ' . $Cod_Tipo_Sang;
                        echo '<br>';
                        echo 'Status do estoque: ' . $Status_Estoque;
                        echo '<br>';
                        echo 'Horário de atualização: ' . $Data_Horario_Att;
                        echo '<br><br>';
            }
            

        }*/

    }
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hemocentro</title>
    <link rel="stylesheet" href="css/style.css">
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
                <div class="item"><a href="#"><i class="fas fa-desktop"></i>Home</a></div>
                <div class="item"><a href="hemocentro.html"><i class="fa-solid fa-screwdriver-wrench"></i>Interface Tela Hemocentro</a></div>
                <div class="item"><a href="hemocentros.php"><i class="fa-solid fa-house-chimney-medical"></i>Hemocentros</a></div>
                <div class="item"><a href="#"><i class="fa-solid fa-building"></i>Sobre Nós</a></div>

                <div class="item">
                    <a class="sub-btn"><i class="fa-solid fa-right-to-bracket"></i></i>Cadastro<i
                            class="fas fa-angle-right dropdown"></i> </a>
                    <div class="sub-menu">
                        <a href="formulario.html" class="sub-item">Cadastro Hemocentro</a>
                        <a href="#" class="sub-item">Cadastro Doador</a>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>

        <section>

            <div class="container-form">
                <h1>Estoque de Sangue</h2>
                </select>
                <form action="saveUpdateEstoque.php" method="POST">
                    <?php 
                    while($estoque_data = mysqli_fetch_assoc($result)) { 
                        $Cod_Estoque_Sang = $estoque_data['Cod_Estoque_Sangue'];
                        $Cod_Tipo_Sang = $estoque_data['Cod_Tipo_Sang'];
                        $Nome_Sang = "Padrão";
                        switch ($Cod_Tipo_Sang) {
                            case 1: $Nome_Sang = 'A+'; break;
                            case 2: $Nome_Sang = 'A-'; break;
                            case 3: $Nome_Sang = 'B+'; break;
                            case 4: $Nome_Sang = 'B-'; break;
                            case 5: $Nome_Sang = 'O+'; break;
                            case 6: $Nome_Sang = 'O-'; break;
                            case 7: $Nome_Sang = 'AB+'; break;
                            case 8: $Nome_Sang = 'AB-'; break;
                        }
                        $Status_Estoque = $estoque_data['Status_Estoque'];
                        $Data_Horario_Att = $estoque_data['Data_Horario_Att'];

                        echo "<h2>Sangue $Nome_Sang</h2>";
                        echo "<label for=''>Status</label>
                                <select name='status' id='" . $Cod_Tipo_Sang . "'> 
                                    <option value=''>--- Escolha uma Opção ---</option>
                                    <option value='critico' " . (($Status_Estoque == 'Crítico') ? 'selected' : '') . " >Crítico</option>
                                    <option value='alerta' " . (($Status_Estoque == 'Alerta') ? 'selected' : '') . " >Alerta</option>
                                    <option value='estavel' " . (($Status_Estoque == 'Estável') ? 'selected' : '') . " >Estável</option>
                                </select>";
                                echo '<br>';
                                echo 'Codigo do Tipo Sanguíneo: ' . $Cod_Tipo_Sang;
                                echo '<br>';
                                echo 'Status do estoque: ' . $Status_Estoque;
                                echo '<br>';
                                echo 'Horário de atualização: ' . $Data_Horario_Att;
                                echo '<br><br>';
                    }?>
                    
                    <div class="update-estoque-container">
                        <input type="hidden" name="CodHemocentro" value="<?php echo $CodHemocentro ?>">
                        <button type="submit" name="updateEstoque" id="updateEstoque" class="update-estoque" >Atualizar Estoque</button>
                    </div>
                </form>
            </div>
            
        </section>

    </div>

</body>

</html>