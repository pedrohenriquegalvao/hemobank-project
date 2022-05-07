<?php 
if(!empty($_GET['CodHemocentro'])) {

    include_once('config.php');

    $CodHemocentro = $_GET['CodHemocentro'];

    include_once('config.php');

    $sql = "SELECT * FROM Hemocentro WHERE CodHemocentro=$CodHemocentro";

    $result = $conexao->query($sql);

    if($result->num_rows > 0) { 
        while($user_data = mysqli_fetch_assoc($result)) { 
            $CodHemocentro = $user_data['CodHemocentro'];
            $nomeHemo = $user_data['Nome'];
            $emailHemo = $user_data['Email'];
            $telefoneHemo = $user_data['Telefone'];
            $diretorHemo = $user_data['Diretor'];
            $cidadeHemo =$user_data['Cidade'];
            $BairroHemo = $user_data['Bairro'];
            $ruaHemo = $user_data['Rua'];
            $numeroHemo =$user_data['Numero'];
            $mensagemCont = $user_data['Mensagem'];
            $fotoHemo = $user_data['FotoHemo'];
            
        }
    }
    
    
    
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

    <div class="hemo-container">
        <section class="first-section-hemo-container">
            <div class="first-hemo-section">
                
                <div class="img-content">
                    <?php echo '<img src="data:image/png;base64,' . base64_encode($fotoHemo) . '" />'; ?>
                    
                </div>
                <div class="description-content">
                    <h1><?php echo $nomeHemo ?></h1>
                    <div class="informations-hemo">
                        <i class="fa-solid fa-phone"></i>
                        <p><span>Telefone:</span> <?php echo $telefoneHemo?></p>
                    </div>
                    <div class="informations-hemo">
                        <i class="fa-solid fa-envelope"></i>
                        <p><span>Email:</span> <?php echo $emailHemo?></p>
                    </div>
                    <div class="informations-hemo">
                        <i class="fa-solid fa-location-dot"></i>
                        <p><span>Localização:</span> <?php echo $ruaHemo?>, <?php echo $BairroHemo?>, <?php echo $numeroHemo?> - <?php echo $cidadeHemo?></p>
                    </div>
                    <div class="informations-hemo">
                        <i class="fa-solid fa-user-tie"></i>
                        <p><span>Diretor Responsável:</span> <?php echo $diretorHemo?></p>
                    </div>
                    <button>Agendar Doação</button>
                    <?php
                        echo "<button class='card-btn edit-btn'>
                            <a href='edit.php?CodHemocentro=$CodHemocentro'>
                                <i class='fa-solid fa-pen-to-square edit-icon'></i>
                                Editar Hemocentro
                            </a>
                        </button>";
                    ?>
                </div>
            </div>
        </section>
        <section class="hemo-desc">
            <p><?php echo $mensagemCont ?></p>
        </section>

        <section>
            <div class="update-estoque-container">
                <button class="update-estoque" onclick="location.href = 'updateEstoque.php?CodHemocentro=<?php echo $CodHemocentro ?>'">Atualizar Estoque</button>
            </div>

            <?php 
                $sql2 = "SELECT * FROM Estoque_Sangue_Total WHERE Cod_Hemocentro=$CodHemocentro";
                $result2 = $conexao->query($sql2);
                print_r($result2);
                echo "<br>";
                
                if($result2->num_rows > 0) { 
                    echo 'HEMOCENTRO: ' . $CodHemocentro;
                    echo '<br><br>';
                    while($estoque_data = mysqli_fetch_assoc($result2)) { 
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
                   

                } 

            ?>

            <div class="estoque-container">
                <div class="estoque-content">
        
                    <div class="situacao-estoque-container">
                        <div class="Title-estoque">
                            <h1>Situação Estoque</h1>
                            <p>Atualizado em <?php echo $Data_Horario_Att?>h</p>
                        </div>
                        <div class="cards-sang-estoque">
                            <div class="sang-card">
                                <div class="water" id="sangue_a_positivo" ></div>
                                <p class="text-estoque">Tipo A+</p>
                            </div>
                            <div class="sang-card">
                                <div class="water"></div>
                                <p class="text-estoque">Tipo A-</p>
                            </div>
                            <div class="sang-card">
                                <div class="water"></div>
                                <p class="text-estoque">Tipo B+</p>
                            </div>
                            <div class="sang-card">
                                <div class="water"></div>
                                <p class="text-estoque">Tipo B-</p>
                            </div>
                            <div class="sang-card">
                                <div class="water"></div>
                                <p class="text-estoque">Tipo O+</p>
                            </div>
                            <div class="sang-card">
                                <div class="water"></div>
                                <p class="text-estoque">Tipo O-</p>
                            </div>
                            <div class="sang-card">
                                <div class="water"></div>
                                <p class="text-estoque">Tipo AB+</p>
                            </div>
                            <div class="sang-card">
                                <div class="water"></div>
                                <p class="text-estoque">Tipo AB-</p>
                            </div>
                        </div>
                    </div>
        
        
                    <div class="orientacao-container">
        
                        <div class="Title-estoque orientacoes">
                            <h1>Orientações</h1>
                        </div>
        
                        <div class="orientacao-content">
                            <div class="sang-card">
                                <div class="water estavel"></div>
                                <p class="text-estoque">Estável</p>
                            </div>
                            <div class="sang-card">
                                <div class="water alerta"></div>
                                <p class="text-estoque">Alerta</p>
                            </div>
                            <div class="sang-card">
                                <div class="water critico"></div>
                                <p class="text-estoque">Crítico</p>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </section>

        <section>

            <div class="update-estoque-container hemocomponente">
                <button class="update-estoque" >Atualizar Estoque</button>
            </div>

            <div class="estoque-container">
                <div class="estoque-content hemocomponente">
        
                    <div class="situacao-estoque-container hemocomponente">
                        <div class="Title-estoque">
                            <h1>Situação Estoque</h1>
                            <p>Atualizado em 01/05/2022 as 00:14h</p>
                        </div>
                        <div class="cards-sang-estoque">
                            <div class="sang-card">
                                <div class="water hemocomponente"></div>
                                <p class="text-estoque">CH</p>
                            </div>
                            <div class="sang-card">
                                <div class="water hemocomponente"></div>
                                <p class="text-estoque">PFC</p>
                            </div>
                            <div class="sang-card">
                                <div class="water hemocomponente"></div>
                                <p class="text-estoque">CP</p>
                            </div>
                            <div class="sang-card">
                                <div class="water hemocomponente"></div>
                                <p class="text-estoque">CRIO</p>
                            </div>

                            <div class="descri-hemocomponentes">
                                <div class="descri-card">
                                    <p>CH = Concentrado de hemácias</p>
                                </div>
                                <div class="descri-card">
                                    <p>PFC = Plasma fresco congelado</p>
                                </div>
                                <div class="descri-card">
                                    <p>CP = Concentrado de plaquetas</p>
                                </div>
                                <div class="descri-card">
                                    <p>CRIO = Crioprecipitado</p>
                                </div>
                            </div>

                        </div>
                    </div>
        
        
                    <div class="orientacao-container hemocomponente">
        
                        <div class="Title-estoque orientacoes">
                            <h1>Orientações</h1>
                        </div>
        
                        <div class="orientacao-content hemocomponente">
                            <div class="sang-card">
                                <div class="water estavel hemocomponente"></div>
                                <p class="text-estoque">Estável</p>
                            </div>
                            <div class="sang-card">
                                <div class="water alerta hemocomponente"></div>
                                <p class="text-estoque">Alerta</p>
                            </div>
                            <div class="sang-card">
                                <div class="water critico hemocomponente"></div>
                                <p class="text-estoque">Crítico</p>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>

        </section>

    </div>

</body>

</html>

<script>
    var sangue_a_positivo = document.querySelector('#sangue_a_positivo');
    sangue_a_positivo.classList.add("estavel");

    //alert("a")
    if ($Cod_Estoque_Sang == 1 && $Cod_Tipo_Sang == 1 && $Status == 'Estável') {
        alert($Cod_Tipo_Sang);
        sangue_a_positivo.classList.add("estavel");
    }

</script>