<div class="clientinfo">
    <?php
    if(isset($this->oClient)){
        foreach ($this->oClient as $client){
        ?>
        <h2><?=$client->first_name?> <?=$client->last_name?></hw>
        <p><?=$client->email?></p>
        <p><?=$client->age?></p>
        <p><?=$client->country?></p>
        <p><?=$client->image?></p>
        <?php
        }
    }
    ?>
</div>
<!--End of client-->