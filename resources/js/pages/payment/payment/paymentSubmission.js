window.paymentSubmission = function paymentSubmission(payableArray)
{
const data = {'payableArray': window.payableArray, 'pathname': window.location.pathname}


fetch("/paymentintent", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        'X-CSRF-TOKEN': window.csrf,
    },
    body: JSON.stringify(data),
})
.then(function(result) {
    return result.json();
});  

console.log('Submission success!');
}
