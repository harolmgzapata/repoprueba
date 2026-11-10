<?php
/**
 * @Autor: Harol Mauricio Gómez Zapata
 * @Fecha: 10/09/2026
 * @Descripción: Clase modelo de la tabla 'clientes'
 *               de la base de datos 
*/

class Clientes {
    // definición de los atributos de la clase (campos)
    private $idCliente;
    private $identificacion;
    private $nombre;
    private $apellidos;
    private $celular;
    private $direccion;
    private $correoElectronico;

    // definición del constructor
    public function __construct($identificacion, $nombre, $apellidos, $celular, $direccion, $correo) {
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->celular = $celular;
        $this->direccion = $direccion;
        $this->correoElectronico = $correo;
    }

    // getters y setters
    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getIdentificacion() {
        return $this->identificacion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getCorreo() {
        return $this->correoElectronico;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setIdentificacion($dentificacion) {
        $this->identificacion = $identificacion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setCorreo($correoElectronico) {
        $this->correoElectronico = $correoElectronico;
    }
}
?>