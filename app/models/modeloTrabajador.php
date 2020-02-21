<?php

class modeloTrabajador {

    private $db;

    public function __construct() {
        $this->db = new Base;
    }

    public function selectAll() {
        $sql = 'SELECT * FROM pas_tra';
        $this->db->query($sql);
        $result['data'] = $this->db->requestAll();
        $result['reg'] = $this->db->rowCount();
        return $result;
    }

    public function create($data) {

        $sql = 'INSERT INTO pas_tra (';
        $elements = 0;
        foreach ($data as $key => $value):
            ++$elements;
            $sql .= $key;
            if ($elements < count($data))
                $sql .= ', ';
            else if ($elements == count($data))
                $sql .= ')';
        endforeach;
        $sql .= ' VALUES ( ';
        $elements = 0;
        foreach ($data as $key => $value):
            ++$elements;
            $sql .= ':' . $key;
            if ($elements < count($data))
                $sql .= ', ';
            else if ($elements == count($data))
                $sql .= ')';
        endforeach;

        $this->db->query($sql);
        foreach ($data as $key => $value) {
            $this->db->bind(':' . $key, $value);
        }

        if ($this->db->execute()) {
            if ($this->db->rowCount() > 0) {
                $result['reg'] = $this->db->rowCount();
                $result['msg'] = 'Trabajador Agregado Correctamente';
                return $result;
            } else {
                $result['reg'] = 0;
                $result['msg'] = 'Ha Ocurrido un Error en la Insercion';
                return $result;
            }
        } else {
            $result['msg'] = 'Ocurrio un Error en La Ejecucion del Metodo Create';
            $result['reg'] = false;
            return $result;
        }
    }

//End create($data)

    public function findOne($data) {
        $sql = 'SELECT * FROM pas_tra WHERE ';
        $elements = 0;
        foreach ($data as $key => $value):
            ++$elements;
            $sql .= $key . ' = :' . $key;
            if ($elements < count($data))
                $sql .= ' AND ';
        endforeach;

        $this->db->query($sql);

        foreach ($data as $key => $value) {
            $this->db->bind(':' . $key, $value);
        }
        unset($data);

        if ($this->db->execute()) {
            if ($this->db->rowCount() > 0) {
                $result['reg'] = $this->db->rowCount();
                $result['msg'] = 'Registros Encontrados';
                $result['data'] = $this->db->requestOne();
                return $result;
            } else {
                $result['reg'] = 0;
                $result['msg'] = 'No Existe El Registro';
                return $result;
            }
        } else {
            $result['msg'] = 'A Fatal Error in The Execution Of Method findOne.';
            $result['reg'] = false;
            return $result;
        }
    }

//End findOne($data);

    public function update($data) {

        $sql = 'UPDATE pas_tra SET ';

        $elements = 0;
        foreach ($data as $key => $value):
            ++$elements;
            if ($key != 'ide_car') {
                $sql .= $key . ' = :' . $key;
                if ($elements < count($data))
                    $sql .= ', ';
            }
        endforeach;

        $sql .= ' WHERE ced_tra = :ced_tra';

        $this->db->query($sql);
        foreach ($data as $key => $value) {
            $this->db->bind(':' . $key, $value);
        }

        if ($this->db->execute()) {
            if ($this->db->rowCount() > 0) {
                $result['reg'] = $this->db->rowCount();
                $result['msg'] = 'Trbajador Actualizado Correctamente';
                return $result;
            } else {
                $result['reg'] = 0;
                $result['msg'] = 'Error en la Edicion del Trabajador';
                return $result;
            }
        } else {
            $result['msg'] = 'A Ocurrido un Error en La Edicion.';
            $result['reg'] = false;
            return $result;
        }
    }

    public function delete($data) {

        $sql = 'DELETE FROM pas_tra WHERE ';

        $elements = 0;
        foreach ($data as $key => $value):
            ++$elements;
            $sql .= $key . ' = :' . $key;
            if ($elements < count($data))
                $sql .= ' AND ';
        endforeach;
        
        $this->db->query($sql);
        foreach ($data as $key => $value) {
            $this->db->bind(':' . $key, $value);
        }
        
        if ($this->db->execute()) {
            if ($this->db->rowCount() > 0) {
                $result['reg'] = $this->db->rowCount();
                $result['msg'] = 'Trabajador Eliminado';
                return $result;
            } else {
                $result['reg'] = 0;
                $result['msg'] = 'No se Puede Eliminar El Trabajador';
                return $result;
            }
        } else {
            $result['msg'] = 'A ocurrido un Error En la Ejecucion';
            $result['reg'] = false;
            return $result;
        }
    }

}
