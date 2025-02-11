<?php if ($contenido->contenido_enlace) { ?>
    <a
        href="<?php echo $contenido->contenido_enlace; ?>"
        target="<?php echo $contenido->contenido_enlace_abrir ==1 ? '_blank' : ''; ?>"
        >
    <?php } ?>

    <div class="card-giratoria">
        <div class="card-inner">
            <div class="card-front">
                <?php if ($contenido->contenido_imagen) { ?>

                    <img src="/images/<?php echo $contenido->contenido_imagen; ?>">

                <?php } ?>
                <?php if ($contenido->contenido_titulo_ver == 1) { ?>
                    <h2><?php echo $contenido->contenido_titulo; ?></h2>
                <?php } ?>
            </div>
            <div class="card-back">
                <div class="descripcion">
                    <?php echo $contenido->contenido_descripcion; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if ($contenido->contenido_enlace) { ?>
    </a>
<?php } ?>