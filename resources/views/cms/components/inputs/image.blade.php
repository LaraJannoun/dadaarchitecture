<div class="form-group">
	<label class="form-control-label d-block">{{ $label }} @include('cms.components.inputs.asterix')</label>

	{{-- Old Image Preview --}}
	@if(isset($row->$name) && $row->$name)
	<img width="200" class="img-thumbnail mb-3" @if(isset($row->$name) && $row->$name) src="{{ asset($row->$name) }}" @endif>
	@endif

	{{-- New Image Preview --}}
	<img width="200" class="img-thumbnail align-top image-preview-js d-none mb-3" src="">

	{{-- Display remove button if the image is not required --}}
	@if( isset($asterix) && $asterix != true && isset($row) && $row->$name )
	<div class="row">
		<div class="col-md mb-3 mb-md-0">
			@endif
			<input name="{{ $name }}" type="file" class="form-control form-control-alternative file-input-js">
			@if( isset($asterix) && $asterix != true && isset($row) && $row->$name )
		</div>
		<div class="col-md-auto">
			<a href="{{ route('admin.'.$page_info['link'].'.image.remove', $row->id) }}" class="btn btn btn-danger">Remove</a>
		</div>
	</div>
	@endif

	@include('cms.components.inputs.error')
</div>