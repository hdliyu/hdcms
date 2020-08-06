<div class="card mt-3">
    <div class="card-header">
        站点资料
    </div>
    <div class="card-body">
        <x-input name="title" required title="站点名称" value="{{ $site['title']??'' }}"></x-input>
        <x-input theme="select" name="domain" required title="域名" value="{{ $site['domain'] }}" https="{{ $site['https']??'' }}" options="http,https"></x-input>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        默认模块
    </div>
    <div class="card-body">
        <div class="row">
            @foreach (user()->group->modules as $module)
                <div class="col-6 col-sm-2">
                    <div class="card">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ $module['preview'] }}" class="rounded-circle mb-3" style="width:50px;height:50px;" />
                            <h6>{{ $module['title'] }}</h6>
                            <span class="text-secondary small text-center">
                            {{ $module['version'] }}
                            </span>
                            <span class="text-secondary small text-center">
                            {{ $module['description'] }}
                            </span>
                        </div>
                        <div class="card-footer text-muted text-center">
                            <label>
                                <input type="radio" hidden name="module_id" value="{{ $module['id'] }}" @if($site->module_id===$module->id) checked @endif>
                                <span class="btn btn-secondary btn-sm">设置为默认</span>
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<button class="btn btn-primary mt-3">保存</button>

@push('styles')
    <style>
        input[name='module_id']:checked+span {
            background: #EA4A57;
            border-color: transparent;
        }
    </style>
@endpush
