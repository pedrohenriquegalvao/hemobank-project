function validacaoForm()
{
   periodoGestual = document.querySelector('input[name="periodoGestual"]:checked').value;
   amamentacao = document.querySelector('input[name="amamentacao"]:checked').value;
   gripe = document.querySelector('input[name="gripe"]:checked').value;
   alcool = document.querySelector('input[name="alcool"]:checked').value;
   tatooPiercing = document.querySelector('input[name="tatooPiercing"]:checked').value;
   InfeSex = document.querySelector('input[name="InfeSex"]:checked').value;
   doencaSangue = document.querySelector('input[name="doencaSangue"]:checked').value;
   transfusao = document.querySelector('input[name="transfusao"]:checked').value;
   extraDente = document.querySelector('input[name="extraDente"]:checked').value;
   endoscopia = document.querySelector('input[name="endoscopia"]:checked').value;
   malaria = document.querySelector('input[name="malaria"]:checked').value;
   hepatite = document.querySelector('input[name="hepatite"]:checked').value;
   droga = document.querySelector('input[name="droga"]:checked').value;
   peso = document.getElementById('pesoDoador').value;

   if (periodoGestual, amamentacao, gripe, alcool, tatooPiercing, InfeSex, doencaSangue, transfusao, extraDente, endoscopia, malaria, hepatite, droga != "Sim" & peso < 50 || peso > 200)
   {
       alert('testando validação!');
   }
   else
   {
       
   }
}