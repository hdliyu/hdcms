<div class="form-group">
    <label for="{{ $attributes['name'] }}">{{ $attributes['title'] }}</label>
    <textarea class="form-control {{ $attributes['class'] }} @error( $attributes['name'] )is-invalid @enderror"
           name="{{ $attributes['name'] }}" id="{{ $attributes['name'] }}" placeholder="{{ $attributes['placeholder'] }}"
           onfocus="this.classList.remove('is-invalid')" rows="{{$attributes['rows']??3}}">{{$slot}}</textarea>
    <div class="invalid-feedback">
    @error( $attributes['name'])
    <strong class="invalid-feedback">{{ $message }}</strong>
    @enderror
    </div>
</div>
