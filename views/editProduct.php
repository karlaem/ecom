<?php
    if(isset($this->oProduct)){
        foreach ($this->oProduct as $product){
        ?>
     
<div class="clientnames form">
    <h1>Edit a product</h1>

    <form method="POST" action="index.php" id="formProducts">
        <input type="hidden" name="controller" value="product" /><!--go to productController-->
        <input type="hidden" name="action" value="updateProduct"/>
        <input type="hidden" name="id" value="<?=$product->id?>"/>

        <div class="fieldgroup required">
            <label>Name</label>
            <input type="text" name="strName" value="<?=$product->strName?>" /></input>         
            <div class="popup">                  
                <p>Edit product name</p>
            </div>                    
        </div><!--.fieldgroup-->
        <div class="fieldgroup required">
            <label>Description</label>
            <textarea name="strDescription" placeholder="<?=$product->strDescription?>"><?=$product->strDescription?></textarea>   
            <div class="popup">                  
                <p>Add product description</p>
            </div>                      
        </div><!--.fieldgroup-->

        <div class="fieldgroup required">
            <label>Features</label>
            <textarea name="strFeatures" placeholder="<?=$product->strFeatures?>"><?=$product->strFeatures?></textarea> 
            <div class="popup">                  
                <p>Add product features</p>
            </div>                    
        </div><!--.fieldgroup-->

        <div class="fieldgroup required">
            <label>Price</label>
            <input type="text" name="price" value="<?=$product->price?>"/>             
            <div class="popup">                  
                <p>Add product price</p>
            </div>                    
        </div><!--.fieldgroup-->    

     
        <div class="fieldgroup ">
            <label>Select Category</label>
            <select name="category_id">
            <?php
                if(isset($this->oCategory)){
                    foreach ($this->oCategory as $category){
                    ?>
                    <option value="<?=$category->id?>"><?=$category->strName?></option>
                    <?php
                    }
                }
            ?>
            </select>                      
        </div><!--.fieldgroup--> 

        <div class="fieldgroup">
            <label>Select inventory status</label>
            <select name="status_id">
            <?php
                if(isset($this->oStatus)){
                    foreach ($this->oStatus as $status){
                    ?>
                    <option value="<?=$status->id?>"><?=$status->strName?></option>
                    <?php
                    }
                }
            ?>
            </select>                           
        </div><!--.fieldgroup--> 
            
        <div class="fieldgroup ">
            <button type="submit" class="ctabtn">Submit</button>
        </div><!--.fieldgroup-->
    </form>
</div><!--.content-->
<?php
    }
}
?>
<!--Validate form-->
<script type="text/javascript" src="js/validate3.js"></script> 
<!--End of editproduct-->