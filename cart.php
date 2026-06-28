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

if (!isset($_SESSION['user_id'])) {
  die("Please log in.");
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT product_id, quantity FROM cart WHERE user_id = ?";



$prepared = $conn->prepare($sql);
$prepared->bind_param("i", $user_id);
$prepared->execute();
$result = $prepared->get_result();
$prepared->close();

$cartItems = [];

while ($row = $result->fetch_assoc()) {
    $cartItems[$row['product_id']] = (int)$row['quantity'];
}
?>


<script>
const cartItems = <?php echo json_encode($cartItems); ?>;
</script>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sporting Goods Website</title>
    <link rel="stylesheet" href="styles10.css" />
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
      
      <h2 class="checkout-title"><i>Cart</i></h2>

      <p class="added">Item added to cart</p>

      <p class="removed">Item removed from cart</p>

      <div class="product">
        <br></br>
        
        <div class="product-1">
          
          <a href="index14.php"><img
          id="football"
          src="images/download__1_-removebg-previewcopy.png"
        /></a>

  
        
        <button class="button-1"><i>Remove from Cart</i></button>

        <button class="button-1"><i>Remove from Cart</i></button>

        <button class="button-2"><i>Add to Cart</i></button>

        <button class="button-3-dom real-add"><i>+</i></button>

        <button class="button-4-dom real-remove"><i>-</i></button>

        <p>Football - <strong>£29.99</strong><span class="football-amount"></span></p>
        
    
        
        </div>
        
       
        
        

        <div class="product-2">
           
          <a href="index9.php">
            <img
            id="football"
            src="images/images-removebg-previewcopy.png"
          /></a>
  
    
          
          <button class="button-1"><i>Remove from Cart</i></button>

          <button class="button-1"><i>Remove from Cart</i></button>

          <button class="button-2"><i>Add to Cart</i></button>

          <button class="button-5-dom real-add"><i>+</i></button>

          <button class="button-6-dom real-remove"><i>-</i></button>
          
          <p>Golf Club - <strong>£49.99</strong><span class="club-amount"></span></p>
      
          
          </div>
          
        

          <div class="product-3">
            
            <a href="index10.php"><img
            id="football"
            src="images/d213bd0985db0df77cd87872689b3025-removebg-previewcopy.png"
          /></a>
  
    
          
          <button class="button-1"><i>Remove from Cart</i></button>

          <button class="button-1"><i>Remove from Cart</i></button>

          <button class="button-2"><i>Add to Cart</i></button>

          <button class="button-7-dom real-add"><i>+</i></button>

          <button class="button-8-dom real-remove"><i>-</i></button>
          
          <p>Tennis Racket - <strong>£29.99</strong><span class="racket-amount"></span></p>
      
          
          </div>

          
            
            

           

            <div class="product-4">
                
              <a href="index12.php"><img
                id="football"
                src="images/kindpng_1091306.png"
              /></a>
      
        
              
              <button class="button-1"><i>Remove from Cart</i></button>

              <button class="button-1"><i>Remove from Cart</i></button>

              <button class="button-2"><i>Add to Cart</i></button>

              <button class="button-9-dom real-add"><i>+</i></button>

              <button class="button-10-dom real-remove"><i>-</i></button>
              
              <p>Cricket Bat - <strong>£62.99</strong> <span class="bat-amount"></span></p>
          
              
              </div>

              

             

            

              <div class="product-5">
                <a href="index11.php"><img
                id="football"
                src="images/Basketball.png"
              /></a>
      
        
              
              <button class="button-1"><i>Remove from Cart</i></button>

              <button class="button-1"><i>Remove from Cart</i></button>

              <button class="button-2"><i>Add to Cart</i></button>

              <button class="button-11-dom real-add"><i>+</i></button>

              <button class="button-12-dom real-remove"><i>-</i></button>

              <p>Basketball - <strong>£24.99</strong><span class="basketball-amount"></span></p>
              
          
              
              </div>

                  

                  <br></br>
        
      </div>
    <br></br>
    <div class="to-cart">
    <a href="checkout.php"><button><i>Go to Checkout</i></button></a>

    </div>
    <br></br>


 
    <div class="bottom">
    <p><i>. Conditions of Sale <br></br> . Terms of Use <br></br>
    
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
      <a href="admin.php">. Admin Page</a>           
  <?php endif; ?>

   <p class="closing-statement"><i>© 2025 Sporting Goods Store, Inc. All rights reserved</i></p>
      
   </i></p>

    
  </div>

  
    
    
    <script src="script2.js"></script>
    
  </body>
</html>