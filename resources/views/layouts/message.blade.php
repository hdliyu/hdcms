@foreach(['danger','info','success'] as $item)
    @if(session()->has($item))
        <div class="alert alert-{{ $item }}" role="alert">
            <strong>{{ session()->get($item) }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endforeach
