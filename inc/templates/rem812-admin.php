<h1>Rem812 Theme Options</h1>
<?php settings_errors();?>
<form method="post" action="options.php">
	
	<?php settings_fields( 'rem-setting-group' ); ?>
	<?php do_settings_sections( 'rem812_options' );?>
	<?php submit_button(); ?>
</form>