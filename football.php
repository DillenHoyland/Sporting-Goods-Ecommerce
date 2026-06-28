<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sporting Goods Website</title>
    <link rel="stylesheet" href="styles8.css" />
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
      
      <h2 class="checkout-title"><i>Football</i></h2>
      <p class="added">Item added to cart</p>
      <div class="product">
        <br></br>
        <div class="product-1">
            <img
            id="football"
            src="images/download__1_-removebg-previewcopy.png"
          /> 
        <p><i><strong>£29.99</strong></i></p>
       <br></br>
        <p><i>Literally, The best football anybody can lay their feet on. Nothing is comparable to this splendid sphere. </i></p>
        <br></br>
        <ul>
            <li>Decayed Poly-Fibres</li>
            <li>Durability scores exceedingly</li>
            <li>Firm yet thin design</li>
            <li>Nano-needling</li>
        </ul>
        </div>
        <br></br>
        <button class="button-1 real-add" data-product-id="1" type="button">Add to Cart</button>
          </div>
          

          
            <br></br>

           
              <br></br>

              

                
                  <br></br>
        
      </div>
    <br></br>
    <div class="to-cart">
      <a href="cart.php"><button><i>Go to Cart</i></button></a>
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

  
    
    
    <script>document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".real-add").forEach((btn) => {
    btn.addEventListener("click", async () => {
      const productId = btn.dataset.productId;
        await fetch("api-cart.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: `product_id=${encodeURIComponent(productId)}&action=add`,
        });
        alert("Item added to cart!");
    });
  });
});</script>
  </body>
</html>