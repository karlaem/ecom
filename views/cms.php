<div class="hero2">
<?=$this->header?><!--load header-->
    <div class="margins">
        <div class="cmsmenu">
            <div class="left"> 
                <h1>Welcome <?=$this->oCurUser->username?></h1>
                <div class="clientour">
                    <a href="index.php?controller=user&action=clients">Our Clients</a>
                </div><!--clientour-->
            </div><!--.left-->
            <div class="clientnames">       
                <div class="clientmenu">
                    <div class="clientnamelist">
                    <?php
                    if(isset($this->oClients)){
                    foreach ($this->oClients as $client){
                    ?>
                    <a href="index.php?controller=user&action=clients&clientid=<?=$client->id?>"><?=$client->first_name?></a>
                    <?php
                    }
                    }
                    ?>
                    </div><!--.clientnamelist-->
                    <div class="clientinfo">
                    <?php
                    if(isset($this->oClient)){
                    foreach ($this->oClient as $client){
                    ?>
                     <div class="edithProfilePhoto">
                        <div id="thePhoto" imgSrc="<?=$client->image?>" ></div>
                    </div>
                    <h2><?=$client->first_name?> <?=$client->last_name?></hw>
                    <p><?=$client->email?></p>
                    <p><?=$client->age?></p>
                    <p><?=$client->country?></p>
                    <?php
                    }
                    }
                    ?>
                    </div><!--.clientinfo-->
                </div><!--clientmenu-->
            </div><!--clientnames-->
        </div><!--cmsmenu-->
    </div><!--.margins-->
</div><!--.hero2-->
<!--End of cms-->

<!--view photo-->
<script>
var photoTrigger = document.getElementById("thePhoto");
//see backgroung image
var ImagePath = photoTrigger.getAttribute("imgsrc");
photoTrigger.style.backgroundImage ='url('+ImagePath+')';
</script>