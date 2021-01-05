<html>
    <?php
    require_once 'header.php';
    $page='userList';
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
                require_once '../controller/edit.php';
                ?>
                <div class="mrg">
                    <h2>Update User Details</h2>
                    <form name="myform" action="../controller/update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?php echo $userInfo->id; ?>"/>
                        <label>First name:</label><br>
                        <input type="text" id="fname" name="fname" placeholder="Enter First Name" value="<?php echo $userInfo->fname; ?>" required><br>
                        <label>Last name:</label><br>
                        <input type="text" id="lname" name="lname" placeholder="Enter last Name" value="<?php echo $userInfo->lname; ?>" required><br>
                        <label>Email:</label><br>
                        <input type="text" id="mail" name="email" placeholder="xxx@xxx.xxx" value="<?php echo $userInfo->email; ?>" required><br>
                        <label>Phone:</label><br>
                        <input type="tel" id="phone" name="phone" placeholder="01XXXXXXXXX" value="<?php echo $userInfo->phone; ?>" required><br>
                        <?php
                        require_once 'select.php';
                        ?>
                        <label>Photo:</label><br>
                        <div id='epic'><img class="pic" src="../image/<?php echo $userInfo->photo; ?>" width="100" height="100" /></div>
                        <input type="file"  name="photo" value="" ><br><br>
                        <?php if (!empty($userInfo->photo)) { ?>
                            <input type="hidden" name="prev_photo" value="<?php echo $userInfo->photo; ?>" >  
                            <?php
                        }
                        ?>
                        <button type="submit" value="submit" name="submit">Update</button>
                    </form>
                </div>
            </article>
        </div>
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>