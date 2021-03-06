<div class="hero3">
<div class="margins">
    <div class="products" id="patches">
    <div class="line"></div>
        <div class="title">            
            <h1>Patches</h1>     
            <p>Creativity never goes out of style. Camino View Patches are created to last a lifetime.
            Wear your most meaningful memories, your dreams, your projects your lifestyle.</p>            
        </div><!--.title-->
        <div class="line"></div>

        <div class="categories">
            <a href="index.php?controller=Public&action=main#patches">All</a>
            <a href="index.php?controller=Public&action=main&categoryId=3#patches">Hiking</a>
            <a href="index.php?controller=Public&action=main&categoryId=1#patches">Featured</a>
            <a href="index.php?controller=Public&action=main&categoryId=5#patches">Movies</a>
            <a href="index.php?controller=Public&action=main&categoryId=4#patches">Travel</a>
        </div><!--.categories-->

        <div class="product-card">
        <?php
        if(isset($this->oProduct)){
            foreach ($this->oProduct as $product){
            ?>
            <div class="product-info">           
                <a href="index.php?controller=public&action=mainDetail&productid=<?=$product->id?>">
                <div class="product-image">
                    <img src="<?=$product->strPhoto?>" alt="image<?=$product->strName?>">
                </div></a>
                <h2><?=$product->strName?></h2>
                <div class="line"></div>
                <a class="btn-one" href="index.php?controller=public&action=mainDetail&productid=<?=$product->id?>">View Detail</a>
                <div class="btn-two"><a href="index.php?controller=public&action=addToCart&pid=<?=$product->id?>&name=<?=$product->strName?>&price=<?=$product->price?>">Add to Cart</a></div>
                <p class="price"><?=$product->price?></p>

                <div class="line"></div>
            </div>
            <?php
            }
        }
        ?>
        </div><!--.product-card-->

    </div><!--.products-->
</div><!--.margins-->
</div>
<!--End of patches-->
<?=$this->testimonial?>