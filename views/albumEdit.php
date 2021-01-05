<html>
    <?php
    require_once 'header.php';
    $page = 'manageGallery';
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
                require_once '../controller/album.php';
                ?>
                <div class="mrg">
                    <h2>Update Album Details</h2>
                    <form name="myform6" action="../controller/updateAlbum.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?php echo $userInfo->id; ?>"/>
                        <label>Album name:</label><br>
                        <input type="text" id="name" name="name" value="<?php echo $userInfo->name; ?>" required><br><br>
                        <label>Cover Photo:</label><br>
                        <img src="../image/<?php echo $userInfo->cover_photo; ?>" width="100" height="100" /><br><br>
                        <input type="file"  name="cover_photo" value="" ><br><br>
                        <?php if (!empty($userInfo->cover_photo)) { ?>
                            <input type="hidden" name="prev_cover_photo" value="<?php echo $userInfo->cover_photo; ?>" >  
                            <?php
                        }
                        ?>
                        <button type="submit" value="submit" name="submit"><?php echo label['UPDATE'] ?></button>
                    </form>
                </div>
            </article>   
        </div>
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>