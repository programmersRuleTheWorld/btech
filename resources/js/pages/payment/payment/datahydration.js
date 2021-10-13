//client application ajax event implementation

    if(window.location.pathname == '/payment') 
    {
        window.totalSelected = document.getElementById('totalSelected');
        var csrf = totalSelected.children[0].value;
        window.checkBoxes = document.getElementsByClassName('checkbox');
        window.payableArray = Array();

        for(i = 0; i < checkBoxes.length; i++)
        {            
            checkBoxes[i].onchange = function()
            {
                for(i = 0; i < checkBoxes.length; i++)
                {
                    if(checkBoxes[i].checked == true)
                    {
                        payableArray.push(checkBoxes[i].value);
                    }
                    else
                    {
                        payableArray.pop(checkBoxes[i].value);
                    }
                }

                const data = { 'payableArray': payableArray };
        
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

                paymentSubmission()
            }
        }   

        function paymentSubmission()
{
  const data = {'payableArray': payableArray, 'pathname': window.location.pathname}

  fetch("/paymentintent", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      'X-CSRF-TOKEN': csrf,
    },
    body: JSON.stringify(data),
  })
    .then(function(result) {
      return result.json();
    });  
}

    }