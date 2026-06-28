<?php 
session_start();

$first_name = "";
if (isset($_SESSION['email'])) {
    $first_name = $_SESSION['first_name'];
}

if ($first_name) {
  echo '<h1> Welcome, ' . htmlspecialchars($first_name) . 
  '!</h1>';
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sporting Goods Website</title>
    <link rel="stylesheet" href="styles.css" />
  </head>


  <body>
    
    <div class="grid-container">
      <div class="grid-cell-1" style="grid-area: box-1">
        <a href="home.php"><img id="image-1" src="images/download-removebg-preview-copy.png" /></a>
      </div>

      <div class="grid-cell-2" style="grid-area: box-2">
</div>


      <div class="grid-cell-3" style="grid-area: box-3">
        <button><i><a href="login.php">Account</a></i></button>

        <button><i><a href="registration.php">Register</a></i></button>
        
        <button><i><a href="cart.php">Cart</a></i></button>
      
      </div>

      <div class="grid-cell-4" style="grid-area: box-4">
        
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
      

      <a href="category-for-all.php"><div class="grid-cell-6" style="grid-area: box-6">
        <h2><i>Featured</i></h2>
        
        <p>
          <img
            id="image-2"
            src="images/download__1_-removebg-previewcopy.png"
          />

          <img
            id="image-3"
            src="images/d213bd0985db0df77cd87872689b3025-removebg-previewcopy.png"
          />

          <img id="image-4" src="images/images-removebg-previewcopy.png" />
        </p>
      </div></a>

      <a href="category-for-all.php"><div class="grid-cell-7" style="grid-area: box-7">
        <h2><i>Recommended</i></h2>
        
        <p>
          <img
            id="image-2"
            src="images/download__1_-removebg-previewcopy.png"
          />

          <img
            id="image-3"
            src="images/d213bd0985db0df77cd87872689b3025-removebg-previewcopy.png"
          />

          <img id="image-4" src="images/images-removebg-previewcopy.png" />
        </p>
      </div></a>

      <a href="category-for-all.php"><div class="grid-cell-8" style="grid-area: box-8">
        <h2><i>New</id></h2>
        
          <p>
          <img
            id="image-2"
            src="images/download__1_-removebg-previewcopy.png"
          />

          <img
            id="image-3"
            src="images/d213bd0985db0df77cd87872689b3025-removebg-previewcopy.png"
          />

          <img id="image-4" src="images/images-removebg-previewcopy.png" />
        </p>
      </div>
    </a>
      
    </div>
    <br></br>
    
<div class="flex-items">
    <img id="image-5" src="images/download__1___1_-removebg-previewcopy.png">
    
    
    <p id="caption">Embrace Action...</p>
</div>
 
   <div class="bottom">
    <p>. Conditions of Sale <br></br> . Terms of Use <br></br> 
    
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
      <a href="admin.php">. Admin Page</a>           
  <?php endif; ?>
             
       <p class="closing-statement">© 2025 Sporting Goods Store, Inc. All rights reserved</p>
      
    </p>
    
  </div>

  
    
    
    <script src="index.js"></script>
  </body>
</html>
