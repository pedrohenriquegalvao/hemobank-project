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
</head>

<body>
  
  <div class="container-form-doador">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="loginDoador.php" method="POST" class="sign-in-form">
          <h2 class="title-form-doador">Login</h2>

          <div class="input-field-form-doador">
            <i class="fas fa-solid fa-barcode"></i>
            <input type="text" oninput="mascara(this)" placeholder="CPF" name="cpf" required maxlength="14" title="O campo deve ser preenchido da seguinte maneira: 000.000.000-00" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" />
          </div>

          <div class="input-field-form-doador">
            <i class="fas fa-lock"></i>
            <input type="password" name="senha" placeholder="Senha" />
          </div>

          <input type="submit" name="submit" value="Login" class="Cadastrobtn solid" />
          
        </form>



        <form action="cadastroDoador.php" method="post" class="sign-up-form">
          <h2 class="title-form-doador cadastro">Cadastro</h2>

          <div class="input-field-form-doador">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Nome" name="nomeDoador" pattern="[a-zA-Z\u00C0-\u00FF ]{6,100}$" required title="O nome deve possuir no máximo 100 caracteres!"/>
          </div>

          <div class="input-field-form-doador">
            <i class="fas fa-solid fa-barcode"></i>
            <input type="text" oninput="mascara(this)" placeholder="CPF" name="CPFDoador" required maxlength="14" title="O campo deve ser preenchido da seguinte maneira: 000.000.000-00" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" />
          </div>

          <div class="input-field-form-doador">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="emailDoador" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="O email deve ser inserido da seguinte forma: exemplo@exemplo.com" required/>
          </div>

          <div class="input-field-form-doador">
            <i class="fas fa-solid fa-calendar"></i>
            <input type="text" placeholder="Data de Nascimento" pattern="\d{1,2}/\d{1,2}/\d{4}" name="dataNascDoador" maxlength="10" class="js-date" title="Deve possuir o seguinte formato: 00/00/0000"/>
          </div>

          <div class="input-field-form-doador">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Senha" name="senhaDoador" id="senha" maxlength="32"/>
          </div>

          <div class="input-field-form-doador">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirmar Senha" id="confirmSenha" maxlength="32"/>
          </div>

          <input type="submit" class="Cadastrobtn" value="Cadastrar" name="CadastrobtnDoador"/>

        </form>

      </div>
    </div>

    <div class="panels-container">
      
      <div class="panel left-panel">
        
        <div class="content-form-doador">
          <h3>Não possui cadastro?</h3>
          <p>
            Clique no botão abaixo para realizar cadastro em nosso site e ter acesso a todas as funcionalidades do doador!
          </p>
          <button class="transparentbtn" id="sign-up-btn">CADASTRAR</button>
        </div>
        <img src="img/blood-donation-animate-cadastro.svg" class="image" alt="" />
      </div>

      <div class="panel right-panel">
        <div class="content-form-doador">
          <h3>Já possui cadastro?</h3>
          <p>
            Clique no botão abaixo para ser redirecionado para a tela de login!
          </p>
          <button class="transparentbtn" id="sign-in-btn">REALIZAR LOGIN</button>
        </div>
        <img src="img/blood-donation-animate-login.svg" class="image" alt="" />
      </div>

    </div>
  </div>

  <script src="js/formularioDoador.js"></script>
  
</body>

<script>

  // MASCARA PARA O INPUT CPF

  function mascara(i)
  {
    
    var v = i.value;
    
    if(isNaN(v[v.length-1]))
    {
      // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
    }
    
    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";

  }

  // MASCARA DO INPUT DATA

  var input = document.querySelectorAll('.js-date')[0];
  
  var dateInputMask = function dateInputMask(elm) 
  {
    elm.addEventListener('keypress', function(e) 
    {
      if(e.keyCode < 47 || e.keyCode > 57) 
      {
        e.preventDefault();
      }
      
      var len = elm.value.length;
      
      // If we're at a particular place, let the user type the slash
      // i.e., 12/12/1212
      if(len !== 1 || len !== 3) 
      {
        if(e.keyCode == 47) 
        {
          e.preventDefault();
        }
      }
      
      // If they don't add the slash, do it for them...
      if(len === 2) 
      {
        elm.value += '/';
      }

      // If they don't add the slash, do it for them...
      if(len === 5) 
      {
        elm.value += '/';
      }
    });
  };
  
  dateInputMask(input);

  // VALIDAR CAMPO SENHA

  var password = document.getElementById("senha");
  var confirm_password = document.getElementById("confirmSenha");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("As senhas não estão iguais!");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;

</script>

</html>