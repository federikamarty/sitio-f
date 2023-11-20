<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
       <!-- Íconos -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styles.css">
<title>Login de Usuarios</title>
</head>

<body>
<header>
<div class="topnav" id="myTopnav">
        <a href="./index.html" class="active">M</a>
        <a href="./historia.html">Historia</a>
        <a href="./artistas.html">Artistas emergentes</a>
        <a href="./forms.html">Forms</a>
        <a href="./noticias.html">Noticias</a>
        <a href="./museos.html">Museos</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
          <a href="./form_login.html">Iniciar Sesion</a>
          <a href="./panel.php"><i class="fa-regular fa-user"></i></a>
      </div>
    </header>



<?php
$usuario=$_POST['usuario'];
$password=md5($_POST['password']);

include("conexion.php");

$consulta=mysqli_query($conexion, "SELECT nombre FROM usuarios WHERE usuario='$usuario' AND clave='$password'");

$resultado=mysqli_num_rows($consulta);

if($resultado!=0){
	$respuesta=mysqli_fetch_array($consulta);
	
	$_SESSION['nombre']=$respuesta['nombre'];
	
	echo "<h2>Hola ".$_SESSION['nombre']."<h2>";
	echo "<p class='acceso-panel'>Acceso al panel de usuarios.</p><br/>";
	echo "<a href='panel.php'>Panel</a>";	
	?>




	<?php


		
	}else{
		echo "<div class='usuario-incorrecto'>
		<h2>No sos un usuario registrado!!</h2>
		<a href='./form_registro.html'>Regitrate</a>
		<a href='./form_login.html'>Ya sos usuario? Ingresá acá</a>
	</div>";	
}
?>



</body>
</html>