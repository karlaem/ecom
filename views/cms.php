<div class="hero2">
<?=$this->header?><!--load header-->
    <div class="margins">
        <div class="cmsmenu">
            <div class="left"> 
                <h1>Welcome <?=$this->oCurUser->username?></h1>
                <div class="cmsbtns">
                    <a href="index.php?controller=user&action=clients">Our Clients</a>
                    <a href="index.php?controller=product&action=products">Our Products</a>
                    <a href="index.php?controller=product&action=addProduct">Add Product</a>
                    <a href="index.php?controller=user&action=clientorders">Orders</a>
                </div><!--cmsbtns-->
            </div><!--.left-->
            <div class="right">
                <?=$this->list?>
            </div>
        </div><!--cmsmenu-->
    </div><!--.margins-->
</div><!--.hero2-->
<!--End of cms-->