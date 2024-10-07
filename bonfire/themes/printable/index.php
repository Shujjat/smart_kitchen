<?php
Assets::add_css(array('print.css','style.css'),'all');
Assets::add_js( array( 'print.js', ));
echo Assets::css();
echo Template::yield_content(); 
echo Assets::js();   
?>


