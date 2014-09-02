<?php
/*el objetivo es de listar datos de la tabla ciudad
@VAR la variable $objDB"Es quien hace la instancia con la bd" ,@VAR $sql es el que da el resultado en la
 base de datos bddesercion
*cod_ciudad,nom_ciudad,cod_depto,habitantes son de  tipo string 
**@AUTOR LEYDY LUCIA CASTILLO ficha 545715 pradera mañana
*@VERSION 1*/
include("DataBaseClass.php");

$objDB=NULL;
try{
$cod_ciudad = '1180';
$nom_ciudad = 'turanga';
$cod_depto='33';
$habitantes='5000';
$sql="select cod_ciudad,nom_ciudad,cod_depto,habitantes from ciudad,depto where depto.cod_depto=ciudad.cod_depto";
	   
  $cod_ciudad = '1200';
$nom_ciudad = 'huiyuyui';
$cod_depto='33';
$habitantes='5870';
$sql= "select cod_ciudad,nom_ciudad,cod_depto,habitantes from  ciudad"; 
	   
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
    <title>CIUDAD </title>
      <link rel="stylesheet" href="css/miestilo.css"><!--para llamar la carpeta css y hacer hoja de estilo-->
 </head>
  <body>
  	
   <div id="baseglobal"><!--parte del css-->
     <header id="Encabezados">
         <th><img src="objetos/CIUDAD.gif"> </th><!--es el titulo tablas CIUDAD-->
    </header> 
	<section id="contenido"><center><!--parte del css-->
  <article><!--inicio de article-->

</head>
  <body>
    <a href="http://localhost/insertar,modificar,eliminar">IR AL MENU PRINCIPAL <a/>
    <table bgcolor=#ccffcc border="3" width="80%" ><!--color verde claro-->
   
	 <tr>
       <th>cod_ciudad</th><!--nombre que se le otorga en la tabla se aplica a la cantidad que necesites-->
         <th>nom_ciudad</th>
          <th>cod_depto</th>
		   <th>habitantes</th>
		    
   </tr>

<?php foreach($arrData as $row): ?><!--foreach hace que se repita la informacion en la bd-->
   <tr>
    <td><?php echo $row['cod_ciudad']?></td><!--@var $row me trae la informacion que esta en la consulta se aplica a todas las columnas de la tabla -->
	<td><?php echo $row['nom_ciudad']?></td>
    <td><?php echo $row['cod_depto']?></td>
	<td><?php echo $row['habitantes']?></td>
	
	
	</tr>
	
<?php endforeach ?>
     </table>
  </body>
</html>

