<!-- Contenido Principal -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATASTRO DE HAMP-LP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilo para el fondo del contenedor */
        .content-container {
            background-image: url('i1.jpeg'); /* Cambia esto a la ruta de tu imagen */
            background-size: cover; /* Cubre todo el área del contenedor */
            background-position: center; /* Centra la imagen */
            padding: 30px; /* Espacio interno */
            border-radius: 10px; /* Bordes redondeados, opcional */
            color: white; /* Color del texto */
        }
    </style>
</head>
<body>



<!-- Contenedor de Contenido -->
<div class="container mt-5 content-container">
    <h2>Información General</h2>
    <p>Bienvenido al sistema de catastro de la HAM-LP, donde podrás encontrar información sobre propiedades y tramitar tus requerimientos.</p>

    <h2>Nuestros Trámites</h2>
    <ul>
        <li>Registro de Propiedad</li>
        <li>Consulta de Catastro</li>
        <li>Actualización de Datos</li>
        <li>Cancelación de Propiedad</li>
        <li>Solicitud de Información</li>
    </ul>

    <h2>Preguntas Frecuentes</h2>
    <div class="accordion" id="faqAccordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        ¿Dónde puedo registrarme?
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                <div class="card-body">
                    Hay algún asistente en línea?
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    PLATAFORMAS DE ATENCIÓN CATASTRO Y ADMINISTRACIÓN TERRITORIAL
                    </button>
                </h2>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>