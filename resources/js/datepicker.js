import datepicker from 'js-datepicker';


const picker = datepicker(document.getElementById('due-date'), {
    formatter: (input, date, instance) => {
        const value = date.toLocaleDateString();
        input.value = value;
    }
});