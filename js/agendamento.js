function popUpConfirmagendamento()
{
    var btn_agendamento = document.querySelector('.container-delete-hemo-popup.agendamento');
    var btn_cancel = document.querySelector('.delete-hemo-btn1.cancelar-agendamento');
    var btn_confirm = document.querySelector('.delete-hemo-btn2.confirmar-agendamento');
    var pop_up_box = document.querySelector('.container-delete-hemo-popup');

    btn_agendamento.style.display = 'block';

    btn_cancel.addEventListener('click', function () 
    {
        pop_up_box.style.display = 'none';
        //document.location.reload(true);
    });
    btn_confirm.addEventListener('click', function () 
    {
        pop_up_box.style.display = 'none';
        window.location.href = 'criaAgendamento.php?CodHemocentro=$CodHemocentro&CodDoador=$CodDoador&DataAgendamento=$DataAgenda&Horario=$HorarioAgenda';
    });
}

// 'window.location.href=\"criaAgendamento.php?CodHemocentro=$CodHemocentro&CodDoador=$CodDoador&DataAgendamento=$DataAgenda&Horario=$HorarioAgenda\"'