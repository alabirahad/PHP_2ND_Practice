<html>
    <?php
    require_once 'header.php';
    $page = 'showGallery';
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
                require_once '../controller/photo.php';
                ?>
                <div class="mrg">
                    <h2>Update Photo Details</h2>
                    <form name="myform6" action="../controller/updatePhoto.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?php echo $userInfo->id; ?>"/>
                        <label>Existing Photo:</label><br>
                        <img src="../image/<?php echo $userInfo->photo; ?>" width="100" height="100" /><br><br>
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