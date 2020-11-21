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
        <p><strong>Category:</strong> <?=$product->category_id?></p>
        <p><strong>Status:</strong> <?=$product->status_id?></p>
        <?php
        }
    }
    ?>
    <h2>images</h2>
    <?php
    if(isset($this->oImage)){
        foreach ($this->oImage as $image){
        if($image->id != 0){
            ?>
            <img class="pImages" src="<?=$image->strPhoto?>" alt="image<?=$image->strPhoto?>">
            <?php
        }else{
        ?>
        <p>Add image</p>
        <?php
        }
        }
    }
    ?>
</div>
<!--End of product-->