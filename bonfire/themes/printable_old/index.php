<?php
	Assets::add_js( array( 'bootstrap.min.js', 'jwerty.js'), 'external', true);
    //Assets::add_css( array( 'print.css'), 'external', true);
    //Assets::css();
?>
<?php //echo theme_view('partials/_header'); ?>

<div class="container-fluid body">
        <?php echo Template::message(); ?>

        <?php echo Template::yield_content(); ?>
</div>

<?php // echo theme_view('partials/_footer'); ?>
