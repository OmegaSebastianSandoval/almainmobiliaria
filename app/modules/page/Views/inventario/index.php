<?php
echo $this->banner;
?>
<div class="container contenedor-inventario pb-2">

  <?php
  // echo $this->contenido;
  ?>
  <section class="contenedor-seccion">
    <div class="content-box container">
      <div class="content-titulo">

       
          <?php if ($this->contenidoInventario->contenido_imagen) { ?>
            <img src="/images/<?= $this->contenidoInventario->contenido_imagen ?>" alt="Imagen de inventarios">
          <?php } ?>
          <?php if ($this->contenidoInventario->contenido_titulo_ver == 1) { ?>
            <h2 class="titulo_seccion titulo_51 titulo_principal_seccion">
              <?= $this->contenidoInventario->contenido_titulo ?>
            </h2>
          <?php } ?>
        
      </div>

      <?= $this->contenidoInventario->contenido_introduccion ?>

      <?= $this->contenidoInventario->contenido_descripcion ?>

    </div>
  </section>

  <form action="/page/inventario/filtrar">
    <div class="row">
      <div class="col-12 col-md-4 col-lg-3 mb-4">
        <select class="form-select form-control" name="departamento" id="departamento" required>
          <option value="" selected disabled>--Departamento--</option>
          <?php foreach ($this->departamentos as  $departamento) { ?>
            <option value="<?php echo $departamento->id ?>"><?php echo $departamento->nombre ?></option>
          <?php } ?>

        </select>
      </div>
      <div class="col-12 col-md-4 col-lg-3 mb-4">
        <select class="form-select form-control" name="ciudad" id="ciudad">
          <option value="" selected disabled>--Ciudad-- </option>
          <?php foreach ($this->ciudades as  $ciudad) { ?>
            <option value="<?php echo $ciudad->id ?>" data-departamento="<?php echo $ciudad->departamento ?>"><?php echo $ciudad->nombre ?></option>

          <?php } ?>
        </select>
      </div>
      <div class="col-12 col-md-4 col-lg-3 mb-4">
        <select class="form-select form-control" name="sector" id="sector">
          <option value="" selected disabled> --Sector-- </option>
          <?php foreach ($this->sectores as $key => $sector) { ?>
            <option value="<?php echo $sector->id ?>" data-departamento="<?php echo $sector->departamento ?>" data-ciudad="<?php echo $sector->ciudad ?>"><?php echo $sector->nombre ?></option>

          <?php } ?>
        </select>
      </div>
      <div class="col-12 col-md-4 col-lg-3 mb-4">
        <select class="form-select form-control" name="localidad" id="localidad">
          <option value="" selected disabled> --Localidad-- </option>
          <?php foreach ($this->localidades as $key => $localidad) { ?>
            <option value="<?php echo $localidad->id ?>" data-departamento="<?php echo $localidad->departamento ?>" data-ciudad="<?php echo $localidad->ciudad ?>"><?php echo $localidad->nombre ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-12 col-md-4 col-lg-3 mb-4">
        <select class="form-select form-control" name="tipo" id="tipo">
          <option value="" selected disabled> --Tipo de inmueble-- </option>
          <?php foreach ($this->tipos as $tipo) { ?>
            <option value="<?php echo $tipo->id ?>"><?php echo $tipo->nombre ?></option>

          <?php } ?>
        </select>
      </div>



      <div class="col-12 col-md-4 col-lg-3 mb-4">
        <select class="form-select form-control" name="area" id="area">
          <option value="" selected disabled>Área (m&sup2;)</option>
          <option value="0-50">De 0 a 50</option>
          <option value="50-100">De 50 a 100</option>
          <option value="100-150">De 100 a 150</option>
          <option value="150-200">De 150 a 200</option>
          <option value="200-300">De 200 a 300</option>
          <option value="300-500">De 300 a 500</option>
          <option value="500-1000">De 500 a 1000</option>
          <option value="1000-9999">Más de 1000</option>


        </select>
      </div>

      <div class="col-12 col-md-4 col-lg-3 mb-4 d-flex gap-1 gap-md-2 justify-content-center align-items-center">
        <div class="form-check ps-0">
          <label class="form-check-label" for="compra">
            Compra
          </label>
        </div>
        <input class="form-check-input" type="checkbox" value="1" name="compra" id="compra" checked>

        <div class="form-check">
          <label class="form-check-label" for="arriendo">
            Arriendo
          </label>
        </div>
        <input class="form-check-input" type="checkbox" value="1" name="arriendo" id="arriendo" checked>
      </div>
      <div class="col-12 col-md-4 col-lg-3 mb-4 d-flex align-items-center  ">
        <button class="mx-auto m-lg-0 btn-home" type="submit">BUSCAR</button>
      </div>
    </div>

  </form>


</div>
<style>
  .main-general {
    background-color: #e7e7e7;
    min-height: auto;
  }
</style>

<script>
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
</script>