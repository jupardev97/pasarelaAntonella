<?php

class modeloCargo {

    private $db;

    public function __construct() {
        $this->db = new Base;
    }

    public function selectAll() {
        $sql = 'SELECT * FROM pas_car;';
        $this->db->query($sql);
        $result['data'] = $this->db->requestAll();
        $result['reg'] = $this->db->rowCount();
        return $result;
    }

    public function findOne($data) {
        $sql = 'SELECT * FROM pas_car WHERE ';
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
        $sql = 'UPDATE pas_car SET ';

        $elements = 0;
        foreach ($data as $key => $value):
            ++$elements;
            if ($key != 'ide_car') {
                $sql .= $key . ' = :' . $key;
                if ($elements < count($data))
                    $sql .= ', ';
            }
        endforeach;

        $sql .= ' WHERE ide_car = :ide_car';

        $this->db->query($sql);
        foreach ($data as $key => $value) {
            $this->db->bind(':' . $key, $value);
        }

        if ($this->db->execute()) {
            if ($this->db->rowCount() > 0) {
                $result['reg'] = $this->db->rowCount();
                $result['msg'] = 'Registro Actualizado';
                return $result;
            } else {
                $result['reg'] = 0;
                $result['msg'] = 'Error en la Edicion';
                return $result;
            }
        } else {
            $result['msg'] = 'Excepcion fatal en El metodo Update.';
            $result['reg'] = false;
            return $result;
        }
    }

//End udate($data)

}
