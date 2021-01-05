<html>
    <?php    
    require_once 'header.php';
    $page='manageGallery';
    $session = new Session();
    $session->sessionCheck();
    require_once '../controller/image.php';
    require_once '../controller/new_album.php';
    ?>

    <body>
        <div class="contain">
            <?php
            require_once 'nav.php';
            ?>
            <article>
                <div class="mrg">
                    <h2><a href="uploadPhoto.php">Upload New Photo</a></h2>
                    <h2><a href="createNewAlbum.php">Create New Album</a></h2>
                    <h2><a href="albumList.php">List of Albums</a></h2>
                </div>
            </article> 
        </div>

        <?php
        require_once 'footer.php';
        ?>
    </body>
</html>