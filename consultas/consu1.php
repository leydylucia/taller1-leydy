<?php
/* el include trae la clase que contiene la coneccion de la
*base de datos bddesercion
@var $objdb hace una instancia con la base de datos
@ var $sql es donde se hace las consultas 
**@AUTOR LEYDY LUCIA CASTILLO ficha 545715 pradera mañana
*@VERSION 1*/
include("dataBaseClass.php");
try {
    $objDB = new dataBaseClass('localhost', 'bddesercion', 'root', '');
$sql = "SELECT count(id_apre) as Aprendiz, fase_desercion FROM desercion group by fase_desercion";


$arrData = $objDB->getInstance()/*@var $arrdata es un array quien conecta con $objDB y hace una instancia consulta y hace arreglos o arrays*/
        ->query($sql)
        ->fetchAll(PDO::FETCH_ASSOC);/* es quien le da el orden a los arryas*/
//$db = new PDO($dsn, $username, $passwd);
//$sql = 'SELECT * FROM usuario';
//$src = $db->query($sql);
//$arrData = $src->fetchAll(PDO::FETCH_ASSOC);
$row = null;/*@var $row es el array que contiene la informacion de las tablas*/
echo '<pre>';
print_r($row);
echo '</pre>';

    
} catch (PDOException $ex) {
    echo $exc->getmessage();
}


?>
<!--aqui comienza el formulario
 <meta> especifica su tipo y
content declara su valor, pero ninguno de estos valores es mostrado en
pantalla.-->
<html lang="es">
  <head>
    <meta charset="iso-8859-1">
     <meta name="keywords" content="html5,css3,javascript"><!--son palabras claves que neceisto para trabajar en mi sitio web-->
       <title>consulta 1</title>
        <link rel="stylesheet" href="css/miestilo.css"><!--para llamar la carpeta css y hacer hoja de estilo-->
  </head>
  <body>
   <div id="baseglobal">
     <header id="Encabezados">
         <h1> consulta 1</h1>
    </header> 
	<section id="contenido"><center>
  <article><!--inicio de article-->
<a href="http://localhost/consultas">IR AL MENU PRINCIPAL <a/>
<table border='2' align="center" cellpadding="10"width="80%">
    <tr> 
       <th>identidad-aprendiz</th><!--nombre que se le otorga en la tabla se aplica a la cantidad que necesites-->
         <th>fase_desercion</th>
   </tr>

 <?php foreach($arrData as $row): ?><!--foreach hace que se repita la informacion en la bd-->
  
  <tr>
     <td><?php echo $row['Aprendiz']?></td><!--@var $row me trae la informacion que esta en la consulta se aplica a todas las columnas de la tabla -->
       <td><?php echo $row['fase_desercion']?></td>
  </tr>
 <?php endforeach ?><!--es el fin del foreach-->
          </article>
      </section>
     </table>
   </body>
</html>

