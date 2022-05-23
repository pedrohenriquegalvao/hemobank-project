<?php

    // Iniciando uma sessão
    session_start();

    // Realizando conexão com o BD
    include_once('config.php');

    // Verificar se está pegando o cod do Hemocentro pela URL
    if (isset($_GET['CodHemocentro']))
    {
        $CodHemocentro = $_GET['CodHemocentro'];
    }

    // Verifica se possui uma senha com algum CPF ou senha cadastrada
    if(!isset($_SESSION['cpf']) == true and (!isset($_SESSION['senha'])) == true) 
    {
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);
        header("Location: hemocentro.php?CodHemocentro=$CodHemocentro");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/65ea520fa5.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/93d18202e7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/navbar.js"></script>
    <script src="js/formDoador.js"></script>
</head>
<body>

    <div class="formdoacao-container">

            <div class="form-doacao">
                <h1 class="titleFormDoacao">Formulário de Doação</h1>
                <div class="perguntaFormDoacao">
                    <p>Caso seja do sexo feminino, está no período gestual?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="periodoGestual" id="periodoGestualSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="periodoGestual" id="periodoGestualNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Caso seja do sexo feminino, está no período de amamentação?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="amamentacao" id="amamentacaoSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="amamentacao" id="amamentacaoNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Apresentou gripe, resfriado e febre em um período de 7 dias antes da doação?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gripe" id="gripeSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gripe" id="gripeNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Ingeriu bebida alcóolica até 12 horas antes da doação?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="alcool" id="alcoolSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="alcool" id="alcoolNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Fez alguma tatuagem ou colocou piercing nos últimos 12 meses?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tatooPiercing" id="tatooPiercingSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tatooPiercing" id="tatooPiercingNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Possui alguma infecção sexualmente transmissível?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="InfeSex" id="InfeSexSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="InfeSex" id="InfeSexNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Possui alguma doença transmissível pelo sangue?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="doencaSangue" id="doencaSangueSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="doencaSangue" id="doencaSangueNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Realizou alguma transfusão de sangue nos últimos 12 meses?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="transfusao" id="transfusaoSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="transfusao" id="transfusaoNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Realizou alguma extração dentária nos últimos 14 dias?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="extraDente" id="extraDenteSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="extraDente" id="extraDenteNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Realizou exame de endoscopia nos últimos 6 meses?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="endoscopia" id="endoscopiaSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="endoscopia" id="endoscopiaNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Você teve/tem malária?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="malaria" id="malariaSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="malaria" id="malariaNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Você teve hepatite após os 11 anos de idade?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hepatite" id="hepatiteSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="hepatite" id="hepatiteNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <p>Você já utilizou alguma droga?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="droga" id="drogaSim" value="Sim">
                        <label class="form-check-label" for="flexRadioDefault1">Sim</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="droga" id="drogaNao" value="Não" checked>
                        <label class="form-check-label" for="flexRadioDefault2">Não</label>
                    </div>
                </div>
                <div class="perguntaFormDoacao">
                    <input type="text" name="peso" id="pesoDoador" placeholder="Qual o seu peso?" required pattern = "[0-9]+" title="O campo não pode estar em branco! | Só é aceito apenas número!">
                </div>
                <button class="formDoacao-btn" onclick="validacaoForm()">Enviar Formulário</button>
                
            </div>
    </div>

    <!-- POP UP ALERTA DELETAR -->
    
    <div class="container-delete-hemo-popup sucess-form-doacao">

        <div class="delete-hemo-popup-box">
          <img src="img/ok-animate.svg" alt="">
          <h1>Parabéns!</h1>
          <label>Você possui todos os atributos necessários para seguir com o agendamento da doação!</label>
          <div class="delete-hemo-btns">
            <button onclick="window.location.href='agendamento.html'" class="btn-formDoacao">Ok</button>
          </div>
        </div>

    </div>

    <div class="container-delete-hemo-popup unsucess-form-doacao">

        <div class="delete-hemo-popup-box">
          <img src="img/no-data-animate.svg" alt="">
          <h1>Inválido!</h1>
          <label>Infelizmente você não possui todos os atributos necessários para seguir com o agendamento da doação!</label>
          <div class="delete-hemo-btns">
            <button onclick="window.location.href='hemocentro.php?CodHemocentro=<?php echo $CodHemocentro ?>'" class="btn-formDoacao invalido">Ok</button>
          </div>
        </div>
    </div>

</body>
</html>