<?php
function bd_buscar_solicitantes($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT id,apellido, nombre
							FROM solicitantes
							WHERE id           LIKE '%$texto%' 
 								OR apellido  LIKE '%$texto%'
								OR nombre    LIKE '%$texto%' 
						  	ORDER BY nombre ASC";
			break;
	}
	return sql2array($sql);
}