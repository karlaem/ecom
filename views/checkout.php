<?=$this->nav?>
<div class="margins">
    <div class="msg">
        <?php
        //check error messages
        if(isset($_GET["success"])) {
            echo '<div class="success"><h2>New record created successfully.Your purchased is in process</h2</div>';
        }   

        if(isset($_GET["error"])) {                                          
            echo '<div class="error"><h2>something went wrong. Contact us</h2</div>';    
            if($_GET["error"] == 1){                        
                echo '<div class="error"><h2>error inserting orders</h2</div>';
            } 
            if($_GET["error"] == 2){                        
                echo '<div class="error"><h2>error inserting ordersproducts</h2</div>';
            }    
        } 
        ?>
    </div><!--end of msg-->

    <div class="ticket">
    <h1>Checkout</h1>
    <h2>Order Review</h2>
    <div class="ticketrev">
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
    echo "<p>total" .$totalamount. "</p>";
    ?>
    <a href="index.php?controller=public&action=Cart">Cancel</a>
    </div>
    </div><!--end of ticket-->

    <div class="paymentform">
        <div  class="form">
        <form method="POST" action="index.php" id="formPayment">
            <input type="hidden" name="controller" value="client" /><!--go to clientController-->
            <input type="hidden" name="action" value="sendOrder"/>
            <input type="hidden" name="id" value=""/><!--order id-->
            <div class="billing">
                <h2>Biling details</h2>

                <div class="fieldgroup required names">
                    <label>First name</label>
                    <input type="text" name="first_name" placeholder="First Name"/>              
                    <div class="popup">                  
                        <p>Add your first name</p>
                    </div>                    
                </div><!--.fieldgroup-->
                <div class="fieldgroup required names">
                    <label>Last name</label>
                    <input type="text" name="last_name" placeholder="Last Name"/>               
                    <div class="popup">                  
                        <p>Add your last name</p>
                    </div>                    
                </div><!--.fieldgroup-->

                <div class="fieldgroup required">
                <label>Email</label>
                <input type="text" name="email" value="" placeholder="your email"/><!--user email-->
                <div class="popup">                  
                    <p>Add your email</p>
                </div> 
                </div><!--.fieldgroup-->

                <div class="fieldgroup required">
                    <label>Phone</label>
                    <input type="text" name="phone" placeholder="Phone"/>             
                    <div class="popup">                  
                        <p>Add your phone number</p>
                    </div>                    
                </div><!--.fieldgroup-->

                <div class="fieldgroup required">
                <label>City</label>
                <input type="text" name="city" value="" placeholder="city"/>
                <div class="popup">                  
                    <p>Add your city</p>
                </div> 
                </div><!--.fieldgroup-->

                <div class="fieldgroup required">
                <label>Street 1</label>
                <input type="text" name="street1" value="" placeholder="your street"/>
                <div class="popup">                  
                    <p>Add street</p>
                </div> 
                </div><!--.fieldgroup-->

                <div class="fieldgroup ">
                <label>Street 2</label>
                <input type="text" name="street2" value="" placeholder="second street optional"/>
                </div><!--.fieldgroup-->

                <div class="fieldgroup required">
                <label>Zipcode</label>
                <input type="text" name="zipcode" value="" placeholder="zipcode"/>
                <div class="popup">                  
                    <p>Add your zipcode</p>
                </div> 
                </div><!--.fieldgroup-->

                <div class="fieldgroup">
                    <label>Select Country</label>
                    <select name="countryId">
                    <?php
                    if(isset($this->oCountry)){
                        foreach ($this->oCountry as $country){
                        ?>
                        <option value="<?=$country->id?>"><?=$country->name?></option>
                        <?php
                        }
                    }
                    ?>
                    </select>                 
                </div><!--.fieldgroup-->
            </div><!--.billing-->

            <div class="shipping">
                <h2>Shipping details</h2>
                <div class="fieldgroup required">
                <label>City</label>
                <input type="text" name="city" value="" placeholder="city"/>
                <div class="popup">                  
                    <p>Add your city</p>
                </div> 
                </div><!--.fieldgroup-->

                <div class="fieldgroup required">
                <label>Street 1</label>
                <input type="text" name="street1" value="" placeholder="your street"/>
                <div class="popup">                  
                    <p>Add street</p>
                </div> 
                </div><!--.fieldgroup-->

                <div class="fieldgroup ">
                <label>Street 2</label>
                <input type="text" name="street2" value="" placeholder="second street optional"/>
                </div><!--.fieldgroup-->

                <div class="fieldgroup required">
                <label>Zipcode</label>
                <input type="text" name="zipcode" value="" placeholder="zipcode"/>
                <div class="popup">                  
                    <p>Add your zipcode</p>
                </div> 
                </div><!--.fieldgroup-->

                <div class="fieldgroup">
                    <label>Select Country</label>
                    <select name="countryId">
                    <?php
                    if(isset($this->oCountry)){
                        foreach ($this->oCountry as $country){
                        ?>
                        <option value="<?=$country->id?>"><?=$country->name?></option>
                        <?php
                        }
                    }
                    ?>
                    </select>                 
                </div><!--.fieldgroup-->
               
            </div><!--.shipping-->

            <div class="payment">            
                <h2>Payment</h2>
                <div class="fieldgroup required">
                <!--select card, add card number, select expiration month, year, write cvv-->
                <label>Card number</label>
                <input type="text" name="cardnumber" value="" placeholder="cardnumber"/>
                <div class="popup">                  
                    <p>Add your cardnumber</p>
                </div> 
                </div><!--.fieldgroup-->
                <div class="fieldgroup code">
                <label>Expiration Date</label>
                <select>
                    <option value="">Month</option>
                </select>
                <select>
                    <option value="">Year</option>
                </select>
                </div><!--.fieldgroup-->

                <div class="fieldgroup required code">
                    <label>Security code</label>
                    <input id="code" type="text" name="code" value="" placeholder="Three digits"/>
                    <div class="popup">                  
                        <p>Add your security code</p>
                    </div> 
                </div>

            </div><!--.payment-->

            <div class="fieldgroup">
            <button type="submit" class="ctabtn">Submit</button>
            </div><!--.fieldgroup-->
        </div>

    </div>
</div>
<!--Validate form-->
<script type="text/javascript" src="js/validate4.js"></script> 
<!--end of checkout-->