<?php 

class Conexion{

static public function conectar(){
	try{

	$link=new PDO("mysql:host=localhost;dbname=lotes_pagina","root","");
	$link->exec("set names utf8");
	$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $link;
	}catch(Exception $es){
		echo 'Falló la conexión: ' . $es->getMessage();
	}

}

}
?>