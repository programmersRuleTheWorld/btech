//client application ajax event implementation

if(window.location.pathname == '/deposit') 
{
    window.totalSelected = document.getElementById('totalSelected');
    window.csrf = totalSelected.children[0].value;
    window.breakdownLists = document.getElementsByClassName('breakdownlist');
    window.payableArray = Array();

            for(i = 0; i < breakdownLists.length; i++)
            {
                payableArray.push(breakdownLists[i].value);
            }
            require('../payment/paymentSubmission');
            paymentSubmission(window.payableArray);
}   