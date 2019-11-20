<?php

class Carrito implements JsonSerializable {
    private $producto;
    private $tamano;
    private $cantidad;
    private $precio;
    private $imagen;
    private $productonombre;
    private $tamanoID;

    public function setProducto($producto) {
        $this->producto = $producto;
    }

    public function getProducto() {
        return $this->producto;
    }
       public function setProductonombre($productonombre) {
        $this->productonombre = $productonombre;
    }

    public function getProductonombre() {
        return $this->productonombre;
    }

    public function setTamano($tamano) {
        $this->tamano = $tamano;
    }

    public function getTamano() {
        return $this->tamano;
    }
     public function setTamanoID($tamanoID) {
        $this->tamanoID = $tamanoID;
    }

    public function getTamanoID() {
        return $this->tamanoID;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function jsonSerialize() {
        return [
            'Producto' => $this->getProducto(),
            'ProductoNombre' => $this->getProductonombre(),
            'Tamano' => $this->getTamano(),
            'TamanoID' => $this->getTamanoID(),
            'Cantidad' => $this->getCantidad(),
            'Precio' => $this->getPrecio(),
            'Imagen' => $this->getImagen()
        ];
    }
}