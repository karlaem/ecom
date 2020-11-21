<!--login form-->
<?php
if(isset($this->oProduct)){
foreach ($this->oProduct as $product){
?>
<div class="form subscribe">
    <h1>Add a product Image</h1>

    <form method="POST" action="index.php" id="productImages" enctype="multipart/form-data">
        <input type="hidden" name="controller" value="product" /><!--go to productController-->
        <input type="hidden" name="action" value="productImages"/>
        <input type="hidden" name="id" value="<?=$product->id?>"/>

        <div class="fieldgroup imageload">
            <label>Click to add a photo</label>
            <input class="inputfile" type="file" name="strPhoto" id="strPhoto" placeholder="Click to add image">     
        </div><!--.fieldgroup-->    

        <div class="fieldgroup">
            <label>Make primary image</label>
            <select name="bPrimary">
               <option value="1">Yes</option>
               <option value="2">No</option>
            </select>                           
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
<!--End of addproductImages-->