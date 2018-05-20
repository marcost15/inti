<?php
function bd_obt_registrar_personal($id = null)
{
	if($id==NULL)
	{
		return sql2array("SELECT id,CONCAT( apellido, ', ', nombre ) AS nombreape FROM registrar_personal ORDER BY id ASC");
	}
	else
	{
		return sql2value("SELECT CONCAT( apellido, ', ', nombre ) AS nombreape FROM registrar_personal WHERE id = $id LIMIT 1");
	}
}