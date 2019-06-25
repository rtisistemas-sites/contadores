<?php
include "painel/conexao.php";
session_start();

$area		=  $_POST['area'];
$usuario	=  md5($_POST['usuario']);
$senha		=  md5($_POST['senha']);
$ip		=	$_SERVER["REMOTE_ADDR"];



//=============================== Verificando Administrador ===============================================================================
if ($area == "1") { 

$sql	=	"select * from administrador where adm_login = '$usuario' and adm_senha = '$senha'";
$res	=	mysql_query($sql);
$conta	=	mysql_num_rows($res);	
$lin	=	mysql_fetch_array($res);




if ($conta > 0) { // Verificando se existe usuario digitado.

		
		if ($lin['adm_senha'] == $senha) {
		
		
		$_SESSION["login_ses"]		= $lin['adm_login'];
		$_SESSION["senha_ses"]		= $lin['adm_senha'];
		$_SESSION["nome_ses"]		= $lin['adm_nome'];
		$_SESSION["set_codigo_ses"]	= $lin['set_codigo'];
		$_SESSION["adm_codigo_ses"]	= $lin['adm_codigo'];
			
	
	
	
	
	
		$codigo_administrador	=	$lin['adm_codigo'];
		
		// Inserindo Acessos
		$data_hoje	=	date("Ymd");
		$hora_hoje	=	date("H:i:s");
		
		
		$sql_reg	=	 "insert into administrador_acesso
		(adm_codigo, adm_acess_ip, adm_acess_data, adm_acess_hora)
		
		values
		('$codigo_administrador', '$ip', '$data_hoje', '$hora_hoje')";
		
		mysql_query($sql_reg);
	
	
	
	
	
		echo "<script>window.location.href='painel/principal.php';</script>";
				
		} else {
		
				?>
				<script>alert("Senha N�o Confere!");</script>
				<script>window.location.href='index.php';</script>
				<?php
				header("Location: index.php");
				exit();
				
		}
		
		
} else { // Se não existir usuario faz abaixo

				?>
				<script>alert("Usu�rio N�o Encontrado!");</script>
				<script>window.location.href='index.php';</script>
				<?php
				header("Location: index.php");
				exit();

}

} // Final do IF de verifica��o de �rea para logar
//=========================================================================================================================================



//=============================== Verificando Administrador ===============================================================================
if ($area == "2") { 

$sql	=	"select * from clientes where cli_login = '$usuario' and cli_senha = '$senha'";
$res	=	mysql_query($sql);
$conta	=	mysql_num_rows($res);	
$lin	=	mysql_fetch_array($res);




if ($conta > 0) { // Verificando se existe usuario digitado.

		
		if ($lin['cli_senha'] == $senha) {
		
		$_SESSION["login_ses"]		= $lin['cli_login'];
		$_SESSION["senha_ses"]		= $lin['cli_senha'];
		$_SESSION["nome_ses"]		= $lin['cli_nome'];
		$_SESSION["cli_codigo_ses"]	= $lin['cli_codigo'];
			
	
	
	
	
	
		$codigo_cliente		=	$lin['cli_codigo'];
		
		// Inserindo Acessos
		$data_hoje	=	date("Ymd");
		$hora_hoje	=	date("H:i:s");
		
		
		$sql_reg	=	 "insert into clientes_acesso
		(cli_codigo, cli_acess_ip, cli_acess_data, cli_acess_hora)
		
		values
		('$codigo_cliente', '$ip', '$data_hoje', '$hora_hoje')";
		
		mysql_query($sql_reg);
	
	
	


		echo "<script>window.location.href='matriz/principal.php';</script>";
				
		} else {
		
				?>
				<script>alert("Senha N�o Confere!");</script>
				<script>window.location.href='index.php';</script>
				<?php
				header("Location: index.php");
				exit();
				
		}
		
		
} else { // Se não existir usuario faz abaixo

				?>
				<script>alert("Usu�rio N�o Encontrado!");</script>
				<script>window.location.href='index.php';</script>
				<?php
				header("Location: index.php");
				exit();

}

} // Final do IF de verifica��o de �rea para logar
//=========================================================================================================================================



//=============================== Verificando Administrador ===============================================================================
if ($area == "3") { 

$sql	=	"select * from filiais where fil_login = '$usuario' and fil_senha = '$senha'";
$res	=	mysql_query($sql);
$conta	=	mysql_num_rows($res);	
$lin	=	mysql_fetch_array($res);




if ($conta > 0) { // Verificando se existe usuario digitado.

		
		if ($lin['fil_senha'] == $senha) {
		
		$_SESSION["login_ses"]		= $lin['fil_login'];
		$_SESSION["senha_ses"]		= $lin['fil_senha'];
		$_SESSION["nome_ses"]		= $lin['fil_nome'];
		$_SESSION["fil_codigo_ses"]	= $lin['fil_codigo'];
		$_SESSION["cli_codigo_ses"]	= $lin['cli_codigo'];
			
	
	
	
	
	
		$codigo_filial		=	$lin['fil_codigo'];
		$codigo_cliente		=	$lin['cli_codigo'];
		
		// Inserindo Acessos
		$data_hoje	=	date("Ymd");
		$hora_hoje	=	date("H:i:s");
		
		
		$sql_reg	=	 "insert into filiais_acesso
		(fil_codigo, cli_codigo, fil_acess_ip, fil_acess_data, fil_acess_hora)
		
		values
		('$codigo_filial', '$codigo_cliente', '$ip', '$data_hoje', '$hora_hoje')";
		
		mysql_query($sql_reg);
	
	
	


		echo "<script>window.location.href='filial/principal.php';</script>";
				
		} else {
		
				?>
				<script>alert("Senha N�o Confere!");</script>
				<script>window.location.href='index.php';</script>
				<?php
				header("Location: index.php");
				exit();
				
		}
		
		
} else { // Se não existir usuario faz abaixo

				?>
				<script>alert("Usu�rio N�o Encontrado!");</script>
				<script>window.location.href='index.php';</script>
				<?php
				header("Location: index.php");
				exit();

}

} // Final do IF de verifica��o de �rea para logar
//=========================================================================================================================================

include "painel/destruidor.php";
?>