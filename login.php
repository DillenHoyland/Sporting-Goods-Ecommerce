<?php
session_start();
          
$servername = "localhost";
$dbusername = "root"; 
$dbpassword = ""; 
$dbname = "prototype"; 

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$invalid = "";
$sql = "SELECT * FROM user WHERE email=?";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $prepared = $conn->prepare($sql);
    $prepared->bind_param('s', $email);
    $prepared->execute();

    $preparedResult = $prepared->get_result();
    
    if ($preparedResult->num_rows === 1) {
        $user = $preparedResult->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];      
            $_SESSION['email'] = $user['email'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['role'] = $user['role']; 

            header("Location: home.php"); 
            exit();
        } else {
            $invalid = "Password invalid. Please try again";
        }
    } else {
        $invalid = "Email invalid. Please try again";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sporting Goods Website</title>
    <link rel="stylesheet" href="styles2.css" />
  </head>


  <body>
    
    <div class="grid-container-2">
      <div class="grid-cell-1-p2" style="grid-area: box-1">
        <a href="home.php"><img id="image-1" src="images/download-removebg-preview-copy.png" /></a>
      </div>

      <div class="grid-cell-2-p2" style="grid-area: box-2">
      </div>

      <div class="grid-cell-3-p2" style="grid-area: box-3">
        
        <button><i><a href="login.php">Account</a></i></button>

        <button><i><a href="registration.php">Register</a></i></button>

        <button><i><a href="cart.php">Cart</a></i></button>

      </div>

      <div class="grid-cell-4-p2" style="grid-area: box-4">
        
        <div class="dropdown">
          <a><i>Men</i></a>
          
          <div class="dropdown-sub">
            
            <a href="category-for-all.php">Accessories</a>
           
            <a href="category-for-all.php">Clothes</a>
            
            <a href="category-for-all.php">Equipment</a>
         
          </div>
        
        </div>
        
        <div class="dropdown">
          <a><i>Women</i></a>
          
          <div class="dropdown-sub">
           
            <a href="category-for-all.php">Accessories</a>
           
            <a href="category-for-all.php">Clothes</a>
            
            <a href="category-for-all.php">Equipment</a>

          </div>
        
        </div>
        
        <div class="dropdown">
          <a><i>Kids</i></a>
          
          <div class="dropdown-sub">
           
            <a href="category-for-all.php">Accessories</a>
            
            <a href="category-for-all.php">Clothes</a>
            
            <a href="category-for-all.php">Equipment</a>
            
          </div>
        
        </div>
      </div>
      
      <div class="grid-cell-5" style="grid-area: box-5">
        <input type="text" />
      </div>
      
      </div>
      
      <h2 class="checkout-title"><i>Login</i></h2>
      
      <form action="login.php" method="POST" class="checkout">
        <br></br>
        <h3><i>Login Details</i></h3>
        <br></br>
           
        <input placeholder="Email" name="email" required>
           <br></br>
           
           <input type="password" placeholder="Password" name="password" required>
           <br></br>

          
           

    <div class="submit-container">
      
      <input type="submit" value="Login" name="login">
        
      <br></br>
        
        <a href="registration.php"><p>No Account? Sign Up</p></a>
        
   

     </div>

     
     
     <br></br>
            </form>
            <br></br>

    
      
   
    <br>

 
   <div class="bottom">
    <p><i>. Conditions of Sale <br></br> . Terms of Use <br></br>
    
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
      <a href="admin.php">. Admin Page</a>           
  <?php endif; ?>

   <p class="closing-statement"><i>© 2025 Sporting Goods Store, Inc. All rights reserved</i></p>
      
   </i></p>

    
  </div>

  
    
    
    <script src="index.js"></script>
  </body>
</html>