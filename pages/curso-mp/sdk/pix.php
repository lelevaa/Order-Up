<?php
if (!isset($_GET['vl'])) {
    die('vl nao existe');
} else {
    if ($_GET['vl'] == "" || !is_numeric($_GET['vl'])) {
        die('vl não pode ser vazio, e tem que ser numerico');
    } else {
        if ($_GET['vl'] < 1 || $_GET['vl'] > 100) {
            die('valor deve ser entre 1 e 100');
        }
    }
}

$config = require_once '../config.php';
require_once 'lib/vendor/autoload.php';
require_once '../class/Conn.class.php';
require_once '../class/Payment.class.php';

use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;

$amount = (float) trim($_GET['vl']);
$payment = new Payment(1);
$payCreate = $payment->addPayment($amount);

if ($payCreate) {

    $accesstoken = $config['accesstoken'];
    MercadoPagoConfig::setAccessToken($accesstoken);
    $client = new PaymentClient();

    $createRequest = [
        "transaction_amount" => $amount,
        "description" => "description",
        "external_reference" => $payCreate,
        "notification_url" => $config['url_notification_sdk'],
        "payment_method_id" => "pix",
        "payer" => [
            "email" => "cliente-email@gmail.com",
        ]
    ];

    $payment = $client->create($createRequest);

    if (isset($payment->id) && $payment->id != NULL) {
        $copia_cola = $payment->point_of_interaction->transaction_data->qr_code;
        $img_qrcode = $payment->point_of_interaction->transaction_data->qr_code_base64;
        $link_externo = $payment->point_of_interaction->transaction_data->ticket_url;
        $transaction_amount = $payment->transaction_amount;
        $external_reference = $payment->external_reference;

        // HTML dinâmico
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8' />
            <meta name='viewport' content='width=device-width, initial-scale=1.0' />
            <link rel='stylesheet' href='pagamento_pix_qrCode.css'>
            <title>Pagamento PIX</title>
            <style>
            * {
                margin: 0;
                padding: 0;
              }
              
              .geral {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-top: 40px;
              }
              
              .logo{
                  width: 326px;
                  height: 216px;
              }
              
              .pedido {
                margin-top: 20px;
                font-size: 20px;
                font-family: Poppins;
                font-size: 24px;
                font-weight: 700;
                line-height: 36px;
                text-align: left;
              }
              
              .valor {
                margin-top: 15px;
                font-family: Poppins;
                font-size: 18px;
                font-weight: 400;
                line-height: 27px;
                text-align: left;
              }
              
              .codigo {
                margin-top: 30px;
                width: 300px;
                font-size: 12px;
                border-radius: 8px;
                padding: 10px;
                text-align: center;
                height: 30px;
                border: 2px solid #dda52f;
                background: #f5ebd9;
                display: flex;
                align-items: center;
                justify-content: center;
              }
              
              .titulo_banco {
                margin-top: 40px;
              }
              
              span {
                margin-top: 40px;
                width: 80%;
                border-bottom: 1px solid black;
              }
              
              .qrCode {
                margin-top: 40px;
                width: 260px;
                height: 250px;
                border-radius: 3px;
                border: 2px solid #dda52f;
              }
              
              .img_qrCode {
                width: 100%;
                height: 100%;
              }
              
              .img_pix {
                justify-content: center;
                align-items: center;
                width: 80%;
                height: 100%;
              }
              
              .pix {
                margin-top: 40px;
                text-align: center;
                border-radius: 8px;
                width: 140px;
                height: 60px;
                border: 2px solid #dda52f;
              }
            </style>
        </head>
        <body>
            <div class='geral'>
                <div class='logo'><img class='logo' src='../img/logoOrderup.png' alt='logo'></div>

                <div class='pedido'><h3>Pedido #{$external_reference}</h3></div>

                <div class='valor'>Valor: R$ {$transaction_amount}</div>

                <div class='codigo'>
                    <h2>Copiar código (PIX copiar e colar)</h2>
                    <textarea>{$copia_cola}</textarea>
                </div>

                <div class='titulo_banco'>
                    <p>Procure no seu banco a opção PIX Copiar e colar</p>
                </div>

                <span></span>

                <div class='qrCode'>
                    <img class='img_qrCode' src='data:image/png;base64, {$img_qrcode}' alt='qrCode'>
                </div>



                <div class='link_externo'>
                    <a href='{$link_externo}' target='_blank'>Acessar link externo</a>
                </div>
            </div>
        </body>
        </html>
        ";
    }
}
?>
