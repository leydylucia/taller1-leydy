<?php
/*el objetivo es de listar datos de la tabla aprendiz
@VAR la variable $objDB"Es quien hace la instancia con la bd" ,@VAR $sql es el que da el resultado en la
 base de datos bddesercion
*id_apre,nom_apre,apel_apre,tel_apre,cod_ciudad,cod_tipo_id
cod_rh,genero,edad son de  tipo string 
*@AUTOR LEYDY LUCIA CASTILLO
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


$sql= "select id_apre,nom_apre,apel_apre,tel_apre,ciudad.cod_ciudad,tipo_id.cod_tipo_id,rh.cod_rh,genero,edad "
      ."from  aprendiz,rh,tipo_id,ciudad "
	  ."where rh.cod_rh=aprendiz.cod_rh and tipo_id.cod_tipo_id=aprendiz.cod_tipo_id and "
	  ."ciudad.cod_ciudad=aprendiz.cod_ciudad ";
	   
 
    
	   
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
    <title>APRENDIZ </title>
      <link rel="stylesheet" href="css/miestilo.css"><!--para llamar la carpeta css y hacer hoja de estilo-->
 </head>
  <body>
   <div id="baseglobal"><!--parte del css-->
     <header id="Encabezados">
         <th><img src="objetos/APRENDIZ.gif"> </th><!--es el titulo APRENDIZ-->
    </header> 
	<section id="contenido"><center><!--parte del css-->
  <article><!--inicio de article-->

</head>
  <body>
    	<a href="http://localhost/insertar,modificar,eliminar">IR AL MENU PRINCIPAL <a/>
    <table bgcolor=#ccffcc border="3" width="60%" ><!--color verde claro-->
   
   
	 <tr>
       <th>id_apre</th><!--nombre que se le otorga en la tabla se aplica a la cantidad que necesites-->
         <th>nom_apre</th>
          <th>apel_apre</th>
		   <th>tel_apre</th>
		     <th>cod_ciudad</th>
			   <th>cod_tipo_id</th>
			    <th>cod_rh</th>
			     <th>genero</th>
			        <th>edad</th>
   </tr>

<?php foreach($arrData as $row): ?><!--foreach hace que se repita la informacion en la bd-->
   <tr>
    <td><?php echo $row['id_apre']?></td><!--@var $row me trae la informacion que esta en la consulta se aplica a todas las columnas de la tabla -->
	<td><?php echo $row['nom_apre']?></td>
    <td><?php echo $row['apel_apre']?></td>
	<td><?php echo $row['tel_apre']?></td>
	<td><?php echo $row['cod_ciudad']?></td>
	<td><?php echo $row['cod_tipo_id']?></td>
	<td><?php echo $row['cod_rh']?></td>
	<td><?php echo $row['genero']?></td>
	<td><?php echo $row['edad']?></td>
	</tr>
	
	 <?php endforeach ?>
	</table>

  </body>
</html>

