<?php 
session_start();?>


    

    
    


<?php $Id=$_SESSION['Id']?>

<body>  
  <div class="container">
  

<?php
error_reporting(0);
	// Connection info. file
	
include 'conn.php';
// Connection variables

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	

// Query sent to database
	
$result = mysqli_query($conn, "SELECT * FROM products WHERE id_producto = '$Id'");

// Variable $row hold the result of the query
	
$row = mysqli_fetch_assoc($result);?>	

<div align='center'> 
    
        <tr> 
            <td colspan='2'><h3 align='center'>EL SALDO DE SU CUENTA ES </h3></td> 
        </tr> 
        <tr> 
            <span class="item-quantity"><h4><?php echo number_format($row['stock'],2);?></h4></span>

        </tr> 
        
  </div>
 
 <form method="post" action="extraccion.php" >

<div align='center'>
<div class="modal-body">
        
          <div class="form-group">
            <label for="quantity" class="col-sm-2 control-label">Cantidad a extraer</label>
            <div class="col-sm-6">
              <input type="number" min="0" name="cantidad" class="form-control" id="cantidad" value="" placeholder="Cantidad" required="">
            </div>
          </div>
          
          
        
      </div>



		<input type="submit" name="submit" class="btn btn-primary">
      </div>
<p><a href="menu.php">IR AL MENU</a></p>
</div>
 <? 
if ( (isset ($_POST['submit'])) { ?>
<?php 
 error_reporting(0);
 $quantity= ($_POST['cantidad']);?>
      <div class="modal-footer">
 	<?php $update=mysqli_query($conn,"update products set stock=stock-'$quantity' where id_producto='$Id'");?>
	


