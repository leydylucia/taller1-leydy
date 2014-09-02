<?php
/* el include trae la clase que contiene la coneccion de la
*base de datos bddesercion
@var $objdb hace una instancia con la base de datos
@ var $sql es donde se hace las consultas 
**@AUTOR LEYDY LUCIA CASTILLO ficha 545715 pradera mañana
*@VERSION 1*/
include("dataBaseClass.php");
//visualice nombre tipoid,ciudad,depto,centro de todas las personas que desertaron
try{
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root',''); 
$sql= "select nom_apre,des_tipo_id,nom_ciudad,nom_depto,desc_centro
       FROM desercion,aprendiz,tipo_id,ficha natural join centro natural join ciudad natural join depto
       where desercion.id_apre=aprendiz.id_apre and tipo_id.cod_tipo_id=aprendiz.cod_tipo_id and ficha.num_ficha=desercion.num_ficha" ;

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
<html lang="es">
  <head>
    <meta charset="iso-8859-1">
      <meta name="keywords" content="html5,css3,javascript"><!--son palabras claves que neceisto para trabajar en mi sitio web-->
       <title>consulta 2</title>
        <link rel="stylesheet" href="css/miestilo.css"><!--para llamar la carpeta css y hacer hoja de estilo-->
  </head>
  <body>
     <div id="baseglobal">
        <header id="Encabezados"><!--parte del css -->
           <h1> consulta 2</h1>
        </header> 
	<section id="contenido"><center><!--parte del css-->
  <article><!--inicio de article-->
  <a href="http://localhost/consultas">IR AL MENU PRINCIPAL <a/>
<?php foreach($arrData as $row): ?><!--foreach hace que se repita la informacion en la bd-->
     <table border='2' cellpadding="10" width="80%" >
 
     
 <!-- el foreach es sobre los arrays-->

  </tr>
  <th>nombre</th><!--nombre que se le otorga en la tabla se aplica a la cantidad que necesites-->
    <td><?php echo $row['nom_apre']?></td><!--@var $row me trae la informacion que esta en la consulta se aplica a todas las columnas de la tabla -->
	 </tr>
	    <tr>
	    <th>descripcion_id</th>
           <td><?php echo $row['des_tipo_id']?></td>
        </tr>
	        <tr>
	           <th>ciudad</th>
                  <td><?php echo $row['nom_ciudad']?></td>
	               </tr>
	            <tr>
	              <th>departamento</th>
                   <td><?php echo $row['nom_depto']?></td>
	              </tr>
	       <tr>
	        <th>centro</th>
            <td><?php echo $row['desc_centro']?></td>
           </tr>
           
		   <br>
         </article>
       </section>
     </table>
	 <?php endforeach ?><!--es el fin del foreach-->
  </body>
</html>






