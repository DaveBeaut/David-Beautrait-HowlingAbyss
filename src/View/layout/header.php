<!--------- HEADER --------->
<header>

    <div id="logoporo">

        <!-- Logo Poro -->
        <a href="index.php">
            <img src="public/images/porologoclassique.png" alt="Logo Poro en pixel art">
        </a>

        <!-- Poro's text -->
        <p>GREETINGS, SUMMONER,<br>SEARCH FOR A<br>CHAMPION</p>

    </div>

    <!-- LOGIN button -->
    <?php if (isset($_SESSION['username'])): ?>

        <div id="userAndLogout">
            <a href="index.php?action=userPage" id="userTag"><span class="username"><?php echo($_SESSION['username']); ?></span></a>
            
            <form action="index.php?action=logout" method="post">
                <button type="submit" id="logoutBtn">logout</button>
            </form>
        </div>

        <?php else: ?>

            <input class="loginBtn" type="button" value="LOGIN">

    <?php endif; ?>

    <!-- LOGIN modal box -->
    <div class="modal">

        <div class="modal-content">

            <!-- Closin -->
            <span class="close">&times;</span>
            
            <form method="POST" action="index.php?action=login">

                <!-- email -->
                <div class="modal-input">
                    <label for="email">E-MAIL:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                </div>

                <!-- password -->
                <div class="modal-input">
                    <label for="password">PASSWORD:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <!-- login btn -->
                <div id="loginmodal">
                    <input class="loginBtn" type="submit" value="LOGIN">
                </div>

            </form>

            <!-- no account + poro -->
            <div id="noaccountporo">

                <p>no account ?</p> 

                <input class="registerLink" type="button" value="register here">

            </div>

        </div>
        
    </div>

    <!-- REGISTER modal box -->
    <div class="modal" id="registerModal">

        <div class="modal-content">

            <!-- Closin -->
            <span class="close" id="registerClose">&times;</span>
            
            <form action="index.php?action=registerUser" method="post" onsubmit="return validateForm();">

                <!-- email -->
                <div class="modal-input">
                    <label for="email">E-MAIL :</label>
                    <input type="text" id="registerEmail" name="email" placeholder="enter your e-mail" required>
                </div>

                <!-- username -->
                <div class="modal-input">
                    <label for="username">LOL ACCOUNT :</label>
                    <input type="text" id="username" name="username" placeholder="enter LoL account" required>
                </div>

                <!-- password -->
                <div class="modal-input">
                    <label for="password">PASSWORD :</label>
                    <input type="password" id="registerPassword" name="password" placeholder="enter your password" required>
                </div>

                <!-- password -->
                <div class="modal-input">
                    <label for="password">CONFIRM PASSWORD :</label>
                    <input type="password" id="confirmPassword" name="confirmpassword" placeholder="confirm your password" required>
                </div>
                
                <!-- register btn -->
                <div id="registermodal">
                    <input class="registerBtn" type="submit" value="REGISTER">
                </div>

            </form>

        </div>
        
    </div>

</header>