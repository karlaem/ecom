<!--login form-->
<div class="msg">
    <?php
    //check error messages
    if (isset($_GET["error"])){                        
    echo '<div class="error"><h2>something went wrong. Try Again</h2</div>';
    }
    if (isset($_GET["success"])){                        
        echo '<div class="success"><h2>Product saved</h2></div>';
        }
    ?>
</div>
<div class="clientnames form subscribe">
    <h1>Add a product</h1>

    <form method="POST" action="index.php" id="formProducts">
        <input type="hidden" name="controller" value="product" /><!--go to productController-->
        <input type="hidden" name="action" value="insertProduct"/>
        <input type="hidden" name="id" value=""/>

        <div class="fieldgroup required">
            <label>Name</label>
            <input type="text" name="strName" placeholder="Name"/>          
            <div class="popup">                  
                <p>Add product name</p>
            </div>                    
        </div><!--.fieldgroup-->
        <div class="fieldgroup required">
            <label>Description</label>
            <textarea name="strDescription" cols="45" rows="5" placeholder="Product Description"></textarea>          
            <div class="popup">                  
                <p>Add description</p>
            </div>                    
        </div><!--.fieldgroup-->
        <div class="fieldgroup required">
            <label>Features</label>
            <textarea name="strFeatures" cols="45" rows="5" placeholder="Product Features"></textarea>          
            <div class="popup">                  
                <p>Add product features</p>
            </div>                    
        </div><!--.fieldgroup-->

        <div class="fieldgroup required">
            <label>Price</label>
            <input type="text" name="price" placeholder="price"/>             
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


<!--Validate form-->
<script type="text/javascript" src="js/validate3.js"></script> 
<!--End of addproduct-->