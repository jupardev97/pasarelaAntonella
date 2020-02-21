<?php
    
    /*
        Clase Encargada de Mapear la URL Ingresada En el Navegador..
        1-Controlador
        2-Metodo
        3-Posible Parametro que Tenga
        Ejemplo: Insumos/Update/2
    */

    class Core {
        protected $actualController = 'standard';
        protected $actualMethod = 'index';
        protected $Parameters = [];
        
        //Constructor.
        public function __construct(){
            $url = $this->getUrl();
            //Buscar el Controlador de la Url en la Carpeta, Ver si Existe.
            if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
                //Si existe se Coloca como controlador por Defecto.
                $this->actualController = ucwords($url[0]);
                unset($url[0]);
            }
            //Requerimos el Controlador
            require_once '../app/controllers/'.ucwords($this->actualController).'.php';
            //Creamos Un El controlador Cargado.
            $this->actualController = new $this->actualController;
            
            //Cargar El Metodo del Controlador Pasado por la URL
            if(isset($url[1])){
                if(method_exists( $this->actualController, $url[1])){
                    //Si existe Cargamos el Metodo
                    $this->actualMethod = $url[1];
                    unset($url[1]);
                }
            }
            
            //Obtenemos Los Posibles Parametros.
            $this->Parameters = $url ? array_values($url) : [];
            
            //Llamar Callback Con Parametros del Arreglo
            call_user_func_array( [$this->actualController, $this->actualMethod], $this->Parameters);
        }
        
        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');//Cortar los Espacios en Blanco
                $url = filter_var($url, FILTER_SANITIZE_URL);//Para que sea interpretado Como una URL
                $url = explode('/',$url);
                return $url;
            }
        }
        
    }
