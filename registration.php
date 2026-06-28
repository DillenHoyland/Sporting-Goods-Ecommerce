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
$sql = "SELECT * FROM user WHERE email = ?";
$sql2 = "INSERT INTO user (first_name, second_name, nationality, age, sex, email, password)
                VALUES (?, ?, ?, ?, ?, ?, ?)";



if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $nationality = $_POST['nationality'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $prepared = $conn->prepare($sql);
    $prepared->bind_param('s', $email);
    $prepared->execute();
    $preparedResult = $prepared->get_result();
    $rows = $preparedResult->num_rows;

  
    if ($password !== $confirm_password) {
        $invalid = "Passwords aren't matching. Please re-enter passwords carefully";
    }
    
    elseif ($rows > 0) {
        $invalid = "The email entered is already registered. Please try another email";
    }
    
    else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $prepared2 = $conn->prepare($sql2);
        $prepared2->bind_param('sssisss', $first_name, $second_name, $nationality, $age, $sex, $email, $hashedPassword);
        
        $preparedResult2 = $prepared2->execute();
        
        
        echo $invalid = "Registration Complete!";
        header("location: login.php");
        exit();
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
    <link rel="stylesheet" href="styles5.css" />
  </head>


  <body>
    
    <div class="grid-container-2">
      <div class="grid-cell-1-p2" style="grid-area: box-1">
        <a href="home.php"><img id="image-1" src="images/download-removebg-preview-copy.png" alt="sports logo"></a>
      </div>

      <div class="grid-cell-2-p2" style="grid-area: box-2">
      </div>

      <div class="grid-cell-3-p2" style="grid-area: box-3">
       
        <button><i><a href="login.php">Account</i></a></button>

        <button><i><a href="registration.php">Register</a></i></button>

        <button><i><a href="cart.php">Cart</a></i></button>

      </div>

      <div class="grid-cell-4-p2" style="grid-area: box-4">
        
        <div class="dropdown">
          <a><i>Men</i></a>
          
          <div class="dropdown-sub">
            <a href="index15.html">Accessories</a>

            <a href="index16.html">Clothes</a>

            <a href="index7.html">Equipment</a>

         </div>
        
        </div>
        
        <div class="dropdown">
          <a><i>Women</i></a>
          
          <div class="dropdown-sub">
            <a href="index15.html">Accessories</a>

            <a href="index16.html">Clothes</a>

            <a href="index7.html">Equipment</a>

          </div>
        
        </div>
        
        <div class="dropdown">
          <a><i>Kids</i></a>
          
          <div class="dropdown-sub">
            
            <a href="index15.html">Accessories</a>

            <a href="index16.html">Clothes</a>

            <a href="index7.html">Equipment</a>

          </div>
        
        </div>

      </div>
      
      <div class="grid-cell-5" style="grid-area: box-5">
        <input type="text" />
      </div>
      
      </div>
      
      <h2 class="checkout-title"><i>Register</i></h2>

      <form action="registration.php" method="POST" class="checkout">
       
        <br></br>
        <h3><i>Personal Details</i></h3>
        <br></br>

           <input placeholder="First Name" name="first_name" required>
           <br></br>
           
           <input placeholder="Surname" name="second_name" required>
           <br></br>
           
           <input  placeholder="Nationality"name="nationality"required>
           <br></br>
    
           <input type="number" min="0" max="100" placeholder="Age" name="age" required>
           <br></br>

           <div class="radio">
            
            <i>Male</i><input type="radio" value="male"  
           name="sex" required>
           
           <i>Female</i>
           <input type="radio"  name="sex" value="female" required>
           
          </div>
           <br></br>
           <h3><i>Account Details</i></h3>
           <br></br>
           
           <input type="email" placeholder="Email" name="email" required>
            <br></br>
    
            <input type="password" placeholder="Password" name="password"required>

    <br></br>

    <input type="password" placeholder="Confirm Password" name="confirm_password" required>
    <br></br>

    <div class="submit-container">
      
      <input type="submit" value="Finish" name="register">
      <br></br>
      
      <?php
      echo "<div class='confirm-password'>$invalid</div>";
      ?>
   
    </div>
     <br></br>
            
    </form>
            <br></br>

    
      
    
    <br></br>

 
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