<div class="productinfo">
    <?php
    if(isset($this->oProduct)){
        foreach ($this->oProduct as $product){
        ?>
        <h2><?=$product->strName?></hw>
        <p><?=$product->strDescription?></p>
        <p><?=$product->strFeatures?></p>
        <p>Price: <?=$product->price?></p>
        <?php
        }
    }
    ?>
</div>
<!--End of client-->