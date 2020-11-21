<!--login form-->
<div class="msg">
    <?php
    //check error messages
    if (isset($_GET["error"])){                        
    echo '<div class="error"><h2>something went wrong. Try Again</h2</div>';
    }
    if (isset($_GET["success"])){                        
        echo '<div class="success"><h2>Image saved</h2></div>';
        }
    ?>
</div>
<?php
if(isset($this->oProduct)){
foreach ($this->oProduct as $product){
?>
<div class="form subscribe">
    <h1>Add a product Image</h1>

    <form method="POST" action="index.php" id="productImages" enctype="multipart/form-data">
        <input type="hidden" name="controller" value="product" /><!--go to productController-->
        <input type="hidden" name="action" value="productImages"/>
        <input type="text" name="id" value="<?=$product->id?>"/>

        <div class="fieldgroup imageload required">
            <label>Click to add a photo</label>
            <input class="inputfile" type="file" name="strPhoto" id="strPhoto" placeholder="Click to add image">    
            <div class="popup">                  
                <p>Add an image file</p>
            </div>          
        </div><!--.fieldgroup-->        
            
        <div class="fieldgroup ">
            <button type="submit" class="ctabtn">Submit</button>
        </div><!--.fieldgroup-->
    </form>
<?php
    }
}
?>
</div><!--.form-->

<!--Validate form-->
<script type="text/javascript" src="js/validate4.js"></script> 

<!--End of addproductImages-->