
<?php
	Assets::add_css( array(
		'bootstrap.css',
		'bootstrap-responsive.css',
        'ims.css',
        'ajax.js',
      //  'js.js'
        
        
	),'all');

	if (isset($shortcut_data) && is_array($shortcut_data['shortcut_keys'])) {
		Assets::add_js($this->load->view('ui/shortcut_keys', $shortcut_data, true), 'inline');
	}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" >
	<title><?php echo isset($toolbar_title) ? $toolbar_title .' : ' : ''; ?> <?php echo $this->settings_lib->item('site.title') ?></title>
    <link rel="shortcut icon" href="http://localhost/ims/jugnu.ico" > 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
	<meta name="robots" content="noindex" />
	<?php echo Assets::css(null, true); ?>

	<script src="<?php echo Template::theme_url('js/modernizr-2.5.3.js'); ?>"></script>
</head>
<body class="desktop">
<!--[if lt IE 7]>
		<p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or
		<a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p>
<![endif]-->


	<noscript>
		<p>Javascript is required to use Bonfire's admin.</p>
	</noscript>

<!-- Ajax Loader Image/Overlay -->
<div id="loader">
	<div class="box">
		<img src="<?php echo Template::theme_url('images/ajax_loader.gif')?>" />
	</div>
</div>

<!-- End Ajax Loader Image/Overlay -->
