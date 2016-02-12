<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<form class="form-horizontal data_validate" method="post">
		  <input type="hidden" name="option_form" value="confirm">
		  <input type="hidden" name="servicio" value="todero">
		  <div class="form-group">
		    <label for="servicio" class="col-sm-2 control-label">Servicios</label>
		    <div class="col-sm-10">
		      <div class="btn-group">
						<a href="<?= home_url('limpieza') ?>" class="btn btn-xpertos">Limpieza</a>
						<a href="#" class="btn btn-xpertos active">Reparación y mantenimiento</a>
				  </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="todero" class="col-sm-2 control-label">Escoge el servicio</label>
		    <div class="col-sm-10">
		      <div class="btn-group" data-toggle="buttons">
						<label class="btn btn-xpertos active">
						  <input type="radio" name="todero" id="option1" autocomplete="off" checked value="albañileria"> Albañilería
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="todero" id="option2" autocomplete="off" value="arreglos"> Arreglos
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="todero" id="option3" autocomplete="off" value="electricidad"> Electricidad
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="todero" id="option4" autocomplete="off" value="instalaciones"> Instalaciones
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="todero" id="option4" autocomplete="off" value="pintura"> Pintura
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="todero" id="option4" autocomplete="off" value="plomeria"> Plomería
						</label>
				  </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="modo_servicio" class="col-sm-2 control-label">Modo del servicio</label>
		    <div class="col-sm-10">
		      <div class="btn-group" data-toggle="buttons">
						<label class="btn btn-xpertos active">
						  <input type="radio" name="modo_servicio" id="option1" autocomplete="off" checked value="programado"> Programado
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="modo_servicio" id="option2" autocomplete="off" value="urgente"> Urgente
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="modo_servicio" id="option3" autocomplete="off" value="prioritario"> Prioritario
						</label>
				  </div>
					<div>
						<table class="table table-responsive">
							<thead>
								<th>Servicio</th>
								<th>Condiciones</th>
							</thead>
							<tbody>
								<tr>
									<td>Todero programado</td>
									<td>No es el mismo día, hasta dos horas de servicio</td>
								</tr>
								<tr>
									<td>Todero urgente (4 horas de respuesta)</td>
									<td>Mismo día, hasta dos horas de servicio</td>
								</tr>
								<tr>
									<td>Todero prioritario</td>
									<td>Prioritario, hasta dos horas de servicio</td>
								</tr>
							</tbody>
						</table>
					</div>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="direccion" class="col-sm-2 control-label">Dirección del servicio</label>
		    <div class="col-sm-10">
		      <input type="text" required class="form-control" id="inputDireccion" placeholder="Dirección" name="direccion">
		    </div>
		  </div>
			<div class="form-group">
		    <label for="requerimiento" class="col-sm-2 control-label">Requerimiento</label>
		    <div class="col-sm-10">
		    	<textarea required class="form-control" rows="3" name="requerimiento" placeholder="Describa brevemente su requerimiento. Ej: Humedad en la pared"></textarea>
				<!--<span id="helpBlock">Describa brevemente su requerimiento. Ej: Humedad en la pared</span>-->
		    </div>
		  </div>
		  <?php if($plugin == TRUE) : ?>
		  <div class="form-group">
		    <label for="code" class="col-sm-2 control-label">¿Tienes un código de descuento?</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputCode" placeholder="Código" name="code">
		    </div>
		  </div>
		  <?php endif; ?>
		  <div class="form-group">
		    <label for="recibe" class="col-sm-12"><strong>Acepto los términos y condiciones</strong></label>
		    <div class="col-sm-12">
		      <div class="btn-group terminos" data-toggle="buttons">
						<label class="btn btn-xpertos active">
						  <input type="radio" name="acepto_condiciones" id="option1" autocomplete="off" checked value="si"> Si
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="acepto_condiciones" id="option2" autocomplete="off" value="no"> No
						</label>
				  </div>
		    </div>
		  </div>
		  <button type="submit" class="btn btn-primary">Confirmar</button>
		</form>
	</div>
</div>
