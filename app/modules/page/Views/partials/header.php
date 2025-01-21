<section class="header-top align-self-center">
    <div class="bg-dark-blue d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-end gap-3">
            <?php if ($this->infopage->info_pagina_telefono) { ?>
                <div class="info-top-header">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                    <span class=" font-14px"><?php echo obtenerPrimerNumero($this->infopage->info_pagina_telefono) ?></span>
                </div>
            <?php } ?>
            <?php if ($this->infopage->info_pagina_correos_contacto) { ?>
                <div class="info-top-header">
                    <i class="fa-regular fa-envelope"></i>
                    <span class=" font-14px"><?php echo obtenerPrimerNumero($this->infopage->info_pagina_correos_contacto) ?></span>
                </div>
            <?php } ?>

        </div>
    </div>
</section>
<section class="bg-white header-bottom align-self-center">
    <div class="container h-100">
        <div class="row justify-content-between h-100">
            <div class="col-md-2 d-flex align-items-center ">
                <a href="/">
                    <img src="/skins/page/images/Corte/" class="logo">
                </a>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="row h-100">
                    <div class="col-lg-12 col-md-12 d-none d-lg-block">

                        <nav>
                            <ul id="menu">
                                <li class="<?php echo $this->botonactivo == 1 ? 'active' : '' ?>"><a href="/"><span>HOME</span></a></li>
                                <li class="<?php echo $this->botonactivo == 2 ? 'active' : '' ?>"><a href="/page/inventario"><span>INMUEBLES</span></a></li>
                                <li class="<?php echo $this->botonactivo == 3 ? 'active' : '' ?>"><a href="/page/conozcanos"><span>QUI&Eacute;NES SOMOS</span></a></li>
                                <li class="<?php echo $this->botonactivo == 4 ? 'active' : '' ?>"><a href="/page/servicios"><span>SERVICIOS</span></a></li>
                                <!--  <li class="<?php echo $this->botonactivo == 5 ? 'active' : '' ?>"><a href="/page/procesos"><span>PROCESOS</span></a></li> -->

                                <?php if (is_countable($this->links) && count($this->links) >= 1) { ?>
                                    <li><a href="#"><span>PAGOS</span></a>
                                        <ul>
                                            <?php foreach ($this->links as $link) { ?>
                                                <li><a href="<?= $link->publicidad_enlace ?>" <?= $link->publicidad_tipo_enlace === '1' ? 'target="_blank"' : '' ?>><?= $link->publicidad_texto_enlace ?></a></li>
                                            <?php } ?>
                                            <!-- <li><a href="/page/arrendatario"><i class="icon-menu fas fa-caret-right"></i>ARRENDATARIO</a></li>
                                    <li><a href="/page/propietario"><i class="icon-menu fas fa-caret-right"></i>PROPIETARIO</a></li> -->
                                        </ul>
                                    </li>
                                <?php } ?>



                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-md-4 d-flex align-items-center  gap-3 h-100 justify-content-end">
                <div class="d-flex align-items-center justify-content-end gap-3 h-100">

                    <div class="search">
                        <form action="/page/inventario/filtrar">

                            <input type="text" class="search__input" placeholder="C&oacute;digo" name="codigo" required>
                            <button class="search__button">
                                <svg class="search__icon" aria-hidden="true" viewBox="0 0 24 24">
                                    <g>
                                        <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                                    </g>
                                </svg>
                            </button>
                        </form>

                    </div>


                </div>
                <div class="vr"></div>
                <?php if ($this->infopage->info_pagina_facebook) { ?>
                    <a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank" class="red">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                <?php } ?>
                <?php if ($this->infopage->info_pagina_twitter) { ?>
                    <a href="<?php echo $this->infopage->info_pagina_twitter ?>" target="_blank" class="red">
                        <i class="fab fa-twitter"></i>
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

</section>

<div class="botonera-resposive">
    <div class=" col-12 col-md-8">
        <div class="col-md-4">
            <a class="btn-menu"><i class="fas fa-times-circle icon-naranja"></i></a>
        </div>
    </div>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>
                    <li class="item"><a href="/" rel="noopener noreferrer"><i class="fas fa-home me-2"></i>HOME</a></li>
                </td>
            </tr>
            <tr>
                <td>
                    <li class="item"><a href="/page/inventario"><i class="fa-solid fa-building  me-2"></i><span>INVENTARIO DE INMUEBLES</span></a>
                    </li>
                </td>
            </tr>
            <tr>
                <td>
                    <li class="item"><a href="/page/conozcanos"><i class="fa-solid fa-people-roof me-2"></i><span>CON&Oacute;ZCANOS</span></a>
                    </li>
                </td>
            </tr>
            <tr>
                <td>
                    <li class="item"><a href="/page/servicios"><i class="fas fa-shield-alt me-2"></i><span>SERVICIOS</span></a>
                    </li>
                </td>
            </tr>
            <tr>
                <td>
                    <li class="item"><a href="/page/procesos"><i class="fa-solid fa-chalkboard-user me-2"></i><span>PROCESOS</span></a>
                    </li>
                </td>
            </tr>
            <tr>
                <td>
                    <li class="item"><a href="/page/contacto"><i class="fa-solid fa-address-book me-2"></i><span>CONTACTO</span></a>
                    </li>
                </td>
            </tr>
            <tr>
                <td>
                    <li class="item"><a href="/page/archivos"><i class="fa-solid fa-file  me-2"></i><span>ARCHIVOS DESCARGABLES</span></a>
                    </li>
                </td>
            </tr>
            <?php if (is_countable($this->links) && count($this->links) >= 1) { ?>

                <tr>
                    <td>
                        <li class="item">
                            <a href="/page/pagos" rel="noopener noreferrer" data-bs-toggle="collapse" data-bs-target="#sub-menu">
                                <i class="fa-regular fa-money-bill-1 me-2"></i>
                                <span>PAGOS</span>
                            </a>
                            <ul class="collapse" id="sub-menu">
                                <?php foreach ($this->links as $link) { ?>

                                    <li class="item2">
                                        <a href="<?= $link->publicidad_enlace ?>" <?= $link->publicidad_tipo_enlace === '1' ? 'target="_blank"' : '' ?>>
                                            <i class="fas fa-question-circle"></i> <?= $link->publicidad_texto_enlace ?>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>