<?php
/* el include trae la clase que contiene la coneccion de la
*base de datos bddesercion
@var $objdb hace una instancia con la base de datos
@ var $sql es donde se hace las consultas 
**@AUTOR LEYDY LUCIA CASTILLO ficha 545715 pradera mañana
*@VERSION 1*/
include("dataBaseClass.php");
//visualice causa y cantidad de desertados por cada una
try{
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root',''); 
$sql= "select count(id_apre)as cantidad,fase_desercion 
FROM desercion natural join causa_desercion group by causa_desercion.des_causa";

$arrData= $objDB->getInstance()/*@var $arrdata es un array quien conecta con $objDB y hace una instancia consulta y hace arreglos o arrays*/
                ->query($sql)
				->fetchAll(PDO::FETCH_ASSOC);
				
	$row = null;/*@var $row es el array que contiene la informacion de las tablas*/	
       echo '<pre>';
       print_r($row);
       echo '</pre>';
} catch (PDOException $ex) {
    echo $exc->getmessage();
}				
	
//$db = new PDO ($dsn,$username,$password);
//$dsn= 'mysql:host=localhost;dbname=test;port=3306';
?>
<!--aqui comienza el formulario
 <meta> especifica su tipo y
content declara su valor, pero ninguno de estos valores es mostrado en
pantalla.-->
<html lang="es">
  <head>
    <meta charset="iso-8859-1">
     <meta name="keywords" content="html5,css3,javascript"><!--son palabras claves que neceisto para trabajar en mi sitio web-->
        <title>consulta 8</title>
         <link rel="stylesheet" href="css/miestilo.css"><!--para llamar la carpeta css y hacer hoja de estilo-->
   
  </head>
  <body>
    <div id="baseglobal">
        <header id="Encabezados"><!--parte del css css-->
           <h1> consulta 8</h1>
        </header> 
	<section id="contenido"><center><!--parte del css-->
        <article><!--inicio de article-->
    <a href="http://localhost/consultas">IR AL MENU PRINCIPAL <a/>
	
  <table border='2' align="center" width="80%">
   <tr>
     <th>cantidad</th><!--nombre que se le otorga en la tabla se aplica a la cantidad que necesites-->
       <th>fase_desercion</th>
	   </tr>
 <!-- el foreach es sobre los arrays-->
<?php foreach($arrData as $row): ?><!--foreach hace que se repita la informacion en la bd-->
  
  <tr>
     <td><?php echo $row['cantidad']?></td><!--@var $row me trae la informacion que esta en la consulta se aplica a todas las columnas de la tabla -->
        <td><?php echo $row['fase_desercion']?></td>
	</tr>    
<?php endforeach ?><!--es el fin del foreach-->
         </article>
	    </section>
     </table>
  </body>
</html>