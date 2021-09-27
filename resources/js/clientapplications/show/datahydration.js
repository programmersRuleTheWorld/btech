//client application ajax event implementation

if (typeof (ref_id.value) != 'undefined') {
    if (typeof (ref_id.value) != 'undefined' && window.location.pathname == '/clientapplications/' + ref_id.value) 
    {
        var csrf = document.getElementById('csrf').value
        window.caPaymentButton = document.getElementById('caPaymentButton');
        window.paymentForm = document.getElementById('paymentForm');

        //onClick buttons

        if(document.getElementsByClassName('blDateUpdateButton').length > 0)
        {
            var blDateUpdateButtons = document.getElementsByClassName('blDateUpdateButton');
            for(i=0;blDateUpdateButtons.length > i;i++)
            {
                blDateUpdateButtons[i].onclick = function()
                {
                    const data = { 
                        'blDateField': this.parentNode.getElementsByClassName('blDateField')[0].value,
                        'blToken': this.parentNode.children[1].value,
                    };

                    fetch('/breakdownlists/blDateUpdate', {
                      method: 'POST', // or 'PUT'
                      headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.parentNode.parentNode.children[0].value,
                      },
                      body: JSON.stringify(data),
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.parentNode.getElementsByClassName('blDateField')[0].value = data.blDateFieldResponse
                      console.log('Success:', data.blDateFieldResponse);
                    })
                    .catch((error) => {
                      console.error('Error:', error);
                    });                    
                }
            }
        }
        
        if(document.getElementsByClassName('blCreateButton').length > 0)
        {
            var blCreateButtons = document.getElementsByClassName('blCreateButton');
            
        }
        
        if(document.getElementsByClassName('blDeleteButton').length > 0)
        {
            var blField = document.getElementsByClassName('blField');
            var blDeleteButtons = document.getElementsByClassName('blDeleteButton');
            
        }
        
        if(document.getElementsByClassName('biStatusUpdateButton').length > 0)
        {
            var biStatusUpdateButtons = document.getElementsByClassName('biStatusUpdateButton');
            
            for(i=0;i<biStatusUpdateButtons.length;i++)
            {
                biStatusUpdateButtons[i].onclick = function(){
                    var biStatusField = this.parentNode.parentNode.getElementsByClassName('biStatusField')[0];
                    var blStatusField = this.parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByClassName('blStatusField')[0];
                    var blHeader = blStatusField.parentNode.parentNode.getElementsByClassName('bl-header')[0];

                    const data = { 'biToken': this.parentNode.children[0].value };
                    
                    fetch('/breakdownitems/biStatusUpdate', {
                        method: 'POST', // or 'PUT'
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': this.parentNode.children[1].value,
                        },
                        body: JSON.stringify(data),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.biStatus == false)
                        {
                            biStatusField.className = 'bg-danger border border-info biStatusField';
                            biStatusField.textContent = 'INCOMPLETE';
                        }
                        else if(data.biStatus == true)
                        {
                            biStatusField.className = 'bg-success border border-info biStatusField';
                            biStatusField.textContent = 'COMPLETE';
                        }
                        if(data.blStatus == false)
                        {
                            blHeader.className = 'card-header bl-header incomplete text-light row';
                            blStatusField.textContent = 'INCOMPLETE';
                            blStatusField.className = 'incomplete border border-info blStatusField';
                        }
                        else if(data.blStatus == true)
                        {
                            blHeader.className = 'card-header bl-header complete text-light row';
                            blStatusField.textContent = 'COMPLETE';
                            blStatusField.className = 'complete border border-info blStatusField';
                        }
                    })
                    .catch((error) => {
                    console.log(error)
                        biStatusField.className = 'bg-warning border border-info biStatusField';
                        biStatusField.textContent = 'ERROR, try again';
                });
            }
        }
    }
    
    if(document.getElementsByClassName('biCreateButton').length > 0)
    {
        var biCreateButtons = document.getElementsByClassName('biCreateButton');
    }
    
    if(document.getElementsByClassName('biDeleteButton').length > 0)
    {
        var biDeleteButtons = document.getElementsByClassName('biDeleteButton');
        var biField = document.getElementsByClassName('biField');
        var biPriceUpdateButtons = document.getElementsByClassName('biPriceUpdateButton');
        
        for(i=0;i<biField.length;i++)
        {
            biDeleteButtons[i].onclick = function()
            {   
                var pBalance = document.getElementById('pBalance');
                var blPriceField = this.parentNode.parentNode.parentNode.getElementsByClassName('blPriceField');
                // price field console.log(this.parentNode.parentNode.children[7])
                const data = { 'biToken': this.parentNode.parentNode.children[4].children[0].value };
                
                fetch('/breakdownitems/biDelete', {
                    method: 'POST', // or 'PUT'
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.parentNode.children[0].value,
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(data => {
                                console.log(blPriceField);
                                pBalance.textContent = ('$' + data.newProjectBalance);
                                blPriceField[0].textContent = ('$' + data.newListBalance);
                                this.parentNode.parentNode.style.display = 'none';
                                console.log('Success:', 'Item has been deleted!');
                            })
                            .catch((error) => {
                                console.error('Error:', error);
                            });
                }

                biPriceUpdateButtons[i].onclick = function()
                {
                    var pBalance = document.getElementById('pBalance');
                    var blPriceField = this.parentNode.parentNode.parentNode.getElementsByClassName('blPriceField');
                    var biPriceField = this.parentNode.parentNode.getElementsByClassName('biPriceField');
                    var biPriceUpdateButtons = this.parentNode.parentNode.getElementsByClassName('blPriceUpdateButton');

                    // price field console.log(this.parentNode.parentNode.children[7])
                    const data = { 
                        'biToken': this.parentNode.parentNode.children[4].children[0].value, 
                        'biPrice': this.parentNode.children[1].value,
                    };
                    
                    fetch('/breakdownitems/biPriceUpdate', {
                        method: 'POST', // or 'PUT'
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': this.parentNode.children[0].value,
                        },
                        body: JSON.stringify(data),
                    })
                    .then(response => response.json())
                    .then(data => {
                                    pBalance.textContent = ('$' + data.newProjectBalance);
                                    blPriceField[0].textContent = ('$' + data.newListBalance);
                                    biPriceField[0].textContent = ('$' + data.newItemBalance);
                                    if(data.newItemBalance > 0)
                                    {
                                        biPriceField[0].className = 'text-success bg-dark text-left border border-info biPriceField'
                                    }
                                    else if(data.newItemBalance <= 0)
                                    {
                                        biPriceField[0].className = 'text-danger bg-dark text-left border border-info biPriceField'
                                        biPriceField[0].textContent = 'NO CHARGE';
                                    }

                                    if(data.CAStatus == 'deposit')
                                    {
                                        caPaymentButton.textContent = 'Make Deposit';
                                        caPaymentButton.action = "route('client_application_deposit')"
                                        caPaymentButton.method = 'POST'
                                        caPaymentButton.className = 'btn btn-dark text-info';
                                    }
                                    else if(data.CAStatus == 'payment')
                                    {
                                        caPaymentButton.textContent = 'Make Payment';
                                        caPaymentButton.action = "route('client_application_payment')"
                                        caPaymentButton.method = 'POST'
                                        caPaymentButton.className = 'btn btn-dark text-info';
                                    }
                                    else if(data.CAStatus == 'nocharge')
                                    {
                                        caPaymentButton.textContent = 'No Charge';
                                        caPaymentButton.className = 'btn btn-dark text-info disabled';
                                    }
    
                                    console.log('Success:', 'Price has been updated!');
                                })
                                .catch((error) => {
                                    console.error('Error:', error);
                                });                }
            }
        }
        
        
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