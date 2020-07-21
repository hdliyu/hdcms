<div class="form-group">
    <label for="{{ $attributes['name'] }}">{{ $attributes['title'] }}</label>
    <input type="{{ $attributes['type'] }}"
           class="form-control {{ $attributes['class']??'' }} @error( $attributes['name'] )is-invalid @enderror"
           name="{{ $attributes['name'] }}" id="{{ $attributes['name'] }}" placeholder="{{ $attributes['placeholder'] }}"
           value="{{ old($attributes['name'], $attributes['value']??'') }}" onfocus="this.classList.remove('is-invalid')">
    @error( $attributes['name'] )
    <strong class="invalid-feedback">{{ $message }}</strong>
    @enderror
</div>
