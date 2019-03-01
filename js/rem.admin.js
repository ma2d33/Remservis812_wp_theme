jQuery(document).ready( function($) {

	var mediaUploader;

	$('#upload-button').on('click',function(e){
		e.preventDefault();
		if(mediaUploader){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a profile pictue',
			button:{
				text: 'Choose Image'
			},
			multiple:false
		});

		mediaUploader.on('select',function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#sidebar-picture').val(attachment.url);
			$('#sidebar-picture-preview').attr('src',attachment.url);
		});/* select()*/

		mediaUploader.open();

	});/* click() */

});