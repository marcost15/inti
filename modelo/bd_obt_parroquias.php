<?php
function bd_obt_parroquias($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre,municipio_id FROM parroquias ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM parroquias WHERE id = $id LIMIT 1");
	}
}