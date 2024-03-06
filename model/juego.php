<?php

class juego{
    protected $Codigo;
    protected $Nombre_juego;
    protected $Nombre_consola;
    protected $Anno;
    protected $Precio;
    protected $alguilado;
    protected $imagen;
    protected $descripcion;
    
    
    
    public function __construct($Codigo, $Nombre_juego, $Nombre_consola, $Anno, $Precio, $alguilado, $imagen, $descripcion) {
        $this->Codigo = $Codigo;
        $this->Nombre_juego = $Nombre_juego;
        $this->Nombre_consola = $Nombre_consola;
        $this->Anno = $Anno;
        $this->Precio = $Precio;
        $this->alguilado = $alguilado;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    
    public function __toString() {
        return "Codigo".$this->Codigo.", nombre: ". $this->Nombre_juego.", consola: ". $this->Nombre_consola.", año: ". $this->Anno.", precio". $this->Precio.", alguilado: ". $this->alguilado. ", imagen: ". $this->imagen.", descripcion: ". $this->descripcion;
    }

}
