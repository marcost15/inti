<?php
function bd_obt_municipios($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM municipios ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM municipios WHERE id = $id LIMIT 1");
	}
}