<div class="caja-contenido-simple  design-four four-<?php echo $contenido->contenido_id ?>" style="background-color: <?php if ($contenido->contenido_fondo_color) {
																																																												echo  $contenido->contenido_fondo_color;
																																																											} else if ($colorfondo) {
																																																												echo $colorfondo;
																																																											}   ?> <?php if ($contenido->contenido_borde == '1') {
																																																																echo '; border: 2px solid #13436B; border-radius:20px; padding: 0 !important; overflow: hidden; ';
																																																															} ?>">

	<?php if ($contenido->contenido_imagen) { ?>
		<div class="imagen-contenido">

			<img src="/images/<?php echo $contenido->contenido_imagen; ?>">

			<?php if ($contenido->contenido_titulo_ver == 1 && $contenido->contenido_seccion == '3') { ?>
				<h2><?php echo $contenido->contenido_titulo; ?></h2>
			<?php } ?>
		</div>
	<?php } ?>
	<?php if ($contenido->contenido_titulo_ver == 1 && $contenido->contenido_seccion != '3') { ?>
		<h2><?php echo $contenido->contenido_titulo; ?></h2>
	<?php } ?>

	<div class="content-descripcion">
		<div class="descripcion" style="<?php if ($contenido->contenido_borde == '1') {
																			echo 'padding: 10px; ';
																		} ?>">
			<?php echo $contenido->contenido_descripcion; ?>
		</div>

		<?php if ($contenido->contenido_archivo) { ?>
			<div align="center" class="archivo">
				<a href="/files/<?php echo $contenido->contenido_archivo ?>" target="blank">Descargar Archivo <i class="fas fa-download"></i></a>
			</div>
		<?php } ?>
		<?php if ($contenido->contenido_enlace) { ?>

			<a href="<?php echo $contenido->contenido_enlace; ?>" <?php if ($contenido->contenido_enlace_abrir == 1) { ?> target="_blank" <?php } ?> class=" btn-home">

				<?php if ($contenido->contenido_vermas) { ?><?php echo $contenido->contenido_vermas; ?><?php } else { ?>Ver Más<?php } ?>

			</a>

		<?php } ?>
	</div>
</div>