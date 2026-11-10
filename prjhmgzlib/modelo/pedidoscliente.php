<?php
/**
 * @Autor: Harol Mauricio Gómez Zapata
 * @Fecha: 10/09/2026
 * @Descripción: Clase modelo de la tabla 'pedidos_por_cliente'
 *               de la base de datos 
*/

class PedidosCliente {
    // definición de los atributos de la clase (campos)
    private $idPedido;
    private $nroPedido;
    private $idCliente;
    private $isbn;
    private $fechaPedido;
    private $cantidad;
    private $subtotal;

    // definición del constructor
    public function __construct($nroPedido, $idCliente, $isbn, $fechaPedido, $cantidad, $subtotal) {
        $this->nroPedido = $nroPedido;
        $this->idCliente = $idCliente;
        $this->isbn = $isbn;
        $this->fechaPedido = $fechaPedido;
        $this->cantidad = $cantidad;
        $this->subtotal = $subtotal;
    }

    // getters y setters
    public function getIdPedido() {
        return $this->idPedido;
    }

    public function getNroPedido() {
        return $this->nroPedido;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getFechaPedido() {
        return $this->fechaPedido;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getSubtotal() {
        return $this->subtotal;
    }

    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    public function setNroPedido($nroPedido) {
        $this->nroPedido = $nroPedido;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setFechaPedido($fechaPedido) {
        $this->fechaPedido = $fechaPedido;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setCorreo($subtotal) {
        $this->subtotal = $subtotal;
    }
}
?>