<div class="form-group">
    <label for="{{ $attributes['name'] }}">{{ $attributes['title'] }} (924*150)</label>
    <div class="{{ $attributes['class']??'' }} @error( $attributes['name'] )is-invalid @enderror">
        <image-single name="{{$attributes['name']}}" image="{{$attributes['image']}}" action="{{$attributes['action']??route('common.upload')}}"></image-single>
    </div>
    @error( $attributes['name'] )
    <strong class="invalid-feedback">{{ $message }}</strong>
    @enderror
</div>
