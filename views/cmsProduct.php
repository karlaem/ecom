add a product
view all products
edit a product
delete a product

<div class="productlist">
<?php
if(isset($this->oProducts)){
foreach ($this->oProducts as $product){
?>
<a href="index.php?controller=user&action=product&productid=<?=$product->id?>"><?=$product->strName?></a>
<?php
}
}
?>
</div>
<div class="productdetails">
    <?=$this->details?>
</div>
<!--End of cmsProduct-->