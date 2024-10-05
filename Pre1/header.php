<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logis - Bootstrap Template</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilo para el encabezado */
        header {
            background-image: url('fondo2.jpg'); /* Cambia esto a la ruta de tu imagen */
            background-size: cover; /* Cubre todo el área del encabezado */
            background-position: center; /* Centra la imagen */
            color: white; /* Color del texto */
            text-align: center;
            padding: 20px 0; /* Ajusta el padding según sea necesario */
        }
        .logo {
            width: 100px; /* Ajusta el tamaño del logo */
            margin-bottom: 20px; /* Espacio entre el logo y el texto */
        }
    </style>
</head>
<body>

<!-- Encabezado -->
<header>
    <img src="fondo1.png" alt="Logo" class="logo"> <!-- Cambia esto a la ruta de tu logo -->
    <h1>CATASTRO DE HAMP-LP</h1>
    <p>Autoridad Catastral Municipal</p>
</header>

<!-- Navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">CATASTRO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#">Normativa</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Ficha Catastral</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Mapas</a></li>
        </ul>
    </div>
</nav>

<!-- Resto del contenido... -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>