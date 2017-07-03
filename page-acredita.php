<?php include('header.php');?>

<section id="page">

<div class="container">
<div class="row">
  <div class="col-lg-12 text-center">
    <h2 class="page-heading">Acreditaciones</h2>

  </div>
  <div class="col-lg-10 col-lg-offset-1">

    <?php
    $csv = array_map('str_getcsv', file('datos/acreditacion.csv'));
    array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
    array_shift($csv);
    ?>


    <table id="tablesorter" class="tablesorter" border="0" cellpadding="0" cellspacing="1">
    		<thead>
    			<tr>
    				<th>Carrera</th>
    				<th>Institución</th>
    				<th>Acreditada desde</th>
            <th>Acreditada hasta</th>
    				<th>Documento Acreditador</th>

    			</tr>
    		</thead>
    		<tbody>

    			<?php for($a = 0; $a < $total = count($csv); $a++){?>

    			<tr>
    				<td><?php echo($csv[$a]["carrera"])?></td>
    				<td><?php echo($csv[$a]["institucion"])?></td>
    				<td><?php echo($csv[$a]["acreditada_desde"])?></td>
            <td><?php echo($csv[$a]["acreditada_hasta"])?></td>
    					<td><a href="<?php echo($csv[$a]["Enlace"])?>" target="_blank"><?php echo($csv[$a]["Documento_Acreditador"])?></a></td>

    			</tr>

    			<?php };?>

    		</tbody>
    	</table>
<br>
      <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src="jquery.tabletoCSV.js">
      $("#export").click(function() {
          $("table").tableToCSV();
        });
        </script>

        <p2> Si quieres utilizar estos datós para generar tus propias visualizaciones, pulsa el boton Exportar</p2>
        <br>
        <br>

<form method="get" action="datos/acreditacion.csv">
      <button  type="submit"  class="btn btn-warning" >Exportar</button>
</form>
      <br>
      <br>
<p> Los datos recopilados para poder realizar esta tabla fueron extraidos desde las siguientes entidades acreditadoras: </p>
<p> <a rel="license" target="_blank" href="https://www.cnachile.cl/Paginas/Inicio.aspx">Comisión Nacional de Acreditación (CNA)</a>, <a rel="license" target="_blank" href="http://www.aadsa.cl/convenios/"> AADSA</a>, <a rel="license" target="_blank" href="http://www.acreditaccion.cl/"> Acreditacción</a> </p>

  </div>
</div>
</div>


</section>




<?php include('footer.php');?>
