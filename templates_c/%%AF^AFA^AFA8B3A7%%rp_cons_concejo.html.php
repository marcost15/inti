<?php /* Smarty version 2.6.26, created on 2013-05-21 15:35:26
         compiled from rp_cons_concejo.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inicio3.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="resultados_reporte">
<p>
<div id = "indice">REPORTE DE EXPEDIENTES POR CONSEJO COMUNAL </br>Consejo Comunal: <?php echo $this->_tpl_vars['plan_nombre_id']; ?>
</div>
</p>
<?php if ($this->_tpl_vars['datos']): ?>
<div id="resultados">
<table class="enhancedtable" cellspacing="0" cellpadding = "3" border="1" align="center" width="100%">
<thead>
	<tr> 
		<th  colspan ="11">SOLICITANTE</th>
		<th  colspan ="2">REPRESENTANTE</th>
		<th  colspan ="14">EXPEDIENTE</th>
	</tr>
	<tr> 
		<th>Cedula o Rif</th>
		<th>Nombre y Apellido o Razón Social</th>
		<th>Dirección</th>
		<th>Sector</th>
		<th>Parroquia</th>
		<th>Asentamiento</th>
		<th>Telefono Fijo</th>
		<th>Telefono Movil</th>
		<th>Correo electronico</th>
		<th>Beneficiarios Directos</th>
		<th>Beneficiarios Indirectos</th>
		
		<th>Cedula</th>
		<th>Nombre y Apellido</th>
		
		<th>ID</th>
		<th>Nombre del Fundo</th>
		<th>Superficie</th>
		<th>Fecha</th>
		<th>Plan</th>
		<th>Procedimiento</th>
		<th>Tipo</th>
		<th>Nro de Expediente</th>
		<th>Nro de Expediente Fenix</th>
		<th>Nro de Archivo</th>
		<th>Nro de Carpeta</th>
		<th>Fecha de Remisión</th>
		<th>Nro de Memo</th>
		<th>Status</th>
	</tr>
</thead>
<tbody>
	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['datos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
	<tr>		
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['id']; ?>
</td>
		<td><?php if ($this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['apellido']): ?> <?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['apellido']; ?>
 ,<?php endif; ?><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['nombre']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['direccion']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['sector']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['parroquia_id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['asentamiento_id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['tlf_fijo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['tlf_movil']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['correo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['bene_directo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['solicitante']['bene_indirecto']; ?>
</td>
		
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['representante']['id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['representante']['apellido']; ?>
,<?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['representante']['nombre']; ?>
</td>
		
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['nombre_fundo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['superficie']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['fecha']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['plan_id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['tipo_proc_id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['tipo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['num_exp']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['num_solicitud_fenix']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['num_archivo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['num_carpeta']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['fecha_remision']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['num_memo']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['status_id']; ?>
</td>
		
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
<?php else: ?>
	<h3>NO SE ENCONTRÓ NINGUN DATO QUE CORRESPONDA, VERIFIQUE...</h3>
<?php endif; ?>
<?php if ($this->_tpl_vars['datos']): ?>
<p>
<div id="boton">
<a href="xls_concejo.php" target="_xls"><img onmouseover='overlib("<strong>Generar .xls</strong>",WIDTH, 70)' src="./imagenes/excel.png" width="50" height="50" onmouseout='return nd();'/></a>
<a href='./grafico_concejo.php' class='claseiframe'><img onmouseover='overlib("<strong>Generar Grafico</strong>",WIDTH, 70)' src="./imagenes/grafico.png" width="50" height="50" onmouseout='return nd();'/></a></div>
<p>
</div><?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "final3.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>