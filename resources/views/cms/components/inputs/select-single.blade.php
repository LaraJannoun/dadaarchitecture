<div class="form-group">
	<label class="form-control-label">{{ $label }} @include('cms.components.inputs.asterix')</label>
	<select class="select2-custom form-control" name="{{ $name }}">
		<option {{ (isset($row->$name) && $row->$name) ? '' : 'selected' }} disabled>{{ $placeholder }}</option>
		@foreach($rows as $select_row)
		<option value="{{ $select_row['id'] }}" @if(old($name) == $select_row['id'] || isset($row->$name) && $row->$name == $select_row['id']) selected @endif>{{ $select_row['title'] }}</option>
		@endforeach
	</select>

	@include('cms.components.inputs.error')
</div>