<div class="form-group">
	<label class="form-control-label">{{ $label }} @include('cms.components.inputs.asterix')</label>
	<input title="{{ (isset($tooltip) && $tooltip ? $tooltip : '')}}" name="{{ $name }}" @if(isset($maxlength) && $maxlength) maxlength="{{ $maxlength }}" @endif class="form-control form-control-alternative {{ (isset($class) && $class ? $class : '') }}" @if(isset($value) && $value) value="{{ $value }}" @else value="{{ (isset($row->$name) && $row->$name) ? old($name, $row->$name) : old($name) }}" @endif @if(isset($class) && $class == 'slugify_slug') readonly @endif>

	@if(isset($class) && $class == 'slugify_slug')
	<small class="text-warning"><em>(This field will be automatically filled after writing in the <b>Title</b> field)</em></small>
	@elseif(isset($text))
	<small><em>{{ $text }}</em></small>
	@elseif(isset($maxlength) && $maxlength)
	<p class="text-muted text-right px-3"><small><em><span>0</span> / {{ $maxlength }}</em></small></p>
	@endif

	@include('cms.components.inputs.error')
</div>