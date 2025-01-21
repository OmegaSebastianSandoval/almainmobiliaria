<div class="col-12">
    <form class="dropzone" id="cargarFotos">
    </form>

</div>
<div class="d-flex justify-content-end p-3">

    <a href="/administracion/inmuebles" class="btn btn-rojo ms-auto">Volver</a>
</div>
<script>
    Dropzone.autoDiscover = false;


    var myDropzone = new Dropzone("#cargarFotos", {
        paramName: "fotos-file", // The name that will be used to transfer the file
        maxFilesize: 8, // MB,
        dictDefaultMessage: '<i class="fas fa-folder-plus"></i><h3>Seleccione o arrastre las imágenes a subir',
        dictInvalidFileType: 'Formato no compatible',
        acceptedFiles: '.png, .jpg, .jpeg',
        dictMaxFilesExceeded: 'Solo puede ser cargado un archivo',
        autoProcessQueue: false,
        url: "/administracion/fotos/uploadfotos",
        autoProcessQueue: true,
        parallelUploads: 1,
        params: {
            inmueble: <?= $this->inmueble ?>
        },


    })
</script>

<style>
    :root {
        --regular-gray: #C3C3C3;
        --low-gray: #F2F2F2;
        --dark-gray: #727272;
        --purple: #252525;
    }



    .dropzone {
        height: 250px;
        background: var(--purple);
        border: 1px solid var(--purple);
        cursor: pointer;
        position: relative;
        padding: 20px;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        width: 98%;
        margin: 0 auto;
        border: 1px solid #FFF;
        margin-top: 30px;
        margin-bottom: 30px;
        transition: all 300ms ease-in-out;
        overflow-x: scroll;
    }

    .dropzone:hover {
        background-color: #592a7f;
        transition: 300ms;
    }

    .dropzone::before {
        content: '';
        height: 110%;
        position: absolute;
        z-index: -1;
        background-color: var(--purple);
        display: block;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .dropzone .dz-button {
        border: none;
        background: transparent;
        color: #FFF !important;
        font-family: 'Avenir Book';
        font-size: 18px;
        cursor: pointer;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .dz-preview {
        background-color: transparent !important;
        padding: 5px;
        border: 1px solid #FFF;
    }

    .dropzone .dz-button i {
        font-size: 50px;
    }

    .dropzone .dz-button:focus {
        outline: none;
    }

    .dz-remove {
        color: #FFF;
    }

    .dz-remove span {
        color: #FFF;
        text-decoration: none;
        cursor: pointer;
    }

    .dz-remove:hover {
        color: #FFF;
        text-decoration: none;
        cursor: pointer;
    }

    .files-cotizador label {
        color: var(--purple);
        font-size: 18px;
        font-family: 'Avenir Book';
        font-weight: 300;
        padding: 0 15px;
        border: 1px solid var(--purple);
        cursor: pointer;
    }

    .files-cotizador label.active {
        color: #FFF;
        background-color: var(--purple);
    }

    .files-cotizador .title {
        color: var(--purple);
    }

    .files-cotizador .text {
        color: var(--dark-gray);
        font-size: 18px;
    }

    .files-cotizador .terminos,
    .files-cotizador .terminos a {
        color: var(--purple);
        font-size: 18px;
        font-family: 'Avenir Book';
        font-weight: 300;
        text-align: center;
    }

    .files-cotizador .terminos a {
        font-family: 'Avenir Roman';
        font-weight: 600;
    }

    .dropzone .dz-preview .dz-error-message {
        top: 100%;
    }
</style>