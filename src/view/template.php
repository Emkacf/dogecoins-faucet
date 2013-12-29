<?php defined('APP_PATH') OR die('Access denied'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php print_view('head'); ?>
    </head>

    <body>
        <!-- Wrap all page content here -->
        <div id="wrap">

            <?php print_view('header'); ?>

            <!-- Begin page content -->
            <div class="container">
                <?php print_view($content_view, $content_vars); ?>
            </div>

            <?php print_view('footer'); ?>

        </div>
    </body>
</html>
