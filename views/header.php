<!--main menu-->
<div class="margins">
    <div class="nav">
        <!--optimized for seo, adding the logo h1 fist and the the nav-->
        <div class="logo">
            <a href="index.php?controller=Public&action=main"><h1>Camino View Patches Company</h1></a>
        </div><!-- .logo -->
        <div class="pages">
            <a href="index.php?controller=Public&action=main">Home</a>
            <?php
            if(isset($_SESSION["userId"])){
            ?>
                <a href="index.php?controller=user&action=main">Admin</a>
                <a href="index.php?action=doLogOut">Logout</a>
            <?php

            }else{
            ?>  
                <a href="index.php?controller=Public&action=login">Login</a>
            <?php
            }
            ?>
        </div>
        <span></span>
    </div><!--.nav-->
</div><!--.margins-->
<!--End of Header-->

<!--responsive menu-->
<nav role="navigation">
    <div id="menuToggle">
        <input type="checkbox"/>
        <span></span>
        <span></span>
        <span></span>

        <ul id="menu">
            <a href="index.php?controller=Public&action=main">Home</a>
            <?php
            if(isset($_SESSION["userId"])){
            ?>
                <a href="index.php?controller=user&action=main">Admin</a>
                <a href="index.php?action=doLogOut">Logout</a>
            <?php

            }else{
            ?>  
                <a href="index.php?controller=Public&action=login">Login</a>
            <?php
            }
            ?>
        </ul>
    </div>
</nav><!--end of nav-->