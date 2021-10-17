window.biPriceUpdate =        function biPriceUpdate()
            {
                var blPriceField = this.parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByClassName('blPriceField');
                var biPriceField = this.parentNode.parentNode.getElementsByClassName('biPriceField');
                var biPriceValue = this.parentNode.parentNode.getElementsByClassName('biPriceValue');
                var biToken = this.parentNode.parentNode.children[4].children[0].value;

            const data = {                        
                    'biToken': biToken, 
                    'biPrice': biPriceValue[0].value,
                };
                
                fetch('/breakdownitems/biPriceUpdate', {
                    method: 'POST', // or 'PUT'
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(data => {
                                pBalance.textContent = ('Project Balance: $' + data.newProjectBalance);
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
                                    paymentForm.action = depositValue.value;
                                    caPaymentButton.className = 'btn btn-dark text-info';
                                }
                                else if(data.CAStatus == 'payment')
                                {
                                    caPaymentButton.textContent = 'Make Payment';
                                    paymentForm.action = paymentValue.value;
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
                            });
                        }