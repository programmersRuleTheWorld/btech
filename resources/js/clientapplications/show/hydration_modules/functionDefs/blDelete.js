window.blDelete = function blDelete()
                {
                    var blToken;
                    if(this.classList.contains('jsCreated'))
                    {
                        console.log('jsCreated')
                        blToken = this.parentNode.children[4].value;
                    }
                    else
                    {
                        console.log('HTML')
                        blToken = this.parentNode.children[1].children[1].value
                    }
                
                    const data = { 'blToken': blToken };
                    
                    fetch('/breakdownlists/blDelete', {
                        method: 'POST', // or 'PUT'
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrf,
                        },
                        body: JSON.stringify(data),
                    })
                    .then(response => response.json())
                    .then(data => {
                        
                        if(data.deleted === true)
                        {
                            if(this.classList.contains('jsCreated'))
                            this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.style.display = 'none';
                            else
                            this.parentNode.parentNode.parentNode.style.display = 'none';
                        }
                    })
                    .catch((error) => {
                    console.log(error)
    
                });
            }