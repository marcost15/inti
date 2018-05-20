<?php
function bd_buscar_funcionarios($tipo,$texto)
{
	switch($tipo)
	{
		case 2: //Busqueda de texto completo
			$sql = "SELECT id,nombre,cargo
							FROM funcionarios
							WHERE id         LIKE '%$texto%' 
 								OR nombre  LIKE '%$texto%'
								OR cargo  LIKE '%$texto%'
						  	ORDER BY nombre ASC";
			break;
	}
	return sql2array($sql);
}