<div class="hero2">
<?=$this->header?><!--load header-->
    <div class="margins">
        <div class="cmsmenu">
            <div class="left"> 
                <h1>Welcome <?=$this->oCurUser->username?></h1>
                <div class="cmsbtns">
                    <a href="#">Your Account</a>
                </div><!--cmsbtns-->
            </div><!--.left-->
            <div class="right">
                <?=$this->list?>
            </div>
        </div><!--cmsmenu-->
    </div><!--.margins-->
</div><!--.hero2-->
<!--End of cms-->