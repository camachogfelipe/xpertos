<?php

/*if ( 'POST' != $_SERVER['REQUEST_METHOD'] ) :
  header('Allow: POST');
  header('HTTP/1.1 405 Method Not Allowed');
  header('Content-Type: text/plain');
  exit;
endif;*/
require( '../../../wp-load.php' );

//datos de ejemplo
/*$_REQUEST['response_code_pol'] = 5;
$_REQUEST['transaction_date'] = "2015-11-25 13:07:35";
$_REQUEST['payment_method_type'] = 2;
$_REQUEST['response_message_pol'] = "ENTITY_DECLINED";
$_REQUEST['transaction_id'] = "f5e668f1-7ecc-4b83-a4d1-0aaa68260862";
$_REQUEST['payment_method_name'] = "VISA";
$_REQUEST['state_pol'] = 6;
$_REQUEST['reference_pol'] = 7069375;
$_REQUEST['merchant_id'] = "547531";
$_REQUEST['reference_sale'] = "xp-1-56699efeabd4e";
$_REQUEST['value'] = "864000";
$_REQUEST['sign'] = "251c14902183972631f26347ac1611d4";
$_REQUEST['description'] = "Contrato de servicio limpieza";*/

if(!isset($_REQUEST['option'])) :
  $option = substr($_REQUEST['description'], 21);
else :
  $option = $_REQUEST['option'];
endif;

$table = "xpertos_".str_replace(array("_", "-", "+", "%20"), '', $option);


$api_key = load_option_theme('xpertos_payu_apikey');
$merchantId = $_REQUEST['merchant_id'];
$referenceCode = $_REQUEST['reference_sale'];
$value = number_format($_REQUEST['value'], 2, '.', '');
$state_pol = $_REQUEST['state_pol'];
// Production Signature
$signature = "$api_key~$merchantId~$referenceCode~$value~$state_pol";
$signature = md5($signature);

if($signature == $_REQUEST['sign']) :

  $data['polTransactionState']  = $_REQUEST['response_code_pol'];
  $data['processingDate'] = $_REQUEST['transaction_date'];
  $data['lapPaymentMethodType'] = $data['lapResponseCode'] = $_REQUEST['payment_method_type'];
  $data['lapTransactionState'] = $_REQUEST['response_message_pol'];
  $data['id_transaccion'] = $_REQUEST['transaction_id'];
  $data['entidad'] = $_REQUEST['payment_method_name'];
  $data['transactionState'] = $_REQUEST['state_pol'];
  $data['ref_venta'] = $_REQUEST['reference_pol'];
  $data['session_id'] = explode("-", $referenceCode);
  $data['session_id'] = $data['session_id'][2];
  $id = register_data($data, true, $table, false);
  echo json_encode(array("res" => $data['session_id']));
else :
  echo json_encode(array("res" => "Transacción erronea"));
endif;