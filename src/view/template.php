<?php defined('APP_PATH') OR die('Access denied'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once APP_PATH.'view/head.php'; ?>
    </head>

    <body>
        <!-- Wrap all page content here -->
        <div id="wrap">

            <?php require_once APP_PATH.'view/header.php'; ?>

            <!-- Begin page content -->
            <div class="container">
                <?php require_once APP_PATH.'view/'.$content_view.'.php'; ?>
            </div>

            <?php require_once APP_PATH.'view/footer.php'; ?>

        </div>
    </body>
</html>
