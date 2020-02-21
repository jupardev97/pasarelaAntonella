<?php

class Inicio extends Controller{
    
    public function __construct(){
        session_start();
        checkSession('Login');
    }
    
    public function index(){
        $config = [
            'cedula' => $_SESSION['ced_tra'],
            'nombres' => $_SESSION['nom_usu'],
            'cargo' => $_SESSION['tip_car'],
            'nombrePagina' => 'Inicio'
        ];
        $this->view('inicio/header', $config);
        $this->view('inicio/footer');
    }
    
}

