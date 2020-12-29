<div class="form-group">
	<label class="form-control-label">{{ $label }} @include('cms.components.inputs.asterix')</label>
	<input type="number" name="{{ $name }}" class="form-control form-control-alternative {{ (isset($class) && $class ? $class : '') }}" value="{{ (isset($row->$name) && $row->$name) ? old($name, $row->$name) : old($name) }}">

	@include('cms.components.inputs.error')
</div>