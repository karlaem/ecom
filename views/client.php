<div class="clientmenu">
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
        <a href="index.php?controller=user&action=clientorders&custumerId=<?=$client->nUsersID?>">view orders by client</a>
        <?php
        }
    }
    ?>
    
</div>
</div>

<!--view photo-->
<script src="js/viewphoto.js"></script>
<!--End of client-->