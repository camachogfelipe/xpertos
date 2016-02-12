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
		  <input name="merchantId"    type="hidden"  value="<?= $merchantId ?>"   >
		  <input name="accountId"     type="hidden"  value="<?= $accountId ?>" >
		  <input name="description"   type="hidden"  value="Contrato de servicio <?= $service ?>"  >
		  <input name="referenceCode" type="hidden"  value="<?= "xp-" . $post['user_ID'] . "-" . $post['session_id'] ?>" >
		  <input name="amount"        type="hidden"  value="<?= $post['valor_servicio'] ?>"   >
		  <input name="tax"           type="hidden"  value="0"  >
		  <input name="taxReturnBase" type="hidden"  value="0" >
		  <input name="currency"      type="hidden"  value="COP" >
		  <input name="signature"     type="hidden"  value="<?= $firmacreada ?>"  >
		  <input name="test"          type="hidden"  value="<?= $test ?>" >
		  <input name="payerEmail"      type="hidden"  value="<?= $current_user->user_email ?>" >
		  <input name="buyerFullName"   type="hidden"  value="<?= $current_user->display_name ?>"  >
		  <input name="mobilePhone"     type="hidden"  value="<?= get_user_meta($current_user->ID, "user_celular", true); ?>"  >
		  <input name="telephone"       type="hidden"  value="<?= get_user_meta($current_user->ID, "user_phone", true); ?>"  >
		  <input name="billingAddress"  type="hidden"  value="<?= $post['direccion'] ?>"  >
		  <input name="responseUrl"     type="hidden"  value="<?= home_url( 'reparacion-y-mantenimiento/?option_form=respuesta' ) ?>" >		  
		  <input name="confirmationUrl" type="hidden"  value="<?= bloginfo( 'template_url' ) . '/confirmpayu.php?option=' . $service ?>" >
		  <!--<input name="confirmationUrl"    type="hidden"  value="<?= home_url( 'reparacion-y-mantenimiento?option_form=compra' ) ?>" >-->
		  <div class="form-group">
		    <label for="limpieza" class="col-sm-4 control-label">Servicio escogido</label>
		    <div class="col-sm-8">
		      <div class="btn-group" data-toggle="buttons">
		      	<?php if($post['todero'] == 'albañileria') : ?>
						<label class="btn btn-xpertos active">
						  <input type="radio" name="todero" id="option1" autocomplete="off" checked value="albañileria"> Albañilería
						</label>
					<?php endif; if($post['todero'] == 'arreglos') : ?>
						<label class="btn btn-xpertos">
						  <input type="radio" name="todero" id="option2" autocomplete="off" value="arreglos"> Arreglos
						</label>
					<?php endif; if($post['todero'] == 'electricidad') : ?>
						<label class="btn btn-xpertos">
						  <input type="radio" name="todero" id="option3" autocomplete="off" value="electricidad"> Electricidad
						</label>
					<?php endif; if($post['todero'] == 'instalaciones') : ?>
						<label class="btn btn-xpertos">
						  <input type="radio" name="todero" id="option4" autocomplete="off" value="instalaciones"> Instalaciones
						</label>
					<?php endif; if($post['todero'] == 'pintura') : ?>
						<label class="btn btn-xpertos">
						  <input type="radio" name="todero" id="option5" autocomplete="off" value="pintura"> Pintura
						</label>
					<?php endif; if($post['todero'] == 'plomeria') : ?>
						<label class="btn btn-xpertos">
						  <input type="radio" name="todero" id="option6" autocomplete="off" value="plomeria"> Plomería
						</label>
						<?php endif; ?>
				  </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="modo_servicio" class="col-sm-4 control-label">Modo del servicio</label>
		    <div class="col-sm-8">
		      <div class="btn-group" data-toggle="buttons">
		      	<?php if($post['modo_servicio'] == 'programado') : ?>
						<label class="btn btn-xpertos active">
						  <input type="radio" name="modo_servicio" id="option1" autocomplete="off" checked value="programado"> Programado
						</label>
					<?php endif; if($post['modo_servicio'] == 'urgente') : ?>
						<label class="btn btn-xpertos">
						  <input type="radio" name="modo_servicio" id="option2" autocomplete="off" value="urgente"> Urgente
						</label>
					<?php endif; if($post['modo_servicio'] == 'prioritario') : ?>
						<label class="btn btn-xpertos">
						  <input type="radio" name="modo_servicio" id="option3" autocomplete="off" value="prioritario"> Prioritario
						</label>
						<?php endif; ?>
				  </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="direccion" class="col-sm-4 control-label">Dirección del servicio</label>
		    <div class="col-sm-8">
		      <?= $post['direccion'] ?>
		    </div>
		  </div>
		  <div class="form-group">
		  	<label for="recibe" class="col-sm-4 control-label">Requerimiento</label>
		  	<div class="col-sm-8">
		      <?= $post['requerimiento'] ?>
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
