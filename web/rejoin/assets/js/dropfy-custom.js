 $('.dropify').dropify({
	messages: {
		'default': 'Upload image',
		'replace': 'Upload image',
		'remove': 'Remove',
		'error': 'Ooops, something wrong appended.'
	},
	error: {
		'fileSize': 'The file size is too big (2M max).'
	}
});
 $('.dropify1').dropify({
	messages: {
		'default': '<i class="fa fa-upload"></i> Upload Resume',
		'replace': '<i class="fa fa-upload"></i> Upload Resume'
	}
});


 function resetPreview(name, src, fname=''){
	// let input 	 = $('input[name="'+name+'"]');
	 let input 	 = $('#profileupdateform-photo');
	 //let wrapper  = input.closest('.dropify-wrapper');
	 let wrapper  = $('div.dropify-wrapper');
	 let preview  = wrapper.find('.dropify-preview');
	 let filename = wrapper.find('.dropify-filename-inner');
	 let render 	 = wrapper.find('.dropify-render').html('');

	 input.val('').attr('title', fname);
	 wrapper.removeClass('has-error').addClass('has-preview');
	 filename.html(fname);

	 render.append($('<img />').attr('src', src).css('max-height', input.data('height') || ''));
	 preview.fadeIn();
 }