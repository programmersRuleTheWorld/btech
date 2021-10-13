window.biStatusUpdate = function biStatusUpdate() {
    var biStatusField = this.parentNode.parentNode.getElementsByClassName('biStatusField')[0];
    var blStatusField = this.parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByClassName('blStatusField')[0];
    if(this.classList.contains('jsCreated'))
    {
    console.log('jsCreated')
    var blHeader = blStatusField.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByClassName('bl-header')[0];
    }
    else
    {
    console.log('HTML')
    var blHeader = blStatusField.parentNode.parentNode.parentNode.getElementsByClassName('bl-header')[0];
    }
    var data = {
      'biToken': this.parentNode.children[0].value
    };
    fetch('/breakdownitems/biStatusUpdate', {
      method: 'POST',
      // or 'PUT'
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrf
      },
      body: JSON.stringify(data)
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      if (data.biStatus == false) {
        biStatusField.className = 'bg-danger border border-info biStatusField';
        biStatusField.textContent = 'INCOMPLETE';
      } else if (data.biStatus == true) {
        biStatusField.className = 'bg-success border border-info biStatusField';
        biStatusField.textContent = 'COMPLETE';
      }

      if (data.blStatus == false) {
        blHeader.className = 'card-header bl-header bg-danger text-light';
        blStatusField.textContent = 'INCOMPLETE';
        blStatusField.className = 'incomplete border border-info blStatusField';
      } else if (data.blStatus == true) {
        blHeader.className = 'card-header bl-header bg-success text-light';
        blStatusField.textContent = 'COMPLETE';
        blStatusField.className = 'complete border border-info blStatusField';
      }
    })["catch"](function (error) {
      console.log(error);
      biStatusField.className = 'bg-warning border border-info biStatusField';
      biStatusField.textContent = 'ERROR, try again';
    });
  }