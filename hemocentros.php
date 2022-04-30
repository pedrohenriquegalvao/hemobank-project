<?php

include_once("config.php");

$sql = "SELECT * FROM Hemocentro ORDER BY CodHemocentro DESC";

$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hemocentros</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/93d18202e7.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="flex-box-card-container">
        <?php while($user_data = mysqli_fetch_assoc($result)) { ?>
        <div class="card-hemo">
            <?php if ($user_data['FotoHemo']) { ?>
            <img class="img-hemo col-foto-hemo" id="imagemSelecionada" src="data:image/png;base64,<?= base64_encode($user_data['FotoHemo']) ?>" />
            <?php } ?>
            <h2 class="title"><?php echo $user_data['Nome'] ?></h2>
            <!--<?php echo "h2 class='title'>".$user_data['Nome']."</h2>"; ?>-->
            <div class="endereco">
                <i class="fa-solid fa-location-dot"></i>
                <p>Localização: <?php echo $user_data['Cidade'] ?></p>
            </div>
            <button class="card-btn">Saiba Mais</button>
            <?php 
            echo "<button class='card-btn edit-btn'>
                    <a href='edit.php?CodHemocentro=$user_data[CodHemocentro]'>
                        <i class='fa-solid fa-pen-to-square'></i>
                    </a>
                </button>"
            ?>
        </div>
        <?php } ?>
    </div>

    <!--
    <section class="table-hemocentro-container">
        <table class="tabela-hemo">
            <thead>
                <tr>
                    <th scope="col">Cód.</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Diretor</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Bairro</th>
                    <th scope="col" class="col-rua-hemo">Rua</th>
                    <th scope="col">Numero</th>
                    <th scope="col">Mensagem</th>
                    <th scope="col" class="col-foto-hemo">Foto do Hemocentro</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            -->
            <!--
            <tbody>
                <?php
                /*
                
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['CodHemocentro']."</td>";
                        echo "<td>".$user_data['Nome']."</td>";
                        echo "<td>".$user_data['Email']."</td>";
                        echo "<td>".$user_data['Telefone']."</td>";
                        echo "<td>".$user_data['Diretor']."</td>";
                        echo "<td>".$user_data['Cidade']."</td>";
                        echo "<td>".$user_data['Bairro']."</td>";
                        echo "<td class='col-rua-hemo'>".$user_data['Rua']."</td>";
                        echo "<td>".$user_data['Numero']."</td>";
                        echo "<td>".$user_data['Mensagem']."</td>";
                        if ($user_data['FotoHemo']) { ?>
                            <td style="text-align:left">
                                <img class="img-hemo col-foto-hemo" id="imagemSelecionada" src="data:image/png;base64,<?= base64_encode($user_data['FotoHemo']) ?>" />
                            </td>
                        
                        }
                        <?php
                        
                        echo "<td>Ações</td>";
                        echo "</tr>";
                    }
                }*/
                ?>
                
            </tbody>
        </table>
        <button class="button-back-form" onclick="location.href = 'formulario.html'">
                <label for="">Voltar para Formulário</label>
        </button>
    </section>
    -->
    
</body>
</html>