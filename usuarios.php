<?php

/**
 * Obtiene una lista de usuarios desde una API externa en formato JSON.
 *
 * @param string $url URL del servicio web que devuelve los datos en JSON.
 * @return array Lista de usuarios obtenidos desde la API. Si hay un error, devuelve un array vacío.
 */
function obtenerUsuariosDesdeApi(string $url): array
{
    $opciones = [
        "http" => [
            "method" => "GET",
            "timeout" => 10
        ]
    ];

    $contexto = stream_context_create($opciones);
    $respuesta = @file_get_contents($url, false, $contexto);

    if ($respuesta === false) {
        return [];
    }

    $datos = json_decode($respuesta, true);

    if (!is_array($datos)) {
        return [];
    }

    return $datos;
}

/**
 * Limpia un texto antes de mostrarlo en pantalla para evitar problemas de seguridad.
 *
 * @param string $texto Texto original que se quiere mostrar en la página.
 * @return string Texto preparado para mostrarse de forma segura en HTML.
 */
function limpiarTexto(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

$urlApi = "https://jsonplaceholder.typicode.com/users";
$usuarios = obtenerUsuariosDesdeApi($urlApi);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>RA9 - Servicio Web con PHP</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header class="cabecera">
        <h1>RA9 - Consulta de usuarios desde una API</h1>
        <p>Aplicación web desarrollada en PHP que consume un servicio externo en formato JSON.</p>

        <a class="boton boton-claro" href="index.php">Volver a la página principal</a>
    </header>

    <main class="contenedor">
        <section class="info">
            <h2>Servicio web utilizado</h2>
            <p>
                Esta página obtiene información desde la API pública JSONPlaceholder,
                concretamente desde el recurso <strong>/users</strong>.
            </p>
        </section>

        <section class="grid-usuarios">
            <?php if (empty($usuarios)): ?>
                <div class="mensaje-error">
                    No se han podido obtener datos desde el servicio web.
                </div>
            <?php else: ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <article class="tarjeta">
                        <h2><?= limpiarTexto($usuario["name"]) ?></h2>
                        <p><strong>Usuario:</strong> <?= limpiarTexto($usuario["username"]) ?></p>
                        <p><strong>Email:</strong> <?= limpiarTexto($usuario["email"]) ?></p>
                        <p><strong>Ciudad:</strong> <?= limpiarTexto($usuario["address"]["city"]) ?></p>
                        <p><strong>Empresa:</strong> <?= limpiarTexto($usuario["company"]["name"]) ?></p>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
    </main>

    <footer class="pie">
        <p>RA9 - Joan Clari Lopez</p>
    </footer>

</body>
</html>