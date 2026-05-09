<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>RA9 - Página principal</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header class="cabecera">
        <h1>RA9 - Aplicación híbrida con PHP</h1>
        <p>Página principal para probar y navegar por los apartados de la tarea.</p>
    </header>

    <main class="contenedor">
        <section class="info">
            <h2>Menú de navegación</h2>
            <p>
                Desde esta página se puede acceder a las diferentes partes desarrolladas
                durante la tarea RA9.
            </p>
        </section>

        <section class="grid-usuarios">
            <article class="tarjeta">
                <h2>RA9_d</h2>
                <p>Repositorio de GitHub utilizado para publicar el código fuente de la tarea.</p>
                <a class="boton" href="https://github.com/joancl99/RA9-JoanClariLopez.git" target="_blank">
                    Ver repositorio
                </a>
            </article>

            <article class="tarjeta">
                <h2>RA9_f</h2>
                <p>Aplicación PHP que consume un servicio web externo en formato JSON.</p>
                <a class="boton" href="usuarios.php">
                    Probar aplicación
                </a>
            </article>

            <article class="tarjeta">
                <h2>RA9_h</h2>
                <p>Página principal de pruebas, navegación, documentación y validación de la aplicación.</p>
                <a class="boton" href="index.php">
                    Página principal
                </a>
            </article>
        </section>
    </main>

    <footer class="pie">
        <p>RA9 - Joan Clari Lopez</p>
    </footer>

</body>
</html>