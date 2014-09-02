<?php
/*el objetivo es de listar datos de la tabla ficha
@VAR la variable $objDB"Es quien hace la instancia con la bd" ,@VAR $sql es el que da el resultado en la
 base de datos bddesercion
*num_ficha,cod_prog,fecha_ini,fecha_fin,cod_centro
 son de  tipo string 
**@AUTOR LEYDY LUCIA CASTILLO ficha 545715 pradera mañana
*@VERSION 1*/
include("DataBaseClass.php");

$objDB=NULL;
try{
$num_ficha= '545715';
$cod_prog = '6';
$fecha_ini='20/08/2013';
$fecha_fin='22/07/2014';
$cod_centro = '6';

$sql= "select num_ficha,programa.cod_prog,fecha_ini,fecha_fin,centro.cod_centro "
	   ."from ficha,programa,centro "
	   ."where programa.cod_prog=ficha.cod_prog and centro.cod_centro=ficha.cod_centro ";
	   
  
	   
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root',''); 

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

?>
<!--aqui comienza el formulario
 <meta> especifica su tipo y
content declara su valor, pero ninguno de estos valores es mostrado en
pantalla.-->
<html lang="es" >
<head>
<meta charset="iso-8859-1">
  <meta name="keywords" content="html5,css3,javascript"><!--son palabras claves que neceisto para trabajar en mi sitio web-->
    <title>FICHA </title>
      <link rel="stylesheet" href="css/miestilo.css"><!--para llamar la carpeta css y hacer hoja de estilo-->
 </head>
  <body>

   <div id="baseglobal"><!--parte del css-->
     <header id="Encabezados">
         <th><img src="objetos/FICHA.gif"> </th><!--es el titulo tablas FICHA-->
    </header> 
	<section id="contenido"><center><!--parte del css-->
  <article><!--inicio de article-->

</head>
  <body>
      	<a href="http://localhost/insertar,modificar,eliminar">IR AL MENU PRINCIPAL <a/>
    <table bgcolor=#ccffcc border="3" width="80%" ><!--color verde claro-->
   
	 <tr>
       <th>num_ficha</th><!--nombre que se le otorga en la tabla se aplica a la cantidad que necesites-->
         <th>cod_prog</th>
          <th>fecha_ini</th>
		   <th>fecha_fin</th>
		    <th>cod_centro</th>
   </tr>

<?php foreach($arrData as $row): ?><!--foreach hace que se repita la informacion en la bd-->
   <tr>
    <td><?php echo $row['num_ficha']?></td><!--@var $row me trae la informacion que esta en la consulta se aplica a todas las columnas de la tabla -->
	<td><?php echo $row['cod_prog']?></td>
    <td><?php echo $row['fecha_ini']?></td>
	<td><?php echo $row['fecha_fin']?></td>
	<td><?php echo $row['cod_centro']?></td>
	
	</tr>
	
<?php endforeach ?>
     </table>
  </body>
</html>

