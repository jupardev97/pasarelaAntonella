<?php
    
    /*
        Clase Controlador Principal
            *-Se Encaga de Cargar las Vistas y los Modelo
    */
    class Controller{
        
        //Carga el Modelo.
        public function model($model){
            require_once '../app/models/'.$model.'.php';
            return new $model;
        }
        //Carga la Vista.
        public function view($view,$data = []){
            //Verificar si el Arhivo de la Vista Existe
            if(file_exists('../app/views/'.$view.'.php')){
                require_once '../app/views/'.$view.'.php';    
            }else{
                //Si no Existe Arroja un Error
                die('The View '.$view. ' Don´t Exist');
            }
        }
        
    }
