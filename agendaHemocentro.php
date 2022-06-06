<?php

    include_once('config.php');

    // Pegar código do hemocentro
    if(isset($_GET['CodHemocentro']))
    {
        $CodHemocentro = $_GET['CodHemocentro'];
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Agenda</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/65ea520fa5.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/93d18202e7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/navbar.js"></script>
    <script src="js/criarAgenda.js"></script>
</head>
<body>

<div class="AgendamentoCadastro-container">
        <div class="AgendamentoCadastro-form-container">
            <div class="AgendamentoCadastro-content">
                <div class="AgendamentoCadastro-flex">

                    <abbr title="Voltar">
                        <div class="return-arrow">
                            <a href="hemocentro.php?CodHemocentro=<?php echo $CodHemocentro ?>"><i class="fa-solid fa-arrow-left"></i></a>
                        </div>
                    </abbr>

                    <div class="content-calendar-doador-mobile">
                        <h3>Criação dos Horários de Agendamento</h3>
                        <p>Selecione uma data e um horário para gerar um novo horário para agendamento do Hemocentro</p>
                    </div>

                    <div class="criarAgenda-container">
                        <!--
                            <div class="criarAgenda-text">
                                <h1>Criar Agenda</h1>
                                <p>Para criar uma horário para agendamento basta seleciona uma data e uma horário e clicar no botão Criar Agenda!</p>
                            </div>
                        -->
                        <div class="form-criarAgenda-container">
                            <form action="criaAgenda.php" method="POST">
                                <div class="input-container">
                                    <input type="date" class="inputAgenda" name="DataAgenda" id="DataAgenda" required>
                                    <input type="time" class="inputAgenda" name="HoraAgenda" id="HoraAgenda" required>

                                    <div class="submitAgenda">
                                        <input type="hidden" name="CodHemocentro" value="<?php echo $CodHemocentro?>">
                                        <input type="submit" name="create" id="create" value="Criar Agenda">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="calendar-panel calendar-left-panel">

        <div class="content-calendar-doador">
            <h3>Criação dos Horários de Agendamento</h3>
            <p>Selecione uma data e um horário para gerar um novo horário para agendamento do Hemocentro</p>
        </div>

        <img src="img/online-calendar-animate.svg" class="image" alt="" />
    </div>

    <div class="container-delete-hemo-popup sucess-form-doacao">

        <div class="delete-hemo-popup-box">
            <img src="img/ok-animate.svg" alt="">
            <h1>Parabéns!</h1>
            <label>Você possui todos os atributos necessários para seguir com o agendamento da doação!</label>
            <div class="delete-hemo-btns">
                <button class="btn-formDoacao">Ok</button>
            </div>
        </div>

    </div>
    
</body>
</html>