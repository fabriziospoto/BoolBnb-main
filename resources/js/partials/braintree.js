// braintree
if (top.location.pathname === '/user/promo/' + $("input[name='apartment_id']").val() + "/" + $("input[name='promo_id']").val()) {

    var form = document.querySelector('#payment-form');
    var client_token = $('#token').val();
    braintree.dropin.create({
        authorization: client_token,
        locale: 'it_IT',
        selector: '#bt-dropin'
    }, function (createErr, instance) {
        if (createErr) {
            console.log('Create Error', createErr);
            return;
        }
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }
                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            });
        });
    });
}
