<?php 
session_start();?>


    

    
    


<?php $Id=$_SESSION['Id']?>

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
	
	


	
$result = mysqli_query($conn, "SELECT * FROM products WHERE id_producto = '$Id'");


$row = mysqli_fetch_assoc($result);?>	

<div align='center'> 
    
        <tr> 
            <td colspan='2'><h3 align='center'>EL SALDO DE SU CUENTA ES </h3></td> 
        </tr> 
        <tr> 
            <span class="item-quantity"><h4><?php echo number_format($row['stock'],2);?></h4></span>

        </tr> 
        <p><a href="menu.php">IR AL MENU</a></p>
  </div>



