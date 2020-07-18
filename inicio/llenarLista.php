<?php 
// Conexion a la base de datos
include'../conexion/conexion.php';

// Codificacion de lenguaje
mysql_query("SET NAMES utf8");

// Consulta a la base de datos
$consulta=mysql_query("SELECT registros.id_registro,  
								CONCAT(personas.nombre,' ',personas.ap_paterno,' ',personas.ap_materno)AS nombre, 
								registros.matricula, 
								registros.fecha_ingreso, 
								registros.hora_ingreso , registros.fecha_salida, registros.hora_salida
								FROM registros 
								INNER JOIN alumnos on alumnos.id_alumno=registros.id_alumno 
								INNER JOIN personas on alumnos.id_persona=personas.id_persona ORDER BY id_registro DESC",$conexion) or die (mysql_error());
// $row=mysql_fetch_row($consulta)
 ?>
				            <div class="table-responsive">
				                <table id="example1" class="table table-responsive table-condensed table-bordered table-striped">

				                    <thead align="center">
				                      <tr class="info" >
				                        <th>#</th>
				                        <th>ID_REGISTRO</th>
				                        <th>NOMBRE</th>
				                        <th>MATRICULA</th>
				                        <th>FECHA INGRESO</th>
				                        <th>HORA INGRESO</th>
				                        <th>FECHA SALIDA</th>
				                        <th>HORA SALIDA</th>
				                      </tr>
				                    </thead>

				                    <tbody align="center">
				                    <?php 
				                    $n=1;
				                    while ($row=mysql_fetch_row($consulta)) {
										$id_registro   = $row[0];
										$nombre         = $row[1];
										$matricula      = $row[2];
										$fecha_ingreso  = $row[3];
										$hora_ingreso   = $row[4];
										$fecha_salida   = $row[5];
										$hora_salida    = $row[6];
										?>
				                      <tr>
				                        <td >
				                          <p id="<?php echo "tConsecutivo".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo "$n"; ?>
				                          </p>
				                        </td>
				                        <td>
											<p id="<?php echo "tid_registro".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $id_registro; ?>
				                          </p>
				                        </td>
				                        <td>
											<p id="<?php echo "tnombre".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $nombre; ?>
				                          </p>
				                        </td>
				                        <td>
											<p id="<?php echo "tmatricula".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $matricula; ?>
				                          </p>
				                        </td>
				                        <td>
											<p id="<?php echo "tfecha_ingreso".$n; ?>"  class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $fecha_ingreso; ?>
				                          </p>
				                        </td>
				                        <td>
											<p id="<?php echo "thora_ingreso".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $hora_ingreso; ?>
				                          </p>	
																</td>
				                        <td>
				                          	<p id="<?php echo "tfecha_salida".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $fecha_salida; ?>
				                          </p>	
																</td>
				                        </td>
				                        <td>
											<p id="<?php echo "thora_salida".$n; ?>" class="<?php echo $claseDesabilita; ?>">
				                          	<?php echo $hora_salida; ?>
				                          </p>	
																</td>
				                        </td>
				                      </tr>
				                      <?php
				                      $n++;
				                    }
				                     ?>

				                    </tbody>

				                    <tfoot align="center">
				                      <tr class="info">
				                        <th>#</th>
				                        <th>ID_REGISTRO</th>
				                        <th>NOMBRE</th>
				                        <th>MATRICULA</th>
				                        <th>FECHA INGRESO</th>
				                        <th>HORA INGRESO</th>
				                        <th>FECHA SALIDA</th>
				                        <th>HORA SALIDA</th>
				                      </tr>
				                    </tfoot>
				                </table>
				            </div>
			
      <script type="text/javascript">
        $(document).ready(function() {
              $('#example1').DataTable( {
                 "language": {
                         // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                          "url": "../plugins/datatables/langauge/Spanish.json"
                      },
                 "order": [[ 0, "asc" ]],
                 "paging":   true,
                 "ordering": true,
                 "info":     true,
                 "responsive": true,
                 "searching": true,
                 stateSave: false,
                  dom: 'Bfrtip',
                  lengthMenu: [
                      [ 10, 25, 50, -1 ],
                      [ '10 Registros', '25 Registros', '50 Registros', 'Todos' ],
                  ],
                 columnDefs: [ {
                      // targets: 0,
                      // visible: false
                  }],
                  buttons: 
                  [
                ]
              } );
          } );

      </script>
      <script>
            $(".interruptor").bootstrapToggle('destroy');
            $(".interruptor").bootstrapToggle();
      </script>
    
    
