function formulario()
{

    var nome = document.getElementById("nomeHemo").value;
    var nomeCont = document.getElementById("nomeHemo");

    var email = document.getElementById("emailHemo").value;
    var emailCont = document.getElementById("emailHemo");

    var telefone = document.getElementById("telefoneHemo").value;
    var telefoneCont = document.getElementById("telefoneHemo");

    var diretor = document.getElementById("diretorHemo").value;
    var diretorCont = document.getElementById("diretorHemo");

    var cidade = document.getElementById("cidadeHemo").value;
    var cidadeCout = document.getElementById("cidadeHemo");

    var bairro = document.getElementById("bairroHemo").value;
    var bairroCout = document.getElementById("bairroHemo");

    var rua = document.getElementById("ruaHemo").value;
    var ruaCont = document.getElementById("ruaHemo");

    var numero = document.getElementById("numeroHemo").value;
    var numeroCout = document.getElementById("numeroHemo");

    var mensagem = document.getElementById("mensagemCont").value;
    var mensagemCout = document.getElementById("mensagemCont");

    
    if(nome.length < 8 || nome == "")
    {
        nomeCont.style.border = "2px solid #FFA300";
        alert("O Nome do Hemocentro deve ter no mínimo 8 caracteres");
    }

    if(email.indexOf("@") == -1)
    {
        emailCont.style.border = "2px solid #FFA300";
        alert('Deve possuir "@" para validar o e-mail')
    }

    if(telefone.length < 5 || telefone == "")
    {
        telefoneCont.style.border = "2px solid #FFA300";
        alert("O telefone deve possuir no mínimo 8 caracteres");
    }
    
    if(diretor.length < 10 || diretor == "")
    {
        diretorCont.style.border = "2px solid #FFA300";
        alert("O campo Diretor deve possuir no mínimo 10 caracteres");
    }

    if(diretor.length > 320)
    {
        diretorCont.style.border = "2px solid #FFA300";
        alert("O campo Diretor deve possuir no máximo 320 caracteres");
    }

    if(cidade.length < 3 || cidade == "")
    {
        cidadeCout.style.border = "2px solid #FFA300";
        alert("O campo Cidade deve possuir no mínimo 3 caracteres");
    }

    if(cidade.length > 30)
    {
        cidadeCout.style.border = "2px solid #FFA300";
        alert("O campo Cidade deve possuir no máximo 30 caracteres");
    }

    if(bairro.length < 2 || bairro == "")
    {
        bairroCout.style.border = "2px solid #FFA300";
        alert("O campo Bairro deve possuir no mínimo 2 caracteres");
    }

    if(bairro.length > 30)
    {
        bairroCout.style.border = "2px solid #FFA300";
        alert("O campo Bairro deve possuir no máximo 30 caracteres");
    }

    if(rua.length < 5 || rua == "") 
    {
        ruaCont.style.border = "2px solid #FFA300";
        alert("O campo Rua deve possuir no mínimo 5 caracteres");
    }

    if(rua.length > 30)
    {
        ruaCont.style.border = "2px solid #FFA300";
        alert("O campo Rua deve possuir no máximo 30 caracteres");
    }

    if(numero.length < 1 || numero == "")
    {
        numeroCout.style.border = "2px solid #FFA300";
        alert("O campo Número deve possuir no mínimo 1 caracteres");
    }

    if(numero.length > 4)
    {
        numeroCout.style.border = "2px solid #FFA300";
        alert("O campo Número deve possuir no máximo 4 caracteres");
    }

    if(mensagem.length < 5 || mensagem == "")
    {
        mensagemCout.style.border = "2px solid #FFA300";
        alert("O campo Mensagem deve possuir no mínimo 5 caracteres");
    }

    if(mensagem.length > 300)
    {
        mensagemCout.style.border = "2px solid #FFA300";
        alert("O campo Bairro deve possuir no máximo 300 caracteres");
    }

    document.getElementById("nomeCont").value = "";
    document.getElementById("emailCont").value = "";
    document.getElementById("telefoneCont").value = "";
    document.getElementById("diretorCont").value = "";
    document.getElementById("cidadeCont").value = "";
    document.getElementById("bairroCont").value = "";
    document.getElementById("numeroCont").value = "";
    document.getElementById("mensagemCont").value = "";
}