<?php

class Prenda extends Controller {

    private $prenda;
    private $precioPrenda;

    public function __construct() {
        session_start();
        checkSession('Login');
        $this->prenda = $this->model('modeloPrenda');
        $this->tipoPrenda = $this->model('modeloTipoPrenda');
    }

    public function index() {

        $config = [
            'cedula' => $_SESSION['ced_tra'],
            'nombres' => $_SESSION['nom_usu'],
            'cargo' => $_SESSION['tip_car'],
            'nombrePagina' => 'Prendas'
        ];
        $this->view('inicio/header', $config);
        unset($config);

        $this->view('prendas/panelTipoPrendas');
        $this->view('prendas/tablaPrendas');
        $this->view('prendas/infoPrendas');
        $this->view('prendas/modalPrendas');

        $this->view('inicio/footer');
        $this->view('scripts/funciones/alertas');
        $this->view('scripts/clases/Ajax');
        $this->view('prendas/js/main');
    }

    public function listarPrendas( $identificador )
    {

        if ( isset($identificador) ) {

            $data = [
                'ide_tip' => $identificador
            ];

            $result = $this->prenda->findAll($data);

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
                    'msg' => 'No Existen Prendas Registrados de Este Tipo'
                ];
                return $answer;
            }

        }else{
            redireccionar('Prenda');
        }
    }
    
    public function createPrenda($id, $nombre, $cantidad, $precio, $estado, $color, $descripcion, $tipoPrenda ) {

        if (isset($id) && isset($nombre) && isset($cantidad) && isset($precio) && isset($estado) && isset($color) && isset($descripcion) && isset($tipoPrenda) ) {

            $id = strtoupper(trim($id));
            $confirmation = [
                'ide_pre' => $id
            ];

            $result = $this->prenda->findOne($confirmation);
            
            if ($result['reg']) {
                unset($result);
                $answer = [
                    'status' => 'error',
                    'msg' => 'Ya Existe una Prenda Con el Mismo Codigo'
                ];
                return $answer;
                unset($result);
            } else {

                $data = [
                    'ide_pre' => (string) $id,
                    'ide_tip' => strtoupper(trim( (string) $tipoPrenda)),
                    'nom_pre' => strtoupper(trim( (string) $nombre)),
                    'cos_pre' => (float) trim( $precio ),
                    'can_pre' => (float) trim( $cantidad ),
                    'est_pre' => (int) trim( $estado ),
                    'col_pre' => (string) trim( $color ),
                    'des_pre' => (string) trim( $descripcion )
                ];

                $result = $this->prenda->create($data);

                if ($result['reg']) {

                    $answer = [
                        'status' => 'complete',
                        'msg' => $result['msg']
                    ];
                    unset($result);
                    $this->prenda = null;
                    return $answer;
                } else {
                    $answer = [
                        'status' => 'complete',
                        'msg' => $result['msg']
                    ];
                    unset($result);
                    $this->prenda = null;
                    return $answer;
                }
            }
        } else {
            redireccionar('Prenda');
        }
        
    }

    public function seleccionarTodos() {

        $result = $this->prenda->selectAll();

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

    public function editPrenda( $id, $nombre, $cantidad, $precio, $color, $descripcion ) {

        if (isset($id) && isset($nombre) && isset($cantidad) && isset($precio) && isset($color) && isset($descripcion)) {

            $data = [
                'ide_pre' => strtoupper(trim((string) $id)),
                'nom_pre' => strtoupper(trim( (string) $nombre)),
                'cos_pre' => (float) trim( $precio ),
                'can_pre' => (float) trim( $cantidad ),
                'col_pre' => (string) trim( $color ),
                'des_pre' => (string) trim( $descripcion ),
            ];

            $result = $this->prenda->update($data);

            if ($result['reg']) {
                unset($result);
                $answer['status'] = 'complete';
                $answer['msg'] = 'Prenda Editado Satisfactoriamente';
                return $answer;
            } else {
                unset($result);
                $answer['status'] = 'error';
                $answer['msg'] = 'Se ha Generado un Error en la Edicion del Prenda';
                return $answer;
            }
        } else {
            redireccionar('prenda');
        }
    }

// End editCargo

    public function deleteprenda($id) {

        if (isset($id)) {

            $data = [
                'ide_pre' => (string) trim($id)
            ];
            unset($id);

            $result = $this->prenda->delete($data);

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
            redireccionar('prenda');
        }
    }

}

