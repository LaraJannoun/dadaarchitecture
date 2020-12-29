<div class="form-group">
	<label class="form-control-label">{{ $label }} @include('cms.components.inputs.asterix')</label>
	<select class="select2-custom form-control form-custom" name="users[]" multiple="">
		@foreach($rows as $select_row)
		<option value="{{ $select_row['id'] }}">{{ $select_row['title'] }}</option>
		@endforeach
	</select>

	@include('cms.components.inputs.error')
</div>