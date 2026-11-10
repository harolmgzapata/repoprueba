<?php
/**
 * @Autor: Harol Mauricio Gómez Zapata
 * @Fecha: 10/09/2026
 * @Descripción: Clase modelo de la tabla 'autor_por_libro'
 *               de la base de datos 
*/

class AutorPorLibro {
    // definición de los atributos de la clase (campos)
    private $idAutor;
    private $isbn;

    // definición del constructor de la clase
    public function __construct($idAutor, $isbn) {
        $this->idAutor = $idAutor;
        $this->isbn = $isbn;
    }

    // definición de getters y setters

    public function getIdAutor() {
        return $this->idAutor;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function setIdAutor($iAutor) {
        $this->idAutor = $idAutor;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }
}
?>