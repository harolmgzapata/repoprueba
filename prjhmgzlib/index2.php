<?php
    // Esto es un comentario de 1 línea
    /* Esto es un comentario
     * de varias
     * líneas */
    /*
     * @Autor: Harol Mauricio Gómez Zapata
     * @Fecha: 01/09/2026
     * @Descripción: archivo para la definición y operación de
     *               variables.
    */

    $nombre = "Harol Mauricio Gómez Zapata";
    $email = "harol.gomez@pascualbravo.edu.co";
    /*
     * Actividad: crear otras 5 variables para almacenar:
     * el correo personal, la fecha de nacimiento
     * el grado de estudio y la técnica que cursa y el nombre
     * de la institución
     * 
     * +----------------------------------------------------+
     * |                nombre                              |
     * |                                                    |
     * |              correo personal                       |
     * |              técnica que cursa                     |
     * |              nombre de la institución              |
     * |                                                    |
     * +----------------------------------------------------+
    */
    // echo "funciona...";

    /*
     * Ejercicio: Se debe mostrar el reporte de calificaciones
     *            de un estudiante. Se debe calcular la nota
     *            definitiva de éste.
     * El reporte incluye los siguientes datos:
     *  - Identificación del estudiante.
     *  - Nombres y apellidos del estudiante.
     *  - El nombre de la asignatura cursada.
     *  - las 4 notas de la asignatura.
     *  - el promedio de la asignatura con 2 decimales.
     * Las notas están en el rango de 0.00 a 5.00.
     * crear un archivo nuevo llamado notas_xxxx.php
     * donde xxxx son las iniciales de los nombres y apellidos
    */

    $nota1 = 4.8375;
    $clave = "guessme";
    $salt = "adiviname";
    $c_cifrada = crypt($clave, $salt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <style>
      body {
        font-family: 'Roboto SemiCondensed Light';
        font-size:
      }

      .encabezados {
        font-family: 'Roboto SemiCondensed Black' !important;
      }
    </style>
</head>
<body>
    <h1><b><?= "Hola desde php embebido en html" ?></b></h1>
    <h2><?= $nombre ?></h2>
    <pre align="center">
      +--------------------------------------------------+
      |                                                  |
      |           <?= $nombre ?>            |
      |         <?= $email ?>          |
      |                     <?= round($nota1, 2) ?>                         |
      |                                                  |
      +--------------------------------------------------+
    </pre>
    <h3>Contraseña: <?= $clave ?>, Cifrada: <?= $c_cifrada ?></h3>
</body>
</html>