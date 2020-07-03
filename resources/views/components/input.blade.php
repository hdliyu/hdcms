<div class="form-group">
    <label for="account">{{$attributes['title']}}</label>
    <input type="{{$attributes['type']}}"
           class="form-control  @error($attributes['name']) is-invalid @enderror" name="{{$attributes['name']}}" id="{{$attributes['name']}}" placeholder="{{$attributes['placeholder']}}" value="{{old($attributes['name'])}}">
    @error($attributes['name'])
    <strong  class="invalid-feedback">{{$message}}</strong>
    @enderror
</div>
