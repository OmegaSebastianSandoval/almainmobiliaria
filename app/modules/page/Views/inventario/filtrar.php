<section class="section-filtros">
    <div class="container pt-2">
        <form action="/page/inventario/filtrar">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="departamento" id="departamento" required>
                        <option value="" selected disabled>--Departamento--</option>
                        <?php foreach ($this->departamentos as  $departamento) { ?>
                            <option value="<?php echo $departamento->id ?>" <?php echo $this->departamento === $departamento->id ? 'selected' : '' ?>><?php echo $departamento->nombre ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="ciudad" id="ciudad">
                        <option value="" selected disabled>--Ciudad-- </option>
                        <?php foreach ($this->ciudades as  $ciudad) { ?>
                            <option value="<?php echo $ciudad->id ?>" data-departamento="<?php echo $ciudad->departamento ?>" <?php echo $this->ciudad === $ciudad->id ? 'selected' : '' ?>><?php echo $ciudad->nombre ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="sector" id="sector">
                        <option value="" selected disabled> --Sector-- </option>
                        <?php foreach ($this->sectores as $key => $sector) { ?>
                            <option value="<?php echo $sector->id ?>" data-departamento="<?php echo $sector->departamento ?>" data-ciudad="<?php echo $sector->ciudad ?>" <?php echo $this->sector === $sector->id ? 'selected' : '' ?>><?php echo $sector->nombre ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="localidad" id="localidad">
                        <option value="" selected disabled> --Localidad-- </option>
                        <?php foreach ($this->localidades as $key => $localidad) { ?>
                            <option value="<?php echo $localidad->id ?>" data-departamento="<?php echo $localidad->departamento ?>" data-ciudad="<?php echo $localidad->ciudad ?>" <?php echo $this->localidad === $localidad->id ? 'selected' : '' ?>><?php echo $localidad->nombre ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="tipo" id="tipo">
                        <option value="" selected disabled> --Tipo de inmueble-- </option>
                        <?php foreach ($this->tipos as $tipo) { ?>
                            <option value="<?php echo $tipo->id ?>" <?php echo $this->tipo === $tipo->id ? 'selected' : '' ?>><?php echo $tipo->nombre ?></option>

                        <?php } ?>
                    </select>
                </div>



                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <select class="form-select form-control" name="area" id="area">
                        <option value="" selected disabled>Área (m&sup2;)</option>
                        <option value="all" <?php echo $this->area === "all" ? 'selected' : '' ?>></option>
                        <option value="0-50" <?php echo $this->area === "0-50" ? 'selected' : '' ?>>De 0 a 50</option>
                        <option value="50-100" <?php echo $this->area === "50-100" ? 'selected' : '' ?>>De 50 a 100</option>
                        <option value="100-150" <?php echo $this->area === "100-150" ? 'selected' : '' ?>>De 100 a 150</option>
                        <option value="150-200" <?php echo $this->area === "150-200" ? 'selected' : '' ?>>De 150 a 200</option>
                        <option value="200-300" <?php echo $this->area === "200-300" ? 'selected' : '' ?>>De 200 a 300</option>
                        <option value="300-500" <?php echo $this->area === "300-500" ? 'selected' : '' ?>>De 300 a 500</option>
                        <option value="500-1000" <?php echo $this->area === "500-1000" ? 'selected' : '' ?>>De 500 a 1000</option>
                        <option value="1000-9999" <?php echo $this->area === "1000-9999" ? 'selected' : '' ?>>Más de 1000</option>


                    </select>
                </div>

                <div class="col-6 col-md-4 col-lg-3 mb-4 d-flex gap-2 justify-content-center align-items-center">
                    <div class="form-check  ps-0">
                        <label class="form-check-label" for="compra">
                            Compra
                        </label>
                    </div>
                    <input class="form-check-input" type="checkbox" value="1" name="compra" id="compra" <?php echo $this->compra === "1" ? 'checked' : '' ?>>

                    <div class="form-check  ps-0">
                        <label class="form-check-label" for="arriendo">
                            Arriendo
                        </label>
                    </div>
                    <input class="form-check-input" type="checkbox" value="1" name="arriendo" id="arriendo" <?php echo $this->arriendo === "1" ? 'checked' : '' ?>>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-4 d-flex align-items-center  justify-content-between ">
                    <button class=" m-0 btn-home" type="submit">BUSCAR</button>
                    <a href="/page/inventario/filtrar" class=" m-0 btn-home btn-limpiar" type="submit">LIMPIAR</a>

                </div>
            </div>

        </form>
    </div>
</section>

<div class="container mt-4  pb-4">
    <div class="row">
        <div class="col-12 col-lg-2">
            <div class="content-filtros-activos">
                <h2>
                    Filtros Activos
                </h2>

                <hr>
                <div>

                    <div class="filtros-activos">
                        <?php if ($this->departamento != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&departamento="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->departamentoInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->ciudad != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&ciudad="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->ciudadInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->sector != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&sector="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->sectorInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->localidad != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&localidad="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->localidadInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->tipo != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&tipo="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $this->tipoInfo->nombre ?></span>
                            </div>
                        <?php } ?>

                        <?php if ($this->area != '') { ?>
                            <?php
                            $areaFiltro = $this->area;
                            if ($this->area == "1000-9999") {
                                $areaFiltro = "1000+";
                            }
                            ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&area="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos"><?php echo $areaFiltro; ?> Mts2</span>
                            </div>
                        <?php } ?>
                        <?php if ($this->compra != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&compra="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos">Compra</span>
                            </div>
                        <?php } ?>
                        <?php if ($this->arriendo != '') { ?>
                            <div class="btn_activos">
                                <span class="cerrar"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&arriendo="><i class="fa-solid fa-circle-xmark"></i></a></span><span class="activos">Arriendo</span>
                            </div>
                        <?php } ?>




                    </div>
                </div>

            </div>

            <div class="content-filtros-disponibles">
                <h2>
                    Filtros Disponibles
                </h2>
                <?php
                $currentUrl = $_SERVER['REQUEST_URI'];
                $separator = strpos($currentUrl, '?') === false ? '?' : '&';
                ?>
                <div class="content-filtros-activo-ind">

                    <div class="accordion" id="acordionPrecio">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnePrecio" aria-expanded="true" aria-controls="collapseOnePrecio">
                                    Precio de Arriendo (Millones)
                                </button>
                            </h2>
                            <div id="collapseOnePrecio" class="accordion-collapse collapse show" data-bs-parent="#acordionPrecio">
                                <div class="accordion-body">
                                    <div class="lista_disponibles">
                                        <ul>

                                            <!--  <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&PA=0-5" class="enlace <?= $this->PA == '0-5' ? 'active' : '' ?>">De 0 a 5</a></li> -->
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PA=1-2" class="enlace <?= $this->PA == '1-2' ? 'active' : '' ?>">De 1 a 2</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PA=2-3" class="enlace <?= $this->PA == '2-3' ? 'active' : '' ?>">De 2 a 3</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PA=3-5" class="enlace <?= $this->PA == '3-5' ? 'active' : '' ?>">De 3 a 5</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PA=5-10" class="enlace <?= $this->PA == '5-10' ? 'active' : '' ?>">De 5 a 10</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PA=10-20" class="enlace <?= $this->PA == '10-20' ? 'active' : '' ?>">De 10 a 20</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PA=20-50" class="enlace <?= $this->PA == '20-50' ? 'active' : '' ?>">De 20 a 50</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PA=50-1000" class="enlace <?= $this->PA == '50-1000' ? 'active' : '' ?>">Más de 50</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="content-filtros-activo-ind">

                    <div class="accordion" id="acordionPrecioVenta">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnePrecioVenta" aria-expanded="true" aria-controls="collapseOnePrecioVenta">
                                    Precio de Venta (Millones)
                                </button>
                            </h2>
                            <div id="collapseOnePrecioVenta" class="accordion-collapse collapse show" data-bs-parent="#acordionPrecioVenta">
                                <div class="accordion-body">
                                    <div class="lista_disponibles">
                                        <ul>
                                            <!--   <li><a href="<?php echo $currentUrl . $separator; ?>PV=0-50" class="enlace <?= $this->PV == '0-50' ? 'active' : '' ?> ">De 0 a 50</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PV=50-100" class="enlace <?= $this->PV == '50-100' ? 'active' : '' ?> ">De 50 a 100</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PV=100-150" class="enlace <?= $this->PV == '100-150' ? 'active' : '' ?> ">De 100 a 150</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PV=150-200" class="enlace <?= $this->PV == '150-200' ? 'active' : '' ?> ">De 150 a 200</a></li> -->
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PV=200-300" class="enlace <?= $this->PV == '200-300' ? 'active' : '' ?> ">De 200 a 300</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PV=300-500" class="enlace <?= $this->PV == '300-500' ? 'active' : '' ?> ">De 300 a 500</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PV=500-1000" class="enlace <?= $this->PV == '500-1000' ? 'active' : '' ?> ">De 500 a 1000</a></li>
                                            <li><a href="<?php echo $currentUrl . $separator; ?>PV=1000-10000" class="enlace <?= $this->PV == '1000-10000' ? 'active' : '' ?> ">Más de 1000</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="content-filtros-activo-ind">


                    <div class="accordion" id="acordionHabitaciones">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneHabitaciones" aria-expanded="true" aria-controls="collapseOneHabitaciones">
                                    Habitaciones
                                </button>
                            </h2>
                            <div id="collapseOneHabitaciones" class="accordion-collapse collapse show" data-bs-parent="#acordionHabitaciones">
                                <div class="accordion-body">
                                    <div class="lista_disponibles">
                                        <ul>
                                            <?php for ($j = 1; $j <= 10; $j++) { ?>
                                                <li><a href="<?php echo $currentUrl . $separator; ?>hab=<?php echo $j; ?>" class="enlace <?= $this->hab == $j ? 'active' : '' ?>"><?php echo $j; ?></a></li>

                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        <div class="col-12  col-lg-10 content-resultados">


            <?php if ($this->register_number >= 1) { ?>
                <div class="d-flex bg-grisclaro align-items-center  flex-column flex-md-row  justify-content-between p-2">
                    <h4 class="m-0">Se encontraron <?php echo $this->register_number ?> inmuebles que coinciden con la búsqueda</h4>
                    <div class="filtros-orden">

                        <span>Ordenar por:</span>

                        <select name="orden" id="orden" class="form-select form-control">
                            <option value="1" <?= $this->orden == 1 ? ' selected' : '' ?>>Número de habitaciones</option>
                            <option value="2" <?= $this->orden == 2 ? ' selected' : '' ?>>Precio de Arriendo</option>
                            <option value="3" <?= $this->orden == 3 ? ' selected' : '' ?>>Precio de Venta</option>
                            <option value="4" <?= $this->orden == 4 ? ' selected' : '' ?>>Área</option>
                        </select>

                        <select name="orden2" id="orden2" size="1" class="form-select form-control">
                            <option value="1" <?= $this->orden2 == 1 ? ' selected' : '' ?>>Menor/Mayor</option>
                            <option value="2" <?= $this->orden2 == 2 ? ' selected' : '' ?>>Mayor/Menor</option>
                        </select>
                        <button name="ordenar" type="button" class="btn-home" id="ordenar">
                            Ordenar
                        </button>
                    </div>
                </div>




                <div class="resultados-inmuebles row">
                    <?php
                    // Capturar todos los parámetros GET
                    $queryString = http_build_query($_GET);
                    ?>
                    <?php foreach ($this->inmueblesList as $inmueble) { ?>
                        <a href="/page/inventario/inmueble?id=<?= $inmueble->id ?>&<?= $queryString ?>" title="<?= $inmueble->titulo ?>" class="col-12 col-lg-6 enlace-card p-1 ">

                            <div class="inmueble shadow-sm">

                                <div class="row m-0">
                                    <div class="col-12 col-md-6 py-0 px-0">
                                        <?php if ($inmueble->imagen && file_exists($_SERVER['DOCUMENT_ROOT'] . "/images/" . $inmueble->imagen)) { ?>
                                            <img src="/images/<?= $inmueble->imagen ?>" alt="Imagen de  <?= $inmueble->titulo ?>" class="img-inmueble">
                                        <?php } else { ?>
                                            <img src="/skins/page/images/Corte/imagenot.jpg" alt="Imagen de  <?= $inmueble->titulo ?>" class="img-inmueble">

                                        <?php } ?>

                                    </div>
                                    <div class="col-12 col-md-6 mt-3 mt-md-0 py-2 d-grid  gap-1">
                                        <div class="title-location mb-1">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <h2> <?php if ($inmueble->direccion) { ?>
                                                    / <?= $inmueble->direccion ?>
                                                <?php } ?>
                                                <span>
                                                    <?php if ($inmueble->departamento1) { ?>
                                                        <?= $inmueble->departamento1 ?>
                                                    <?php } ?>
                                                    <?php if ($inmueble->localidad1) { ?>
                                                        / <?= $inmueble->localidad1 ?>
                                                    <?php } ?>

                                                </span>
                                            </h2>
                                        </div>
                                        <div class="d-flex align-items-center cont-info">
                                            <div>
                                                <i class="fa-solid fa-building"></i>
                                            </div>
                                            <div>

                                                <span class="d-block sub-detalle">

                                                    <?php echo $inmueble->tipo1 ?>

                                                </span>

                                            </div>
                                        </div>

                                        <!-- <h3><?= $inmueble->titulo ?></h3> -->
                                        <div class="row mt-1">
                                            <?php if ($inmueble->alquiler >= 1) { ?>
                                                <div class="col-12 col-md-6 col-lg-12 col-xxl-6 contenedor-span">
                                                    <span class="inmueble-subtitulo">Alquiler:
                                                    </span>
                                                    <span class="inmueble-titulo">$<?= $inmueble->alquiler >= 1 ? number_format($inmueble->alquiler) : 0 ?></span>

                                                </div>
                                            <?php } ?>
                                            <?php if ($inmueble->venta >= 1) { ?>

                                                <div class="col-12 col-md-6 col-lg-12 col-xxl-6 contenedor-span">
                                                    <span class="inmueble-subtitulo">Venta:
                                                    </span>
                                                    <span class="inmueble-titulo">$<?= $inmueble->venta >= 1 ? number_format($inmueble->venta) : 0 ?></span>

                                                </div>
                                            <?php } ?>
                                        </div>



                                        <div class="d-flex mt-auto flex-wrap justify-content-between">

                                            <span class="inmueble-subtitulo"><?= $inmueble->area ?> m<sup>2</sup></span>

                                            <div class="vr"></div>
                                            <span class="inmueble-subtitulo"><?= number_format($inmueble->Alcobas) . " Hab." ?></span>
                                            <div class="vr"></div>
                                            <span class="inmueble-subtitulo"><?= $inmueble->banos . " Baños." ?></span>
                                            <div class="vr"></div>
                                            <span class="inmueble-subtitulo"><?= $inmueble->parqueaderos != '' ? $inmueble->parqueaderos . " Parq."   : '0' . " Parq." ?></span>









                                        </div>
                                    </div>
                                </div>
                            </div>


                        </a>

                    <?php } ?>

                    <div class=" pagination mt-3 mb-5 justify-content-center">
                        <?php
                        $url =  $currentUrl . $separator;
                        $min = $this->page - 10;
                        if ($min < 0) {
                            $min = 1;
                        }
                        $max = $this->page + 10;
                        if ($this->totalpages > 1) {
                            if ($this->page != 1)
                                echo '<li class="page-item"><a class="page-link text-pagination" href="' . $url . '&page=' . ($this->page - 1) . '"> &laquo; Anterior </a></li>';
                            for ($i = 1; $i <= $this->totalpages; $i++) {
                                if ($this->page == $i) {
                                    echo '<li class="page-item  fondo-pagination active"><a class="page-link  text-pagination">' . $this->page . '</a></li>';
                                } else {
                                    if ($i <= $max and $i >= $min) {
                                        echo '<li class="page-item fondo-pagination"><a class="page-link text-pagination" href="' . $url . '&page=' . $i . '">' . $i . '</a></li>  ';
                                    }
                                }
                            }
                            if ($this->page != $this->totalpages)
                                echo '<li class="page-item"><a class="page-link text-pagination" href="' . $url . '&page=' . ($this->page + 1) . '">Siguiente &raquo;</a></li>';
                        }
                        ?>
                    </div>
                </div>
            <?php } else { ?>
                <h4>Sin resultados para la búsqueda</h4>
            <?php } ?>
        </div>


    </div>
</div>

<style>
    .section-filtros {
        background-color: var(--morado-dos);
        padding: 20px 0;
    }
</style>

<script type="text/javascript">
    document.getElementById('ordenar').addEventListener('click', function() {
        const orden = document.getElementById('orden').value;
        const orden2 = document.getElementById('orden2').value;
        const baseUrl = '<?php echo $_SERVER['REQUEST_URI']; ?>';

        window.location = `${baseUrl}&orden=${orden}&orden2=${orden2}`;
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.innerWidth <= 992) {
            $('.accordion-collapse').collapse({
                toggle: true
            })
        }


        const departamentoSelect = document.getElementById("departamento");
        const ciudadSelect = document.getElementById("ciudad");
        const sectorSelect = document.getElementById("sector");
        const localidadSelect = document.getElementById("localidad");
        const ciudadOptions = Array.from(ciudadSelect.options);
        const sectorOptions = Array.from(sectorSelect.options);
        const localidadOptions = Array.from(localidadSelect.options);

        // Ocultar todas las opciones de ciudades, sectores y localidades al cargar la página
        ciudadOptions.forEach((option) => {
            if (option.value) option.style.display = "none";
        });
        sectorOptions.forEach((option) => {
            if (option.value) option.style.display = "none";
        });
        localidadOptions.forEach((option) => {
            if (option.value) option.style.display = "none";
        });

        if (departamentoSelect.value) {
            console.log("value");

            const selectedDepartamento = departamentoSelect.value;


            // Mostrar solo las opciones de ciudades que corresponden al departamento seleccionado
            ciudadOptions.forEach((option) => {
                if (option.dataset.departamento === selectedDepartamento) {
                    option.style.display = "block";
                }
            });


        }


        departamentoSelect.addEventListener("change", () => {
            const selectedDepartamento = departamentoSelect.value;

            // Ocultar todas las opciones de ciudades, sectores y localidades
            ciudadOptions.forEach((option) => {
                if (option.value) option.style.display = "none";
            });
            sectorOptions.forEach((option) => {
                if (option.value) option.style.display = "none";
            });
            localidadOptions.forEach((option) => {
                if (option.value) option.style.display = "none";
            });

            // Mostrar solo las opciones de ciudades que corresponden al departamento seleccionado
            ciudadOptions.forEach((option) => {
                if (option.dataset.departamento === selectedDepartamento) {
                    option.style.display = "block";
                }
            });

            // Resetear los selects de ciudades, sectores y localidades
            ciudadSelect.value = "";
            sectorSelect.value = "";
            localidadSelect.value = "";
        });

        ciudadSelect.addEventListener("change", () => {
            const selectedCiudad = ciudadSelect.value;

            // Ocultar todas las opciones de sectores y localidades
            sectorOptions.forEach((option) => {
                if (option.value) option.style.display = "none";
            });
            localidadOptions.forEach((option) => {
                if (option.value) option.style.display = "none";
            });

            // Mostrar solo las opciones de sectores que corresponden a la ciudad seleccionada
            sectorOptions.forEach((option) => {
                if (
                    option.dataset.ciudad === selectedCiudad &&
                    option.dataset.departamento === departamentoSelect.value
                ) {
                    option.style.display = "block";
                }
            });

            // Mostrar solo las opciones de localidades que corresponden a la ciudad seleccionada
            localidadOptions.forEach((option) => {
                if (
                    option.dataset.ciudad === selectedCiudad &&
                    option.dataset.departamento === departamentoSelect.value
                ) {
                    option.style.display = "block";
                }
            });

            // Resetear los selects de sectores y localidades
            sectorSelect.value = "";
            localidadSelect.value = "";
        });
    });
</script>