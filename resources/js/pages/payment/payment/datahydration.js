//client application ajax event implementation

    if(window.location.pathname == '/payment') 
    {
        window.totalSelected = document.getElementById('totalSelected');
        window.csrf = totalSelected.children[0].value;
        window.checkBoxes = document.getElementsByClassName('checkbox');
        window.payableArray = Array();

        require('./paymentHydration');
        for(i = 0; i < checkBoxes.length; i++)
        {            
            checkBoxes[i].onchange = function()
            {
                    if(this.checked == true)
                    {
                        payableArray.push(this.value);
                    }
                    else
                    {
                        payableArray.pop(this.value);
                    }
                    paymentHydration(window.payableArray);
            }
        }   
    }