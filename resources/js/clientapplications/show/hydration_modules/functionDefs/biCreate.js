require('./biDelete');
require('./biStatusUpdate');
require('./biPriceUpdate');

window.biCreate =        function biCreate()
        {
            const data = { 
                'biDescription': this.parentNode.children[1].value,
                'biFrontend': this.parentNode.children[0].value,
                'ref_id': ref_id.value,
                'parent_list_id': this.parentNode.parentNode.children[4].value, 
            };

            fetch('/breakdownitems/biCreate', {
            method: 'POST', // or 'PUT'
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf
            },
            body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(data => {
                var bi = document.createElement('div');
                bi.className = 'row text-center biField';
                var biCountCol = document.createElement('div');
                biCountCol.className = 'col';
                biCountCol.textContent = 1;
                var biDescriptionCol = document.createElement('div');
                biDescriptionCol.className = 'col';
                var biDescription = document.createElement('b');
                biDescription.textContent = data.biDescription;
                var biStatusCol = document.createElement('div');
                biStatusCol.className = 'col';
                var biTokenInput = document.createElement('input');
                biTokenInput.className = 'itemId';
                biTokenInput.type = 'hidden';
                var biStatus = document.createElement('div');
                biStatus.className = 'bg-danger border border-info biStatusField';
                biStatus.textContent = 'INCOMPLETE';
                var biStatusButtonCol = document.createElement('div');
                biStatusButtonCol.className = 'col';
                var biStatusButton = document.createElement('button');
                biStatusButton.className = 'btn btn-dark text-info biStatusUpdateButton jsCreated';
                biStatusButton.textContent = 'Status';
                var biDeleteButtonCol = document.createElement('div');
                biDeleteButtonCol.className = 'col';
                var biDeleteButton = document.createElement('button');
                biDeleteButton.className = 'btn btn-dark text-info biDeleteButton';
                biDeleteButton.textContent = 'Delete';
                var biUpdatedAtCol = document.createElement('div');
                biUpdatedAtCol.className = 'col';
                var biUpdatedAt = document.createElement('div');
                biUpdatedAt.textContent = data.biUpdatedAt;
                var biPriceCol = document.createElement('div');
                biPriceCol.className = 'col';
                var biPrice = document.createElement('input');
                biPrice.value = data.biPrice;
                biPrice.className = 'form-control biPriceValue';
                var biPriceUpdateButtonCol = document.createElement('div');
                biPriceUpdateButtonCol.className = 'col';
                var biPriceUpdateButton = document.createElement('button');
                biPriceUpdateButton.className = 'btn btn-dark text-info m-2 biPriceUpdateButton';
                biPriceUpdateButton.textContent = 'Submit';
                var noChargeCol = document.createElement('div');
                noChargeCol.className = 'text-danger bg-dark text-left border border-info biPriceField col-md-3';
                noChargeCol.textContent = 'NO CHARGE';

                
                bi.appendChild(biCountCol);
                bi.appendChild(biDescriptionCol);
                bi.appendChild(biStatusCol);
                bi.appendChild(biUpdatedAtCol);
                bi.appendChild(biStatusButtonCol);
                bi.appendChild(biDeleteButtonCol);
                bi.appendChild(biPriceCol);
                bi.appendChild(noChargeCol);
                
                //biCountCol.appendChild(biCount);
                biDescriptionCol.appendChild(biDescription);
                biStatusCol.appendChild(biStatus);
                biStatusButtonCol.appendChild(biTokenInput);
                biStatusButtonCol.appendChild(biStatusButton);
                biDeleteButtonCol.appendChild(biDeleteButton);
                biUpdatedAtCol.appendChild(biUpdatedAt);
                biPriceCol.appendChild(biPrice);
                biPriceCol.appendChild(biPriceUpdateButton);
                thisBiList = this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName('biList')[0];
                thisBiList.appendChild(bi);
                biTokenInput.value = data.biToken;
                
                biPriceUpdateButton.addEventListener("click", biPriceUpdate)
                biStatusButton.addEventListener("click", biStatusUpdate)
                biDeleteButton.addEventListener("click", biDelete)
            })
            .catch((error) => {
                console.error('Error:', error);
                
            });
        }
