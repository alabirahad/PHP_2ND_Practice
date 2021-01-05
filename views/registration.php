<html>
    <?php
    require_once 'header.php';
    $page='registration';
    $session = new Session();
    $session->sessionCheck();
    ?>
    <body>
        <div class="contain">
            <?php
            require_once 'nav.php';
            ?>
            <article>
                <?php
                if ((isset($_SESSION['msg'])) && (!empty($_SESSION['msg']))) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    header("Refresh:2");
                }
                require_once '../controller/reg.php';
                ?>
                <div class="mrg">

                    <h2>Please Fill up for Registration</h2>

                    <form name="myform" action="" method="POST" enctype="multipart/form-data">
                        <label>First name:</label><br>
                        <input type="text" id="fname" name="fname" placeholder="Enter First Name" required><br>
                        <label>Last name:</label><br>
                        <input type="text" id="lname" name="lname" placeholder="Enter last Name"required><br>
                        <label>Email:</label><br>
                        <input type="text" id="mail" name="email" placeholder="xxx@xxx.xxx" required><br>
                        <label>Phone:</label><br>
                        <input type="tel" id="phone" name="phone" placeholder="01XXXXXXXXX" required><br>
                        <?php
                        require_once 'select.php';
                        ?>
                        <label>Password:</label><br>
                        <input type="password" id="password" name="password" placeholder="Enter Password" required><br>
                        <label>Photo:</label><br>
                        <input type="file"  name="photo" required><br><br>
                        <button type="submit" value="submit" name="submit">Register</button>
                    </form>
                </div>
            </article>   
        </div>
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>