<?php
	global $current_user;
	get_currentuserinfo();
?>
<form method="post" id="formedit" class="data_validate form-horizontal" action="<?= home_url( add_query_arg( array(), $wp->request ) ) ?>/">
  <div class="form-group">
    <label class="col-sm-4 control-label">Nombres</label>
    <div class="col-sm-8">
      <input required type="text" class="form-control" id="first_name" placeholder="Nombre(s)" name="first_name" value="<?php echo $current_user->user_firstname; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Apellidos</label>
    <div class="col-sm-8">
      <input required type="text" class="form-control" id="last_name" placeholder="Apellido(s)" name="last_name" value="<?php echo $current_user->user_lastname; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Email</label>
    <div class="col-sm-8">
      <input required data-rule-email="email" type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $current_user->user_email; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Teléfono</label>
    <div class="col-sm-8">
      <input required type="text" class="form-control" id="log" placeholder="Teléfono" name="phone" value="<?php echo $current_user->user_phone ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Celular</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="log" placeholder="Celular" name="celular" value="<?php echo $current_user->user_celular; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Contraseña</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="pass1" placeholder="Contraseña" name="pass1" autocomplete="off" value="">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Repite la contraseña</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="pass1" placeholder="Contraseña" name="pass2" autocomplete="off" value="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-12 text-right">
      <button type="submit" id="edit" name="wp-submit" class="btn btn-xpertos">Actualizar</button>
    </div>
  </div>
  <input type="hidden" name="redirect_to" value="<?= home_url( add_query_arg( array(), $wp->request ) ) ?>/">
  <input type="hidden" name="xpertos_action" value="edit">
</form>
<?php
if(isset($_REQUEST['error'])) :
  ?>
  <div class="alert alert-danger">Los datos no son correctos. Por favor verificalos e intentalo nuevamente.</div>
  <?PHP
endif;
?>
