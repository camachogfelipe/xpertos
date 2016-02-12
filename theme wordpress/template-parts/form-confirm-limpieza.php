<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-12 col-lg-12">
		<form method="post" action="https://gateway.payulatam.com/ppp-web-gateway" class="form-horizontal">
		  <?php
		  $api_key = load_option_theme('xpertos_payu_apikey');
		  $public_key = load_option_theme('xpertos_payu_publickey');
		  $accountId = load_option_theme('xpertos_payu_accountid');
		  $merchantId = load_option_theme('xpertos_payu_merchantid');
		  //$accountId = "509171";
		  //$merchantId = "500238";
		  $referenceCode = "xp-" . $post['user_ID'] . "-" . $post['session_id'];
		  $New_value = number_format($post['valor_servicio'], 2, '.', '');
		  $firma_cadena = "$api_key~$merchantId~$referenceCode~$New_value~COP";
		  $firmacreada = md5($firma_cadena);
		  ?>
		  <input name="merchantId"     type="hidden"  value="<?= $merchantId ?>"   >
		  <input name="accountId"      type="hidden"  value="<?= $accountId ?>" >
		  <input name="description"    type="hidden"  value="Contrato de servicio <?= $service ?>"  >
		  <input name="referenceCode"  type="hidden"  value="<?= "xp-" . $post['user_ID'] . "-" . $post['session_id'] ?>" >
		  <input name="amount"         type="hidden"  value="<?= $post['valor_servicio'] ?>"   >
		  <input name="tax"            type="hidden"  value="0"  >
		  <input name="taxReturnBase"  type="hidden"  value="0" >
		  <input name="currency"       type="hidden"  value="COP" >
		  <input name="signature"      type="hidden"  value="<?= $firmacreada ?>"  >
		  <input name="test"          type="hidden"  value="<?= $test ?>" >
		  <input name="payerEmail"      type="hidden"  value="<?= $current_user->user_email ?>" >
		  <input name="buyerFullName"   type="hidden"  value="<?= $current_user->display_name ?>"  >
		  <input name="mobilePhone"     type="hidden"  value="<?= get_user_meta($current_user->ID, "user_celular", true); ?>"  >
		  <input name="telephone"       type="hidden"  value="<?= get_user_meta($current_user->ID, "user_phone", true); ?>"  >
		  <input name="billingAddress"  type="hidden"  value="<?= $post['direccion'] ?>"  >
		  <input name="responseUrl"     type="hidden"  value="<?= home_url( 'limpieza/?option_form=respuesta' ) ?>" >
		  <input name="confirmationUrl" type="hidden"  value="<?= bloginfo( 'template_url' ) . '/confirmpayu.php?option=' . $service ?>" >
		  <?php /*<input name="confirmationUrl"    type="hidden"  value="<?= home_url( limpieza?option_form=compra' ) ?>" >*/ ?>
		  <div class="form-group">
		    <label for="limpieza" class="col-sm-4 control-label">Limpieza</label>
		    <div class="col-sm-8">
		      <div class="btn-group" data-toggle="buttons">
		      	<?php if($post['limpieza'] == 'hogar') : ?>
				<label class="btn btn-xpertos active">
				  <input type="radio" name="limpieza" id="option1" autocomplete="off" checked value="hogar"> Hogar
				</label>
				<?php endif; if($post['limpieza'] == 'oficina') : ?>
				<label class="btn btn-xpertos active">
				  <input type="radio" name="limpieza" id="option2" autocomplete="off" value="oficina"> Oficina
				</label>
				<?php endif; if($post['limpieza'] == 'consultorio') : ?>
				<label class="btn btn-xpertos active">
				  <input type="radio" name="limpieza" id="option3" autocomplete="off" value="consultorio"> Consultorio
				</label>
				<?php endif; ?>
			  </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="intensidad" class="col-sm-4 control-label">Intensidad</label>
		    <div class="col-sm-8">
		      <div class="btn-group" data-toggle="buttons">
		      	<?php if($post['intensidad'] == '4') : ?>
				<label class="btn btn-xpertos active">
				  <input type="radio" name="intensidad" id="option1" autocomplete="off" checked value="4"> 4 horas
				</label>
				<?php endif; if($post['intensidad'] == '8') : ?>
				<label class="btn btn-xpertos active">
				  <input type="radio" name="intensidad" id="option2" autocomplete="off" value="8"> 8 horas
				</label>
				<?php endif; ?>
			  </div>
		    </div>
		  </div>
		  <div class="form-group">
		  	<label class="col-sm-4 control-label">Número de servicios</label>
		    <div class="col-sm-8">
		      <?php
	      		switch($post['no_servicios']) :
	      			case '1' :
	      				echo $post['intensidad'].' horas por un (1) día';
	      				break;
	      			case '2' :
	      				echo $post['intensidad'].' por dos (2) días';
	      				break;
	      			case '4' :
	      				echo $post['intensidad'].' horas por cuatro (4) días';
	      				break;
	      			case '8' :
	      				echo $post['intensidad'].' horas por ocho (8) días';
	      				break;
	      			case '12':
	      				echo $post['intensidad'].' horas por doce (12) días';
	      				break;
	      			case '24':
	      				echo $post['intensidad'].' horas diarias por tiempo completo';
	      				break;
	      		endswitch;
		      ?>
			</div>
		  </div>
		  <p><strong>Programa tu servicio</strong></p>
		  <div class="form-group">
		  	<label class="col-sm-4 control-label" for="fecha_inicio">Fecha de inicio del servicio</label>
		    <div class="col-sm-8">
		      <?= $post['fecha_inicio'] ?>
		    </div>
		  </div>
		  <div class="form-group">
		  	<label class="col-sm-4 control-label" for="fecha_inicio">Días programados</label>
		    <div class="col-sm-8">
		      <?= implode("<br>", json_decode($post['dias_programados'])) ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="hora_inicio" class="col-sm-4 control-label">Hora de inicio</label>
		    <div class="col-sm-8">
		      <div class="btn-group" data-toggle="buttons">
		      	<?php if($post['hora_inicio'] == '7 am') : ?>
				<label class="btn btn-xpertos active">
				  <input type="radio" name="hora_inicio" id="option1" autocomplete="off" checked value="7 am"> 7 a.m.
				</label>
				<?php endif; if($post['hora_inicio'] == '1 pm') : ?>
				<label class="btn btn-xpertos active">
				  <input type="radio" name="hora_inicio" id="option2" autocomplete="off" value="1 pm"> 1 p.m.
				</label>
				<?php endif; ?>
			  </div>
		    </div>
		  </div>
		  <p><strong>Requerimientos especiales</strong></p>
		  <div class="form-group">
		    <label for="no_tocar" class="col-sm-4 control-label">¿Qué quieres que no toquemos?</label>
		    <div class="col-sm-8">
		      <?= $post['no_tocar'] ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="direccion" class="col-sm-4 control-label">Dirección del servicio</label>
		    <div class="col-sm-8">
		      <?= $post['direccion'] ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="recibe" class="col-sm-4 control-label">¿Quién recibira a nuestra experta?</label>
		    <div class="col-sm-8">
		      <div class="btn-group" data-toggle="buttons">
		      	<?php if($post['recibe'] == 'persona') : ?>
						<label class="btn btn-xpertos active">
						  <input type="radio" name="recibe" id="option1" autocomplete="off" checked value="persona"> Una persona
						</label>
						<?php endif; if($post['recibe'] == 'llaves') : ?>
						<label class="btn btn-xpertos active">
						  <input type="radio" name="recibe" id="option2" autocomplete="off" value="llaves"> Dejo las llaves en portería
						</label>
						<?php endif; ?>
				  </div>
					<?php if($post['recibe'] == 'persona') : ?>
					<?= $post['nombre_recibe'] ?>
					<?php endif; ?>
		    </div>
		  </div>
		  <div class="form-group">
		  	<label for="recibe" class="col-sm-4 control-label">Sugerencias especiales para nosotros</label>
		  	<div class="col-sm-8">
		      <?= $post['sugerencias'] ?>
		    </div>
		  </div>
		  <?php if($plugin == TRUE and !isset($msg_coupon)) : ?>
		  <div class="form-group">
		  	<label for="valor" class="col-sm-4 control-label">Valor total del servicio</label>
		  	<div class="col-sm-8">
		      <i class="fa fa-dollar"></i> <?= number_format($post2['val_service'], 0, ",", ".") ?>
		    </div>
		  </div>
		  <div class="form-group">
		  	<label for="valor" class="col-sm-4 control-label">Valor de descuento</label>
		  	<div class="col-sm-8">
		      <i class="fa fa-minus"></i> <i class="fa fa-dollar"></i> <?= number_format($post2['discount'], 0, ",", ".") ?>
		    </div>
		  </div>
		  <div class="form-group">
		  	<label for="valor" class="col-sm-4 control-label">Valor con descuento</label>
		  	<div class="col-sm-8">
		      <i class="fa fa-dollar"></i> <?= number_format($post['valor_servicio'], 0, ",", ".") ?>
		    </div>
		  </div>
		  <?php else : ?>
		  	<?php if($plugin == TRUE and isset($msg_coupon)) : ?>
		  <div class="form-group">
		  	<div class="col-sm-12">
		  		<p class="bg-info"><?= $msg_coupon ?></p>
		  	</div>
		  </div>
		  	<?php endif; ?>
		  <div class="form-group">
		  	<label for="valor" class="col-sm-4 control-label">Valor total del servicio</label>
		  	<div class="col-sm-8">
		      <i class="fa fa-dollar"></i> <?= number_format($post['valor_servicio'], 0, ",", ".") ?>
		    </div>
		  </div>
		  <?php endif; ?>
		  <button type="submit" class="btn btn-primary">Pagar el servicio</button>
		</form>
	</div>
</div>
