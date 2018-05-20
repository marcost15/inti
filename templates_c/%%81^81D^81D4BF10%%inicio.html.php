<?php /* Smarty version 2.6.26, created on 2013-05-21 15:20:35
         compiled from inicio.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'inicio.html', 7, false),)), $this); ?>
<html>
	<head>
		<link rel="shortcut icon" href="./imagenes/favicon.ico" type="image/x-icon" /> 
		<link rel="icon" href="./imagenes/favicon.ico" type="image/x-icon" /> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="robots" content="noindex,nofollow"/>
		<title><?php echo ((is_array($_tmp=@$this->_tpl_vars['title'])) ? $this->_run_mod_handler('default', true, $_tmp, "ORT - TRUJILLO") : smarty_modifier_default($_tmp, "ORT - TRUJILLO")); ?>
</title>
		<link rel="stylesheet" type="text/css" href="./estilo/layout.css"/> 
		<link rel="stylesheet" href="./estilo/tinydropdown.css" type="text/css" /><!-- Para el Menú -->
		<link rel="stylesheet" type="text/css" href="./estilo/cnc.css"/> 
		<link rel="stylesheet" type="text/css" href="./estilo/layoutprint.css" media="print"/>
		<script type="text/javascript" src="./js/domtableenhance.js"></script>
		<script type="text/javascript" src="../libreriasphp/FH3/FHTML/overlib/overlib.js"></script>
		<script type="text/javascript" src="./js/tinydropdown.js"></script><!-- Para el Menú -->
		<script type="text/javascript" src="../libreriasjs/sortable/sortable.js"></script>
		<script type="text/javascript" src="./js/jquery/jquery.min.js"></script><!-- Jquery -->
		<script type="text/javascript" src="./js/jquery/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<link rel="stylesheet" type="text/css" href="./js/jquery/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	</head> 
	<body topmargin="0"  background="./imagenes/fondo1.jpg";>
		<div id = "fondo">
		<div id="cintillo" align="center"><img src="./imagenes/cintillo.jpg" width="1050" height="60"/></div>
		<!-- banner1--><div id="banner">
			<object 
			classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
			codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" 
			width="1000" 
			height="260">
			<param 
				name="movie" 
				value="./imagenes/banner.swf">
			<param 
				name="quality" 
				value="high">
			<param 
				name="loop" 
				value="false">
			<embed 
			src="./imagenes/banner.swf" 
			width="1000" 
			height="260" 
			loop="false" 
			quality="high" 
			pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" 
			type="application/x-shockwave-flash">
			</embed>
			</object></div><!-- banner1-->
		<div id="titulo" align="center"> <br/> OFICINA REGIONAL DE TIERRAS DEL ESTADO TRUJILLO </div><!-- titulo -->	<br/>
			<div id="menu">
				<?php if ($_SESSION['usuario']): ?><ul id="mimenu" class="mimenu">
					<li><span>Solicitantes</span>
						<ul>
							<li><a href="registrar_solicitantes.php">Agregar</a></li>
							<li><a href="consmod_solicitantes.php">Consultar / Modificar</a></li>
						</ul>
					</li>
					<li><span>Expedientes</span>
						<ul>
							<li><a href="registrar_expedientes.php">Agregar</a></li>
							<li><a href="consmod_expediente.php">Consultar / Modificar</a></li>
						</ul>
					</li>
					<li><span>Movimientos</span>
								<ul>
									<li><a href="registrar_movimientos.php">Agregar</a></li>
									<li><a href="consmod_movimientos.php">Consultar / Modificar</a></li>
								</ul>
							</li>
					<li><span>Personal</span>
						<ul>
							
							<li><a href="registrar_personal.php">Agregar</a></li>
							<li><a href="consmod_personal.php">Consultar - Modificar</a></li>
							<li><a href="cambiar_clave.php">Cambiar_clave</a></li>
						</ul>
					</li>
					<li><span>Reportes</span>
					<ul>
						<li><a href="#">Expedientes</a>
							<ul>
								<li><a href="rp_frm_fecha.php">Por Fecha</a></li>
								<li><a href="rp_frm_concejo.php">Por Consejo</a></li>
								<li><a href="rp_frm_plan.php">Por Plan</a></li>
								<li><a href="rp_frm_procedimiento.php">Por Procedimiento</a></li>
								<li><a href="rp_frm_status.php">Por Status</a></li>
								<li><a href="rp_frm_tipo.php">Por Tipo</a></li>
								<li><a href="rp_frm_municipio.php">Por Municipio</a></li>
							</ul>
						</li>
						<li><a href="#">Movimientos</a>
							<ul>
							<li><a href="rp_frm_movixfecha.php">Por Fecha</a></li>
							<li><a href="rp_frm_movixdependencia.php">Por Dependencia</a></li>
							</ul>
						</li>
					</ul>
					</li>
					<li><span>Admin BD</span>
						<ul>
							<li><a href="asentamientos.php">Asentamientos</a></li>
							<li><a href="dependencias.php">Dependencias</a></li>
							<li><a href="municipios.php">Municipios</a></li>
							<li><a href="parroquias.php">Parroquias</a></li>
							<li><a href="programas.php">Programas Asociados</a></li>
							<li><a href="niveles.php">Niveles de Acceso</a></li>
							<li><a href="privilegios.php">Permisos de Usuario</a></li>
							<li><a href="status.php">status Solicitudes</a></li>
							<li><a href="procedimientos.php">T. Procedimientos</a></li>
							<li><a href="#">Consejo Comunal</a>
								<ul>
									<li><a href="registrar_concejo_comunal.php">Agregar</a></li>
									<li><a href="consmod_concejo_comunal.php">Consultar / Modificar</a></li>
								</ul>
							</li>
							<li><a href="#">Funcionarios</a>
								<ul>
									<li><a href="registrar_funcionarios.php">Agregar</a></li>
									<li><a href="consmod_funcionarios.php">Consultar / Modificar</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="index.php">Salir</a></li>
				</ul><?php endif; ?>
			</div><!-- menudiv -->		
			<?php echo '
			<script type="text/javascript">
				var dropdown=new TINY.dropdown.init("dropdown", {id:\'mimenu\', active:\'menuhover\'});
			</script>'; ?>

			<div id="contenido"><!-- Contenido -->