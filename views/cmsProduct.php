edit a product
delete a product
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
        <div class="edit"><a href="#"><i class="fas fa-edit"></i></a></div>
        <div class="deleteBtn"><a href="#"><i class="fas fa-times"></i></a></div>
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