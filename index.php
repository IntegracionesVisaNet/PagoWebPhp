<?php
    include 'config/functions.php';
    $amount = 1;
    $detallePago = "Detalle de pago";

    $token = generateToken();
    $sesion = generateSesion($amount, $token);
    $purchaseNumber = generatePurchaseNumber();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $detallePago ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

    <br>

    <div class="container">
        <h1 class="text-center">Pago con Visa</h1>
        <hr>
        <h3>Información del pago</h3>
        <b style="padding-left:20px;">Importe a pagar: </b> S/. <?php echo $amount; ?> <br>
        <b style="padding-left:20px;">Número de pedido: </b> <?php echo $purchaseNumber; ?> <br>
        <b style="padding-left:20px;">Concepto: </b> <?php echo $detallePago; ?> <br>
        <b style="padding-left:20px;">Fecha: </b> <?php echo date("d/m/Y"); ?> <br>
        <hr>
        <!-- <h3>Realiza el pago</h3> -->
        <input type="checkbox" name="ckbTerms" id="ckbTerms" onclick="visaNetEc3()"> <label for="ckbTerms">Acepto los <a href="#" target="_blank">Términos y condiciones</a></label>
        <form id="frmVisaNet" action="http://localhost:8082/PagoWebPhp/finalizar.php?amount=<?php echo $amount;?>&purchaseNumber=<?php echo $purchaseNumber?>">
            <script src="<?php echo VISA_URL_JS?>" 
                data-sessiontoken="<?php echo $sesion;?>"
                data-channel="web"
                data-merchantid="<?php echo VISA_MERCHANT_ID?>"
                data-merchantlogo="http://localhost:8082/PagoWebPhp/assets/img/logo.png"
                data-purchasenumber="<?php echo $purchaseNumber;?>"
                data-amount="<?php echo $amount; ?>"
                data-expirationminutes="5"
                data-timeouturl="http://localhost:8082/PagoWebPhp/"
            ></script>
        </form>
    </div>
    
</body>
<script src="assets/js/script.js"></script>
</html>