<?php
//[form carro de compra]
function xpertos_form_func_limpieza( $atts ){
	if(!isset($_SESSION['uniqid']) || !is_user_logged_in()) :
		//ob_start();
		echo do_shortcode( '[xpertos_formulario_login]' );
	else :
		switch ($_REQUEST['option_form']) :
			default:
				$plugin = FALSE;
				if(xpertos_plugin() == TRUE) $plugin = TRUE;
				require get_template_directory() . "/template-parts/form-config-limpieza.php";
				break;
			case 'confirm':
				//if(!session_id()) session_start();
				//global $current_user;
				//get_currentuserinfo();
				//var_dump($current_user);exit;
				unset($_POST['option_form']);
				$post = $_POST;
	  			$service = $post['servicio'];
	  			unset($post['servicio']);
				$post['session_id'] =  $_SESSION['uniqid'];//session_id();
        		$val_hora = load_option_theme( 'xpertos_value_' . $post['intensidad'] . '_' . $post['no_servicios'] . '_option' );
				$post['valor_servicio'] = ($post['intensidad'] * $post['no_servicios']) * $val_hora;
				$post['fecha_inicio'] = $post['fechas'][0];
				$post['dias_programados'] = json_encode( $post['fechas'] );
				unset($post['fechas']);

				$plugin = FALSE;
				if(xpertos_plugin() == TRUE) :
					$code = $_POST['code'];
					if(xpertos_coupon_validate_code( $code ) == false) :
						$msg_coupon = "El código insertado ya no es valido";
					else :
						$code_data = xpertos_coupon_return_code( $code );
						if($code_data->type == "dinero") :
							$post2['discount'] = $code_data->value;
							$post2['val_service'] = $post['valor_servicio'];
						elseif($code_data->type == "porcentaje") :
							$post2['discount'] = ($post['valor_servicio'] * $code_data->value) / 100;
							$post2['val_service'] = $post['valor_servicio'];
						endif;
						$post['valor_servicio'] = $post2['val_service'] - $post2['discount'];
						xpertos_coupon_add_hint( $code );
					endif;
					$plugin = TRUE;
					unset($post['code']);
				endif;

				if(is_user_logged_in()) {
					global $current_user;
					get_currentuserinfo();
					$_SESSION['id'] = $current_user->ID;
				}
				$post['user_ID'] = $_SESSION['id']; //$current_user->ID;
				//var_dump($post);//exit;
				$id = register_data($post, true);
				if( $id != "nok" ) :
					//var_dump($post);
          			$test = load_option_theme( 'xpertos_payu_test' );
					$GLOBALS['modal'] = true;
					require get_template_directory() . "/template-parts/form-confirm-limpieza.php";
				else :
					//ob_start();
					//wp_redirect( home_url( 'login' ) );
					echo do_shortcode( '[xpertos_formulario_login]' );
				endif;
				break;
			case 'respuesta' :
				//global $current_user;
				//get_currentuserinfo();
				$ApiKey = load_option_theme('xpertos_payu_apikey');
				$merchant_id = $_REQUEST['merchantId'];
				$referenceCode = $_REQUEST['referenceCode'];
				$TX_VALUE = $_REQUEST['TX_VALUE'];
				$New_value = number_format($TX_VALUE, 1, '.', '');
				$currency = $_REQUEST['currency'];
				$transactionState = $_REQUEST['transactionState'];
				$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
				$firmacreada = md5($firma_cadena);
				$firma = $_REQUEST['signature'];
				$reference_pol = $_REQUEST['reference_pol'];
				$cus = $_REQUEST['cus'];
				$extra1 = $_REQUEST['description'];
				$pseBank = $_REQUEST['pseBank'];
				$lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
				$transactionId = $_REQUEST['transactionId'];

				if ($_REQUEST['transactionState'] == 4 ) {
					$estadoTx = "Transacción aprobada";
				}

				else if ($_REQUEST['transactionState'] == 6 ) {
					$estadoTx = "Transacción rechazada";
				}

				else if ($_REQUEST['transactionState'] == 104 ) {
					$estadoTx = "Error";
				}

				else if ($_REQUEST['transactionState'] == 7 ) {
					$estadoTx = "Transacción pendiente";
				}

				else {
					$estadoTx=$_REQUEST['mensaje'];
				}

				if (strtoupper($firma) == strtoupper($firmacreada)) :
					$confirm = true;
					$post = array(
						'id_transaccion' => $_REQUEST['transactionId'], 'ref_venta' => $_REQUEST['reference_pol'],
						'entidad' => $_REQUEST['lapPaymentMethod'], 'processingDate' => $_REQUEST['processingDate'],
						'transactionState' => $_REQUEST['transactionState'],
						'lapTransactionState' => $_REQUEST['lapTransactionState'],
						'polTransactionState' => $_REQUEST['polTransactionState'],
						'lapResponseCode' => $_REQUEST['lapResponseCode'],
						'lapPaymentMethodType' => $_REQUEST['lapPaymentMethodType'],
						'session_id' =>  $_SESSION['uniqid'], 'user_ID' =>  $_SESSION['id'] //$current_user->ID
					);
					//echo "<pre>";var_dump($post);exit;
					$id = register_data($post, true);
					unset($_SESSION['uniqid']);
				else :
					$confirm = false;
				endif;
				require get_template_directory() . "/template-parts/cart-confirm.php";
				break;
		endswitch;
	endif;
}
add_shortcode( 'xpertos_form_limpieza', 'xpertos_form_func_limpieza' );

//[form carro de compra]
function xpertos_form_func_todero( $atts ){
	if(!isset($_SESSION['uniqid']) || !is_user_logged_in()) :
		//ob_start();
		echo do_shortcode( '[xpertos_formulario_login]' );
	else :
		switch ($_REQUEST['option_form']) :
			default:
				$plugin = FALSE;
				if(xpertos_plugin() == TRUE) $plugin = TRUE;
				require get_template_directory() . "/template-parts/form-config-todero.php";
				break;
			case 'confirm':
				//if(!session_id()) session_start();
				//global $current_user;
				//get_currentuserinfo();
				//var_dump($current_user);exit;
				unset($_POST['option_form']);
				$post = $_POST;
	  			$service = $post['servicio'];
	  			unset($post['servicio']);
				$post['session_id'] =  $_SESSION['uniqid'];//session_id();
		        switch($post['modo_servicio']) :
		          case 'programado' :
						      $val_hora = load_option_theme( 'xpertos_value_todero_programed_option' );
		              break;
		          case 'urgente' :
						      $val_hora = load_option_theme( 'xpertos_value_todero_urgent_option' );
		              break;
		          case 'prioritario' :
						      $val_hora = load_option_theme( 'xpertos_value_priority_option' );
		              break;
		        endswitch;
				$post['valor_servicio'] = $val_hora;
				$plugin = FALSE;
				if(xpertos_plugin() == TRUE) :
					$code = $_POST['code'];
					if(xpertos_coupon_validate_code( $code ) == false) :
						$msg_coupon = "El código insertado ya no es valido";
					else :
						$code_data = xpertos_coupon_return_code( $code );
						if($code_data->type == "dinero") :
							$post2['discount'] = $code_data->value;
							$post2['val_service'] = $post['valor_servicio'];
						elseif($code_data->type == "porcentaje") :
							$post2['discount'] = ($post['valor_servicio'] * $code_data->value) / 100;
							$post2['val_service'] = $post['valor_servicio'];
						endif;
						$post['valor_servicio'] = $post2['val_service'] - $post2['discount'];
						xpertos_coupon_add_hint( $code );
					endif;
					$plugin = TRUE;
					unset($post['code']);
				endif;
				if(is_user_logged_in()) {
					global $current_user;
					get_currentuserinfo();
					$_SESSION['id'] = $current_user->ID;
				}
				$post['user_ID'] = $_SESSION['id'];//$current_user->ID;
				//var_dump($post);exit;
				$id = register_data($post, true, 'xpertos_todero');
				if( $id != "nok" ) :
					//var_dump($post);
          			$test = load_option_theme( 'xpertos_payu_test' );
					$GLOBALS['modal'] = true;
					require get_template_directory() . "/template-parts/form-confirm-todero.php";
				else :
					//ob_start();
					//wp_redirect( home_url( 'login' ) );
					echo do_shortcode( '[xpertos_formulario_login]' );
				endif;
				break;
			case 'respuesta' :
				//global $current_user;
				//get_currentuserinfo();
				$ApiKey = load_option_theme('xpertos_payu_apikey');
				$merchant_id = $_REQUEST['merchantId'];
				$referenceCode = $_REQUEST['referenceCode'];
				$TX_VALUE = $_REQUEST['TX_VALUE'];
				$New_value = number_format($TX_VALUE, 1, '.', '');
				$currency = $_REQUEST['currency'];
				$transactionState = $_REQUEST['transactionState'];
				$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
				$firmacreada = md5($firma_cadena);
				$firma = $_REQUEST['signature'];
				$reference_pol = $_REQUEST['reference_pol'];
				$cus = $_REQUEST['cus'];
				$extra1 = $_REQUEST['description'];
				$pseBank = $_REQUEST['pseBank'];
				$lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
				$transactionId = $_REQUEST['transactionId'];

				if ($_REQUEST['transactionState'] == 4 ) {
					$estadoTx = "Transacción aprobada";
				}

				else if ($_REQUEST['transactionState'] == 6 ) {
					$estadoTx = "Transacción rechazada";
				}

				else if ($_REQUEST['transactionState'] == 104 ) {
					$estadoTx = "Error";
				}

				else if ($_REQUEST['transactionState'] == 7 ) {
					$estadoTx = "Transacción pendiente";
				}

				else {
					$estadoTx=$_REQUEST['mensaje'];
				}

				if (strtoupper($firma) == strtoupper($firmacreada)) :
					$confirm = true;
					$post = array(
						'id_transaccion' => $_REQUEST['transactionId'], 'ref_venta' => $_REQUEST['reference_pol'],
						'entidad' => $_REQUEST['lapPaymentMethod'], 'processingDate' => $_REQUEST['processingDate'],
						'transactionState' => $_REQUEST['transactionState'],
						'lapTransactionState' => $_REQUEST['lapTransactionState'],
						'polTransactionState' => $_REQUEST['polTransactionState'],
						'lapResponseCode' => $_REQUEST['lapResponseCode'],
						'lapPaymentMethodType' => $_REQUEST['lapPaymentMethodType'],
						'session_id' => $_SESSION['uniqid'],//session_id(),
						'user_ID' => $_SESSION['id']//$current_user->ID
					);
					//echo "<pre>";var_dump($post);exit;
					$id = register_data($post, true);
					unset($_SESSION['uniqid']);
				else :
					$confirm = false;
				endif;
				require get_template_directory() . "/template-parts/cart-confirm.php";
				break;
		endswitch;
	endif;
}
add_shortcode( 'xpertos_form_todero', 'xpertos_form_func_todero' );

//[form carro de compra]
function xpertos_form_func_evaluenos( $atts ){
  if(!isset($_SESSION['uniqid'])) :
  	//ob_start();
  	echo do_shortcode( '[xpertos_formulario_login]' );
  else :
  	switch ($_POST['option_form']) :
  		default:
  			require get_template_directory() . "/template-parts/form-evaluenos.php";
  			break;
  		case 'confirm':
  			//if(!session_id()) session_start();
  			global $current_user;
  			get_currentuserinfo();
  			//var_dump($current_user);exit;
  			unset($_POST['option_form']);
  			$post = $_POST;
  			$post['session_id'] = session_id();
  			$post['user_ID'] = $current_user->ID;
  			//var_dump($post);//exit;
  			$id = register_data($post, true, "xpertos_evaluenos");
  			if( $id != "nok" ) :
  				//var_dump($post);
  				$message = true;
  				require get_template_directory() . "/template-parts/form-evaluenos.php";
  			else :
  				//ob_start();
  				//wp_redirect( home_url( 'login' ) );
  				echo do_shortcode( '[xpertos_formulario_login]' );
  			endif;
  			break;
  	endswitch;
  endif;
}
add_shortcode( 'xpertos_form_evaluenos', 'xpertos_form_func_evaluenos' );


function register_data($data, $register = true, $table = "xpertos_limpieza", $userid = true) {
	global $wpdb;
	$wpdb->show_errors();
	if($register == true) :
		if($userid == true) :
			$query = "SELECT COUNT(*)
					  FROM " . $wpdb->prefix . $table ."
					  WHERE user_ID='" . $data['user_ID'] . "' AND session_id='" . $data['session_id'] . "'";
		else :
			$query = "SELECT COUNT(*)
					  FROM " . $wpdb->prefix . $table ."
					  WHERE session_id='" . $data['session_id'] . "'";
		endif;
		$count = $wpdb->get_var( $query );
		if($count == 0) :
			$insert = $wpdb->insert( $wpdb->prefix.$table, $data );
			if($insert == true) :
				return "ok";
			else :
				return "nok";
			endif;
		else :
			if($userid == true) :
				$where = array( "user_ID" => $data['user_ID'], "session_id" => $data['session_id'] );
			else :
				$where = array( "session_id" => $data['session_id'] );
			endif;
			$update = $wpdb->update( $wpdb->prefix . $table, $data, $where );
			return "ok";
		endif;
	endif;
}

add_action('init', 'xpertos_session_start', 1);
function xpertos_session_start() {
		session_start();
    if( ! isset($_SESSION['uniqid']) || !is_user_logged_in() ) {
        //session_start();
				setcookie("uniqid", uniqid() );
				$_SESSION['uniqid'] = uniqid();
    }
		elseif(is_user_logged_in()) {
			global $current_user;
			get_currentuserinfo();
			$_SESSION['id'] = $current_user->ID;
		}
}

//[form carro de compra]
function xpertos_form_func_register( $atts ){
	//var_dump($_REQUEST);
	$post = $_POST;//var_dump($post);exit;
	if(!empty($post) and isset($_REQUEST['xpertos_action']) and $_REQUEST['xpertos_action'] == "register") :
		$post['user_login'] = $post['email'];
		$user_id = username_exists( $post['email'] );
		$submit = $post['servicio'];
		unset($post['submit']);
		if ( !$user_id and email_exists($post['email']) == false ) :
			$post['user_email'] = $post['email'];
			unset($post['email']);
			$post['user_pass'] = wp_generate_password( $length=12, $include_standard_special_chars=false );
			$user_id = wp_insert_user( $post );
			wp_new_user_notification( $user_id, $post['user_pass'] );
			if ( isset($post['phone']) ) update_user_meta($user_id, 'user_phone', $post['phone']);
			if ( isset($post['celular']) ) update_user_meta($user_id, 'user_celular', $post['celular']);

			//var_dump($post);exit;

			$emailnotificationcontent = load_option_theme( 'xpertos_register_message' );

			$emailnotificationcontent = str_replace("{name}", $post['first_name'], $emailnotificationcontent);
			$emailnotificationcontent = str_replace("{lastname}", $post['last_name'], $emailnotificationcontent);
			$emailnotificationcontent = str_replace("{userlogin}", $post['user_login'], $emailnotificationcontent);
			$emailnotificationcontent = str_replace("{password}", $post['user_pass'], $emailnotificationcontent);
			$emailnotificationcontent = str_replace("{email}", $post['user_email'], $emailnotificationcontent);

			add_filter( 'wp_mail_content_type', 'set_html_content_type' );
			$blog_title = get_bloginfo();
			$subject = "[$blog_title] - Registro";
			wp_mail( $post['user_email'], $subject , $emailnotificationcontent );
			remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

			wp_signon(array('user_login' => $post['user_login'], 'user_password' => $post['user_pass']), false);
			$_SESSION['id'] = $user_id;
			switch($submit) :
				case 'home'					: $redirect = home_url("#ok"); break;
				case 'limpieza'			: $redirect = home_url("limpieza/#ok"); break;
				case 'reparaciones' : $redirect = home_url("reparacion-y-mantenimiento/#ok"); break;
			endswitch;
			wp_safe_redirect( $redirect );
			exit();
		endif;
	elseif ( isset( $_REQUEST['xpertos_action'] ) && $_REQUEST['xpertos_action'] == 'login' ) :
		$creds = array();
		$creds['user_login'] = $_REQUEST['log'];
		$creds['user_password'] = $_REQUEST['pas'];
		$creds['remember'] = (!is_null($_REQUEST['rememberme'])) ? $_REQUEST['rememberme'] : true;
		//var_dump($creds);exit;
		$user = wp_signon( $creds );//exit($user);
		if ( is_wp_error( $user ) ) :
			wp_safe_redirect( $_REQUEST['redirect_to'] . "?error#modal-login" );
			exit();
		else :
			wp_safe_redirect( $_REQUEST['redirect_to'] );
			exit();
			exit();
		endif;
	elseif( isset( $_REQUEST['xpertos_action'] ) && $_REQUEST['xpertos_action'] == 'edit' ) :
		$url = esc_url( add_query_arg( 'updated', 'success', $url ) );

		$current_user = wp_get_current_user();
		$userdata = array( 'ID' => $current_user->ID );

		$first_name = isset( $_POST['first_name'] ) ? $_POST['first_name'] : '';
		$last_name = isset( $_POST['last_name'] ) ? $_POST['last_name'] : '';
		$userdata['first_name'] = $first_name;
		$userdata['last_name'] = $last_name;

		$email = isset( $_POST['email'] ) ? $_POST['email'] : '';
		if ( ! $email || empty ( $email ) ) {
			$url = esc_url( add_query_arg( 'updated', 'wrongmail', $url ) );
		} elseif ( ! is_email( $email ) ) {
			$url = esc_url( add_query_arg( 'updated', 'wrongmail', $url ) );
		} elseif ( ( $email != $current_user->user_email ) && email_exists( $email ) ) {
			$url = esc_url( add_query_arg( 'updated', 'wrongmail', $url ) );
		} else {
			$userdata['user_email'] = $email;
		}

		//var_dump($_POST);var_dump($userdata);exit;

		// password checker
		if ( isset( $_POST['pass1'] ) && ! empty( $_POST['pass1'] ) ) {
			if ( ! isset( $_POST['pass2'] ) || ( isset( $_POST['pass2'] ) && $_POST['pass2'] != $_POST['pass1'] ) ) {
				$url = esc_url( add_query_arg( 'updated', 'wrongpass', $url ) );
			}
			else {
					$userdata['user_pass'] = $_POST['pass1'];
			}

		}

		$user_id = wp_update_user( $userdata );
		if ( is_wp_error( $user_id ) ) {
			$url = esc_url( add_query_arg( 'updated', 'failed', $url ) );
		}

		wp_safe_redirect( $url );
		exit();
	elseif( isset($_REQUEST['xpertos_action']) and $_REQUEST['xpertos_action'] == 'logout' ) :
		wp_logout();
		wp_destroy_current_session();
		wp_safe_redirect( home_url() );
		exit;
	endif;
	if( is_user_logged_in() ) :
		global $current_user;
		$rol = get_the_author_meta( 'roles', $current_user->ID );//exit(var_dump($rol));
		if($rol[0] == "subscriber") show_admin_bar( false );
	endif;
}
add_action( 'init', 'xpertos_form_func_register' );

function set_html_content_type() {
	return 'text/html';
}
