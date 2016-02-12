<?php

if( ! class_exists( 'WP_List_Table' ) )
{
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class ListTableClean extends WP_List_Table {

    /**
	* constructor
	*/
    function __construct() {
	    //global $status, $page;
        parent::__construct(
        	array(
	            'singular'  => __( 'Shopping List Clean', 'xpertos' ),     //singular
	            'plural'    => __( 'Shopping List Clean', 'xpertos' ),   //plural
	            'ajax'      => false        //soporte ajax
    		)
       	);
    }

    function column_default( $item, $column_name ) {
	    switch( $column_name )
	    {
          case 'dias_programados' :
            return implode("<br>", json_decode($item[$column_name]));
            break;
          case 'display_name' :
            $return = "<b>Nombre:</b> ".$item[$column_name];
            $return .= "<br><b>Email:</b> ".$item["user_email"];
            $return .= "<br><b>Teléfono:</b> ".get_user_meta($item["user_ID"], "user_phone", true);
            $return .= "<br><b>Celular:</b> ".get_user_meta($item["user_ID"], "user_celular", true);
            return $return;
            break;
          case 'recibe' :
            $return = $item[$column_name];
            if($item[$column_name] == "persona") $return .= "<br>".$item['nombre_recibe'];
            return $return;
          case 'valor_servicio' :
            return "$ ".number_format($item[$column_name], 0, ",", ".");
            break;
          case 'limpieza' :
            $return = "<b>Limpieza: </b>".$item[$column_name];
            $return .= "<br><b>Intensidad: </b>".$item['intensidad'];
            $return .= "<br><b>No. Servicios: </b>".$item['no_servicios'];
            $return .= "<br><b>Fecha de inicio: </b>".$item['fecha_inicio'];
            $return .= "<br><b>Hora de inicio: </b>".$item['hora_inicio'];
            return $return;
            break;
	        default:
	            return $item[ $column_name ];
	    }
  	}

    function get_columns() {
        $columns = array(
          //'id'                  => __('ID', 'xpertos'),
          //'user_ID'             => __('User', 'xpertos'),
          'session_id'          => __('Reference', 'xpertos'),
          'display_name'        => __('Name'),
          'limpieza'            => __('Clean', 'xpertos'),
          //'intensidad'          => __('Intensity', 'xpertos'),
          //'no_servicios'        => __('No. Services', 'xpertos'),
          //'fecha_inicio'        => __('Start date', 'xpertos'),
          'dias_programados'    => __('Scheduled days', 'xpertos'),
          //'hora_inicio'         => __('Start time', 'xpertos'),
          'no_tocar'            => __('Do no touch', 'xpertos'),
          'direccion'           => __('Address', 'xpertos'),
          'recibe'              => __('Receives', 'xpertos'),
          //'nombre_recibe'       => __('Name of the recipient', 'xpertos'),
          'sugerencias'         => __('Suggestions', 'xpertos'),
          'valor_servicio'      => __('Cost of service', 'xpertos'),
          /*'id_transaccion'      => __('id PayU', 'xpertos'),
          'ref_venta'           => __('ref. PayU', 'xpertos'),
          'entidad'             => __('Entity', 'xpertos'),*/
          'processingDate'      => __('Process date', 'xpertos'),
          //'lapTransactionState' => __('Transaction status', 'xpertos'),
          'lapResponseCode'     => __('Reply message', 'xpertos'),
          //'lapPaymentMethodType'=> __('Payment method', 'xpertos'),
        );
        return $columns;
    }

    function get_sortable_columns() {
	  	$sortable_columns = array(
        'user_ID'             => array('Usuario', true),
        'limpieza'            => array('Limpieza', true),
        'intensidad'          => array('Intensidad', true),
        'no_servicios'        => array('No. Servicios', true),
        'fecha_inicio'        => array('Fecha de inicio', true),
        'recibe'              => array('Recibe', true),
        'valor_servicio'      => array('Valor del servicio', true),
        'processingDate'      => array('Fecha de procesamiento', true),
        'lapTransactionState' => array('Estado de la transacción', true),
	  	);
	  	return $sortable_columns;
	  }

    function prepare_items() {
		//objecto global wp
      global $wpdb;

      //nombre de la tabla con el prefijo
      $table_name = $wpdb->prefix . 'xpertos_limpieza';

      // items por página
      $per_page = 10;

      $columns = $this->get_columns();
      $hidden = array();
      $sortable = $this->get_sortable_columns();

      // columnas del encabezado de nuestra tabla
      $this->_column_headers = array($columns, $hidden, $sortable);

      $this->process_bulk_action();

      // total de items a paginar
      $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

      // obtenemos el número de página en la que estamos, 0 es la primera
      $paged = isset($_GET['paged']) ?
      		 max(0, intval($_GET['paged']) - 1) :
      		 0;

      	// obtenemos el campo por el que se está ordenando, si no hay ninguno lo hacemos por el id
      $orderby = (isset($_GET['orderby']) && in_array($_GET['orderby'], array_keys($this->get_sortable_columns()))) ?
      			$_GET['orderby'] :
      			'id';

      // orden ascendente o descendente
      $order = (isset($_GET['order']) && in_array($_GET['order'], array('asc', 'desc'))) ?
      		 $_GET['order'] :
      		 'asc';

      $table_users = $wpdb->prefix . "users";


      // Obtenemos los datos paginados en forma de array con el parámetro ARRAY_A
      $this->items = $wpdb->get_results(
      	$wpdb->prepare(
      		"SELECT $table_name.*, $table_users.*
           FROM $table_name
           INNER JOIN $table_users on $table_name.user_ID=$table_users.Id
           ORDER BY $table_name.$orderby $order
           LIMIT %d OFFSET %d", $per_page, ($paged*$per_page)
      	),
      	ARRAY_A
      );
      //echo $wpdb->last_query;
      //exit;

      // configuramos la paginación
      $this->set_pagination_args(array(
          'total_items' => $total_items, // total items
          'per_page' => $per_page, // items por página
          'total_pages' => ceil($total_items / $per_page) // páginas en total para los enlaces de la paginación
      ));
	}

  function no_items() {
	  	_e( 'No shopping for Cleaning found.', 'xpertos' );
	}
}

class ListTableTodero extends WP_List_Table {

    /**
	* constructor
	*/
    function __construct() {
	    //global $status, $page;
        parent::__construct(
        	array(
	            'singular'  => __( 'Shopping List Repair and Mantenaice', 'xpertos' ),     //singular
	            'plural'    => __( 'Shopping List Repair and Mantenaice', 'xpertos' ),   //plural
	            'ajax'      => false        //soporte ajax
    		)
       	);
    }

    function column_default( $item, $column_name ) {
	    switch( $column_name )
	    {
          case 'display_name' :
            $return = "<b>Nombre:</b> ".$item[$column_name];
            $return .= "<br><b>Email:</b> ".$item["user_email"];
            $return .= "<br><b>Teléfono:</b> ".get_user_meta($item["user_ID"], "user_phone", true);
            $return .= "<br><b>Celular:</b> ".get_user_meta($item["user_ID"], "user_celular", true);
            return $return;
            break;
          case 'valor_servicio' :
            return "$ ".number_format($item[$column_name], 0, ",", ".");
            break;
	        default:
	            return $item[ $column_name ];
	    }
  	}

    function get_columns() {
        $columns = array(
        	//'cb'                  => '<input type="checkbox" />',
          //'id'                  => __('ID', 'xpertos'),
          //'user_ID'             => __('User', 'xpertos'),
          'session_id'          => __('Reference', 'xpertos'),
          'todero'              => __('Service', 'xpertos'),
          'modo_servicio'       => __('Service mode', 'xpertos'),
          'requerimiento'       => __('Request', 'xpertos'),
          'direccion'           => __('Address', 'xpertos'),
          'valor_servicio'      => __('Service value', 'xpertos'),
          /*'id_transaccion'      => __('id PayU', 'xpertos'),
          'ref_venta'           => __('ref. PayU', 'xpertos'),
          'entidad'             => __('Entity', 'xpertos'),*/
          'processingDate'      => __('Processing date', 'xpertos'),
          //'lapTransactionState' => __('Transactin status', 'xpertos'),
          'lapResponseCode'     => __('Reply message', 'xpertos'),
          //'lapPaymentMethodType'=> __('Payment method', 'xpertos'),
        );
        return $columns;
    }

    function get_sortable_columns() {
	  	$sortable_columns = array(
        'user_ID'             => array('Usuario', true),
        'todero'              => array('Limpieza', true),
        'modo_servicio'       => array('Intensidad', true),
        'valor_servicio'      => array('Valor del servicio', true),
        'processingDate'      => array('Fecha de procesamiento', true),
        'lapTransactionState' => array('Estado de la transacción', true),
	  	);
	  	return $sortable_columns;
	  }

    function prepare_items() {
		//objecto global wp
      global $wpdb;

      //nombre de la tabla con el prefijo
      $table_name = $wpdb->prefix . 'xpertos_todero';

      // items por página
      $per_page = 10;

      $columns = $this->get_columns();
      $hidden = array();
      $sortable = $this->get_sortable_columns();

      // columnas del encabezado de nuestra tabla
      $this->_column_headers = array($columns, $hidden, $sortable);

      $this->process_bulk_action();

      // total de items a paginar
      $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

      // obtenemos el número de página en la que estamos, 0 es la primera
      $paged = isset($_GET['paged']) ?
      		 max(0, intval($_GET['paged']) - 1) :
      		 0;

      	// obtenemos el campo por el que se está ordenando, si no hay ninguno lo hacemos por el id
      $orderby = (isset($_GET['orderby']) && in_array($_GET['orderby'], array_keys($this->get_sortable_columns()))) ?
      			$_GET['orderby'] :
      			'id';

      // orden ascendente o descendente
      $order = (isset($_GET['order']) && in_array($_GET['order'], array('asc', 'desc'))) ?
      		 $_GET['order'] :
      		 'asc';

      $table_users = $wpdb->prefix . "users";

      // Obtenemos los datos paginados en forma de array con el parámetro ARRAY_A
      $this->items = $wpdb->get_results(
      $wpdb->prepare(
        "SELECT $table_name.*, $table_users.*
         FROM $table_name
         INNER JOIN $table_users on $table_name.user_ID=$table_users.Id
         ORDER BY $table_name.$orderby $order
         LIMIT %d OFFSET %d", $per_page, ($paged*$per_page)
      ),
      ARRAY_A
      );

      // configuramos la paginación
      $this->set_pagination_args(array(
          'total_items' => $total_items, // total items
          'per_page' => $per_page, // items por página
          'total_pages' => ceil($total_items / $per_page) // páginas en total para los enlaces de la paginación
      ));
	}

  function no_items() {
	  	_e( 'No purchases were found Repair and Maintenance.', 'xpertos' );
	}
}

/**
* acción para añadir la opción de nuestro plugin
*/
add_action( 'admin_menu', 'xpertos_add_menu_items' );


/**
* añade la opción al menú de administración con sus hijos
*/
function xpertos_add_menu_items()
{
	//elemento principal
    add_menu_page(
    	__('Shopping List', 'xpertos'), //singular
    	__('Shopping List', 'xpertos'), //plural
    	'manage_options', //capability
    	'xpertos_list', //slug
    	'xpertos_render_list_limpieza', //handler
    	'dashicons-config' //icon
    );

    // elemento para ver la tabla con las búsquedas
    add_submenu_page(
    	'xpertos_list', //slug padre
    	__('Clean', 'xpertos'), //singular
    	__('Clean', 'xpertos'), //plural
    	'manage_options', //capability
    	'xpertos_render_list_limpieza', //slug
    	'xpertos_render_list_limpieza' //handler
    );

    // elemento para ver la tabla con las búsquedas
    add_submenu_page(
    	'xpertos_list', //slug padre
    	__('Repair and Mantenaice', 'xpertos'), //singular
    	__('Repair and Mantenaice', 'xpertos'), //plural
    	'manage_options', //capability
    	'xpertos_render_list_todero', //slug
    	'xpertos_render_list_todero' //handler
    );
}

/**
* pinta la tabla final
*/
function xpertos_render_list_limpieza() {
	$udpListTable = new ListTableClean();
	$udpListTable->prepare_items();

	//si se ha eliminado algo creamos el mensaje con las clases de wordpress
	$message = '';
    if ('delete' === $udpListTable->current_action())
    {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items removed: %d', 'xpertos'),
        	count($_GET['id'])) . '</p></div>';
    }
	?>
	<div class="wrap">

	    <h2><?php _e('Shopping list Cleaning', 'xpertos')?></h2>
	    <?php echo $message; ?>

	    <form id="search-table" method="GET">
	        <input type="hidden" name="page" value="<?php echo $_GET['page'] ?>"/>
	        <?php $udpListTable->display() ?>
	    </form>
	</div>
	<?php
}

function xpertos_render_list_todero() {
	$udpListTable = new ListTableTodero();
	$udpListTable->prepare_items();

	//si se ha eliminado algo creamos el mensaje con las clases de wordpress
	$message = '';
    if ('delete' === $udpListTable->current_action())
    {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items eliminados: %d', 'udplisttable'),
        	count($_GET['id'])) . '</p></div>';
    }
	?>
	<div class="wrap">

	    <h2><?php _e('Shopping List Repair and Maintenance', 'xpertos')?></h2>
	    <?php echo $message; ?>

	    <form id="search-table" method="GET">
	        <input type="hidden" name="page" value="<?php echo $_GET['page'] ?>"/>
	        <?php $udpListTable->display() ?>
	    </form>
	</div>
	<?php
}
