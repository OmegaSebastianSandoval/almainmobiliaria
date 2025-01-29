<section class="map-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4743.240935457936!2d-74.1211512!3d4.6180262999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f99528074fc6d%3A0x3c9ac641d8921427!2sAlma%20Asesores%20Inmobiliarios%20Sas!5e1!3m2!1ses-419!2sco!4v1737556119545!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<div class="footer">
    <div class="container">
        <div class="row text-center text-md-start">
            <div class="col-12 col-lg-3 text-center d-flex align-items-center justify-content-center">
                <img src="/skins/page/images/Corte/LogoFooter.png" alt="Logo" class="img-fluid mb-3">
            </div>
            <div class="col-12  col-lg-9 mt-4">
                <ul class="list-footer">
                    <li><a href="/">HOME</a></li>
                    <li><a href="/inventario">INMUEBLES</a></li>
                    <li><a href="/page/conozcanos">QUI&Eacute;NES SOMOS</a></li>
                    <li><a href="/page/servicios">SERVICIOS</a></li>

                </ul>
                <div class="row g-0 text-center">
                    <div class="col-lg-4 d-flex align-items-center justify-content-lg-start justify-content-center  gap-2 p-0 m-0">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <span class=""> <?= $this->infopage->info_pagina_telefono ?></span>
                    </div>
                    <div class="col-lg-4 d-flex  align-items-center justify-content-lg-start justify-content-center  gap-2 p-0 m-0">
                        <i class="fa-regular fa-envelope"></i>
                        <span class=""> <?= $this->infopage->info_pagina_correos_contacto ?></span>
                    </div>
                    <div class="col-lg-4 d-flex  align-items-center justify-content-lg-start justify-content-center  gap-2 p-0 m-0">
                        <i class="fa-solid fa-location-dot"></i>
                        <span class=""> <?= $this->infopage->info_pagina_direccion_contacto ?></span>
                    </div>
                </div>
                <div class="row my-3 justify-content-start">
                    <div class="social-section">
                        <span>Síguenos en:</span>
                        <div class="social-icons">
                            <?php if ($this->infopage->info_pagina_facebook) { ?>
                                <a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank" class="red">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            <?php } ?>
                            <?php if ($this->infopage->info_pagina_twitter) { ?>
                                <a href="<?php echo $this->infopage->info_pagina_twitter ?>" target="_blank" class="red">
                                    <i class="bi bi-twitter-x"></i>

                                </a>
                            <?php } ?>
                            <?php if ($this->infopage->info_pagina_instagram) { ?>
                                <a href="<?php echo $this->infopage->info_pagina_instagram ?>" target="_blank" class="red">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            <?php } ?>
                            <?php if ($this->infopage->info_pagina_pinterest) { ?>
                                <a href="<?php echo $this->infopage->info_pagina_pinterest ?>" target="_blank" class="red">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            <?php } ?>
                            <?php if ($this->infopage->info_pagina_youtube) { ?>
                                <a href="<?php echo $this->infopage->info_pagina_youtube ?>" target="_blank" class="red">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            <?php } ?>
                            <?php if ($this->infopage->info_pagina_linkedin) { ?>
                                <a href="<?php echo $this->infopage->info_pagina_linkdn ?>" target="_blank" class="red">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            <?php } ?>
                            <?php if ($this->infopage->info_pagina_google) { ?>
                                <a href="<?php echo $this->infopage->info_pagina_google ?>" target="_blank" class="red">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            <?php } ?>
                            <?php if ($this->infopage->info_pagina_flickr) { ?>
                                <a href="<?php echo $this->infopage->info_pagina_flickr ?>" target="_blank" class="red">
                                    <i class="fab fa-flickr"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <hr class="hr-footer">
    <div class="footer-bottom">
        <div class="container">
            <p class="mb-0">Todos los derechos reservados</p>
        </div>
    </div>
</div>