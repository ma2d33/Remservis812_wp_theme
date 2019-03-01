<h1>Rem812 Theme Support</h1>
<?php settings_errors();?>

<?php 


	// $picture = esc_attr(get_option('sidebar_picture'));


	$description = esc_attr(get_option('side_description'));
?>



<form method="post" action="options.php" class="rem-general-form">
	
	<?php settings_fields( 'rem-theme-support' ); ?>
	<?php do_settings_sections( 'rem_theme_support_page' );?>
	<?php submit_button(); ?>
</form>