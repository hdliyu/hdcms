@if (Browser::isMobile())
{{ $data->onEachSide(-1)->links() }}
@else
{{ $data->withQueryString()->links() }}
@endif
