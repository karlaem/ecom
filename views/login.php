<div class="margins login">
    <!--login form-->
    <div class="content form">
        <h1>Login</h1>
        <h2>Sign in to continue</h2>
        <div class="msg">
            <?php
            //check error messages
            if (isset($_GET["error"])){                        
            echo '<div class="error">something went wrong. Try Again</div>';
            }
            ?>
        </div>

        <form method="POST" action="index.php" id="formLogin">
        <input type="hidden" name="controller" value="public" />
        <input type="hidden" name="action" value="doLogIn" />

            <div class="fieldgroup required">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username"/>
                    <!--error message-->  
                    <?php
                    //errors placed here for good user experience
                if (isset($_GET["error"])){
                    if($_GET["error"]==2){
                        echo '<div class="error"><p>Wrong username</p></div>';
                    }
                }
                ?>                 
                <div class="popup">                  
                    <p>Add your username</p>
                </div>                    
            </div><!--.fieldgroup-->
            <div class="fieldgroup required">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password"/>
                <!--error message-->
                <?php
                if (isset($_GET["error"])){
                    if($_GET["error"]==1){
                        echo '<div class="error"><p>Wrong password</p></div>';
                    }
                }
                ?>
                <div class="popup">
                    <p>Add your password</p>
                </div>
            </div><!--.fieldgroup-->
            <div class="fieldgroup ">
                <button type="submit" class="ctabtn">Login</button>
            </div><!--.fieldgroup-->
        </form>
    </div><!--.content-->
</div><!--.margins-->

<!--Validate form-->
<script type="text/javascript" src="js/validate.js"></script>  
<!--End of login-->