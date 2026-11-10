<?php
/**
 * @Autor: Harol Mauricio Gómez Zapata
 * @Fecha: 10/09/2026
 * @Descripción: Clase modelo de la tabla 'autores'
 *               de la base de datos 
*/

class Autores {
    // definición de los atributos de la clase (campos)
    private $idAutor;
    private $nombre;
    private $apellidos;

    // definición del constructor
    public function __construct($nombres, $apellidos) {
        $this->nombre = $nombres;
        $this->apellidos = $apellidos;
    }

    // getters y setters
    public function getIdAutor() {
        return $this->idAutor;
    }

    public function getNombres() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setIdAutor($idAutor) {
        $this->idAutor = $idAutor;
    }

    public function setNombre($nombres) {
        $this->nombre = $nombres;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }
}
?>