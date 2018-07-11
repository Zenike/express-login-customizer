jQuery(function($) {

	$(document).ready(function() {
		$('#insert-my-media').click(open_media_window);
	});

	function open_media_window() {
		if (image_frame === undefined) {

			var image_frame;

			image_frame = wp.media({
				title: 'Insert a media',
				library: {type: 'image'},
				multiple: false,
				button: {text: 'Seleeeect'}
			});

			image_frame.on('select', function() {
				// Get media attachment details from the image_frame state
				var attachment = image_frame.state().get('selection').first().toJSON();

				// Send the attachment URL to our custom image input field.
				$("#img_test").attr("src",attachment.url);

				// Send the attachment id to our hidden input
				$("#hidden_input_test").val(attachment.url);
				// imgIdInput.val( attachment.id );

				// Hide the add image link
				// addImgLink.addClass( 'hidden' );

				// // Unhide the remove image link
				// delImgLink.removeClass( 'hidden' );
			});
		}

		image_frame.open();
		return false;
	}

});
