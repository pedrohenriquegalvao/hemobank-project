function sucessCalendar()
{
    DataAgenda = document.querySelector('#DataAgenda').value;
    HoraAgenda = document.querySelector('#HoraAgenda').value;
    sucessPopUp = document.querySelector('.container-delete-hemo-popup.sucess-form-doacao');

    if(DataAgenda != '' || HoraAgenda != '')
    {
        sucessPopUp.style.display = 'block';
    }

}