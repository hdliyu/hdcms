<div class="form-group">
    <label for="{{ $attributes['name'] }}">{{ $attributes['title'] }}</label>
    <div class="input-group mb-2">
    <div class="input-group-prepend">
        <select class="custom-select" name="https">
            @foreach(explode(',',$attributes['options']) as $i=>$option)
            <option {{(string)$i==$attributes['https']?'selected':''}} value="{{$i}}">{{$option}}</option>
            @endforeach
        </select>
    </div>
    <input type="{{ $attributes['type']??'text'}}"
           class="form-control {{ $attributes['class']??'' }} @error( $attributes['name'] )is-invalid @enderror"
           name="{{ $attributes['name'] }}" id="{{ $attributes['name'] }}"
           placeholder="{{ $attributes['placeholder'] }}"
           value="{{ old($attributes['name'], $attributes['value']??'') }}"
           onfocus="this.classList.remove('is-invalid')">
    @error( $attributes['name'] )
    <strong class="invalid-feedback">{{ $message }}</strong>
    @enderror
    </div>
</div>
