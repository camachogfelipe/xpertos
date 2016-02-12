<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package xpertos
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function xpertos_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'xpertos_body_classes' );

/**
 * Adds a fields in users for register shopping cart
 **/

add_action('register_form', 'add_fields_register_user' );
add_filter('registration_errors', 'validate_register_errors', 10, 3);
add_action('user_register', 'save_register_fields');

function add_fields_register_user() {
	$phone = ( isset( $_POST['phone'] ) ) ? $_POST['phone']: '';
	$celular = ( isset( $_POST['celular'] ) ) ? $_POST['celular']: '';
?>
	<p style="margin-bottom:20px">
		<label for="phone"><?= __('Phone', 'xpertos') ?></label><br />
		<input type="text" name="phone" id="phone" class="input" value="<?php echo esc_attr(stripslashes($phone)); ?>" size="20" /></label>
	</p>
	<p style="margin-bottom:20px">
		<label for="celular"><?= __('Celular', 'xpertos') ?></label><br />
		<input type="text" name="celular" id="celular" class="input" value="<?php echo esc_attr(stripslashes($celular)); ?>" size="20" /></label>
	</p>
<?php
}

function validate_register_errors ($errors, $sanitized_user_login, $user_email) {
    if ( empty( $_POST['phone'] ) )
        $errors->add( 'phone', __('<strong>ERROR</strong>: ' . sprintf(__('%s is required'), __('Phone', 'xpertos')) . '.') );
    if ( empty( $_POST['celular'] ) )
        $errors->add( 'celular', __('<strong>ERROR</strong>: ' . sprintf(__('%s is required'), __('Celular', 'xpertos')) . '.') );
    return $errors;
}

function save_register_fields ($user_id) {
	if ( isset($_POST['phone']) ) update_user_meta($user_id, 'user_phone', $_POST['phone']);
	if ( isset($_POST['celular']) ) update_user_meta($user_id, 'user_celular', $_POST['celular']);
}

add_action( 'show_user_profile', 'agregar_campos_perfil' );
add_action( 'edit_user_profile', 'agregar_campos_perfil' );
add_action( 'personal_options_update', 'save_register_fields' );
add_action( 'edit_user_profile_update', 'save_register_fields' );

function agregar_campos_perfil( $user ) {
	$phone = esc_attr( get_the_author_meta( 'user_phone', $user->ID ) );
	$celular = esc_attr( get_the_author_meta( 'user_celular', $user->ID ) );
?>
	<table class="form-table">
		<tr>
			<th><label for="phone"><?= __('Phone', 'xpertos') ?></label></th>
			<td>
				<input type="text" name="phone" id="phone" class="input" value="<?php echo $phone; ?>" size="20" />
				<span class="description"><?= __('Phone', 'xpertos') ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="phone"><?= __('Celular', 'xpertos') ?></label></th>
			<td>
				<input type="text" name="celular" id="celular" class="input" value="<?php echo $celular; ?>" size="20" />
				<span class="description"><?= __('Celular', 'xpertos') ?></span>
			</td>
		</tr>
	</table>
<?php }


function xpertos_formulario_login_shortcode() {
	if ( is_user_logged_in() )
		return '';

	return get_template_part( 'template-parts/template-login' );
}
add_shortcode( 'xpertos_formulario_login', 'xpertos_formulario_login_shortcode' );

function xpertos_formulario_edit_shortcode() {
	if ( is_user_logged_in() )
		return get_template_part( 'template-parts/template-edit' );

	return "";
}
add_shortcode( 'xpertos_formulario_edit', 'xpertos_formulario_edit_shortcode' );

// ---------------------------------
// Redirección de registro (login)
// según el tipo (rol) de usuario.
// ---------------------------------
function xpertos_custom_login_redirect($redirect_to, $request, $user) {
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) :
			if ( in_array( 'subscriber', $user->roles ) ) :
				return home_url();
			else :
				return $redirect_to;
			endif;
		else :
			return $redirect_to;
    endif;
}
add_filter( 'login_redirect', 'xpertos_custom_login_redirect', 10, 3 );

function xpertos_restringir_login() {
	global $current_user;
	get_currentuserinfo();
	if ($current_user->user_level <  4) :
		wp_redirect( home_url() );
		exit;
	endif;
}
add_action('admin_init', 'xpertos_restringir_login', 1);

function xpertos_plugin () {
	// Cargamos todos los plugins activos
	$plugins = get_option('active_plugins');

	// Plugin que deseamos comprobar
	$required_plugin = 'xpertos-coupon/xpertos-coupon.php';

	// Comprobamos que el plugin está entre los activos.
	if ( in_array( $required_plugin , $plugins ) ) return TRUE;
	else return FALSE;
}