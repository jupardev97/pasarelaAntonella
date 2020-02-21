<?php

/*
  Controlador por Defecto
 */

class Standard extends Controller {

    public function __construct() {
        session_start();
        if (checkSession('Login')) {
            redireccionar('Inicio');
        }
    }

    public function Session() {
        
    }

    public function Index() {
        
    }

}
