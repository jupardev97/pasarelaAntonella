<?php

class TipoPrenda extends Controller {

    private $tipoPrenda;

    public function __construct() {
        session_start();
        checkSession('Login');
        $this->tipoprenda = $this->model('modeloTipoPrenda');
    }

    public function index() {

        $config = [
            'cedula' => $_SESSION['ced_tra'],
            'nombres' => $_SESSION['nom_usu'],
            'cargo' => $_SESSION['tip_car'],
            'nombrePagina' => 'Tipo de prenda'
        ];
        
        $this->view('inicio/header', $config);
        unset($config);

        $this->view('tipoPrenda/tablaTipoPrenda');
        $this->view('tipoPrenda/modalTipoPrenda');
        $this->view('inicio/footer');
        $this->view('scripts/funciones/alertas');
        $this->view('scripts/clases/Ajax');
        $this->view('tipoPrenda/js/main');
    }

    public function createTipoprenda( $codigoTipoPrenda, $tipoPrenda, $estado) {

        if (isset($tipoPrenda) && isset($estado)) {
            $codigoTipoPrenda = trim($codigoTipoPrenda);
            $confirmation = [
                'ide_tip' => strtoupper($codigoTipoPrenda)
            ];

            $result = $this->tipoprenda->findOne($confirmation);

            if ($result['reg']) {
                $answer = [
                    'status' => 'error',
                    'msg' => 'Ya Existe un Tipo de prenda Con Este Codigo'
                ];
                
                $answer['msg'] .= ( (int) $result['data']->est_tip ) ? ('.') : ( ' En el Historico.' ) ;
                unset($result);
                return $answer;
            } else {
                unset($result);

                $estado = (boolean) $estado;

                $data = [
                    'ide_tip' => strtoupper($codigoTipoPrenda),
                    'tip_pre' => strtoupper(trim($tipoPrenda)),
                    'est_tip' => $estado
                ];
                $result = $this->tipoprenda->create($data);
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

        $result = $this->tipoprenda->selectAll();

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

    public function editTipoprenda($id, $tipoPrenda, $estado) {

        if (isset($id) && isset($tipoPrenda) && isset($estado)) {

            $id = trim(strtoupper($id));
            $tipoPrenda = trim(strtoupper($tipoPrenda));
            $estado = (boolean) trim($estado);

            $data = [
                'ide_tip' => $id,
                'tip_pre' => $tipoPrenda,
                'est_tip' => $estado
            ];

            $result = $this->tipoprenda->update($data);

            if ($result['reg']) {
                unset($result);
                $answer['status'] = 'complete';
                $answer['msg'] = 'prenda Editado Satisfactoriamente';
                return $answer;
            } else {
                unset($result);
                $answer['status'] = 'error';
                $answer['msg'] = 'Se ha Generado un Error en la Edicion del prenda';
                return $answer;
            }
        } else {
            redireccionar('Iva');
        }
    }

// End editCargo

    public function deleteTipoprenda($id) {
        if (isset($id)) {
            $id = (int) trim($id);
            $data = [
                'ide_tip' => $id
            ];
            unset($id);

            $result = $this->tipoprenda->delete($data);
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
