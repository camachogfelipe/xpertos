<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php if(isset($message) and $message === true) : ?>
		<div class="alert alert-info alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<?php
				$xpertos_options = load_option_theme('xpertos_evaluate_message');
				echo $xpertos_options;
			?>
		</div>
		<?php endif; ?>
		<form class="form-horizontal data_validate" method="post">
		  <input type="hidden" name="option_form" value="confirm">
		  <div class="form-group">
		    <!--<label for="servicio" class="col-sm-2 control-label">Servicios</label>-->
		    <div class="col-sm-12">
		      <table class="table-bordered table-responsive">
		      	<thead>
		      		<th>Nuestra compañía</th>
		      		<th width="10%" class="text-center">SI | NO</th>
		      	</thead>
		      	<tbody>
		      		<tr>
			      		<td>¿Nuestro servicio al cliente fue amable y eficiente?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p1" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p1" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿La respuesta a sus requerimientos fue rápida y completa?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p2" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p2" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿Fue sencillo y práctico su proceso de compra?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p3" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p3" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
		      	</tbody>
		      </table>
		    </div>
		  </div><div class="form-group">
		    <!--<label for="servicio" class="col-sm-2 control-label">Servicios</label>-->
		    <div class="col-sm-12">
		      <table class="table-bordered table-responsive">
		      	<thead>
		      		<th>Calidad del servicio</th>
		      		<th width="10%" class="text-center">SI | NO</th>
		      	</thead>
		      	<tbody>
		      		<tr>
			      		<td>¿Encontró sus espacios limpios, ordenados y armoniosos?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p4" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p4" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿Encontró su ropa limpia, fresca y disponible para su uso?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p5" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p5" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿Quedó todo en su hogar funcionando bien?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p6" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p6" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿Quedó usted tranquilo(a) con la vinculación formal de su empleada?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p7" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p7" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿Quedó satisfecho(a) con la calidad de nuestro servicio?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p8" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p8" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
		      	</tbody>
		      </table>
		    </div>
		  </div><div class="form-group">
		    <!--<label for="servicio" class="col-sm-2 control-label">Servicios</label>-->
		    <div class="col-sm-12">
		      <table class="table-bordered table-responsive">
		      	<thead>
		      		<th>Nuestros Xpertos</th>
		      		<th width="10%" class="text-center">SI | NO</th>
		      	</thead>
		      	<tbody>
		      		<tr>
			      		<td>¿El trabajo realizado cumple con sus expectativas de calidad?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p9" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p9" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿Nuestra(o) Xperta(o) llegó puntual?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p10" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p10" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿Nuestra(o) Xperta(o) siguió debidamente sus recomendaciones?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p11" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p11" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿El trato de nuestra(o) Xperta(o) fue respetuoso y cordial?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p12" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p12" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿Nuestra(o) Xperta(o) fue eficiente en el uso del tiempo?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p13" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p13" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿Recomendaría a nuestra(o) Xperta(o)?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p14" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p14" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
		      	</tbody>
		      </table>
		    </div>
		  </div><div class="form-group">
		    <!--<label for="servicio" class="col-sm-2 control-label">Servicios</label>-->
		    <div class="col-sm-12">
		      <table class="table-bordered table-responsive">
		      	<thead>
		      		<th>Su seguridad</th>
		      		<th width="10%" class="text-center">SI | NO</th>
		      	</thead>
		      	<tbody>
		      		<tr>
			      		<td>¿Sus objetos de valor se encuentran completos y en su lugar?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p15" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p15" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
			      	<tr>
			      		<td>¿Nuestra(o) Xperta(o) se presentó debidamente identificado y uniformado?</td>
			      		<td class="text-center">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p16" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p16" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
		      	</tbody>
		      </table>
		    </div>
		  </div><div class="form-group">
		    <!--<label for="servicio" class="col-sm-2 control-label">Servicios</label>-->
		    <div class="col-sm-12">
		      <textarea class="form-control" placeholder="Sus recomendaciones o sugerencias" name="p17"></textarea>
		    </div>
		  </div><div class="form-group">
		    <!--<label for="servicio" class="col-sm-2 control-label">Servicios</label>-->
		    <div class="col-sm-12">
		      <table class="table-bordered table-responsive">
		      	<tbody>
		      		<tr>
			      		<td>¿Le gustaría que le enviemos un Xperta(o) diferente para su próximo servicio?</td>
			      		<td class="text-center" width="10%">
			      		  <div class="btn-group" data-toggle="buttons">
							<label class="btn btn-xpertos active">
							  <input type="radio" name="p18" id="option1" autocomplete="off" checked value="S"> SI
							</label>
							<label class="btn btn-xpertos">
							  <input type="radio" name="p18" id="option2" autocomplete="off" value="N"> NO
							</label>
						  </div>
			      		</td>
			      	</tr>
		      	</tbody>
		      </table>
		    </div>
		  </div>
		  <div class="form-group">
		    <!--<label for="servicio" class="col-sm-2 control-label">Servicios</label>-->
		    <div class="col-sm-12">
		      <textarea class="form-control" placeholder="¿Qué otro(s) servicio(s) quisiera que nuestra compañía le prestara?" name="p19"></textarea>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="servicio" class="col-sm-2 control-label">Nombre de la(del) Xperta(o)</label>
		    <div class="col-sm-10">
		      <input type="text" required="required" class="form-control" name="xperto">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="servicio" class="col-sm-2 control-label">Fecha del servicio</label>
		    <div class="col-sm-10">
		      <input type="text" id="daterange2" class="form-control" name="fecha_servicio">
		    </div>
		  </div>
		  <button type="submit" class="btn btn-primary">Evaluar</button>
		</form>
	</div>
</div>
