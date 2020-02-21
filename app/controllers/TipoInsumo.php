<?php

class TipoInsumo extends Controller {

    private $tipoinsumo;

    public function __construct() {
        session_start();
        checkSession('Login');
        $this->tipoinsumo = $this->model('modeloTipoInsumo');
    }

    public function index() {

        $config = [
            'cedula' => $_SESSION['ced_tra'],
            'nombres' => $_SESSION['nom_usu'],
            'cargo' => $_SESSION['tip_car'],
            'nombrePagina' => 'Tipo de Insumo'
        ];
        $this->view('inicio/header', $config);
        unset($config);

        $this->view('tipoInsumo/tablaTipoInsumo');
        $this->view('tipoInsumo/modalTipoInsumo');
        $this->view('inicio/footer');
        $this->view('scripts/funciones/alertas');
        $this->view('scripts/clases/Ajax');
        $this->view('tipoInsumo/js/main');
    }

    public function createTipoInsumo( $id,  $tipoInsumo, $estado) {

        if (isset($id) && isset($tipoInsumo) && isset($estado)) {
            
            $confirmation = [
                'ide_tip' => (string) trim( $id )
            ];

            $result = $this->tipoinsumo->findOne($confirmation);

            if ($result['reg']) {
                unset($result);
                
                $answer = [
                    'status' => 'error',
                    'msg' => 'Ya Existe un Tipo de Insumo Con Este Identificador'
                ];
                
                return $answer;
            } else {
                unset($result);

                $data = [
                    'ide_tip' => (string) trim( $id ),
                    'tip_ins' => (string) trim( $tipoInsumo ),
                    'est_tip' => (int) $estado
                ];
                $result = $this->tipoinsumo->create($data);
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
                        'status' => 'error',
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

        $result = $this->tipoinsumo->selectAll();

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

    public function editTipoInsumo($id, $tipoInsumo, $estado) {

        if (isset($id) && isset($tipoInsumo) && isset($estado)) {

            $id = (string) trim($id);
            $tipoInsumo = (string) trim($tipoInsumo);
            $estado = (int) trim($estado);

            $data = [
                'ide_tip' => $id,
                'tip_ins' => $tipoInsumo,
                'est_tip' => $estado
            ];

            $result = $this->tipoinsumo->update($data);

            if ($result['reg']) {
                unset($result);
                $answer['status'] = 'complete';
                $answer['msg'] = 'Insumo Editado Satisfactoriamente';
                return $answer;
            } else {
                unset($result);
                $answer['status'] = 'error';
                $answer['msg'] = 'Se ha Generado un Error en la Edicion del Insumo';
                return $answer;
            }
        } else {
            redireccionar('Iva');
        }
    }

// End editCargo

    public function deleteTipoInsumo($id) {
        
        if (isset($id)) {
            $data = [
                'ide_tip' => (string) trim( $id )
            ];
            unset($id);
            
            $result = $this->tipoinsumo->delete($data);
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
