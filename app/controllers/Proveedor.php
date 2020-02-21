<?php

class Proveedor extends Controller {

    private $proveedor;

    public function __construct() {
        session_start();
        checkSession('Login');
        $this->proveedor = $this->model('modeloProveedor');
    }

    public function index() {

        $config = [
            'cedula' => $_SESSION['ced_tra'],
            'nombres' => $_SESSION['nom_usu'],
            'cargo' => $_SESSION['tip_car'],
            'nombrePagina' => 'Proveedores'
        ];
        $this->view('inicio/header', $config);
        unset($config);

        $this->view('Proveedores/tablaProveedor');
        $this->view('Proveedores/datosProveedor');
        $this->view('Proveedores/modalProveedor');
        $this->view('inicio/footer');
        $this->view('scripts/funciones/alertas');
        $this->view('scripts/clases/Ajax');
        $this->view('proveedores/js/main');
    }

    public function createProveedor($rif, $nombre, $direccion, $tipo, $opcionales = []) {

        if (isset($rif) && isset($nombre) && isset($direccion) && isset($tipo)) {
            
            $rif = trim($rif);
            $confirmation = [
                'rif_pro' => $rif
            ];
            
            $result = $this->proveedor->findOne($confirmation);
            
            if ($result['reg']) {
                unset($result);
                $answer = [
                    'status' => 'error',
                    'msg' => 'Ya Existe Un Proveedor con Ese Rif Registrado'
                ];
                return $answer;
            } else {
                unset($result);

                $nombre = trim($nombre);
                $direccion = trim($direccion);
                $tipo = trim($tipo);
                
                $data = [
                        'rif_pro' => trim((string) $rif),
                        'nom_pro' => trim((string) $nombre),
                        'dir_pro' => trim((string) $direccion),
                        'tip_pro' => trim((string) $tipo),
                        'cor_pro' => ( array_key_exists('correo', $opcionales) ) ? ( trim((string) $opcionales['correo']) ) : ( null ),
                        'tel_pro' => ( array_key_exists('telefono', $opcionales) ) ? ( trim((string) $opcionales['telefono']) ) : ( null ),
                        'est_pro' => 1 
                    ];
                
                $result = $this->proveedor->create($data);
                
                if ($result['reg']) {

                    $answer = [
                        'status' => 'complete',
                        'msg' => $result['msg']
                    ];
                    unset($result);
                    $this->proveedor = null;
                    return $answer;
                } else {
                    $answer = [
                        'status' => 'complete',
                        'msg' => $result['msg']
                    ];
                    unset($result);
                    $this->proveedor = null;
                    return $answer;
                }
            }
        } else {
            redireccionar('Proveedor');
        }
    }

    public function seleccionarTodos() {

        $result = $this->proveedor->selectAll();

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
                'status' => 'complete',
                'msg' => 'No Se Encuentran Registros Disponibles',
                'reg' => $result['reg']
            ];
            unset($result);
            return $aswer;
        }
    }

// End seleccionarTodos();
    
    public function editProveedor($rif, $nombre, $direccion, $tipoProveedor, $opcionales = [] ) {

        if ( isset($rif) && isset($nombre) && isset($direccion) && isset($tipoProveedor) ) {
            
            $data = [
                'rif_pro' => trim((string) $rif),
                'nom_pro' => trim((string) $nombre),
                'dir_pro' => trim((string) $direccion),
                'tip_pro' => trim((string) $tipoProveedor),
                'cor_pro' => ( array_key_exists('correo', $opcionales) ) ? ( trim((string) $opcionales['correo']) ) : ( null ),
                'tel_pro' => ( array_key_exists('telefono', $opcionales) ) ? ( trim((string) $opcionales['telefono']) ) : ( null )
            ];
            
            $result = $this->proveedor->update($data);

            if ($result['reg']) {
                unset($result);
                $answer['status'] = 'complete';
                $answer['msg'] = 'Proveedor Editado Satisfactoriamente';
                return $answer;
            } else {
                unset($result);
                $answer['status'] = 'error';
                $answer['msg'] = 'Se ha Generado un Error en la Edicion del Proveedor';
                return $answer;
            }
        } else {
            redireccionar('Iva');
        }
    }

// End editCargo

    public function deleteProveedor($rif) {
        if (isset($rif)) {
            $rif = (string) trim($rif);
            
            $data = [
                'rif_pro' => $rif,
                'est_pro' => 0
            ];
            
            unset($id);

            $result = $this->proveedor->delete($data);
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
