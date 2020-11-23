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
      foreach ($this->oCartProduct as $key => $arrItemInCart) {
      print_r($arrItemInCart);
      /*for($i = 0; $i < count($arrItemInCart); $i++) {
         print_r ($arrItemInCart[$i]);
      }*/
     
     /*echo "<div class='cart-list'>";
      echo "</div>";*/
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