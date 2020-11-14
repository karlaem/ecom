<div class="hero2">
<?=$this->header?><!--load header-->
    <div class="margins">
        <div class="cmsmenu">
            <div class="left"> 
                <h1>Welcome <?=$this->oCurUser->username?></h1>
                <div class="clientour">
                    <a href="index.php?controller=user&action=clients">Our Clients</a>
                    <a href="index.php?controller=user&action=products">Our Products</a>
                </div><!--clientour-->
            </div><!--.left-->
            <div class="clientright">
                <?=$this->clientlist?>
            </div>
        </div><!--cmsmenu-->
    </div><!--.margins-->
</div><!--.hero2-->

<!--view photo-->
<script>
    var photoTrigger = document.getElementById("thePhoto");
    //see backgroung image
    var ImagePath = photoTrigger.getAttribute("imgsrc");
    photoTrigger.style.backgroundImage ='url('+ImagePath+')';
</script>
<!--End of cms-->