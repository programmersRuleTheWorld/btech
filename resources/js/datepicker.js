import datepicker from 'js-datepicker';

window.datePicker = function datePicker()
{
    var elems = document.getElementsByClassName('due-date')
    window.dateArray = Array.from(elems)
    dateArray.forEach((element) =>
    datepicker(element, {
        formatter: (input, date, instance) => {
            const value = date.toLocaleDateString();
            input.value = value;
        }
    })
    )
}



if(document.getElementsByClassName('due-date') != typeof('undefined'))
{
    datePicker();
}