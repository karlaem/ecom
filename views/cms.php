<?=$this->header?><!--load header-->
<div class="margins">
    <div class="cmsmenu">
    <div class="left"> 
        <h1>Welcome <?=$this->oCurUser->username?></h1>
        <div class="clientour">
            <a href="index.php?controller=user&action=clients">Our Clients</a>
        </div>
    </div>
    <div class="clientnames">
        <?=$this->clientlist?>
    </div>
    </div>
</div>
<!--End of cms-->