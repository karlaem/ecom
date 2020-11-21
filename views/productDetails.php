<div class="msg">
    <?php
    //check error messages
    if (isset($_GET["error"])){        
        if ($_GET["error"] == 2){                        
            echo '<div class="error"><h2>add an image file to continue</h2</div>';
        }else{                
        echo '<div class="error"><h2>something went wrong. Try Again</h2</div>';
        }
    } 
    if (isset($_GET["success"])){                        
        echo '<div class="success"><h2>Product changes saved!</h2></div>';
        }
    ?>
</div>
<div class="productdetails">
    <?=$this->details?>
</div>
<div class="productimage">
    <?=$this->image?>
</div>
<a class="backbtn" href="index.php?controller=product&action=products">Back</a>
<!--End of product details-->