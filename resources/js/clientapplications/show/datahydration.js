//client application ajax event implementation

if (typeof (ref_id.value) != 'undefined') {
    if (typeof (ref_id.value) != 'undefined' && window.location.pathname == '/clientapplications/' + ref_id.value) 
    {
        window.csrf = document.getElementById('csrf').value
        window.blList = Array.from(document.getElementsByClassName('blList'));
        window.caPaymentButton = document.getElementById('caPaymentButton');
        window.paymentForm = document.getElementById('paymentForm');
        window.depositValue = document.getElementById('depositValue');
        window.paymentValue = document.getElementById('paymentValue');
        window.pBalance = document.getElementById('pBalance');

        require('./hydration_modules/onclicks');

    if(document.getElementsByClassName('commentCreateButton').length > 0)
    {
        var commentCreateButtons = document.getElementsByClassName('commentCreateButton');
        var commentField = document.getElementsByClassName('commentField');
    }
    
    if(document.getElementsByClassName('commentDeleteButton').length > 0)
    {
        var commentDeleteButtons = document.getElementsByClassName('commentDeleteButton');
        
    }
}
}