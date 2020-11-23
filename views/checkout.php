<?=$this->nav?>
<div class="margins">
    <div class="msg">
        <?php
        //check error messages
        if (isset($_GET["error"])) {                                          
            echo '<div class="error"><h2>something went wrong. Contact us</h2</div>';       
        }
        if(isset($_GET["success"])){
        echo '<div class="success"><h2>Your purchased is in process</h2</div>';
        }    
        ?>
    </div><!--end of msg-->

    <div class="ticket">
    <h1>Checkout</h1>
    <h2>Order Review</h2>
    <?php
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
    }else{
    echo"no products";
    echo "<a href='index.php?controller=public&action=main'>Home</a>";
    }
    ?>
    <a href="index.php?controller=public&action=Cart">Cancel</a>
    </div><!--end of ticket-->

    <div class="payment">
    <h2>Biling details</h2>
    <h2>Shipping details</h2>
    <h2>Payment</h2>

        <div  class="form">
        <form method="POST" action="index.php" id="formPayment">
            <input type="hidden" name="controller" value="client" /><!--go to clientController-->
            <input type="hidden" name="action" value=""/>

            <input type="text" name="id" value=""/><!--order id-->
            <input type="text" name="id" value=""/><!--item id-->

            <div class="fieldgroup ">
            <label>Email</label>
            <input type="text" name="email" value="" placeholder="your email"/><!--user email-->
            </div><!--.fieldgroup-->

            <div class="fieldgroup ">
            <button type="submit" class="ctabtn">Submit</button>
            </div><!--.fieldgroup-->
        </div>

    </div>
</div>
<!--end of checkout-->