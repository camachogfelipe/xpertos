<?php
  $args = array( 'post_type' => 'slider' );
  $loop = new WP_Query( $args );
  $xpertos_options = load_options();
?>
<div class="slidediv">
  <div class="flexslider">
    <ul class="slides">
      <?php
        while ( $loop->have_posts() ) : $loop->the_post();
          ?>
          <li>
            <?php
              if ( has_post_thumbnail() ) :
                the_post_thumbnail( 'image-gallery' );
              endif;
            ?>
          </li>
          <?php
        endwhile;
      ?>
    </ul>
  </div>
  <div id="contact-home" class="section-contact<?= (!empty($loop)) ? ' contact-absolute' : '' ?>"">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 top-bar-contact">
          <i class="fa fa-whatsapp"></i> <?= (isset($xpertos_options->phone3_option) and !empty($xpertos_options->phone3_option)) ? $xpertos_options->phone3_option : "" ?>&nbsp;&nbsp;
          <i class="fa fa-phone"></i> <?= (isset($xpertos_options->phone1_option) and !empty($xpertos_options->phone1_option)) ? $xpertos_options->phone1_option : "" ?>&nbsp;&nbsp;&nbsp;
          <?php if(!is_user_logged_in()) : ?>
          <a href="#" data-toggle="modal" data-target="#modal-login">accede a tu cuenta</a> <!--| <a href="<?= home_url('wp-login.php?xpertos_action=register') ?>">registrarse</a>-->
          <?php else : ?>
          <a href="<?= home_url( add_query_arg( array(), $wp->request ) ) . "/?xpertos_action=logout" ?>">Salir</a> |
          <a href="#" data-toggle="modal" data-target="#modal-edit">Edita tus datos</a> |
          Bienvenido <?php global $current_user; get_currentuserinfo(); echo $current_user->user_firstname; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1">
         <?= (!empty($xpertos_options->xpertos_logo_contact_option)) ? wp_get_attachment_image($xpertos_options->xpertos_logo_contact_option, 'image-logo-contact') : '' ?>
          <h2><?= load_option_theme('xpertos_home_one_message') ?></h2>
          <h3><?= load_option_theme('xpertos_home_two_message') ?></h3>
          <h4><?= load_option_theme('xpertos_home_three_message') ?></h4>
          <form action="<?= home_url( add_query_arg( array(), $wp->request ) ) ?>/" class="form data_validate" method="post">
            <input type="hidden" name="xpertos_action" value="register">
            <?php if(!is_user_logged_in()) : ?>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon btn btn-xpertos"><i class="glyphicon glyphicon-user"></i></span>
                    <input required type="text" name="first_name" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" placeholder="Ingresa tu nombre">
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon btn btn-xpertos"><i class="glyphicon glyphicon-user"></i></span>
                    <input required type="text" name="last_name" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" placeholder="Ingresa tus apellidos">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon btn btn-xpertos"><i class="glyphicon glyphicon-phone"></i></span>
                    <input required type="text" name="phone" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" placeholder="Ingresa tu número de teléfono">
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon btn btn-xpertos"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input required type="email" name="email" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" placeholder="Ingresa tu email">
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <strong>Elige tu servicio</strong>
              </div>
              <?php if(!is_user_logged_in()) : ?>
              <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-right">
                <!--<button type="submit" name="submit" value="limpieza" class="btn btn-xpertos form-control"><strong>aseo y limpieza</strong></button>-->
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-xpertos active">
      						  <input type="radio" name="servicio" id="option_servicio" autocomplete="off" checked value="limpieza"> aseo y limpieza
      						</label>
                  <label class="btn btn-xpertos">
      						  <input type="radio" name="servicio" id="option_servicio" autocomplete="off" value="reparaciones"> reparaciones y mantenimiento
      						</label>
                </div>
              </div>
              <?php else : ?>
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <a href="<?= home_url('limpieza') ?>" title="Aseo y Limpieza" class="btn btn-xpertos form-control"><strong>aseo y limpieza</strong></a>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <a href="<?= home_url('reparacion-y-mantenimiento') ?>" title="Aseo y Limpieza" class="btn btn-xpertos form-control"><strong>reparaciones y mantenimiento</strong></a>
              </div>
              <?php endif; ?>
            </div>
            <?php if(!is_user_logged_in()) : ?>
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <br><button type="submit" name="submit" value="servicio" class="btn btn-xpertos form-control"><strong>comprar</strong></button>
              </div>
            </div>
            <?php endif; ?>
          </form>
        </div>
      </div>
      </div>
  </div>
  <header id="masthead" class="site-header-menu" role="banner">
    <?php get_template_part( 'template-parts/section-menu', 'none' ); ?>
  </header><!-- #masthead -->
</div>
