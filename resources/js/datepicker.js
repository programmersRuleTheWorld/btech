import datepicker from 'js-datepicker';

if(document.getElementsByClassName('due-date') != typeof('undefined'))
{

    var elems = document.getElementsByClassName('due-date')
    var array = Array.from(elems)
    array.forEach((element) =>
    datepicker(element, {
        formatter: (input, date, instance) => {
            const value = date.toLocaleDateString();
            input.value = value;
        }
    })
    )

}