<?php
    /**
     * @Autor: Harol Mauricio Gómez Zapata
     * @Fecha: 17/09/2026
     * @Descripción: Archivo de conexión a la base
     *               de datos
     */

    require "properties.php";

    class ConexionBD {
        public static function getConn() {
            // Se crea la conexión aplicando UTF8 para los caracteres de impresión y de entrada
            $link = null;
            try {
                $link = new PDO("mysql:host=" . DB_HOST . ":" . DB_PORT . "; dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
            } catch (PDOException $pdoe) {
                exit("Error: " . $pdoe->getMessage());
            }

            return $link;
        }
    }
?>