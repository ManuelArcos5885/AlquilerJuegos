<?php

class cliente{
    protected $dni;
    protected $nombre;
    protected $apell;
    protected $direc;
    protected $local;
    protected $clave;
    protected $tipo;
    
    
    public function __construct($dni, $nombre, $apell, $direc, $local, $clave, $tipo) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apell = $apell;
        $this->direc = $direc;
        $this->local = $local;
        $this->clave = $clave;
        $this->tipo = $tipo;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name,$value) {
        $this->$name = $value;
    }
    public function __toString() {
        return "dni: ".$this->dni.", nombre: ".$this->nombre.", apellidos: ".$this->apell.", Direccion: ".$this->direc."localidad: ".$this->local.", clave: ".$this->clave.", tipo: ".$this->tipo;
    }
    
        
    

}

