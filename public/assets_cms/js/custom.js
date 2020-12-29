$(document).ready(function() {

	// Initialize Datatable
	$(".datatable").each(function(){
		$(this).DataTable({
			"aaSorting": [], // Disable auto sorting
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false
			}],
			"initComplete": function(settings, json) {
				$(this).addClass('table-responsive');
			}
		});
	});

	// Text Counter
	$('input').each(function(){
		var maxLength = $(this).attr('maxlength');

		// Set Counter Initialy
		var length = $(this).val().length;
		$(this).next('p').find('span').text(length);

		// Update Counter
		$(this).keyup(function() {
			var length = $(this).val().length;
			$(this).next('p').find('span').text(length++);
		});
	});

	// Textarea Counter
	$('textarea').each(function(){
		var maxLength = $(this).attr('maxlength');

		// Set Counter Initialy
		var length = $(this).val().length;
		$(this).next('p').find('span').text(length);

		// Update Counter
		$(this).keyup(function() {
			var length = $(this).val().length;
			$(this).next('p').find('span').text(length++);
		});
	});

	// Initialize Select2
	$(".select2-custom").each(function(){
		$(this).select2();
	});

	// Create and Edit Pages Slugify title
	$(".slugify_title").keyup(function(){
		var value = $(this).val();
		value = value.toLowerCase().replace(/ +/g,'-').replace(/[^\w-]+/g,'');
		$(".slugify_slug").val(value);
	});

	// Preview image
	$(".file-input-js").change(function() {
		readURL(this, $(this));
	});

	// Initialize quill
	if($('.quill').length > 0){
		quilljs_textarea('.quill', {
			modules: {
				toolbar: [
				[{ 'size': ['small', false, 'large', 'huge'] }],
				[{ header: [1, 2, 3, 4, 5, 6, false] }],
				[{ 'indent': '-1'}, { 'indent': '+1' }],
				['bold', 'italic', 'underline', 'strike'],
				[{ 'script': 'sub'}, { 'script': 'super' }],
				[{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'align': [] }],
				[{ 'color': [] }, 'link', 'image'],
				['clean', { 'direction': 'rtl' }],
				]
			},
			theme: 'snow'
		});
	}

	// Order Page
	$(".sortable").each(function(){
		$(this).sortable({
			update: function(event, ui) {
				$('.sortable .sortable-row').each(function(i){
					$(this).find('[name="pos[]"]').val(i + 1);
				});
			},
		});
	});

});

// Preview image functions
function readURL(input, $this) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$this.closest('.form-group').find('.image-preview-js').attr('src', e.target.result);
			$this.closest('.form-group').find('.image-preview-js').removeClass('d-none');
		}
		reader.readAsDataURL(input.files[0]);
	} else {
		$this.closest('.form-group').find('.image-preview-js').attr('src', '');
		$this.closest('.form-group').find('.image-preview-js').addClass('d-none');
	}
}
