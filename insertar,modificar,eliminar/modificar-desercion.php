<?php
/*el objetivo es de modificar datos de la tabla desercion
@VAR la variable $objDB"Es quien hace la instancia con la bd" ,@VAR$sql es el que da el resultado en la
 base de datos bddesercion
*num_doc,fecha,id_apre,num_ficha,cod_causa,fecha_desercion,
fase_desercion son de  tipo string 
**@AUTOR LEYDY LUCIA CASTILLO ficha 545715 pradera mañana
*@VERSION 1*/
include("DataBaseClass.php");

$objDB=NULL;
try{
$num_doc= '54';
$fecha= '20/08/2013';
$id_apre='123456789';
$num_ficha='545715';
$cod_causa='6';
$fecha_desercion='25/12/2014';
$fase_desercion='anal';

$sql= "update desercion set fecha='21/09/2013',fase_desercion='eje' where num_doc=54 ";
	   
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
              echo "Muy bien has modificado  CON EXITO
        VE  a listar y verifica	"; 	
			 
       ?> 
	   </tr>
	   <tr align="center">
	   <td ><a href="http://localhost/insertar,modificar,eliminar">IR AL MENU PRINCIPAL <a/>;</th>
	   </tr>
   </table>
 </HTML><!--cierre de html-->
<?PHP
    
	   
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root',''); 

$objDB->getInstance()->beginTransaction();
$objDB->getInstance()->exec($sql);
$objDB->getInstance()->commit();
				
	
}catch (PDOException $exc){
 $objDB->getInstance()->rollback();
 echo $exc->getMessage();
}
?>