<?php

class Iva extends Controller {

    private $iva;

    public function __construct() {
        session_start();
        checkSession('Login');
        $this->iva = $this->model('modeloIva');
    }

    public function index() {

        $config = [
            'cedula' => $_SESSION['ced_tra'],
            'nombres' => $_SESSION['nom_usu'],
            'cargo' => $_SESSION['tip_car'],
            'nombrePagina' => 'Iva'
        ];
        $this->view('inicio/header', $config);
        unset($config);

        $this->view('iva/tablaIva');
        $this->view('iva/modalIva');
        $this->view('inicio/footer');
        $this->view('scripts/funciones/alertas');
        $this->view('scripts/clases/Ajax');
        $this->view('iva/js/main');
    }

    public function createIva($porcentaje, $fecha) {

        if (isset($porcentaje) && isset($fecha)) {
            $porcentaje = (float) trim($porcentaje);
            $confirmation = [
                'por_iva' => $porcentaje
            ];

            $result = $this->iva->findOne($confirmation);

            if ($result['reg']) {
                unset($result);
                $answer = [
                    'status' => 'error',
                    'msg' => 'Ya se Encuentra Un Procentaje Con Ese valor'
                ];
                return $answer;
            } else {
                unset($result);

                $data = [
                    'por_iva' => $porcentaje,
                    'fec_act' => $fecha
                ];
                $result = $this->iva->create($data);
                if ($result['reg']) {

                    $answer = [
                        'status' => 'complete',
                        'msg' => $result['msg']
                    ];
                    unset($result);
                    $this->trabajador = null;
                    return $answer;
                } else {
                    $answer = [
                        'status' => 'complete',
                        'msg' => $result['msg']
                    ];
                    unset($result);
                    $this->trabajador = null;
                    return $answer;
                }
            }
        } else {
            redireccionar('Iva');
        }
    }

    public function seleccionarTodos() {

        $result = $this->iva->selectAll();

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
            $aswer = [
                'status' => 'incomplete',
                'msg' => 'No Se Encuentran Registros Disponibles',
                'reg' => $result['reg']
            ];
            unset($result);
            return $aswer;
        }
    }

// End seleccionarTodos();

    public function editIva($id, $porcentaje, $fecha) {

        if (isset($porcentaje) && isset($fecha) && isset($id)) {

            $id = (int) trim($id);
            $porcentaje = (float) trim($porcentaje);

            $data = [
                'ide_iva' => $id,
                'por_iva' => $porcentaje,
                'fec_act' => $fecha
            ];

            $result = $this->iva->update($data);

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
            redireccionar('Iva');
        }
    }

// End editCargo

    public function deleteIva($id) {
        if (isset($id)) {
            $id = (int) trim($id);
            $data = [
                'ide_iva' => $id
            ];
            unset($id);

            $result = $this->iva->delete($data);
            unset($data);

            if ($result['reg']) {
                $answer = [
                    'status' => 'complete',
                    'msg' => $result['msg']
                ];
                unset($result);
                return $answer;
            } else {
                $answer = [
                    'status' => 'incomplete',
                    'msg' => $result['msg']
                ];
                unset($result);
                return $answer;
            }
        } else {
            redireccionar('Cargo');
        }
    }

}
