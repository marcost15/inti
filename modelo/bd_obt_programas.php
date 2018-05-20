<?php
function bd_obt_programas($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM programas_asociados ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM programas_asociados WHERE id = $id LIMIT 1");
	}
}