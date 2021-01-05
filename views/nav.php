<nav>
    <ul>
        <h3>
            <li><a class="<?php if($page=='home'){echo 'active';}?>" href="index.php">Home</a></li>
            <li><a class="<?php if($page=='showGallery'){echo 'active';}?>" href="gallery.php">Show Gallery</a></li>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li><a class="<?php if($page=='manageGallery'){echo 'active';}?>" href="manageGallery.php">Manage Gallery</a></li>
                <li><a class="<?php if($page=='userList'){echo 'active';}?>" href="userinfo.php">Users List</a></li>
                <li><a class="<?php if($page=='registration'){echo 'active';}?>" href="registration.php">Registration</a></li>
                <?php
            }
            ?>
        </h3>
    </ul>
</nav>