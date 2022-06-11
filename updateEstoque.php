<?php 
    if(!empty($_GET['CodHemocentro'])) {
        include_once('config.php');

        $CodHemocentro = $_GET['CodHemocentro'];

        $sql = "SELECT * FROM Estoque_Sangue_Total WHERE Cod_Hemocentro=$CodHemocentro";
        
        $result = $conexao->query($sql);

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
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
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
                <div class="item"><a href="homePage.html"><i class="fas fa-desktop"></i>Home</a></div>
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

            <div class="estoque-container-form">
                <h1 class="estoque-title">Estoque de Sangue</h1>
                </select>
                <form action="saveUpdateEstoque.php" method="POST">
                    <?php
                    echo "<div class='card-estoque-sang'>";
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

                        echo "<div class='card-estoque-sangue'>";
                        echo "<h2>Sangue $Nome_Sang</h2>";
                        echo "  <div class='select-estoque'>
                                <label for=''><b>Status</b></label>
                                <select name='status".strval($Cod_Tipo_Sang)."' id='" . $Cod_Tipo_Sang . "'> 
                                    <option value='' disabled style='text-align: center;'>--- Escolha uma Opção ---</option>
                                    <option value='Crítico' " . (($Status_Estoque == 'Crítico') ? 'selected' : '') . " >Crítico</option>
                                    <option value='Alerta' " . (($Status_Estoque == 'Alerta') ? 'selected' : '') . " >Alerta</option>
                                    <option value='Estável' " . (($Status_Estoque == 'Estável') ? 'selected' : '') . " >Estável</option>
                                </select>
                                </div>";
                                echo '<br>';
                                echo '<b>Última atualização:</b> ' . $Data_Horario_Att;
                                echo '<br><br>';
                                echo ' <input type="hidden" name="estoque'.$Cod_Tipo_Sang.'" value="'.$Cod_Estoque_Sang.'">';
                                echo "</div>";
                    }?>
                    </div>

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