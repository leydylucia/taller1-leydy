<?php
/*el objetivo es de modificar datos de la tabla aprendiz
@VAR la variable $objDB"Es quien hace la instancia con la bd" ,@VAR$sql es el que da el resultado en la
 base de datos bddesercion
*id_apre,nom_apre,apel_apre,tel_apre,cod_ciudad,cod_tipo_id
cod_rh,genero,edad son de  tipo string 
**@AUTOR LEYDY LUCIA CASTILLO ficha 545715 pradera mañana
*@VERSION 1*/
include("DataBaseClass.php");

$objDB=NULL;
try{
$id_apre= '123456789';
$nom_apre= 'mariana';
$apel_apre='torres';
$tel_apre='2671370';
$cod_ciudad='1180';
$cod_tipo_id='8';
$cod_rh='7';
$genero='f';
$edad='24';


$sql= "update aprendiz set nom_apre='marichui',tel_apre=3136089057,edad=25,cod_ciudad=12 
where id_apre=123456789";
	
	
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
         <th><img src="objetos/notificacion.gif"> </th><!--es el titulo tablas bddesercion-->
    </header> 
	<section id="contenido"><center><!--parte del css-->
  <article><!--inicio de article-->
<title>TABLAS BDDESERCION</title>
</head>
<body bgcolor=><center>
  <table bgcolor=#ccffcc border="3" width="80%" ><!--color verde claro-->
     <?PHP
       /*este echo es la respuesta que da cuando uno decide insertar eliminar o modificar*/	   
           echo "Muy bien has modificado  con exito
        VE  a listar y verifica	"; 
       ?> 
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