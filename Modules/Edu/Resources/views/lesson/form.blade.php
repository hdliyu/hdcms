<div class="card mt-3">
    <div class="card-header">
        基本资料
    </div>
    <div class="card-body">
        <x-input title="标题" name="title" require value="{{ $lesson['title'] }}"></x-input>
        <div class="mt-2 mb-2">
            @foreach ($tags as $tag)
                <label class="mr-2">
                    <input type="checkbox" name="tags[]" value="{{ $tag['id'] }}"
                        {{ $lesson->tags->contains($tag) ?'checked':""}}>
                    {{ $tag['title'] }}
                </label>
            @endforeach
        </div>
        <x-input theme="textarea" title="视频介绍" name="description" require>{{ $lesson['description'] }}</x-input>
        <x-input theme="image" title="网站标志" name="thumb" action="{{ route('common.upload') }}"
                image="{{ $lesson['thumb'] }}"></x-input>
        <div class="form-group">
            <input type="checkbox" name="status" {{ $lesson['status']?'checked':'' }} id="status">
            <label for="status">上架</label>
        </div>

        <x-input title="视频下载地址" name="download_address" require value="{{ $lesson['download_address'] }}"></x-input>
        <x-input type="number" title="免费观看数量" name="free_num" require value="{{ $lesson['free_num'] }}"></x-input>
    </div>
</div>
<lesson-videos></lesson-videos>
<button class="btn btn-primary mt-3">保存</button>

@push('scripts')
    <script>
        window.videos = @json($lesson->videos) ;
    </script>
@endpush
