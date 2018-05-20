<?php /* Smarty version 2.6.26, created on 2013-05-21 14:52:51
         compiled from ventana_solicitantes.html */ ?>
﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inicio2.html", 'smarty_include_vars' => array('title' => 'Consultas de Solicitantes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h4>BUSQUEDA DE SOLICITANTES</h4>

<?php echo $this->_tpl_vars['f1']; ?>


<?php if ($this->_tpl_vars['datos']): ?>
<h4>Solicitantes Encontrados</h4>
<div id="resultados">
<table  class="enhancedtable" border="0" cellspacing="3" cellpadding="3" width="100%">
<thead>
	<tr> 
		<th>Cedula o Rif</th>
		<th>Nombre y Apellidos o razón Social</th>
		<th>&nbsp;</th>
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
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['id']; ?>
</td>
		<td><?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['apellido']; ?>
, <?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['nombre']; ?>
</td>
		<td><a href="javascript:void(0)" onClick="actualizar('<?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['id']; ?>
','<?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['nombre']; ?>
','<?php echo $this->_tpl_vars['datos'][$this->_sections['p']['index']]['apellido']; ?>
');"><img onmouseover='overlib("<strong>Seleccionar</strong>",WIDTH, 70)' src="./imagenes/seleccionar.ico" onmouseout='return nd();'/></a></td></td>
		
	</tr><?php endfor; endif; ?>
</tbody>
</table>
</div>
<?php else: ?>
	<?php if ($this->_tpl_vars['error1'] == 2): ?> 
		<h3>NO SE ENCONTRÓ SOLICITANTES CON ESOS PARAMETROS, VERIFIQUE...</h3>
	<?php endif; ?>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "final2.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
function actualizar(id,nombre,apellido)
{  
	if (document.forms["personal"]=opener.document.forms["personal"])
	{
		opener.document.forms["personal"].solicitante_id.value=id;
		opener.document.forms["personal"].solicitante_nombre.value=nombre;
		opener.document.forms["personal"].solicitante_apellido.value=apellido;
	}
	close();
}
</script>
'; ?>