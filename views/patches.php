<div class="margins">
<div>
    <h1>Patches</h1>
    <p>Creativity never goes out of style. Camino View Patches are created to last a lifetime.
 Wear your most meaningful memories, your dreams, your projects your lifestyle.</p>
</div>
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
        <a href="index.php?controller=public&action=mainDetail&productid=<?=$product->id?>">Detail</a>
        <?php
        }
    }
    ?>
</div>
</div>
<!--End of patches-->