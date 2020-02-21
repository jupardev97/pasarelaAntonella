<h2>Tipo de Insumos</h2>
<hr>
<table>
    <tr>
        <th>Id Insumo</th>
        <th>Tipo Insumo</th>
        <th>Estado Insumo</th>
        <th>Opciones</th>
    </tr>
<?php
if ( $result['registros'] ) {
    echo '<h2>'.$result['msg'].'</h2>';
    foreach ($result as $data):
        if(isset($data['tip_ins'])){
            $estado = ( $data['est_tip'] ) ? ('Activo') : ('Inactivo');
            echo '<tr>';
            echo '<td>'.$data['ide_tip'].'</td>';
            echo '<td>'.$data['tip_ins'].'</td>';
            echo '<td>'.$estado.'</td>';
            echo '<td><a href="" class="button button2">Actualizar</a><a href="" class="button button3">Borrar</a></td>';
            echo '</tr>';
        }
    endforeach;
}else{
    echo '<tr><td colspan="4"><h2>'.$result['msg'].'</h2></td></tr>';
}
?>
</table>

<br>
<br>
<br>
<br>
<br>

<h3>Crear un Tipo Insumo</h3>

<div>
  <form action="" method="get">
   <input type="hidden" id="identificador" name="identificador" value="">
    <label for="nombre">Tipo de Insumo</label>
    <input type="text" id="nombre" name="nombre" placeholder="Tipo de Insumo">
    <label for="estado">Estado del Tipo de Insumo:</label>
    <select id="estado" name="estado">
      <option value="1">Activado</option>
      <option value="0">Desactiado</option>
    </select>
    <input type="submit" value="Submit">
  </form>
</div>


