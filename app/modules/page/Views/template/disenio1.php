<div class="caja-contenido-simple design-one" style="background-color: <?php if($contenido->contenido_fondo_color){ echo  $contenido->contenido_fondo_color;  } else if($colorfondo){ echo $colorfondo; }   ?>">
	<?php if($contenido->contenido_titulo_ver == 1){ ?>
		<h2><?php echo $contenido->contenido_titulo; ?></h2>
	<?php } ?>
	<div class="row">
		<div <?php if($contenido->contenido_imagen){ ?>class="col-md-7 order-2 order-md-1"<?php } else { ?>class="col-sm-12"<?php } ?>>
			<div class="descripcion">
				<?php echo $contenido->contenido_descripcion; ?>
			</div>
			<?php if ($contenido->contenido_archivo) { ?>
				<div align="center" class="archivo">
					<a href="/files/<?php echo $contenido->contenido_archivo ?>" target="blank">Descargar Archivo <i class="fas fa-download"></i></a>
				</div>
			<?php } ?>
	
				<?php if ($contenido->contenido_enlace) { ?>
					<a href="<?php echo $contenido->contenido_enlace; ?>" class="btn-naranja" <?php if ($contenido->contenido_enlace_abrir == 1) { ?> target="blank"  <?php } ?> > <?php if( $contenido->contenido_vermas){ ?><?php echo $contenido->contenido_vermas; ?><?php } else { ?>Ver Más<?php } ?></a>
				<?php } ?>
		
		</div>
		<?php if($contenido->contenido_imagen){ ?>
			<div class="col-md-5 order-1 order-md-2">
				<img src="/images/<?php echo $contenido->contenido_imagen; ?>">
			</div>
		<?php } ?>
	</div>
</div>