<form method="post" id="formlogin" class="data_validate form-horizontal" action="<?= home_url( add_query_arg( array(), $wp->request ) ) ?>/">
  <div class="form-group">
    <label class="col-sm-4 control-label">Nombre de usuario</label>
    <div class="col-sm-8">
      <input required type="text" class="form-control" id="log" placeholder="Nombre de usuario" name="log">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Contraseña</label>
    <div class="col-sm-8">
      <input required type="password" class="form-control" id="log" placeholder="Contraseña" name="pas">
    </div>
  </div>
  <div class="form-group">
    <div class="checkbox col-sm-4 col-sm-offset-2">
      <label>
        <input type="checkbox" name="rememberme" value="forever"> Recuerdame
      </label>
    </div>
    <div class="col-sm-6">
      <button type="submit" id="login" name="wp-submit" class="btn btn-xpertos">Iniciar sesión</button>
    </div>
  </div>
  <input type="hidden" name="redirect_to" value="<?= home_url( add_query_arg( array(), $wp->request ) ) ?>/">
  <input type="hidden" name="xpertos_action" value="login">
</form>
<?php
if(isset($_REQUEST['error'])) :
  ?>
  <div class="alert alert-danger">Los datos no son correctos. Por favor verificalos e intentalo nuevamente.</div>
  <?PHP
endif;
?>
