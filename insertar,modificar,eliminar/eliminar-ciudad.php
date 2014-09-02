<?php
/*el objetivo es de eliminar datos de la tabla ciudad
@VAR la variable $objDB"Es quien hace la instancia con la bd" ,@VAR $sql es el que da el resultado en la
 base de datos bddesercion
*cod_ciudad,nom_ciudad,cod_depto,habitantes son de  tipo string 
**@AUTOR LEYDY LUCIA CASTILLO ficha 545715 pradera mañana
*@VERSION 1*/
include("DataBaseClass.php");

$objDB=NULL;
try{
$cod_ciudad = '1200';
$nom_ciudad = 'HUYUYUI';
$cod_depto='45';
$habitantes='5000';
$sql= "delete from ciudad where cod_ciudad='1200' ";
	
?>
<!--se hace un html para decorar  la respuesta con un poco de css-->
<html lang="es" >
<head>
<meta charset="iso-8859-1">
  <meta name="keywords" content="html5,css3,javascript"><!--son palabras claves que neceisto para trabajar en mi sitio web-->
    <title>consulta </title>
      <link rel="stylesheet" href="css/miestilo.css"><!--para llamar la carpeta css y hacer hoja de estilo-->
 </head>
  <body>
   <div id="baseglobal"><!--parte del css-->
     <header id="Encabezados">
         <th><img src="objetos/notificacion.gif"> </th><!--es el titulo notificacion-->
    </header> 
	<section id="contenido"><center><!--parte del css-->
  <article><!--inicio de article-->
<title>TABLAS BDDESERCION</title>
</head>
<body bgcolor=><center>
  <table bgcolor=#ccffcc border="3" width="80%" ><!--color verde claro-->
     <tr>
	 <?PHP
       /*este echo es la respuesta que da cuando uno decide insertar eliminar o modificar*/	   
          echo "Muy bien has ELIMINADO CON EXITO
	VE  a listar y verifica";
       ?> 
	   </tr>
	   <tr align="center">
	   <td ><a href="http://localhost/insertar,modificar,eliminar">IR AL MENU PRINCIPAL <a/>;</th>
	   </tr>
   </table>
 </HTML><!--cierre de html-->  
	
 <?php	
	   	
	 
 //$cod_depto='3';
//$habitantes='4950';
//$sql= "update ciudad set nom_ciudad='Belen de los rios' where cod_ciudad=99"; 
	   
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root',''); 

$objDB->getInstance()->beginTransaction();
$objDB->getInstance()->exec($sql);
$objDB->getInstance()->commit();
				
	
}catch (PDOException $exc){
 $objDB->getInstance()->rollback();
 echo $exc->getMessage();
}
//$db = new PDO ($dsn,$username,$password);
//$dsn= 'mysql:host=localhost;dbname=test;port=3306';
?>