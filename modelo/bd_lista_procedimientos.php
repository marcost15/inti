<?php
function bd_lista_procedimientos()
{
	return sql2opciones("SELECT id,nombre FROM tipos_procedimientos ORDER BY id ASC");
}