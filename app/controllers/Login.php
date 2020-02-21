<?php

/*
  Controlador Encargado del Manejo de las Sesiones
 */

class Login extends Controller {

    private $trabajador;
    private $cargo;

    public function __construct() {
        session_start();
        $this->trabajador = $this->model('modeloTrabajador');
    }

    public function index() {
          
        if (activeSession()) {
            redireccionar('Inicio');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'ced_tra' => trim($_POST['cedula']),
                    'cla_tra' => $this->hashingPassword(trim($_POST['clave']))
                ];
                $this->iniciarSesion();
                $this->validacion($data);
            } else {
                $this->iniciarSesion();
            }
        }
    }

    private function iniciarSesion() {
        $this->view('login/header');
        $this->view('login/content');
        $this->view('login/footer');
        $this->view('scripts/funciones/alertas');
    }

    private function validacion($data) {

        $result = $this->trabajador->findOne($data);
        unset($data);
        if ($result['reg']) {
            $_SESSION['ced_tra'] = $result['data']->ced_tra;
            $_SESSION['nom_usu'] = $result['data']->nom_tra;

            $this->cargo = $this->model('modeloCargo');
            $data = [
                'ide_car' => $result['data']->ide_car
            ];
            $result = $this->cargo->findOne($data);

            if ($result['reg']) {
                $this->view('scripts/funciones/mensajeExito', [ 'msg' => 'Bienvenido']);
                $_SESSION['tip_car'] = $result['data']->tip_car;
            } else {
                session_destroy();
                $this->iniciarSesion();
                $this->view('scripts/funciones/mensajeError', [ 'msg' => 'Usuario o Clave Incorrecta']);
            }
            redireccionar('Inicio');
        } else {
            unset($result);
            $this->iniciarSesion();
            $this->view('scripts/funciones/mensajeError', [ 'msg' => 'Usuario o Clave Incorrecta']);
        }
    }

    public function cerrarSesion() {
        session_destroy();
        redireccionar('Login');
    }

    public function __destruct() {
        $this->db = null;
    }
    
    public function hashingPassword($password) {
        return md5($password);
    }
    
}
