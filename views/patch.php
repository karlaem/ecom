<?=$this->nav?>
<div class="margins">
<div class="productinfo">
<?php
    if(isset($this->oProduct)){
        foreach ($this->oProduct as $product){
        ?>
        <h2><?=$product->strName?></hw>
        <p><strong>Description:</strong></p>
        <p><?=$product->strDescription?></p>
        <p><strong>Features:</strong></p>
        <p><?=$product->strFeatures?></p>
        <p><strong>Price:</strong> <?=$product->price?></p>
        <p><strong>Category:</strong> <?=$product->category?></p>
        <p><strong>Status:</strong> <?=$product->inventorystatus?></p>
        <img class="pImages" src="<?=$product->strPhoto?>" alt="image<?=$product->strName?>">

        <div class="btn-two"><a href="index.php?controller=public&action=addToCart&pid=<?=$product->id?>&name=<?=$product->strName?>&price=<?=$product->price?>">Add to Cart</a></div>
        <?php
        }
    }
    ?>
</div>
<a class="backbtn" href="index.php?controller=Public&action=main">Back</a>
</div>
<!--End of patches-->