<?php
function bd_guardar_funcionarios($d)
{
	enviar_sql("INSERT INTO funcionarios (id,nombre,cargo) 
	VALUES ('$d[id]','$d[nombre]','$d[cargo]');");
}