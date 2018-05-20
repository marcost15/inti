<?php
function bd_modificar_concejo_comunal($d)
{
	$id  = $d['id'];
	$sql = "UPDATE concejo_comunal
			SET nombre        =  '$d[nombre]',
				rif      =  '$d[rif]',
				tlf_movil      =  '$d[tlf_movil]',
				tlf_fijo        =  '$d[tlf_fijo]'	
				WHERE CONVERT(`concejo_comunal`.`id` USING utf8 ) = '$id' LIMIT 1 ;";
	enviar_sql($sql);
 }