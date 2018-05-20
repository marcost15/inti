<?php /* Smarty version 2.6.26, created on 2013-05-21 14:37:58
         compiled from ficha_solicitantes.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inicio.html", 'smarty_include_vars' => array('title' => ' Ficha Solicitantes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h3>FICHA DEL SOLICITANTE</h3>
<table class = "retiro" align = "center" border="1">
	<tr>
		<th>Cedula o Rif</th>
		<td><?php echo $this->_tpl_vars['ficha']['id']; ?>
</td>
	</tr>
	<?php if ($this->_tpl_vars['ficha']['apellido']): ?>
	<tr>
		<th>Apellido</th>
		<td><?php echo $this->_tpl_vars['ficha']['apellido']; ?>
</td>
	</tr>
	<?php endif; ?>
	<tr>
		<th>Nombre o Razón Social</th>
		<td><?php echo $this->_tpl_vars['ficha']['nombre']; ?>
</td>
	</tr>
	<tr>
		<th>Dirección</th>
		<td><?php echo $this->_tpl_vars['ficha']['direccion']; ?>
</td>
	</tr>
	<tr>
		<th>Sector</th>
		<td><?php echo $this->_tpl_vars['ficha']['sector']; ?>
</td>
	</tr>
	<tr>
		<th>Parroquia</th>
		<td><?php echo $this->_tpl_vars['ficha']['parroquia_id']; ?>
</td>
	</tr>
	<?php if ($this->_tpl_vars['ficha']['asentamiento_id']): ?>
	<tr>
		<th>Asentamiento</th>
		<td><?php echo $this->_tpl_vars['ficha']['asentamiento_id']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['tlf_fijo']): ?>
	<tr>
		<th>Telefono Fijo</th>
		<td><?php echo $this->_tpl_vars['ficha']['tlf_fijo']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['tlf_movil']): ?>
	<tr>
		<th>Telefono Movil</th>
		<td><?php echo $this->_tpl_vars['ficha']['tlf_movil']; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ficha']['correo']): ?>
	<tr>
		<th>Correo electronico</th>
		<td><?php echo $this->_tpl_vars['ficha']['correo']; ?>
</td>
	</tr>
	<?php endif; ?>
	<tr>
		<th>Beneficiarios Directos</th>
		<td><?php echo $this->_tpl_vars['ficha']['bene_directo']; ?>
</td>
	</tr>
	<tr>
		<th>Beneficiarios Indirectos</th>
		<td><?php echo $this->_tpl_vars['ficha']['bene_indirecto']; ?>
</td>
	</tr>
	<tr>
		<th>Concejo Comunal</th>
		<td><?php echo $this->_tpl_vars['ficha']['concejo_id']; ?>
</td>
	</tr>
</table>
</p>
<?php if ($this->_tpl_vars['datos2']): ?>
<h3>REPRESENTANTE</h3>
<table class = "retiro" align = "center" border="1">
	<tr>
		<th>Cedula</th>
		<td><?php echo $this->_tpl_vars['datos2']['id']; ?>
</td>
	</tr>
		<tr>
		<th>Nombre</th>
		<td><?php echo $this->_tpl_vars['datos2']['nombre']; ?>
</td>
	</tr>
	<tr>
		<th>Apellido</th>
		<td><?php echo $this->_tpl_vars['datos2']['apellido']; ?>
</td>
	</tr>
</table>
<?php endif; ?>
<hr/>	
<div id="boton" align="center"><a href="consmod_solicitantes.php"><img onmouseover='overlib("<strong>Volver</strong>",WIDTH, 70)' src="./imagenes/flecha_izquierda.gif" onmouseout='return nd();'/></a></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "final.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>