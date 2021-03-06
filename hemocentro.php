<?php 
if(!empty($_GET['CodHemocentro'])) #Se o $GET($POST feito pela pagina anterior na URL) não estiver vazio:
{
    session_start(); //Utilizado *sempre* que iniciar uma sessão 
    
    include_once("config.php"); #Chama as configurações básicas de conexao com o BD

    $CodHemocentro = $_GET['CodHemocentro']; #coloca o CodHemocentro passado pela URL em uma variável

    $sql = "SELECT * FROM Hemocentro WHERE CodHemocentro=$CodHemocentro"; #Utiliza a variavel declarada acima para fazer o SELECT do Hemocentro desejado, atráves do seu código

    $result = $conexao->query($sql); #Pega o resultado do SELECT feito acima, utiliza a variável global $conexao (vem do config.php) e faz a query que foi armazenada na variável $sql acima. 
    #O resultado dessa busca é colocado na variavel $result

    if($result->num_rows > 0) #Se o numero de linhas do $result for > que 0, ou seja, foi encontrado um registro com esse codigo de hemocentro:
    { 
        while($user_data = mysqli_fetch_assoc($result)) #Cria a variavel $user_data para utilizar a funcao mysqli_fetch_assoc. Essa função vai percorrer cada coluna do registro passado como parametro, no caso o $result feito acima
        { 
            $CodHemocentro = $user_data['CodHemocentro']; #Pega a posição CodHemocentro desse registro e coloca na variavel. O nome da posição bate com campo da tabela no BD
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
            #cada coluna do hemocentro é colocada em uma variavel
            #Essa variáveis são utilizadas mais abaixo no *HTML* para listar os dados do hemocentro na tela do site.
        }
    }

    if(isset($_SESSION['cpf']) == true and (isset($_SESSION['senha'])) == true)
    { #Confere se há uma sessão ativa.
        echo 
        '  
            <style>
            button.card-btn.edit-btn, button.update-estoque
            {
                display: none;
            }
            button.criar-agenda 
            {
                display: none;
            }
            </style>
        '; 
    }
    else
    {
        echo
        '
            <style>
                .agendar-doacao-btn
                {
                    display: none;
                }
            </style>
        ';
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
                <div class="item"><a href="index.html"><i class="fas fa-desktop"></i>Home</a></div>
                <div class="item"><a href="hemocentros.php"><i class="fa-solid fa-house-chimney-medical"></i>Hemocentros</a></div>
                <div class="item"><a href="index.html"><i class="fa-solid fa-building"></i>Sobre Nós</a></div>
                <div class="item"><a href="perfilDoador.php"><i class="fa-solid fa-user"></i>Meu Perfil</a></div>

                <div class="item">
                    <a class="sub-btn"><i class="fa-solid fa-right-to-bracket"></i>Login<i
                            class="fas fa-angle-right dropdown"></i> </a>
                    <div class="sub-menu">
                        <a href="formulario.html" class="sub-item">Cadastro Hemocentro</a>
                        <a href="formularioDoador.php" class="sub-item">Login Doador</a>
                    </div>
                </div>

                <div class="item sair-btn"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Sair</a></div>
                
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
                    <button class="agendar-doacao-btn" onclick="window.location.href='formdoacao.php?CodHemocentro=<?php echo $CodHemocentro ?>'">Agendar Doação</button>
                    <?php
                        echo "<button class='card-btn edit-btn'>
                            <a href='edit.php?CodHemocentro=$CodHemocentro'>
                                <i class='fa-solid fa-pen-to-square edit-icon'></i>
                                Editar Hemocentro
                            </a>
                        </button>";
                    ?>
                    <button class='criar-agenda' onclick="window.location.href='agendaHemocentro.php?CodHemocentro=<?php echo $CodHemocentro ?>'"><i class="fa-solid fa-calendar-days"></i>Criar Agenda</button>
                </div>
            </div>
        </section>
        <section class="hemo-desc">
            <p><?php echo $mensagemCont ?></p>
        </section>

        <section>
            <div class="update-estoque-container pag-hemo">
                <button class="update-estoque" onclick="location.href = 'updateEstoque.php?CodHemocentro=<?php echo $CodHemocentro ?>'">Atualizar Estoque</button>
            </div>
            <div class="estoque-container">
                <div class="estoque-content">   
                    <div class="situacao-estoque-container">
                        <?php 
                        $sqlData_Horario = "SELECT Data_Horario_Att FROM Estoque_Sangue_Total WHERE Cod_Hemocentro=$CodHemocentro AND Cod_Tipo_Sang='1'" ;
                        $resultData_Horario = $conexao->query($sqlData_Horario);
                        $Data_Horario_Att = mysqli_fetch_row($resultData_Horario);
                        ?>
                        <div class="Title-estoque">
                                <h1>Situação Estoque</h1>
                                <p>Atualizado em <?php foreach ($Data_Horario_Att as $data_horario) { echo $data_horario;} ?>h</p>
                        </div>
                        <div class="cards-sang-estoque">
            <?php 
                $sql2 = "SELECT * FROM Estoque_Sangue_Total WHERE Cod_Hemocentro=$CodHemocentro";
                $result2 = $conexao->query($sql2);
                
                
                if($result2->num_rows > 0) { 
                    
                    while($estoque_data = mysqli_fetch_assoc($result2)) { 
                        $Cod_Estoque_Sang = $estoque_data['Cod_Estoque_Sangue'];
                        $Cod_Tipo_Sang = $estoque_data['Cod_Tipo_Sang'];
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
                        
        
                        echo '<div class="sang-card">
                                <div class="water '. 
                                (($Status_Estoque == 'Crítico') ? 'critico' : 
                                (($Status_Estoque == 'Alerta') ? 'alerta' : 'estavel')) .'">
                                </div>
                                <p class="text-estoque">Tipo '. $Nome_Sang .'</p>
                             </div>';
                        
                    }
                   

                } 

            ?>
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
                <button class="update-estoque" onclick="location.href = 'updateEstoqueHemocomp.php?CodHemocentro=<?php echo $CodHemocentro ?>'">Atualizar Estoque</button>
            </div>

            <div class="estoque-container">
                <div class="estoque-content hemocomponente">
        
                    <div class="situacao-estoque-container hemocomponente">
                        <?php 
                        $sqlData_Horario = "SELECT Data_Horario_Att FROM Estoque_Hemocomponentes WHERE Cod_Hemocentro=$CodHemocentro AND Hemocomponente='Concentrado de hemácias'" ;
                        $resultData_Horario = $conexao->query($sqlData_Horario);
                        $Data_Horario_Att = mysqli_fetch_row($resultData_Horario);
                        ?>
                        <div class="Title-estoque">
                            <h1>Situação Estoque</h1>
                            <p>Atualizado em <?php foreach ($Data_Horario_Att as $data_horario) { echo $data_horario;} ?>h</p>
                        </div>
                        <div class="cards-sang-estoque">
                        <?php 
                $sql2 = "SELECT * FROM Estoque_Hemocomponentes WHERE Cod_Hemocentro=$CodHemocentro";
                $result2 = $conexao->query($sql2);
                
                
                if($result2->num_rows > 0) { 
                    
                    while($estoque_data = mysqli_fetch_assoc($result2)) { 
                        $Cod_Estoque_Hemocomp = $estoque_data['Cod_Estoque_Hemo'];
                        $Hemocomponente = $estoque_data['Hemocomponente'];
                        $Sigla_Hemocomponente = "AAA";
                        switch ($Hemocomponente) {
                            case 'Concentrado de hemácias': $Sigla_Hemocomponente = 'CH'; break;
                            case 'Plasma fresco congelado': $Sigla_Hemocomponente = 'PFC'; break;
                            case 'Concentrado de plaquetas': $Sigla_Hemocomponente = 'CP'; break;
                            case 'Crioprecipitado': $Sigla_Hemocomponente = 'CRIO'; break;
                        }
                        $Status_Estoque = $estoque_data['Status_Estoque'];
                        $Data_Horario_Att = $estoque_data['Data_Horario_Att'];
                        
        
                        echo '<div class="sang-card">
                                <div class="water hemocomponente '. 
                                (($Status_Estoque == 'Crítico') ? 'critico' : 
                                (($Status_Estoque == 'Alerta') ? 'alerta' : 'estavel')) .'">
                                </div>
                                <p class="text-estoque">'. $Sigla_Hemocomponente .'</p>
                             </div>';
                        
                    }
                   

                } 

            ?>
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

<?php

if(isset($_SESSION['cpf']) == true and (isset($_SESSION['senha'])) == true)
{
    echo 
    '  
        <style>
        .item.sair-btn
        {
            display: block;
        }
        </style>
    ';
}

?>