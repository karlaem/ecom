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
    </div>
</div>
<!--End of clients-->