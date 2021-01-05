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
                if ((isset($_SESSION['msg'])) && (!empty($_SESSION['msg']))) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    header("Refresh:2");
                }
                require_once '../controller/new_album.php';
                ?>
                <div class="mrg">
                    <form name="myform3" action="createNewAlbum.php" method="POST" enctype="multipart/form-data">
                        <h2>Create New Album</h2>
                        <label>New Album Name:</label><br>
                        <input type="text"  name="new_album" required><br><br>
                        <label>Insert Cover Photo:</label><br><br>
                        <input type="file"  name="cover_photo" required><br><br>
                        <button type="submit" value="submit" name="submit_album_name">Create Album</button>
                    </form>
                </div>
            </article> 
        </div>
        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>