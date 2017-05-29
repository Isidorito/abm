

<head>
<link rel="stylesheet" type="text/css" href="estiloDefault.css">
<?php include 'user_model.php'; ?>

</head>

<body>
<form action="user_model.php" method="post" id="nuevo">

	<!--<div id="header"></div>-->
	<div id="container">
    	<div id="first">
    			<input type="hidden" name="action" value="create" /> <!-- Paso oculta la acción para remitir a la función correcta-->
    		Nombre y apellido:</br>
    			<input type="text" 		   name="name"   required id='name'  onchange="namevalidate()"></br>
			  Usuario:</br>
    			<input type="text" 		   name="user"   required></br>
    	  Password:</br>
    			<input type="password" 	 name="pass"   required id='pass'  onchange="passvalidate()"></br>
    	  Genero:</br>
    		  <input type="radio" 	   name="gender" value="M" checked > Masculino
  				<input type="radio" 	   name="gender" value="F"         > Femenino  </br>
			  Correo:</br>
			 	  <input type="text" 		   name="mail"   required id='mail'  onchange="mailvalidate()"></br>
			  Fecha de Nacimiento:</br>
				  <input type="date" 		   name="birth"></br>
			  Notificaciones</br>
				  <input type="checkbox" 	 name="spam" value="Ofertas"		 checked="checked"> Ofertas				          </br>
  				<input type="checkbox" 	 name="spam" value="Nuevas"		   checked="checked"> Nuevas Publicaciones	  </br> 	
  				<input type="checkbox" 	 name="spam" value="Denuncias" 	 checked="checked"> Denuncias			          </br>
  				<input type="checkbox" 	 name="spam" value="Comentarios" checked="checked"> Comentarios			        </br>
  		</div>
    	<div id="second">
    		Adjuntar Foto:</br>
    			<input type="file" name="img" size="40"></br>

    		Categoría de Usuario:</br>
    			<select name="UserType" form="nuevo" class="input" onchange="java_script_:show(this.options[this.selectedIndex].value)">
  						<option value="1">	Usuario Abonado</option>
  						<option value="2" selected="selected ">		Usuario Free</option>
				</select></br>
			<div id="third" style="display:none">
				&nbsp;&nbsp;
          N° de Tarjeta:
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  Codigo:</br>
				  <input type="number" 		 name="card"   required  id='card'  onchange="cardvalidate()"> 
          <input type="text" 		   name="cvv"    required  id='cvv'   onchange="cvvvalidate()">  </br>

    		  <input type="radio" 	name="plan" value="1" checked> 	 Plan 1
  				<input type="radio" 	name="plan" value="2"> 			     Plan 2
  				<input type="radio" 	name="plan" value="3"> 			     Plan 3				     </br>
  				<input type="radio" 	name="plan" value="4"> 			     Plan 4
  				<input type="radio" 	name="plan" value="5"> 			     Plan 5
  				<input type="radio" 	name="plan" value="6"> 			     Plan 6

			</div>			

			Comentarios:</br>
			<textarea name="comment" form="nuevo" rows="8" placeholder="Comentarios..."></textarea>


    	</div>
	</div>
	<center><input type="submit" value="Enviar" > <input type="reset" value="Limpiar" ></center>

</form>	
<script src="validaciones.js"></script>
</body>