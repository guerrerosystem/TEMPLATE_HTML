<?php 
/* ?amt=1.00&cc=USD&item_name=Product%20name&item_number=12&st=Completed&tx=48024375RJ1616846 */
if(isset($_GET) && !empty($_GET)){
	$response = array();
	/* When payment is completed */
	if(isset($_GET['amt']) && isset($_GET['st']) && $_GET['st'] == 'Completed'){
		$response['error'] = false;
		$response['message'] = "Pago completado con éxito";
		$response['status'] = $_GET['st'];
		$response['amount'] = $_GET['amt'];
		$response['item_name'] = $_GET['item_name'];
		$response['item_number'] = $_GET['item_number'];
		$response['paypal_txn_id'] = $_GET['tx'];
		echo json_encode($response);
		return false;
	}elseif(isset($_GET['amt']) && isset($_GET['st']) && $_GET['st'] == 'Authrize'){
		$response['error'] = false;
		$response['message'] = "El pago se autorizó correctamente. Su pedido se cumplirá una vez que capturemos la transacción.. ";
		$response['status'] = $_GET['st'];
		$response['amount'] = $_GET['amt'];
		$response['item_name'] = $_GET['item_name'];
		$response['item_number'] = $_GET['item_number'];
		$response['paypal_txn_id'] = $_GET['tx'];
		echo json_encode($response);
		return false;
	}elseif(isset($_GET['tx']) && $_GET['tx'] == 'disabled'){
		$response['error'] = true;
		$response['message'] = "El método de pago Paypal no está disponible actualmente";
		echo json_encode($response);
		return false;
	}else{
		$response['error'] = true;
		$response['message'] = "Pago cancelado / no se pudo inicializar. Vuelve a intentarlo o prueba con otro método de pago. Gracias";
		echo json_encode($response);
		return false;
	}
}
?>