<?php include 'db_conn.php';?> <!-- se incluye la conexión -->

<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="estiloDefault.css">
</head>

<body>

	<h1><?php echo "Listado de usuarios"; ?></h1>

	<form action="new_user_view.php" method="POST">
		<input type="submit" value="Nuevo Usuario" class="search">
	</form>

	<hr/>

	<table border="1" #73AD21>

		<thead bgcolor="#73AD21">

			<tr>

				<th><small>Apellido y Nombre</small></th>

				<th><small>Correo</small></th>

				<th><small>Abonado (Si/No)</small></th>

				<th><small>Plan</small></th>

				<th><small>Opción</small></th>

			</tr>

		</thead>

		<tbody>
			<?php
				//$con = mysqli_connect("localhost","root","14785","lenguajes");
				$conn = OpenCon();
				// Check connection
				if (mysqli_connect_errno())
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
			?>

			<!-- Selecciono los valores de la tabla -->
			<?php
			//$result = mysqli_query($con, "SELECT apellidoynombre, correo, codplan, codcategoria, categoria.detalle FROM usuario");		
				$result = mysqli_query($conn, "SELECT u.*, c.* FROM usuario u inner join categoria c on u.codcategoria = c.id");
			?> 

			<?php 
				while($row = mysqli_fetch_array($result)) 
			
				{
				echo "<tr>";

					echo "<td>" . $row['apellidoynombre'] . "</td>";
					echo "<td>" . $row['correo'] . "</td>";
					//echo "<td>" . $row['codplan'] . "</td>"; //Acá va el IF del radiobutton

						if ($row['codcategoria'] == 1 ) {
						    echo "<td align = 'center'>" . "<Input type = 'Radio' checked disabled >" . "</td>";
						    //
						} else {
						    echo "<td align = 'center'>" . "<Input type = 'Radio' disabled >" . "</td>";
						}
					
					switch ($row['codplan']) {
						    case "0":
						        $plan = "Sin Plan";
						        break;
						    case "1":
						        $plan = "Plan 1";
						        break;
						    case "2":
						        $plan = "Plan 2";
						        break;
						    case "3":
					        	$plan = "Plan 3";
					        	break;
					        case "4":
					        	$plan = "Plan 4";
					        	break;
					        case "5":
					       	 	$plan = "Plan 5";
					        	break;
					        case "6":
					        	$plan = "Plan 6";
					        	break;

						}
					echo "<td>" . $plan . "</td>";
					
					/* echo "<td>" . "Editar - Eliminar" . "</td>";*/
					$actione='edit';
					$actiond='delete';
					$id=$row['0'];

					echo "<td>" . "<a href='user_model.php?id=$id&action=$actione' action='user_model.php'>Editar</a> <a href='user_model.php?id=$id&action=$actiond'>Eliminar</a>". "</td>";
					
				echo "</tr>";
				}
			?>

		</tbody>
	</table> 
</body></html>
















</body>
</html>