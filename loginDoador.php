<?php 
    session_start(); 
    //Utilizado *sempre* que iniciar uma sessão (colocado somente depois de ter certeza que o SELECT está funcionando)
    
    //print_r($_REQUEST);
    
    if (isset($_POST['submit']) && !empty($_POST["cpf"]) && !empty($_POST["senha"])) 
    //Verifica se há variáveis sendo passadas pela URL
    {
        include_once('config.php');
        $cpf = $_POST["cpf"];
        $senha = $_POST["senha"];


        $sql = "SELECT * FROM Doador WHERE CPF='$cpf' AND Senha=MD5('$senha')";
        //verifica se há algum registro com esse cpf e essa senha

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1) // se não houver registro com esse cpf e senha, retorna para o loginDoador
        {
            unset($_SESSION["cpf"]); 
            unset($_SESSION["senha"]);
            //Destrói essas variáveis de sessão pois não vai ser possível iniciar uma sessão, já que não há nenhum doador com esse cpf e senha.
           header("Location: loginDoador.php");
        }
        else 
        {
            $_SESSION["cpf"] = $cpf; 
            $_SESSION["senha"] = $senha;
            header("Location: perfilDoador.php");
        }
    } 
    else // caso tente colocar a URL na mão, não irá passar nenhuma variável e vai voltar para a tela anterior
    {
        header("Location: formularioDoador.php");
    }

?>