<?php
    include 'config/functions.php';
    $transactionToken = $_POST["transactionToken"];
    $email = $_POST["customerEmail"];
    $amount = $_GET["amount"];
    $purchaseNumber = $_GET["purchaseNumber"];    

    if ($channel == "pagoefectivo") {
        // CIP => $transactionToken
        // Registrar código CIP en su BD y asociarlo al pedido
        $url = $_POST["url"];
        header('Location: '.$url);
        exit;
    } else {   
        $token = generateToken();
        $data = generateAuthorization($amount, $purchaseNumber, $transactionToken, $token);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Respuesta de pago</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

    <br>

    <div class="container">
        <?php 
            if (isset($data->dataMap)) {
                if ($data->dataMap->ACTION_CODE == "000") {
                    $c = preg_split('//', $data->dataMap->TRANSACTION_DATE, -1, PREG_SPLIT_NO_EMPTY);
                    ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $data->dataMap->ACTION_DESCRIPTION;?>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <b>Número de pedido: </b> <?php echo $purchaseNumber; ?>
                            </div>
                            <div class="col-md-12">
                                <b>Fecha y hora del pedido: </b> <?php echo $c[4].$c[5]."/".$c[2].$c[3]."/".$c[0].$c[1]." ".$c[6].$c[7].":".$c[8].$c[9].":".$c[10].$c[11]; ?>
                            </div>
                            <div class="col-md-12">
                                <b>Tarjeta: </b> <?php echo $data->dataMap->CARD." (".$data->dataMap->BRAND.")"; ?>
                            </div>
                            <div class="col-md-12">
                                <b>Importe pagado: </b> <?php echo $data->order->amount. " ".$data->order->currency; ?>
                            </div>
                        </div>
                    <?php
                }
            } else {
                $c = preg_split('//', $data->data->TRANSACTION_DATE, -1, PREG_SPLIT_NO_EMPTY);
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $data->data->ACTION_DESCRIPTION;?>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <b>Número de pedido: </b> <?php echo $purchaseNumber; ?>
                        </div>
                        <div class="col-md-12">
                            <b>Fecha y hora del pedido: </b> <?php echo $c[4].$c[5]."/".$c[2].$c[3]."/".$c[0].$c[1]." ".$c[6].$c[7].":".$c[8].$c[9].":".$c[10].$c[11]; ?>
                        </div>
                        <div class="col-md-12">
                            <b>Tarjeta: </b> <?php echo $data->data->CARD." (".$data->data->BRAND.")"; ?>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
    
</body>
</html>
