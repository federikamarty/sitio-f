<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>MySQL</title>
</head>

<body style>
<header>
        <div class="topnav" id="myTopnav">
            <a href="./index.html" class="active">M</a>
            <a href="./historia.html">Historia</a>
            <a href="./artistas.html">Artistas Emergentes</a>
            <a href="./forms.html">Forms</a>
            <a href="./noticias.html">Noticias</a>
            <a href="./museos.html">Museos</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
              <i class="fa fa-bars"></i>
            </a>
          </div>
    </header>
<section>
	<p>

		<?php
	include('conexion.php');
	
	$buscar = $_POST['buscar'];
	echo "Su busqueda: <em>".$buscar."</em><br>";
	
	$consulta = mysqli_query($conexion, "SELECT * FROM museos WHERE nombre LIKE '%$buscar%'");
	?>
	</p>
<article style="width:60%;margin:0 auto;">
	<p>Cantidad de Resultados: 
	<?php
		$nros=mysqli_num_rows($consulta);
		echo $nros;
	?>
	</p>
    
	<?php
		while($resultados=mysqli_fetch_array($consulta)) {
	?>
    <p>
    <?php	
			echo $resultados['nombre'];
			echo "<br>";
			echo $resultados['foto'];
			echo "<br>";
			echo $resultados['descripcion'];
			echo "<br>";
			echo $resultados['ubicacion'];
	?>
    </p>
    <hr/>
    <?php
		}

		mysqli_free_result($consulta);
		mysqli_close($conexion);

	?>
</article>
</section>
</body>
</html>


<footer>
  <div class="contenedorFooter">
    <div>
      <p>info@minimalistc.com.ar</p> 
    </div>
  </div>
</footer>



    
    <script>
    
        function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }
        }
        </script>
</body>
</html>
