const { datepicker } = require("js-datepicker");

window.blCreate =            function blCreate()
            {
                    const data = { 
                    'blTitle':blTitle.value,
                    'blDateField':blDateField.value,
                    'blDescription':blDescription.value,  
                    'ref_id':ref_id.value,
                };
                
                fetch('/breakdownlists/blCreate', {
                    method: 'POST', // or 'PUT'
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(data => {
                    var col = document.createElement('div');
                    col.className = 'col-md-12 mb-2 bl';
                    var card = document.createElement('div');
                    card.className = 'card bg-info';
                    var cardHeader = document.createElement('div');
                    cardHeader.className = 'card-header bl-header bg-danger text-light';
                    var newBlTitle = document.createElement('h3');
                    newBlTitle.className = 'text-center';
                    newBlTitle.textContent = data.blTitle;
                    var newBlState = document.createElement('h3');
                    newBlState.className = 'bl-header-state ml-auto';
                    var cardBody = document.createElement('div');
                    cardBody.className = 'card-body bl-body';
                    var blDueDate = document.createElement('input');
                    blDueDate.className = 'form-control form-control-sm col-md-3 due-date blDateField';
                    blDueDate.value = data.blDateField;
                    var blDescription = document.createElement('div');
                    blDescription.className = 'text-left';
                    blDescription.textContent = data.blDescription;
                    var dueDateFormGroup = document.createElement('div');
                    dueDateFormGroup.className = 'form-group';
                    var newBlToken = document.createElement('input');
                    newBlToken.type = 'hidden';
                    newBlToken.className = 'blToken';
                    newBlToken.value = data.newBlToken;
                    var blDateUpdateButton = document.createElement('button');
                    blDateUpdateButton.className = 'btn btn-dark text-info m-2 blDateUpdateButton jsCreated';
                    blDateUpdateButton.textContent = "Update";
                    var blStatusField = document.createElement('div');
                    blStatusField.className = 'incomplete border border-info blStatusField';
                    blStatusField.textContent = 'INCOMPLETE';
                    var blDeleteButton = document.createElement('button');
                    blDeleteButton.className = 'btn btn-dark text-info blDeleteButton jsCreated';
                    blDeleteButton.textContent = 'Delete';
                    var biRow = document.createElement('div');
                    biList = document.createElement('div');
                    biList.className = 'biList';
                    biRow.className = 'row m-2';
                    var biCol = document.createElement('div');
                    biCol.className = 'col-md';
                    var biDescription = document.createElement('textarea');
                    biDescription.className = 'form-control mb-1';
                    biDescription.id = 'item_description';
                    biDescription.placeholder = 'Item Description...';
                    var frontendFormGroup = document.createElement('div');
                    frontendFormGroup.className = 'form-group';
                    var biFrontend = document.createElement('select');
                    biFrontend.className = 'form-control mb-1';
                    biFrontend.add(option1 = new Option('Backend', '0'));
                    biFrontend.add(option2 = new Option('Frontend', '1'));
                    var biCreateButton = document.createElement('button');
                    biCreateButton.className = 'btn-dark text-info mt-2';
                    biCreateButton.textContent = "Submit";
                    var priceRow = document.createElement('div');
                    priceRow.className = 'row';
                    var subtotalCol = document.createElement('div');
                    subtotalCol.textContent = 'Subtotal:'
                    subtotalCol.className = 'col col-md-3';
                    var blPriceField = document.createElement('div');
                    blPriceField.className = 'text-success bg-dark text-left border border-info blPriceField col-md-3';
                    blPriceField.textContent = '$0.00';
                    
                    priceRow.appendChild(subtotalCol);
                    priceRow.appendChild(blPriceField);

                    col.appendChild(card);
                    card.appendChild(cardHeader);
                    card.appendChild(cardBody);
                    cardHeader.appendChild(newBlTitle);
                    newBlTitle.appendChild(newBlState);
                    dueDateFormGroup.appendChild(blDueDate);
                    dueDateFormGroup.appendChild(blDateUpdateButton);
                    frontendFormGroup.appendChild(biFrontend);
                    frontendFormGroup.appendChild(biDescription);
                    frontendFormGroup.appendChild(biCreateButton);
                    cardBody.appendChild(biRow);
                    biRow.appendChild(biList);
                    biList.appendChild(biCol);
                    biCol.appendChild(blStatusField);
                    biCol.appendChild(dueDateFormGroup);
                    biCol.appendChild(blDeleteButton);
                    biCol.appendChild(frontendFormGroup);
                    biCol.appendChild(newBlToken);
                    cardBody.appendChild(priceRow);
                    
                    blList[0].appendChild(col);
                    dateArray.push(blDueDate);
                    
                    biCreateButton.addEventListener("click", biCreate);
                    blDateUpdateButton.addEventListener("click", blDueDateUpdate);
                    blDeleteButton.addEventListener("click", blDelete);
                    
                    
                    for(var i = 0; i < cardBodies.length; i++)
                    {
                        cardBody.style.display = 'none';
                        newBlState.textContent = ' [HIDE MODE]';
                        
                        cardHeader.onclick = function()
                        {
                            if(cardBody.style.display == 'none')
                            {
                                newBlState.textContent = '[VIEW MODE]';
                                cardBody.style.display = 'block';
                            }
                            else if(cardBody.style.display = 'block')
                            {
                                newBlState.textContent = '[HIDE MODE]';
                                cardBody.style.display = 'none';
                            }
                        }
                    }                    
                })
                .catch((error) => {
                    console.log(error)
                });            
            }