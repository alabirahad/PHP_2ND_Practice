<?php
require_once '../Classes/database.php';
require_once '../lang/language.php';
$session = new Session();
$session->sessionStart();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Swapnoloke</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <header>
            <h1 class="logo"><a class="logo" href="index.php">Swapnoloke<a></h1>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            ?>
                            <button type="submit" class="login_btn" onclick="window.location.href = '../controller/logout.php';">Logout</button>
                            <?php
                        } else {
                            ?><button type="submit" class="login_btn" onclick="window.location.href = 'login.php';">Login</button>
                            <?php
                        }
                        ?>
                        </header>
                        </body>
                        </html>
