<div class="herodetail">
    <?=$this->nav?>
    <div class="margins productdetail">
        <div class="productinfo">
        <?php
            if(isset($this->oProduct)){
                foreach ($this->oProduct as $product){
                ?>
                <div class="pleft">
                    <h2><?=$product->strName?></h2>
                    <div class="des">
                        <p><strong>Description:</strong></p>
                        <p><?=$product->strDescription?></p>
                    </div>

                    <div class="des">
                        <p><strong>Features:</strong></p>
                        <p><?=$product->strFeatures?></p>
                        <p><strong>Price:</strong> <?=$product->price?></p>
                        <p><strong>Category:</strong> <?=$product->category?></p>
                        <p><strong>Status:</strong> <?=$product->inventorystatus?></p>
                    </div>

                    <div class="btn"><a class="ctabtn" href="index.php?controller=public&action=addToCart&pid=<?=$product->id?>&name=<?=$product->strName?>&price=<?=$product->price?>">Add to Cart</a></div>
                    <a class="btn-patch" href="index.php?controller=Public&action=main">Back</a>    
                    
                </div><!--pleft-->
                <div class="pright">
                    <img class="pImages" src="<?=$product->strPhoto?>" alt="image<?=$product->strName?>">
                </div><!--pright-->
            <?php
                }
            }
            ?>
        </div><!--productinfo-->
    </div><!--margins-->
</div><!--herodetail-->

<!--End of patches-->