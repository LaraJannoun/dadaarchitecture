<div class="form-group">
	<label class="form-control-label">{{ $label }} @include('cms.components.inputs.asterix')</label>
	<textarea name="{{ $name }}" @if(isset($maxlength) && $maxlength) maxlength="{{ $maxlength }}" @endif class="form-control form-control-alternative {{ (isset($quill) && $quill ? 'quill' : '') }}">{{ (isset($row->$name) && $row->$name) ? old($name, $row->$name) : old($name) }}</textarea>

	@if(isset($maxlength) && $maxlength)
	<p class="text-muted text-right px-3"><small><em><span>0</span> / {{ $maxlength }}</em></small></p>
	@endif

	@include('cms.components.inputs.error')
</div>