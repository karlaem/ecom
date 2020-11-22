<?=$this->nav?>
<div class="margins">
<div class="cart-page">
   <h1>Your Cart</h1>   
   <a href="index.php?controller=public&action=emptyCart"> EmptyCart</a>

   <?php
   $oCart = new cart();
   ?>
   <h1>You have <strong><?=$oCart->showCartCount()?></strong> of items in your cart</h1>
   
   <?php
   //print_r($this->oCartProduct);

   if(isset($this->oCartProduct)){
      foreach ($this->oCartProduct as $key => $value) {
     //print_r($value);
     echo "<div class='cart-list'>";
      foreach ($value as $k => $data) {
       
         echo "<p>", $k ,"</p";
         echo "<p>", $data ,"</p>";
        
      }
      echo "</div>";
      }
      echo "<a href=''>Checkout</a>";
   }else{
   echo"no products";
   echo "<a href='index.php?controller=Public&action=main'>Home</a>";
   }
   ?>
</div>
</div>
<!--End of Cartpage-->