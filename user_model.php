<?php include 'db_conn.php'; ?>

<?php

//Llamo a la función correcta
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'create') {
        create();
    } else if ($_POST['action'] == 'edit') {
        edit();
    } else if ($_POST['action'] == 'delete') {
    	delete();
	}
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'create') {
        create();
    } else if ($_GET['action'] == 'edit') {
        edit_conf();
    } else if ($_GET['action'] == 'delete') {
    	delete_conf();
	}
}

function create() {

//Paso las variables globales del $_POST a variables locales
	$name=$_POST['name'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$gender=$_POST['gender'];
	$mail=$_POST['mail'];
	$birth=$_POST['birth'];
	$spam=$_POST['spam'];
	$img=$_POST['img'];
	$UserType=$_POST['UserType'];
	$card=$_POST['card'];
	$cvv=$_POST['cvv'];
	$plan=$_POST['plan'];
	$comment=$_POST['comment'];

//Llamo a la conexión de la BD
$conn = OpenCon();
//Inserto la nueva linea en la BD

	mysqli_query($conn, "INSERT INTO usuario(apellidoynombre,usuario,password,genero,correo,fechanacimiento,codcategoria,numtarjeta,codtarjeta,codplan,comentarios)
				VALUES('$name','$user','$pass','$gender','$mail','$birth','$UserType','$card','$cvv','$plan','$comment')");

		if(mysqli_affected_rows($conn) > 0){
			echo "<p>Usuario Agregado</p>";
			echo '<button type="button" onclick="history.back()">Volver</button>';
		} else {
			echo "Usuario NO Agregado<br />";
			echo mysqli_error ($conn);
			echo '<button type="button" style="background-color=red" onclick="history.back()">Volver</button>';
	}
	
}

function delete_conf(){

	$id=$_GET['id'];
	//Llamo a la conexión de la BD
	$conn = OpenCon();
	$sql = mysqli_query($conn, "SELECT u.*, c.* FROM usuario u inner join categoria c on u.codcategoria = c.id WHERE u.id ='$id'");

	 while ($row = mysqli_fetch_row($sql))
 	{
   		print_r($row) ;
 	}
 	//echo "<br/>";
 	//echo "<button onclick='delete()''>Delete</button>";
 	echo "<form method='post'>";
    echo "<input type='submit' name='action' value='delete'/>";
    echo "<input type='hidden' name='id' value='$id'/>";
    echo "</form>";
}

function delete(){

	$id=$_POST['id'];
	
	//Llamo a la conexión de la BD
	$conn = OpenCon();
	$sql = mysqli_query($conn, "DELETE FROM usuario WHERE id='$id'");

	header('Location:index.php');
	exit;

}

function edit_conf(){

	$id=$_GET['id'];

	//Llamo a la conexión de la BD
	$conn = OpenCon();
	$sql = mysqli_query($conn, "SELECT u.*, c.* FROM usuario u inner join categoria c on u.codcategoria = c.id WHERE u.id ='$id'");
	$row = mysqli_fetch_row($sql);
	print_r($row);
//Cargo valores de la selección

	$name=$row[1];
	$user=$row[2];
	$pass=$row[3];
	$gender=$row[4];
	$mail=$row[5];
	$birth=$row[6];
	//$spam=$row['spam'];
	//$img=$row['img'];
	$UserType=$row[7];
	$card=$row[8];
	$cvv=$row[9];
	$plan=$row[10];
	$comment=$row[11];

	echo $row[1];


echo 
	'<link rel="stylesheet" type="text/css" href="estiloDefault.css">
	<form action="user_model.php" method="post" id="nuevo">

	<div id="container">
    	<div id="first">
    			<input type="hidden" name="action" value="edit" /> 
    			<input type="hidden" name="id" value=';echo $id; echo  ' /> 
    		Nombre y apellido:</br>
    			<input type="text" 		name="name" value="';echo $name; echo  '" ></br>
			Usuario:</br>
    			<input type="text" 		name="user" value="'; echo $user; echo '"></br>
    		Password:</br>
    			<input type="password" 	name="pass" ></br>
    		Genero:</br>
    		  	<input type="radio" 	name="gender" value="M" checked> Masculino
  				<input type="radio" 	name="gender" value="F"> Femenino</br>
			Correo:</br>
			 	<input type="text" 		name="mail" value="' ;echo $mail; echo  '"></br>
			Fecha de Nacimiento:</br>
				<input type="date" 		name="birth" value=';echo $birth; echo  '></br>
			Notificaciones</br>
				<input type="checkbox" 	name="spam" value="Ofertas"		checked="checked"> Ofertas				</br>
  				<input type="checkbox" 	name="spam" value="Nuevas"		checked="checked"> Nuevas Publicaciones	</br> 	
  				<input type="checkbox" 	name="spam" value="Denuncias" 	checked="checked"> Denuncias			</br>
  				<input type="checkbox" 	name="spam" value="Comentarios" checked="checked"> Comentarios			</br>
  		</div>
    	<div id="second">
    		Adjuntar Foto:</br>
    			<input type="file" name="img" size="40"></br>

    		Categoría de Usuario:</br>
    			<select name="UserType" form="nuevo" class="input">
  						<option value="1">	Usuario Abonado</option>
  						<option value="2">		Usuario Free</option>
				</select></br>
			<div id="third">
				&nbsp;&nbsp;N° de Tarjeta:
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 Codigo:</br>
				<input type="number" value=';echo $card; echo  '		name="card"> <input type="text" 		name="cvv" value=';echo $cvv; echo  '></br>

    		  	<input type="radio" 	name="plan" value="1" checked> 	Plan 1
  				<input type="radio" 	name="plan" value="2"> 			Plan 2
  				<input type="radio" 	name="plan" value="3"> 			Plan 3				</br>
  				<input type="radio" 	name="plan" value="4"> 			Plan 4
  				<input type="radio" 	name="plan" value="5"> 			Plan 5
  				<input type="radio" 	name="plan" value="6"> 			Plan 6

			</div>			

			Comentarios:</br>
			<textarea name="comment" form="nuevo" rows="8" placeholder="Comentarios..." value="';echo $comment; echo  '"></textarea>


    	</div>
	</div>
	<center><input type="submit" value="Enviar" > <input type="reset" value="Limpiar" ></center>';
}

function edit(){

	//Paso las variables globales del $_POST a variables locales
	$id=$_POST['id'];
	$name=$_POST['name'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$gender=$_POST['gender'];
	$mail=$_POST['mail'];
	$birth=$_POST['birth'];
	$spam=$_POST['spam'];
	$img=$_POST['img'];
	$UserType=$_POST['UserType'];
	$card=$_POST['card'];
	$cvv=$_POST['cvv'];
	$plan=$_POST['plan'];
	$comment=$_POST['comment'];


	//Llamo a la conexión de la BD
	$conn = OpenCon();
	$sql = mysqli_query($conn, "UPDATE usuario SET apellidoynombre='$name', usuario='$user', password='$pass', genero='$gender', correo='$mail', fechanacimiento='birth', codcategoria='$UserType', numtarjeta='$card', codtarjeta='$cvv', codplan='$plan', comentarios='$comment' WHERE id='$id'");

	header('Location:index.php');
	exit;
}
?>
