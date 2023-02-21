<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Openpay</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>

</head>
<body>
    <form action="#" method="POST" id="payment-form">
        <input type="hidden" name="token_id" id="token_id">
        <div class="pymnt-itm card active">
            <h2>Tarjeta de crédito o débito</h2>
            <div class="pymnt-cntnt">
                <div class="card-expl">
                    <div class="credit"><h4>Tarjetas de crédito</h4></div>
                    <div class="debit"><h4>Tarjetas de débito</h4></div>
                </div>
                <div class="sctn-row">
                    <div class="sctn-col l">
                        <label>Nombre del titular</label><input type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name">
                    </div>
                    <div class="sctn-col">
                        <label>Número de tarjeta</label><input type="text" autocomplete="off" data-openpay-card="card_number"></div>
                    </div>
                    <div class="sctn-row">
                        <div class="sctn-col l">
                            <label>Fecha de expiración</label>
                            <div class="sctn-col half l"><input type="text" placeholder="Mes" data-openpay-card="expiration_month"></div>
                            <div class="sctn-col half l"><input type="text" placeholder="Año" data-openpay-card="expiration_year"></div>
                        </div>
                        <div class="sctn-col cvv"><label>Código de seguridad</label>
                            <div class="sctn-col half l"><input type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2"></div>
                        </div>
                    </div>
                    <div class="openpay"><div class="logo">Transacciones realizadas vía:</div>
                    <div class="shield">Tus pagos se realizan de forma segura con encriptación de 256 bits</div>
                </div>
                <div class="sctn-row">
                    <a class="button rght" id="pay-button">Pagar</a>
                </div>
            </div>
        </div>
    </form>

    <?php
        $openpay = Openpay::getInstance('mzdtln0bmtms6o3kck8f',
            'sk_e568c42a6c384b7ab02cd47d2e407cab');

        $customer = array(
            'name' => $_POST["name"],
            'last_name' => $_POST["last_name"],
            'phone_number' => $_POST["phone_number"],
            'email' => $_POST["email"],);

        $chargeData = array(
            'method' => 'card',
            'source_id' => $_POST["token_id"],
            'amount' => (float)$_POST["amount"],
            'currency' => (float)$_POST["currency"],
            'description' => $_POST["description"],
            'device_session_id' => $_POST["deviceIdHiddenFieldName"],
            'customer' => $customer
        );

        $charge = $openpay->charges->create($chargeData);
    ?>
    
    <script type="text/javascript">
        $(document).ready(function() {
            OpenPay.setId('mzdtln0bmtms6o3kck8f');
            OpenPay.setApiKey('pk_f0660ad5a39f4912872e24a7a660370c');
            var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
        });

        $(document).ready(function() {
            OpenPay.setId('mzdtln0bmtms6o3kck8f');
            OpenPay.setApiKey('pk_f0660ad5a39f4912872e24a7a660370c');
            OpenPay.setSandboxMode(true);
        });

        $('#pay-button').on('click', function(event) {
            event.preventDefault();
            $("#pay-button").prop( "disabled", true);
            OpenPay.token.extractFormAndCreate('payment-form', success_callbak, error_callbak);                
        });

        var success_callbak = function(response) {
            var token_id = response.data.id;
            $('#token_id').val(token_id);
            $('#payment-form').submit();
        };

        var error_callbak = function(response) {
            var desc = response.data.description != undefined ? response.data.description : response.message;
            alert("ERROR [" + response.status + "] " + desc);
            $("#pay-button").prop("disabled", false);
        };
    </script>
</body>
</html>