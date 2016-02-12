<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<form class="form-horizontal data_validate" method="post">
		  <input type="hidden" name="option_form" value="confirm">
		  <input type="hidden" name="servicio" value="limpieza">
		  <div class="form-group">
		    <label for="servicio" class="col-sm-2 control-label">Servicios</label>
		    <div class="col-sm-10">
		      <div class="btn-group">
						<a href="#" class="btn btn-xpertos active">Limpieza</a>
						<a href="<?= home_url('reparacion-y-mantenimiento') ?>" class="btn btn-xpertos">Reparación y mantenimiento</a>
				  </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="limpieza" class="col-sm-2 control-label">Limpieza</label>
		    <div class="col-sm-10">
		      <div class="btn-group" data-toggle="buttons">
						<label class="btn btn-xpertos active">
						  <input type="radio" name="limpieza" id="option1" autocomplete="off" checked value="hogar"> Hogar
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="limpieza" id="option2" autocomplete="off" value="oficina"> Oficina
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="limpieza" id="option3" autocomplete="off" value="consultorio"> Consultorio
						</label>
				  </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="intensidad" class="col-sm-2 control-label">Intensidad</label>
		    <div class="col-sm-10">
		      <div class="btn-group" data-toggle="buttons">
						<label class="btn btn-xpertos active">
						  <input type="radio" name="intensidad" id="4_horas" autocomplete="off" checked value="4"> 4 horas
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="intensidad" id="8_horas" autocomplete="off" value="8"> 8 horas
						</label>
				  </div>
					<br><span id="helpBlock">Si desea programar un servicio en u horario diferente a este comuniquese con nosotros para verificar disponibilidad</span>
		    </div>
		  </div>
			<div class="form-group">
				<label for="no_servicios" class="col-sm-2 control-label">Número de servicios</label>
		    <div class="col-sm-10">
		      <div class="btn-group" data-toggle="buttons">
						<label class="btn btn-xpertos active">
						  <input type="radio" name="no_servicios" id="option_no_servicios" autocomplete="off" checked value="1"> Única vez
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="no_servicios" id="option_no_servicios" autocomplete="off" value="2"> Dos servicios
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="no_servicios" id="option_no_servicios" autocomplete="off" value="4"> Cuatro servicios
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="no_servicios" id="option_no_servicios" autocomplete="off" value="8"> Ocho servicios
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="no_servicios" id="option_no_servicios" autocomplete="off" value="12"> Doce servicios
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="no_servicios" id="option_no_servicios" autocomplete="off" value="24"> Tiempo completo
						</label>
				  </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="fechas" class="col-sm-2 control-label">Programa tu servicio</label>
		    <div class="col-sm-10">
		      <label for="fecha_inicio">Fecha de inicio del servicio</label>
		      <input type="text" required class="form-control datepicker" name="fechas[]" placeholder="Escoge el día">
					<div class="calendar-limpieza"></div>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="hora_inicio" class="col-sm-2 control-label">Hora de inicio</label>
		    <div class="col-sm-10">
		      <div class="btn-group" data-toggle="buttons">
						<label class="btn btn-xpertos active">
						  <input type="radio" name="hora_inicio" id="7am" autocomplete="off" checked value="7 am"> 7 a.m.
						</label>
						<label class="btn btn-xpertos 1pm">
						  <input type="radio" name="hora_inicio" id="1pm" autocomplete="off" value="1 pm"> 1 p.m.
						</label>
				  </div>
		    </div>
		  </div>
		  <div class="form-group">
				<label class="col-sm-12"><strong>Requerimientos especiales</strong></label>
		    <label for="no_tocar" class="col-sm-2 control-label">¿Qué quieres que no toquemos?</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="inputNoTocar" placeholder="No tocar" name="no_tocar">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="direccion" class="col-sm-2 control-label">Dirección del servicio</label>
		    <div class="col-sm-10">
		      <input type="text" required class="form-control" id="inputDireccion" placeholder="Dirección" name="direccion">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="recibe" class="col-sm-2 control-label">¿Quién recibira a nuestra experta?</label>
		    <div class="col-sm-10">
		      <div class="btn-group" data-toggle="buttons">
						<label class="btn btn-xpertos active">
						  <input type="radio" name="recibe" id="option1" class="recibe" autocomplete="off" checked value="persona"> Una persona
						</label>
						<label class="btn btn-xpertos">
						  <input type="radio" name="recibe" id="option2" class="recibe" autocomplete="off" value="llaves"> Dejo las llaves en portería
						</label>
				  </div>
		    </div>
		  </div>
			<div class="form-group nombre_recibe">
				<label for="nombre_recibe" class="col-sm-12">Nombre de la persona que recibirá a nuestra(o) xperta(o)</label>
				<div class="col-sm-12">
					<div><input type="text" name="nombre_recibe" class="nombre_recibe form-control" placeholder="Nombre de la persona que recibirá a nuestra(o) xperta(o)" ></div>
				</div>
			</div>
		  <p></p>
		  <div class="form-group">
				<label for="llaves_final" class="col-sm-12">¿Tienes alguna sugerencia especial para nosotros?</label>
		  	<div class="col-sm-12">
		      <textarea class="form-control" rows="3" name="sugerencias"></textarea>
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
