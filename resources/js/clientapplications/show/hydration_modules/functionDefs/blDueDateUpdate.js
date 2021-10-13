window.blDueDateUpdate =function blDueDateUpdate()
        {
          var blToken;

          if(this.classList.contains('jsCreated'))
          {
            blToken = this.parentNode.parentNode.children[4].value;
          }
          else
          {
            blToken = this.parentNode.children[1].value;
          }
    const data = { 
        'blDateField': this.parentNode.getElementsByClassName('blDateField')[0].value,
        'blToken': blToken,
    };

    fetch('/breakdownlists/blDateUpdate', {
      method: 'POST', // or 'PUT'
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrf,
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