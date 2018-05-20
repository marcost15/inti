<?php
function bd_obt_dependencias($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM dependencias ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre FROM dependencias WHERE id = $id LIMIT 1");
	}
}