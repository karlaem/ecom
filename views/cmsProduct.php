<div class="msg">
    <?php
    //check error messages
    if (isset($_GET["error"])){                        
    echo '<div class="error"><h2>something went wrong. Try Again</h2</div>';
    }
    if (isset($_GET["success"])){                        
    echo '<div class="success"><h2>Product Deleted</h2></div>';
    }
    ?>
</div>
<p>Click to view product details</p>
<div class="mylist">
    <div class="list">
        <div class="item">
        <div class="header">
            <div class="name"><h2>Name</h2></div>
            <div class="edit"><h2>Edit</h2></div>
			<div class="deleteBtn"><h2>Delete</h2></div>
		</div>
        <?php
        if(isset($this->oProducts)){
        foreach ($this->oProducts as $product){
        ?>
        <div class="name"><a href="index.php?controller=product&action=product&productid=<?=$product->id?>"><?=$product->strName?></a></div>
        <div class="edit"><a href="index.php?controller=product&action=editProduct&productid=<?=$product->id?>"><i class="fas fa-edit"></i></a></div>
        <div class="deleteBtn"><a href="index.php?controller=product&action=deleteProduct&productid=<?=$product->id?>"><i class="fas fa-times"></i></a></div>
        <?php
        }
        }
        ?>
        </div>
    </div>
</div>
<!--confirm delete-->
<script src="js/delete.js"></script>
<!--End of cmsProduct-->