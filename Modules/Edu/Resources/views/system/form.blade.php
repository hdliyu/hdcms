<div class="card mt-3">
    <div class="card-header">
        课程资料
    </div>
    <div class="card-body">
        <x-input name="title" required title="课程标题" value="{{ $system->title }}"></x-input>
        <x-input theme="textarea" name="description" required title="课程介绍">
            {{ old('description',$system['description']) }}</x-input>

        <x-input theme="image" title="预览图" name="preview" action="{{ route('common.upload') }}"
            image="{{ $system['preview'] }}"></x-input>

    </div>
</div>

<lesson-list class="mt-3"></lesson-list>

<button class="btn btn-primary mt-3">保存</button>
