<?php
/**
 * @Autor: Harol Mauricio Gómez Zapata
 * @Fecha: 10/09/2026
 * @Descripción: Clase modelo de la tabla 'categorias'
 *               de la base de datos 
*/

class Categorias {
    // definición de los atributos de la clase (campos
    // de la tabla)
    private $idCategoria;
    private $categoria;

    // definición del constructor
    public function __construct($categoria) {
        $this->categoria = $categoria;
    }

    // getters y setters
    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
}
?>