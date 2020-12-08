import datepicker from 'js-datepicker';

if(document.getElementById('due-date'))
{
    const picker = datepicker(document.getElementById('due-date'), {
        formatter: (input, date, instance) => {
            const value = date.toLocaleDateString();
            input.value = value;
        }
    });
}

if(document.getElementById('due-date2'))
{
    const picker2 = datepicker(document.getElementById('due-date2'), {
        formatter: (input, date, instance) => {
            const value = date.toLocaleDateString();
            input.value = value;
        }
    }); 
}