<?php
/**
 * @Autor: Harol Mauricio Gómez Zapata
 * @Fecha: 10/09/2026
 * @Descripción: Clase modelo de la tabla 'libros'
 *               de la base de datos 
*/

class Libros {
    // definición de los atributos de la clase (campos)
    private $isbn;
    private $titulo;
    private $categoria;
    private $fechaPub;
    private $precio;
    private $portada;
    private $cantidadStock;

    // definición del constructor
    public function __construct($isbn, $titulo, $categoria, $fechaPub, $precio, $portada, $cantStock) {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->categoria = $categoria;
        $this->fechaPub = $fechaPub;
        $this->precio = $precio;
        
        if ($portada !== null) {
            $this->portada = $portada;
        }

        if ($cantStock > 0) {
            $this->cantidadStock = $cantStock;
        } else {
            $this->cantidadStock = 1;
        }
    }

    // getters y setters
    public function getIsbn() {
        return $this->isbn;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getFechaPub() {
        return $this->fechaPub;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getPortada() {
        return $this->portada;
    }

    public function getCantidadStock() {
        return $this->cantidadStock;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setFechaPub($fechaPub) {
        $this->fechaPub = $fechaPub;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setPortada($portada) {
        $this->portada = $portada;
    }

    public function setCantidadStock($cantStock) {
        $this->cantidadStock = $cantStock;
    }
}
?>