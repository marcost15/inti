<?php
function bd_lista_parroquias()
{
	return sql2opciones("SELECT id,nombre,municipio_id FROM parroquias ORDER BY id ASC");
}