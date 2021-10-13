//client application ajax event implementation

if(window.location.pathname == '/deposit') 
{
    var totalSelected = document.getElementById('totalSelected');
    window.breakdownLists = document.getElementsByClassName('breakdownlist');
    window.payableArray = Array();

            for(i = 0; i < breakdownLists.length; i++)
            {
                payableArray.push(breakdownLists[i].value);
            }
}   