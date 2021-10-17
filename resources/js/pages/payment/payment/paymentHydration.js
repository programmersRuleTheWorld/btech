window.paymentHydration = function paymentHydration(payableArray)
{
    console.log(window.payableArray);
    const data = { 'payableArray': window.payableArray };
            
    fetch('/payment/hydration', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.csrf,
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        console.log('paymentDue: ' + data.paymentDue)
        window.totalSelected.textContent = '$' + data.paymentDue

        require('./paymentSubmission');
        paymentSubmission(window.payableArray);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}