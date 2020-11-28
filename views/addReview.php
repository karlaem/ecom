<div class="hero3">
    <div class="margins">
        <div class="testimonialcard"> 
        <div class="msg">
            <?php
            //check error messages
            if (isset($_GET["error"])){                        
            echo '<div class="error"><h2>Something went wrong. Try Again</h2</div>';
            }
            if (isset($_GET["success"])){                        
                echo '<div class="success"><h2>Thank you! your review was saved</h2></div>';
                }
            ?>
        </div>
                    <h1 class="Theading">Write a Review</h1>
                    <div class="reviews">   

                    <form method="POST" action="index.php" id="formReview" enctype="multipart/form-data">
                    <input type="hidden" name="controller" value="client" />
                    <input type="hidden" name="action" value="doReview" />
                    <input type="hidden" name="id" value=""/>
                    <?php
                   
                        foreach ($this->oProduct as $product){
                        ?>
                    <input type="hidden" name="productId" value="<?=$product->id?>"/>
                    <?php
                        }
                    
                    ?>

                        <div class="fieldgroup required imageload">
                            <label>Add a photo of your product</label>
                            <input class="inputfile" type="file" name="image" id="image">              
                        </div><!--.fieldgroup-->

                        <div class="fieldgroup">
                            <label><h2><?=$this->oCurUser->username?></h2></label>                                                         
                        </div><!--.fieldgroup-->

                        <div class="fieldgroup required">
                            <label>Review Product</label>
                           <textarea name="strDescription" id="" cols="30" rows="10"></textarea>
                        
                            <div class="popup">
                                <p>Add a review</p>
                            </div>
                        </div><!--.fieldgroup-->
                        <div class="fieldgroup ">
                            <button type="submit" class="ctabtn">Send</button>
                        </div><!--.fieldgroup-->
                    </form>

                    </div><!--end of reviews-->
        </div><!--testimonial card-->
    </div><!--.margins-->
</div><!--.heroblue-->