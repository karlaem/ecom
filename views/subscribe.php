<div class="margins subscribe">
    <!--login form-->
    <div class="msg">
            <?php
            //check error messages
            if (isset($_GET["error"])){                        
            echo '<div class="error"><h2>something went wrong. Try Again</h2</div>';
            }
            if (isset($_GET["success"])){                        
                echo '<div class="success"><h2>Thank you! your subscribtion was saved</h2></div>';
                }
            ?>
        </div>
    <div class="content form">
        <h1>Subscribe</h1>
        <h2>Subscribe to be the first to recibe news and discounts about out lates products.</h2>

        <form method="POST" action="index.php" id="formSubscribe" enctype="multipart/form-data">
        <input type="hidden" name="controller" value="public" /><!--go to publicController-->
        <input type="hidden" name="action" value="doSubscribe"/>

        <div class="col-2">
            <div class="fieldgroup required imageload">
                <label>Click to add a photo</label>
                <input class="inputfile" type="file" name="image" id="image" placeholder="Click to add image">
                <!--<div id="thePhoto" imgSrc="assets/" ></div>-->          
                <div class="popup">                  
                    <p>Add your photo</p>
                </div>                    
            </div><!--.fieldgroup-->

            <div class="fieldgroup required">
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
             
                <div class="popup">                  
                    <p>Add your Country</p>
                </div>                    
            </div><!--.fieldgroup-->
        </div><!--.col-2-->
        
            <div class="fieldgroup required names">
                <label>Name</label>
                <input type="text" name="first_name" placeholder="First Name"/>
                <input type="text" name="last_name" placeholder="Last Name"/>               
                <div class="popup">                  
                    <p>Add your first and last name</p>
                </div>                    
            </div><!--.fieldgroup-->

        <div class="col-1">
            <div class="fieldgroup required">
                <label>Email</label>
                <input type="text" name="email" placeholder="Email"/>             
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
                <label>Age</label>
                <input type="text" name="age" placeholder="Age"/>             
                <div class="popup">                  
                    <p>Add your age</p>
                </div>                    
            </div><!--.fieldgroup-->
           
           
            <div class="fieldgroup ">
                <button type="submit" class="ctabtn">Submit</button>
            </div><!--.fieldgroup-->
        </div><!--.col-1-->
        </form>
    </div><!--.content-->
</div><!--.margins-->

<!--Validate form-->
<script type="text/javascript" src="js/validate2.js"></script> 
<!--upload image not done-->
<!--<script type="text/javascript" src="js/uploadimage.js"></script>-->
<!--End of login-->