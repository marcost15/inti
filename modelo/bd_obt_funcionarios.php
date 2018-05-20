<?php
function bd_obt_funcionarios($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,nombre FROM funcionarios ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT nombre AS nombreape FROM funcionarios WHERE id = $id LIMIT 1");
	}
}