<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Check Login and create session</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  
  <body>  
  <div class="container">
  
<?php

	// Connection info. file
	include 'conn.php';	
	
	// Connection variables
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	
	$email = $_POST['email']; 
	$password = $_POST['password'];
	
	
	$result = mysqli_query($conn, "SELECT * FROM users WHERE Email = '$email'");
	
	
	$row = mysqli_fetch_assoc($result);
	
	
	$hash = $row['Password'];
	
	
	if (password_verify($_POST['password'], $hash)) {	
		
		$_SESSION['loggedin'] = true;
		$_SESSION['Id'] = $row['Id'];
$_SESSION['name'] = $row['Name'];
	
$_SESSION['apellido'] = $row['apellido'];
$_SESSION['dni'] = $row['dni'];
$_SESSION['Email'] = $row['Email'];
$_SESSION['Password'] = $row['Password'];	$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (20 * 60) ;						
		
		echo "<div class='alert alert-success' role='alert'><strong>BIENVENIDO</strong> $row[Name] $row[apellido]<P>	 </P>
	<P><div align='center'> 
    
        <tr> 
            <td colspan='2'><h3 align='center'>Actualice los datos que considere</h3></td> 
        </tr> 
        <tr> 
            <td colspan='2'><h3 align='center'>MENU DE OPCIONES</h3></td> 
        </tr>  
    
  </div>	 </P>	<p><div align='center'><a href='edit-profile.php'>Editar Usuario</a></p>   <p><a href='edit-profile2.php'>crear caja</a></p> 
<p>
<a href='consultarsaldo.php'>consultar saldo</a></P></td>
<p><a href='Extraerdinero.php'>Extraer Dinero</a></p>
<p><a href='depositar.php'>Depositar Dinero</a></p>	
<p><a href='index.html'>Salir</a></p></div></div>";	
	
	} else {
		echo "<div class='alert alert-danger' role='alert'>Email or Password are incorrects!
		<p><a href='index.html'><strong>Please try again!</strong></a></p></div>";			
	}	
?>
</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	</body>
</html>