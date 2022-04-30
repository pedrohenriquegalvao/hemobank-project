<?php 
    if(!empty($_GET['CodHemocentro'])) {

        include_once('config.php');

        $CodHemocentro = $_GET['CodHemocentro'];

        $sql = "SELECT * FROM Hemocentro WHERE CodHemocentro=$CodHemocentro";

        $result = $conexao->query($sql);

        if($result->num_rows > 0) {
            while($user_data = mysqli_fetch_assoc($result)) {
                $nomeHemo = $user_data['Nome'];
                $emailHemo = $user_data['Email'];
                $telefoneHemo = $user_data['Telefone'];
                $diretorHemo = $user_data['Diretor'];
                $cidadeHemo =$user_data['Cidade'];
                $BairroHemo = $user_data['Bairro'];
                $ruaHemo = $user_data['Rua'];
                $numeroHemo =$user_data['Numero'];
                $mensagemCont = $user_data['Mensagem'];
            }
        } else {
            header('Location: hemocentros.php');
        }
    
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/93d18202e7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!--<script src="../js/ContatoPageScript.js"></script>-->
</head>
<body>
    
    <div class="HemocentroCadastro">
        <div class="HemocentroCadastro-container">
            <div class="HemocentroCadastro-content">
                <div class="image-box">
                    <img src="img/blood-work-illustration@3x.png" alt="">
                </div>

                <form action="saveEdit.php" method="POST" enctype="multipart/form-data">
                    <div class="topic">Editar Hemocentro</div>

                    <div class="input-box">
                        <input type="text" id="nomeHemo" maxlength="60" name="nomeHemo" title="Nome do Hemocentro deve possuir no mínimo 6 e no máximo 60 caracteres." pattern="[a-zA-Z\u00C0-\u00FF ]{6,60}$" required value="<?php echo $nomeHemo?>">
                        <label>Nome Hemocentro</label>
                    </div>

                    <div class="input-box">
                        <input type="text" id="emailHemo" name="emailHemo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="O email deve ser inserido da seguinte forma: exemplo@exemplo.com" required value="<?php echo $emailHemo?>">
                        <label>Email</label>
                    </div>

                    <div class="input-box">
                        <input type="tel" id="telefoneHemo" name="telefoneHemo" maxlength="14" pattern="\([0-9]{2}\)[0-9]{4,5}-[0-9]{4}$" title="O Telefone dece ser inserido da seguinte forma: (xx)xxxxx-xxxx" required="required" value="<?php echo $telefoneHemo?>">
                        <label>Telefone</label>
                    </div>

                    <div class="input-box">
                        <input type="text" id="diretorHemo" name="diretorHemo" maxlength="50" pattern="[a-zA-Z\u00C0-\u00FF ]{6,50}$" title="O nome do Diretor deve possuir no mínimo 6 e no máximo 50 caracteres." required value="<?php echo $diretorHemo?>">
                        <label>Diretor</label>
                    </div>

                    <div class="input-box">
                        <input type="text" id="cidadeHemo" name="cidadeHemo" maxlength="50" title="O campo cidade deve possuir no mínimo 5 e no máximo 50 caracteres." pattern="[a-zA-Z\u00C0-\u00FF ]{5,50}$" required value="<?php echo $cidadeHemo?>">
                        <label>Cidade</label>
                    </div>

                    <div class="input-box">
                        <input type="text" id="BairroHemo" name="BairroHemo" maxlength="40" title="O campo bairro deve possuir no mínimo 5 e no máximo 40 caracteres." pattern="[a-zA-Z\u00C0-\u00FF ]{5,40}$" required value="<?php echo $BairroHemo?>">
                        <label>Bairro</label>
                    </div>

                    <div class="endereco-flex">
                        <div class="input-box ruaHemo">
                            <input type="text" id="ruaHemo" name="ruaHemo" maxlength="40" title="O campo rua deve possuir no mínimo 1 e no máximo 40 caracteres." pattern="[a-zA-Z\u00C0-\u00FF ]{1,40}$" required value="<?php echo $ruaHemo?>">
                            <label>Rua</label>
                        </div>

                        <div class="input-box numeroHemo">
                            <input type="text" id="numeroHemo" name="numeroHemo" title="O campo número so deve conter números" pattern="[0-9]+$" required value="<?php echo $numeroHemo?>">
                            <label>Número</label>
                        </div>
                    </div>

                    <div class="message-box">
                        <input type="text" placeholder="Descrição Hemocentro" pattern="[a-zA-Z\u00C0-\u00FF ]{0,300}$" name="mensagemCont" id="mensagemCont" value="<?php echo $mensagemCont?>">
                    </div>

                    <div class="input-file">
                        <label class="label-hemo" for="fotoHemo" id="label-hemo">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Escolha o arquivo</span>
                        </label>
                        <input type="file" required id="fotoHemo" name="fotoHemo">
                    </div>

                    <div class="input-box">
                        <input type="hidden" name="CodHemocentro" value="<?php echo $CodHemocentro ?>">
                        <input type="submit" name="update" id="update" value="Salvar alterações">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div id="popup-check">
    <a class="link-voltar-hemo" href="hemocentros.php">Voltar</a>
</body>
</html>