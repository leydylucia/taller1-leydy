<?php
/* el include trae la clase que contiene la coneccion de la
*base de datos bddesercion
@var $objdb hace una instancia con la base de datos
@ var $sql es donde se hace las consultas 
**@AUTOR LEYDY LUCIA CASTILLO ficha 545715 pradera mañana
*@VERSION 1*/
include("dataBaseClass.php");
//visualice nombre,tipo_id,centro,programa,causa de las mujeres que desertaron por motivo voluntario
try{
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root',''); 
$sql= "select nom_apre,des_causa,genero,desc_centro,des_tipo_id 
       FROM desercion natural join causa_desercion,aprendiz natural join tipo_id,centro natural join  ficha 
	   where aprendiz.id_apre=desercion.id_apre and desercion.num_ficha=ficha.num_ficha and genero='f' and cod_causa=1";

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
        <title>consulta 6</title>
         <link rel="stylesheet" href="css/miestilo.css"><!--para llamar la carpeta css y hacer hoja de estilo-->
   
  </head>
  <body>
    <div id="baseglobal">
        <header id="Encabezados"><!--parte del css css-->
           <h1> consulta 6</h1>
        </header> 
	<section id="contenido"><center><!--parte del css-->
  <article><!--inicio de article-->
  <a href="http://localhost/consultas">IR AL MENU PRINCIPAL <a/>
    <?php foreach($arrData as $row): ?><!--foreach hace que se repita la informacion en la bd-->
     <table border='2' align="center"width="80%">

 <!-- el foreach es sobre los arrays-->

 
<tr>
  <th>nombre_aprendiz</th><!--nombre que se le otorga en la tabla se aplica a la cantidad que necesites-->
    <td><?php echo $row['nom_apre']?></td><!--@var $row me trae la informacion que esta en la consulta se aplica a todas las columnas de la tabla -->
</tr>
  <tr>
    <th>des_causa</th>
	  <td><?php echo $row['des_causa']?></td>
  </tr>
	  <tr>
	     <th>genero</th>
          <td><?php echo $row['genero']?></td>
	  </tr>
	 
	    <tr>
	       <th>centro</th>
	          <td><?php echo $row['desc_centro']?></td>
        </tr>
	      <tr>
	        <th>descripcion_tipo_id</th>
		      <td><?php echo $row['des_tipo_id']?></td>
           </tr>
          <br>
         </article>
	    </section>
     </table>
	 <?php endforeach ?><!--es el fin del foreach-->
  </body>
</html>