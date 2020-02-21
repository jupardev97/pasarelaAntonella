<?php
    //cargar las Configuraciones..
    require_once 'config/configuration.php';
    require_once 'helpers/funciones.php';
    
    //cargar todas las librerias..
    spl_autoload_register(function($className){
        require_once 'librarys/'.$className.'.php';
    });
    
    