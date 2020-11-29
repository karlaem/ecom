<?=$this->nav?>
<div class="margins">
<div class="msg">
   <?php
   //check error messages
   if (isset($_GET["error"])){                        
         if ($_GET["error"] == 4){                        
            echo '<div class="error"><h2>Login to start shopping</h2</div>';
         }else{                
         echo '<div class="error"><h2>something went wrong. Try Again</h2</div>';
         }
   }
   ?>
</div>
<div class="cart-page">
   <h1>Your Cart</h1>   
   <a href="index.php?controller=public&action=emptyCart">Empty Cart</a>

   <?php
   $oCart = new cart();
   ?>
   <h1>You have <strong><?=$oCart->showCartCount()?></strong> of items in your cart</h1>
   
   <?php
   //print_r($this->oCartProduct);
   $totalamount=0;
   if(isset($this->oCartProduct)){
      foreach ($this->oCartProduct as $key => $arrItemInCart) {
      //print_r($arrItemInCart);
      //echo $arrItemInCart['id'];
      echo "<div class='cart-list'>";
         echo "<p>name: " .$arrItemInCart['name']. "</p>";
         echo "<p>price: " .$arrItemInCart['price']. "</p>";
         echo "<p>quantity: " .$arrItemInCart['qty']. "</p>";
         $id=$arrItemInCart['id'];
         echo "<a href='index.php?controller=public&action=removeCart&pid=$id' >Remove</a>";
      echo "</div>";
      
      //each total
      $total= $arrItemInCart['qty'] * $arrItemInCart['price'];
      //echo "this" .$total;
      $totalamount = $totalamount + $total;

      }
      echo  "<p>Totalamount=" .$totalamount. "</p>";
      echo "<a id='checkout' href='index.php?controller=public&action=checkout'>Checkout</a>";
   }else{
   echo"no products";
   echo "<a href='index.php?controller=public&action=main'>Home</a>";
   }
   ?>
</div>
</div>
<!--End of Cartpage-->