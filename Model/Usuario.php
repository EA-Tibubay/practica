<?php

class Usuario {
    private $id;
    private $usuario;
    private $contrasena;
    private $id_persona;

    public function __construct($usuario, $contrasena, $id_persona) {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->id_persona = $id_persona;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getIdPersona() {
        return $this->id_persona;
    }
}
?>
