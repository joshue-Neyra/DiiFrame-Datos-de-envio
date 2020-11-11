<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 

$user=$_SESSION['Id'];
$sql = "SELECT ID_Cliente, Clie_Nombre, Clie_Apellidos, Clie_email, Celular
FROM     Clientes WHERE ID_Cliente='$user' ";
$req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));

if(sqlsrv_has_rows($req) != 1){
    echo "Error";
}
else{
	if (!function_exists('curl_init')) {
	throw new Exception('CURL PHP extension is required to run Openpay client.');
    }
    if (!function_exists('json_decode')) {
        throw new Exception('JSON PHP extension is required to run Openpay client.');
    }
    if (!function_exists('mb_detect_encoding')) {
        throw new Exception('Multibyte String PHP extension is required to run Openpay client.');
    }

    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/data/OpenpayApiError.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/data/OpenpayApiConsole.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/data/OpenpayApiResourceBase.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/data/OpenpayApiConnector.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/data/OpenpayApiDerivedResource.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/data/OpenpayApi.php';

    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayBankAccount.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayCapture.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayCard.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayCharge.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayCustomer.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayFee.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayPayout.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayPlan.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayRefund.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpaySubscription.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayTransfer.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayWebhook.php';
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/resources/OpenpayToken.php';
	$resultado=  sqlsrv_fetch_array($req);
	$Cli_Nombre = $resultado['Clie_Nombre'];
	$Cli_Apellidos = $resultado['Clie_Apellidos'];
	$Cli_email = $resultado['Clie_email'];
	$Cli_Celular = $resultado['Celular'];
	


    $openpay = Openpay::getInstance('mnyeni3tgymyscsrc823',
      'sk_e67d069232574bc0a8cfe10d26d1943a');

    $customer = array(
         'name' => $Cli_Nombre,
         'last_name' => $Cli_Apellidos,
         'phone_number' => $Cli_Celular,
         'email' => $Cli_email,);

    $chargeData = array(
        'method' => 'card',
        'source_id' => $_POST["token_id"],
        'amount' => $_POST["amount"],
        'currency' => 'MXN',
        'description' => $_POST["description"],
        //'use_card_points' => 0, // Opcional, si estamos usando puntos
        'device_session_id' => $_POST["deviceIdHiddenFieldName"],
        'order_id'=> $_POST["Nota_ID"],
        'customer' => $customer
        );

    
    try {
        $charge = $openpay->charges->create($chargeData);
        //echo $charge->status;
        echo $charge->card->type;
    } catch (Exception $e) {
        echo   $e->getMessage(), "\n";
    }
}
?>