<html>
    <?php
    require_once 'header.php';
    ?>
    <body>
        <div class="contain">
            <?php
            require_once 'nav.php';
            ?>
            <article>
                <div class="mrg">
                    <h2>Log In to Swapnoloke</h2>
                    <form name="myform4" action="../controller/loginCheck.php" method="POST">
                        <label>Phone Number:</label><br>
                        <input type="text" id="uname" name="uname" placeholder="Enter Phone Number" required><br>
                        <label>Password:</label><br>
                        <input type="password" id="password" name="password" placeholder="Enter Password" required><br><br>
                        <button type="submit" value="submit" name="login">Login</button>
                    </form>
                    <a href="">Forgot Password?</a>
                </div>
            </article>   
        </div>
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>