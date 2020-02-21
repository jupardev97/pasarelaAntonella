<?php

class Cargo extends Controller {

    private $cargo;

    public function __construct() {
        session_start();
        checkSession('Login');
        $this->cargo = $this->model('modeloCargo');
    }

    public function index() {

        $config = [
            'cedula' => $_SESSION['ced_tra'],
            'nombres' => $_SESSION['nom_usu'],
            'cargo' => $_SESSION['tip_car'],
            'nombrePagina' => 'Cargos'
        ];
        $this->view('inicio/header', $config);
        unset($config);

        $data = $this->cargo->selectAll();
        $this->view('cargos/tablaCargos', [ 'cargos' => $data]);
        unset($data);
        $this->view('cargos/modalCargos');
        $this->view('inicio/footer');
//        $this->view('scripts/funciones/alertas');
        $this->view('scripts/clases/Ajax');
        $this->view('cargos/js/main');
    }

    public function seleccionarTodos() {

        $result = $this->cargo->selectAll();

        if ($result['reg']) {
            $aswer = [
                'status' => 'complete',
                'msg' => $result['reg'] . ' Registros Listados',
                'data' => $result['data'],
                'reg' => $result['reg']
            ];
            unset($result);
            return $aswer;
        } else {
            unset($result);
            $aswer = [
                'status' => void,
                'msg' => 'No Se Encuentran Registros Disponibles',
                'reg' => $result['reg']
            ];
            return $aswer;
        }
    }

// End seleccionarTodos();

    public function editCargo($id, $horas, $pago) {
        if (isset($horas) && isset($pago) && isset($id)) {
            $id = trim($id);
            $horas = (int) trim($horas);
            $pago = (float) trim($pago);

            $data = [
                'ide_car' => $id,
                'hor_tra' => $horas,
                'pag_hor' => $pago
            ];

            $result = $this->cargo->update($data);

            if ($result['reg']) {
                unset($result);
                $answer['status'] = 'complete';
                $answer['msg'] = 'Registro Editado Satisfactoriamente';
                return $answer;
            } else {
                unset($result);
                $answer['status'] = 'error';
                $answer['msg'] = 'Se ha Generado un Error en la Edicion del Registro';
                return $answer;
            }
        } else {
            redireccionar('Cargo');
        }
    }

// End editCargo

}
