<?php
/* el include trae la clase que contiene la coneccion de la
*base de datos bddesercion
@var $objdb hace una instancia con la base de datos
@ var $sql es donde se hace las consultas 
**@AUTOR LEYDY LUCIA CASTILLO ficha 545715 pradera mañana
*@VERSION 1*/
include("dataBaseClass.php");
//visualice nombre,rh,ciudad,programa,causa de los hombres que desertaron por problemas familiares
try{
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root',''); 
$sql= "select nom_apre,des_causa,genero,nom_ciudad,des_prog,des_rh 
FROM desercion natural join causa_desercion,aprendiz natural join ciudad,programa natural join  ficha,rh
where aprendiz.id_apre=desercion.id_apre and desercion.num_ficha=ficha.num_ficha and aprendiz.cod_rh=rh.cod_rh 
and genero='m' and cod_causa=3";
	

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
       <title>consulta 5</title>
         <link rel="stylesheet" href="css/miestilo.css"><!--para llamar la carpeta css y hacer hoja de estilo-->
   
  </head>
  <body>
    <div id="baseglobal">
        <header id="Encabezados"><!--parte del css css-->
           <h1> consulta 5</h1>
        </header> 
	<section id="contenido"><center><!--parte del css-->
  <article><!--inicio de article-->
  <a href="http://localhost/consultas">IR AL MENU PRINCIPAL <a/>
  
 <table border='2' align="center" width="80%">
  
  
 <!-- el foreach es sobre los arrays-->
<?php foreach($arrData as $row): ?><!--foreach hace que se repita la informacion en la bd-->
 
  <tr>
    <th>nombre_aprendiz</th><!--nombre que se le otorga en la tabla se aplica a la cantidad que necesites-->
      <td><?php echo $row['nom_apre']?></td>
  </tr>
     <tr>
        <th>descripcion_causa</th>
	      <td><?php echo $row['des_causa']?></td><!--@var $row me trae la informacion que esta en la consulta se aplica a todas las columnas de la tabla -->
	  </tr>
	     <tr>
	       <th>genero</th>
             <td><?php echo $row['genero']?></td>
	       </tr>
	        <tr>
	            <th>ciudad</th>
	             <td><?php echo $row['nom_ciudad']?></td>
	        </tr>
	           <tr>
	             <th>programa</th>
	              <td><?php echo $row['des_prog']?></td>
              </tr>
	           <tr>
	              <th>rh</th>
		           <td><?php echo $row['des_rh']?></td>
                </tr>
<?php endforeach ?> <!--es el fin del foreach-->
        </article>
	  </section>
     </table>
  </body>
</html>