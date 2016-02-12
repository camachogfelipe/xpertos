<?php
//Theme options with titan framework

add_action( 'tf_create_options', 'xpertos_create_options' );

function xpertos_create_options() {
    // Initialize Titan with my special unique namespace
    $titan = TitanFramework::getInstance( 'xpertos' );
    // Create my admin panel

    $panel = $titan->createAdminPanel( array(
        'name'  => 'Xpertos Theme Options',
        'title' => __('Xpertos Theme Options', 'xpertos'),
    ) );

    $generalTab = $panel->createTab( array(
	    'name' => __('Basic settings', 'xpertos'),
	) );

    // Create options for my admin panel
    $generalTab->createOption( array(
        'name' => __('PBX number', 'xpertos'),
        'id' => 'phone1_option',
        'type' => 'text',
        'desc' => __('PBX number', 'xpertos')
    ) );

    $generalTab->createOption( array(
        'name' => __('Celphone number', 'xpertos'),
        'id' => 'phone2_option',
        'type' => 'text',
        'desc' => __('Celphone number', 'xpertos')
    ) );

    $generalTab->createOption( array(
        'name' => __('Whatsapp number', 'xpertos'),
        'id' => 'phone3_option',
        'type' => 'text',
        'desc' => __('Whatsapp number', 'xpertos')
    ) );

    $generalTab->createOption( array(
        'name' => __('Address', 'xpertos'),
        'id' => 'addres_option',
        'type' => 'text',
        'desc' => __('Address', 'xpertos')
    ) );

    $generalTab->createOption( array(
        'name' => __('Email info', 'xpertos'),
        'id' => 'email1_option',
        'type' => 'text',
        'desc' => __('Email info', 'xpertos')
    ) );

    $generalTab->createOption( array(
        'name' => __('Email marketing', 'xpertos'),
        'id' => 'email2_option',
        'type' => 'text',
        'desc' => __('Email marketing', 'xpertos')
    ) );

	$generalTab->createOption( array(
        'name' => __('Logo Menu', 'xpertos'),
        'id' => 'xpertos_logo_menu_option',
        'type' => 'upload',
        'desc' => __('Logo image menu', 'xpertos')
    ) );

    $generalTab->createOption( array(
        'name' => __('Logo Contact', 'xpertos'),
        'id' => 'xpertos_logo_contact_option',
        'type' => 'upload',
        'desc' => __('Logo Contact', 'xpertos')
    ) );

	$generalTab->createOption( array(
        'name' => __('Logo Footer', 'xpertos'),
        'id' => 'xpertos_logo_footer_option',
        'type' => 'upload',
        'desc' => __('Logo image Footer', 'xpertos')
    ) );

    $generalTab->createOption( array(
		'save'  => __('Save settings', 'xpertos'),
		'reset' => __('Reset to defaults', 'xpertos'),
        'type'  => 'save'
    ) );

    $generalTab = $panel->createTab( array(
	    'name' => __('Image sections settings', 'xpertos'),
	) );

	$generalTab->createOption( array(
        'name' => __('Section Xpertos Background', 'xpertos'),
        'id' => 'xpertos_background_option',
        'type' => 'upload',
        'desc' => __('Background image section Xpertos', 'xpertos')
    ) );

	$generalTab->createOption( array(
        'name' => __('Section Frequent Questions Background', 'xpertos'),
        'id' => 'frequent_questions_background_option',
        'type' => 'upload',
        'desc' => __('Background image section Frequent Questions', 'xpertos')
    ) );

	$generalTab->createOption( array(
		'save'  => __('Save settings', 'xpertos'),
		'reset' => __('Reset to defaults', 'xpertos'),
        'type'  => 'save'
    ) );

    $generalTab = $panel->createTab( array(
	    'name' => __('Social links', 'xpertos'),
	) );

  // Create options for my admin panel
  $generalTab->createOption( array(
      'name' => 'Facebook',
      'id' => 'facebook_option',
      'type' => 'text',
      'desc' => 'Facebook'
  ) );

  $generalTab->createOption( array(
      'name' => 'Twitter',
      'id' => 'twitter_option',
      'type' => 'text',
      'desc' => 'Twitter'
  ) );

  $generalTab->createOption( array(
	'save'  => __('Save settings', 'xpertos'),
	'reset' => __('Reset to defaults', 'xpertos'),
      'type'  => 'save'
  ) );

  $generalTab = $panel->createTab( array(
    'name' => __('Value Shoppings Range Four hours', 'xpertos'),
  ) );

  for($x = 1; $x <= 24; $x ++) :

  // Create options for my admin panel
  $generalTab->createOption( array(
      'name' => sprintf(__('Value of the hour for %s day(s)', 'xpertos'), $x),
      'id' => 'xpertos_value_4_' . $x . '_option',
      'type' => 'text',
      'desc' => sprintf(__('Value of the hour for %s day(s)', 'xpertos'), $x)
  ) );

  endfor;

  $generalTab->createOption( array(
	'save'  => __('Save settings', 'xpertos'),
	'reset' => __('Reset to defaults', 'xpertos'),
      'type'  => 'save'
  ) );

  $generalTab = $panel->createTab( array(
    'name' => __('Value Shoppings Range Eight hours', 'xpertos'),
  ) );

  for($x = 1; $x <= 24; $x ++) :

    // Create options for my admin panel
    $generalTab->createOption( array(
        'name' => sprintf(__('Value of the hour for %s day(s)', 'xpertos'), $x),
        'id' => 'xpertos_value_8_' . $x . '_option',
        'type' => 'text',
        'desc' => sprintf(__('Value of the hour for %s day(s)', 'xpertos'), $x)
    ) );

  endfor;

  $generalTab->createOption( array(
	'save'  => __('Save settings', 'xpertos'),
	'reset' => __('Reset to defaults', 'xpertos'),
      'type'  => 'save'
  ) );

  $generalTab = $panel->createTab( array(
    'name' => __('Value Shoppings For Repair and Mantenaice', 'xpertos'),
  ) );

  // Create options for my admin panel
  $generalTab->createOption( array(
      'name' => __('Value hour xpert programmed', 'xpertos'),
      'id' => 'xpertos_value_todero_programed_option',
      'type' => 'text',
      'desc' => __('Value of the hour for repair and mantenaice programmed', 'xpertos')
  ) );

  $generalTab->createOption( array(
      'name' => __('Value hour xpert urgent', 'xpertos'),
      'id' => 'xpertos_value_todero_urgent_option',
      'type' => 'text',
      'desc' => __('Value of the hour for repair and mantenaice urgent', 'xpertos')
  ) );

  $generalTab->createOption( array(
      'name' => __('Value hour xpert prority', 'xpertos'),
      'id' => 'xpertos_value_priority_option',
      'type' => 'text',
      'desc' => __('Value of the hour for repair and mantenaice priority', 'xpertos')
  ) );

  $generalTab->createOption( array(
	'save'  => __('Save settings', 'xpertos'),
	'reset' => __('Reset to defaults', 'xpertos'),
      'type'  => 'save'
  ) );

  $generalTab = $panel->createTab( array(
    'name' => __('Messages', 'xpertos'),
	) );

  // Create options for my admin panel
  $generalTab->createOption( array(
      'name' => __('Confirm message shopping', 'xpertos'),
      'id' => 'xpertos_shopping_message',
      'type' => 'editor',
      'desc' => __('Confirm message shopping', 'xpertos')
  ) );

  // Create options for my admin panel
  $generalTab->createOption( array(
      'name' => __('Evaluate message', 'xpertos'),
      'id' => 'xpertos_evaluate_message',
      'type' => 'editor',
      'desc' => __('Evaluate message', 'xpertos')
  ) );

  // Create options for my admin panel
  $generalTab->createOption( array(
      'name' => __('Register message', 'xpertos'),
      'id' => 'xpertos_register_message',
      'type' => 'editor',
      'desc' => __('Please use {name}, {lastname}, {userlogin}, {email} and {password} for send the information to user.', 'xpertos')
  ) );

  // Create options for my admin panel
  $generalTab->createOption( array(
      'name' => __('Availability message.', 'xpertos'),
      'id' => 'xpertos_message_availability',
      'type' => 'editor',
      'desc' => __('Availability message.', 'xpertos')
  ) );

  // Create options for my admin panel
  $generalTab->createOption( array(
      'name' => __('Home Text one', 'xpertos'),
      'id' => 'xpertos_home_one_message',
      'type' => 'text',
      'desc' => __('Home Text one', 'xpertos')
  ) );

  // Create options for my admin panel
  $generalTab->createOption( array(
      'name' => __('Home Text two', 'xpertos'),
      'id' => 'xpertos_home_two_message',
      'type' => 'text',
      'desc' => __('Home Text two', 'xpertos')
  ) );

  // Create options for my admin panel
  $generalTab->createOption( array(
      'name' => __('Home Text three', 'xpertos'),
      'id' => 'xpertos_home_three_message',
      'type' => 'text',
      'desc' => __('Home Text three', 'xpertos')
  ) );

  $generalTab->createOption( array(
	'save'  => __('Save settings', 'xpertos'),
	'reset' => __('Reset to defaults', 'xpertos'),
      'type'  => 'save'
  ) );

  $generalTab = $panel->createTab( array(
    'name' => __('PayU Options', 'xpertos'),
	) );

  // Create options for my admin panel
  $generalTab->createOption( array(
      'name' => __('Api Key', 'xpertos'),
      'id' => 'xpertos_payu_apikey',
      'type' => 'text',
      'desc' => __('Api Key', 'xpertos')
  ) );

  $generalTab->createOption( array(
      'name' => __('Public Key', 'xpertos'),
      'id' => 'xpertos_payu_publickey',
      'type' => 'text',
      'desc' => __('Public Key', 'xpertos')
  ) );

  $generalTab->createOption( array(
      'name' => __('Account ID', 'xpertos'),
      'id' => 'xpertos_payu_accountid',
      'type' => 'text',
      'desc' => __('Account ID', 'xpertos')
  ) );

  $generalTab->createOption( array(
      'name' => __('Merchant ID', 'xpertos'),
      'id' => 'xpertos_payu_merchantid',
      'type' => 'text',
      'desc' => __('Merchant ID', 'xpertos')
  ) );

  $generalTab->createOption( array(
    'name' => __('Test Shoppings', 'xpertos'),
    'id' => 'xpertos_payu_test',
    'options' => array(
        '1' => __('Yes', 'xpertos'),
        '0' => __('No', 'xpertos')
    ),
    'type' => 'radio',
    'desc' => __('Select one option', 'xpertos'),
    'default' => '1',
  ) );

  $generalTab->createOption( array(
  	'save'  => __('Save settings', 'xpertos'),
  	'reset' => __('Reset to defaults', 'xpertos'),
    'type'  => 'save'
  ) );

  $generalTab = $panel->createTab( array(
    'name' => __('Help'),
    'desc' => "
      <h1>Home<h2>
      <p>Los contenidos del Home son códigos cortos (shortcode) de wordpress.</p>
      <p>Los shortcodes son 4 en total de las secciones: xpertos, ¿cómo comprar?, Preguntas frecuentes y Servicios</p>
      <p>Los shortocodes son:</p>
      <p>[xpertos_section]: Muestra las 4 entradas del tipo de contenido Xpertos que fueron organizados mediante la columna orden; de no existir un orden se muestran las 4 últimas entradas de este tipo de contenido.</p>
      <p>[services_section]: Muestra los 3 servicios organizados según el campo orden, sino esta establecido este campo, los muestra en el orden en que se ingresaron.</p>
      <p>[section_frequent_questions]: Muestra las 4 últimas preguntas frecuentes ingresadas.</p>
      <p>[section_how_to_buy]: Muestra los 4 pasos de compra establecidos según el orden, de no existir un orden muestra las 4 últimas entradas de este tipo de contenido.</p>
      <br><p><strong>¿Cómo ingresar un shortcode?</strong></p>
      <p>Debe escribir el shortcode establecido, incluyendo los corchetes cuadrados ejm: [xpertos_section], en el texto de la entrada o página que este creando o editando.</p>
    "
  ) );
}

function xpertos_install() {
	global $wpdb;

	$table = $wpdb->prefix . 'xpertos_limpieza';
	$tusers = $wpdb->prefix . 'users';

	$sql = "
		ALTER TABLE $tusers ENGINE=INNODB;
		CREATE TABLE IF NOT EXISTS `$table` (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `user_ID` bigint(20) unsigned NOT NULL,
		  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `limpieza` enum('hogar','oficina','consultorio') COLLATE utf8_unicode_ci NOT NULL,
		  `intensidad` enum('4','8') COLLATE utf8_unicode_ci NOT NULL DEFAULT '4',
		  `no_servicios` enum('1','2','4','8','12','full') COLLATE utf8_unicode_ci NOT NULL,
		  `fecha_inicio` date NOT NULL,
		  `dias_programados` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `hora_inicio` enum('7 am','1 pm') COLLATE utf8_unicode_ci NOT NULL DEFAULT '7 am',
		  `no_tocar` text COLLATE utf8_unicode_ci,
		  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `recibe` enum('persona','llaves') COLLATE utf8_unicode_ci NOT NULL,
		  `nombre_recibe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `sugerencias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `acepto_condiciones` enum('si','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
		  `valor_servicio` decimal(10,2) NOT NULL DEFAULT '0.00',
		  `id_transaccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `ref_venta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `entidad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `processingDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `transactionState` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `lapTransactionState` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `polTransactionState` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `lapResponseCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `lapPaymentMethodType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `user_ID` (`user_ID`),
		  CONSTRAINT `".$table."_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `$tusers` (`ID`)
		) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
	";

	$table = $wpdb->prefix . 'xpertos_todero';
	$sql = "
		CREATE TABLE IF NOT EXISTS `$table` (
		  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
		  `user_ID` bigint(20) unsigned NOT NULL,
		  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `todero` enum('albañileria','electricidad','plomeria','pintura','arreglos','instalaciones') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'albañileria',
		  `modo_servicio` enum('programado','urgente','prioritario') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'programado',
			`requerimiento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
      `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
      `acepto_condiciones` enum('si','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
		  `valor_servicio` decimal(10,2) NOT NULL DEFAULT '0.00',
		  `id_transaccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `ref_venta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `entidad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `processingDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `transactionState` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `lapTransactionState` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `polTransactionState` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `lapResponseCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  `lapPaymentMethodType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `user_ID` (`user_ID`),
		  CONSTRAINT `".$table."_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `$tusers` (`ID`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
	";

	$wpdb->query($sql);

	$table = $wpdb->prefix . 'xpertos_evaluanos';

	$sql = "
		CREATE TABLE IF NOT EXISTS `$table` (
		  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		  `user_ID` bigint(20) NOT NULL,
		  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `p1` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p2` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p3` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p4` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p5` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p6` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p7` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p8` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p9` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p10` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p11` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p12` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p13` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p14` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p15` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p16` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p17` text COLLATE utf8_unicode_ci NOT NULL,
		  `p18` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'S',
		  `p19` text COLLATE utf8_unicode_ci NOT NULL,
		  `xperto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
		  `fecha_servicio` date NOT NULL,
		  `fecha_evaluanos` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
	";

	$wpdb->query($sql);
}

/* Añadir comando wordpress */
add_action( 'after_setup_theme', 'xpertos_install' );
