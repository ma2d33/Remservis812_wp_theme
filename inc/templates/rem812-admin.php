<h1>Rem812 Sidebar Options</h1>
<?php settings_errors();?>

<?php 

	$firstName = esc_attr(get_option('first_name'));
	$picture = esc_attr(get_option('sidebar_picture'));
	$lastName = esc_attr(get_option('last_name'));	
	$fullName = $firstName.$lastName;

	$description = esc_attr(get_option('side_description'));
?>

<div class="rem-sidebar-preview">
	<div class="rem-sidebar">
		<div class="image-container">
			<div class="sidebar-picture">
				<img id="sidebar-picture-preview" src="<?php echo $picture ?>" />
			</div>
		</div>
		<h1 class="rem-name"><?php echo $fullName ?></h1>
		<h2 class="rem-description"><?php echo $description ?></h2>
		<div class="rem-icon-wrapper"></div>
	</div>
</div>

<form method="post" action="options.php" class="rem-general-form">
	
	<?php settings_fields( 'rem-setting-group' ); ?>
	<?php do_settings_sections( 'rem812_options' );?>
	<?php submit_button(); ?>
</form>