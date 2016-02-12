<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-12 col-lg-12">
		<?php
		if($confirm == true) :
			$message = load_option_theme( 'xpertos_shopping_message' );
		?>
		<div class="page-header">
		  <?= $message ?>
		</div>
		<h2>Resumen Transacción</h2>
		<table class="table table-responsive">
			<tr>
				<td>Estado de la transaccion</td>
				<td><?php echo $estadoTx; ?></td>
			</tr>
			<tr>
				<td>ID de la transaccion</td>
				<td><?php echo $transactionId; ?></td>
			</tr>
			<tr>
				<td>Referencia de la venta</td>
				<td><?php echo $reference_pol; ?></td>
			</tr>
			<tr>
				<td>Referencia de la transaccion</td>
				<td><?php echo $referenceCode; ?></td>
			</tr>
			<tr>
			<?php
			if($pseBank != null) :
			?>
			<tr>
				<td>cus </td>
				<td><?php echo $cus; ?> </td>
			</tr>
			<tr>
				<td>Banco </td>
				<td><?php echo $pseBank; ?> </td>
			</tr>
			<?php
			endif;
			?>
			<tr>
				<td>Valor total</td>
				<td>$<?php echo number_format($TX_VALUE); ?></td>
			</tr>
			<tr>
				<td>Moneda</td>
				<td><?php echo $currency; ?></td>
			</tr>
			<tr>
				<td>Descripción</td>
				<td><?php echo ($extra1); ?></td>
			</tr>
			<tr>
				<td>Entidad:</td>
				<td><?php echo ($lapPaymentMethod); ?></td>
			</tr>
		</table>
		<?php
		else :
		?>
		<h2>Error al validar la firma digital
		<?php
		endif;
		?>
	</div>
</div>
