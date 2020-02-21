<?php

class Ajax extends Controller {

    private $controller;
    private $method;
    private $data;
    private $db;

    public function __construct() {
        
    }

    public function index() {
        if (isset($_POST['object']) && isset($_POST['process']) && isset($_POST['data'])) {
            $this->controller = $_POST['object'];
            $this->method = $_POST['process'];
            
            if (file_exists(ROUTE_APP . '/controllers/' . $this->controller . '.php')) {

                require_once ROUTE_APP . '/controllers/' . $this->controller . '.php';
                $this->db = new $this->controller;

                if (method_exists($this->db, $this->method)) {
                    $this->data = $_POST['data'] ? $_POST['data'] : [];
                    $result = call_user_func_array([ $this->db, $this->method], $this->data);
                    echo json_encode($result);
                } else {
                    die('El metodo ' . $this->method . ' No Existe.');
                }
            } else {
                die('El Controlador ' . $this->controller . ' No Existe en la Carpeta Controladores .');
            }
        } else {
            header('location:' . ROUTE_URL);
        }
    }

}
