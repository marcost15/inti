<?php
function bd_modificar_funcionarios($d)
{
	$id  = $d['id'];
	$sql = "UPDATE funcionarios
			SET nombre        =  '$d[nombre]',
				cargo        =  '$d[cargo]'	
				WHERE CONVERT(`funcionarios`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }