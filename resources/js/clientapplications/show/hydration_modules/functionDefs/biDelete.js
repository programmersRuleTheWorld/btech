window.biDelete = function biDelete()
        {
            var blPriceField = this.parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByClassName('blPriceField')[0];

            const data = { 
                'biToken': this.parentNode.parentNode.children[4].children[0].value,
            };

            fetch('/breakdownitems/biDelete', {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf,
            },
            body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                if(data.deleted == true)
                {
                    this.parentNode.parentNode.style.display = 'none';
                    pBalance.textContent = ('Project Balance: $' + data.newProjectBalance);
                    blPriceField.textContent = '$' + data.listBalance;

                    console.log(blPriceField)
                }
            })
            .catch((error) => {
            console.error('Error:', error);
            });

        }