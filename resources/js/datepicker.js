import datepicker from 'js-datepicker';


const picker = datepicker(document.getElementById('due-date'), {
    formatter: (input, date, instance) => {
        const value = date.toLocaleDateString();
        input.value = value;
    }
});

const picker2 = datepicker(document.getElementById('due-date2'), {
    formatter: (input, date, instance) => {
        const value = date.toLocaleDateString();
        input.value = value;
    }
});