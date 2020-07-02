<div class="form-group">
    <label for="account">{{$attributes['title']}}</label>
    <input type="{{$attributes['type']}}"
           class="form-control" name="{{$attributes['name']}}" id="{{$attributes['name']}}" placeholder="{{$attributes['placeholder']}}" value="{{old($attributes['name'])}}">
    @error($attributes['name'])
    <small id="helpId" class="form-text text-danger">{{$message}}</small>
    @enderror
</div>
