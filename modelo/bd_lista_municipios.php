<?php
function bd_lista_municipios()
{
	return sql2opciones("SELECT id,nombre FROM municipios ORDER BY id ASC");
}