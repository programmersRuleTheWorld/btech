//client application ajax event implementation

    if(window.location.pathname == '/payment') 
    {
        var totalSelected = document.getElementById('totalSelected');
        var csrf = totalSelected.children[0].value;
        var checkBoxes = document.getElementsByClassName('checkbox');
        var checkBoxesArray = Array();

        for(i = 0; i < checkBoxes.length; i++)
        {            
            checkBoxes[i].onchange = function()
            {
                var checkBoxesArray = Array();

                for(i = 0; i < checkBoxes.length; i++)
                {
                    if(checkBoxes[i].checked == true)
                    {
                    checkBoxesArray.push(checkBoxes[i].value);
                    }
                }

                const data = { 'checkBoxesArray': checkBoxesArray };
        
                fetch('/payment/hydration', {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                },
                body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.paymentDue)
                    totalSelected.textContent = '$' + data.paymentDue
                })
                .catch((error) => {
                console.error('Error:', error);
                });
            }
        }   

    }