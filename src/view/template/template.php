<?php defined('APP_PATH') OR die('Access denied'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php print_view('template/head'); ?>
    </head>

    <body>
        <!-- Wrap all page content here -->
        <div id="wrap">

            <?php print_view('template/header'); ?>

            <!-- Begin page content -->
            <div class="container">
                <?php print_view($content_view, $content_vars); ?>
            </div>

            <?php print_view('template/footer'); ?>

        </div>
    </body>
</html>
