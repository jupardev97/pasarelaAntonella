<?php

class Insumo extends Controller {

    private $insumo;
    private $precioInsumo;

    public function __construct() {
        session_start();
        checkSession('Login');
        $this->insumo = $this->model('modeloInsumo');
        $this->tipoInsumo = $this->model('modeloTipoInsumo');
    }

    public function index() {

        $config = [
            'cedula' => $_SESSION['ced_tra'],
            'nombres' => $_SESSION['nom_usu'],
            'cargo' => $_SESSION['tip_car'],
            'nombrePagina' => 'Insumos'
        ];
        $this->view('inicio/header', $config);
        unset($config);

        $this->view('insumos/panelTipoInsumos');
        $this->view('insumos/tablaInsumos');
        $this->view('insumos/infoInsumos');
        $this->view('insumos/modalInsumos');

        $this->view('inicio/footer');
        $this->view('scripts/funciones/alertas');
        $this->view('scripts/clases/Ajax');
        $this->view('insumos/js/main');
    }

    public function listarInsumos( $identificador )
    {

        if ( isset($identificador) ) {

            $data = [
                'ide_tip' => $identificador
            ];

            $result = $this->insumo->findAll($data);

            if ($result['reg']) {
                $answer = [
                    'status' => 'complete',
                    'reg' => $result['reg'],
                    'msg' => 'Existen Registros',
                    'data' => $result['data']
                ];
                unset($result);
                return $answer;
            } else {
                unset($result);
                $answer = [
                    'status' => 'error',
                    'reg' => 0,
                    'msg' => 'No Existen Insumos Registrados de Este Tipo'
                ];
                return $answer;
            }

        }else{
            redireccionar('Insumo');
        }
    }

    public function createInsumo($id, $nombre, $cantidad, $precio, $estado, $tipoInsumo ) {

        if (isset($id) && isset($nombre) && isset($cantidad) && isset($precio) && isset($estado) && isset($tipoInsumo) ) {

            $id = strtoupper(trim($id));
            $confirmation = [
                'ide_ins' => $id
            ];

            $result = $this->insumo->findOne($confirmation);
            
            if ($result['reg']) {
                unset($result);
                $answer = [
                    'status' => 'error',
                    'msg' => 'Ya Existe un Insumo Con el Mismo Codigo'
                ];
                return $answer;
                unset($result);
            } else {

                $data = [
                    'ide_ins' => (string) $id,
                    'ide_tip' => strtoupper(trim( (string) $tipoInsumo)),
                    'nom_ins' => strtoupper(trim( (string) $nombre)),
                    'pre_ins' => (float) trim( $precio ),
                    'can_ins' => (float) trim( $cantidad ),
                    'est_ins' => (int) trim( $estado )
                ];

                $result = $this->insumo->create($data);

                if ($result['reg']) {

                    $answer = [
                        'status' => 'complete',
                        'msg' => $result['msg']
                    ];
                    unset($result);
                    $this->insumo = null;
                    return $answer;
                } else {
                    $answer = [
                        'status' => 'complete',
                        'msg' => $result['msg']
                    ];
                    unset($result);
                    $this->insumo = null;
                    return $answer;
                }
            }
        } else {
            redireccionar('Insumo');
        }
        
    }

    public function seleccionarTodos() {

        $result = $this->insumo->selectAll();

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

    public function editInsumo( $id, $nombre, $cantidad, $precio ) {

        if (isset($id) && isset($nombre) && isset($cantidad) && isset($precio)) {

            $data = [
                'ide_ins' => strtoupper(trim((string) $id)),
                'nom_ins' => strtoupper(trim( (string) $nombre)),
                'pre_ins' => (float) trim( $precio ),
                'can_ins' => (float) trim( $cantidad )
            ];

            $result = $this->insumo->update($data);

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
            redireccionar('insumo');
        }
    }

// End editCargo

    public function deleteinsumo($id) {

        if (isset($id)) {

            $data = [
                'ide_ins' => (string) trim($id)
            ];
            unset($id);

            $result = $this->insumo->delete($data);

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
            redireccionar('insumo');
        }
    }

}
