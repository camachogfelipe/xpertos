<!-- Modal ok -->
<div class="modal fade" id="modal-ok" tabindex="-1" role="dialog" aria-labelledby="modal-okLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">DATOS REGISTRADOS</h4>
      </div>
      <div class="modal-body">
				<p>Tus datos fueron registrados correctamente.</p>
				<p>Hemos enviado un mensaje a tu correo electrónico con instrucciones para tu próxima visita.</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal nok -->
<div class="modal fade" id="modal-nok" tabindex="-1" role="dialog" aria-labelledby="modal-nokLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">DATOS NO REGISTRADOS</h4>
      </div>
      <div class="modal-body">
				<p>Sus datos no se registraron correctamente, por favor intentelo nuevamente más tarde.</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal condiciones -->
<div class="modal fade" id="modal-condiciones" tabindex="-1" role="dialog" aria-labelledby="modal-condicionesLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header alert alert-warning">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ALERTA</h4>
      </div>
      <div class="modal-body">
				<p>Es preciso aceptar los terminos y condiciones del servicio para poder continuar.</p>
      </div>
			<div class="modal-footer">
        <button type="button" class="btn btn-xpertos" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php if(!is_user_logged_in()) : ?>
<!-- Modal login -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-loginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">INICIAR SESIÓN</h4>
      </div>
      <div class="modal-body">
				<?php do_shortcode( '[xpertos_formulario_login]' ); ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<?php if(is_user_logged_in()) : ?>
<!-- Modal edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-editLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDITA TUS DATOS</h4>
      </div>
      <div class="modal-body">
				<?php do_shortcode( '[xpertos_formulario_edit]' ); ?>
      </div>
    </div>
  </div>
</div>
<!-- Modal mensaje de disponibilidad -->
  <?php global $modal; if(isset($modal)) : ?>
<div class="modal fade" id="modal-disponibilidad" tabindex="-1" role="dialog" aria-labelledby="modal-disponibilidadLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header alert alert-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">INFORMACIÓN IMPORTANTE</h4>
      </div>
      <div class="modal-body">
				<?php echo load_option_theme( 'xpertos_message_availability' ); ?>
      </div>
    </div>
  </div>
</div>
  <?php endif; ?>
<?php endif; ?>
<?php if( isset($_GET['updated']) ) : ?>
<div class="modal fade" id="modal-editresponse" tabindex="-1" role="dialog" aria-labelledby="modal-editresponseLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">EDITA TUS DATOS</h4>
      </div>
      <div class="modal-body">
				<?php
					switch ($_GET['updated']) :
						case 'success':
							echo 'Se actualizaron tus datos correctamente.';
							break;
						case 'wrongmail' :
							echo 'El email ingresado ya existe o no es valido.';
							break;
						case 'wrongpass' :
							echo 'La contraseña ingresada no es correcta o no es valida.';
							break;
						case 'failed' :
							echo 'No se actualizaron tus datos, intentalo nuevamente.';
							break;
						default:
							# code...
							break;
					endswitch;
				?>
      </div>
			<div class="modal-footer">
        <button type="button" class="btn btn-xpertos" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
