<div class="card mt-3">
    <div class="card-header">
        角色资料
    </div>
    <div class="card-body">
        <x-input name="title" required title="角色名称" placeholder="请输入中文角色名称" value="{{ $role['title']??'' }}"></x-input>
        <x-input name="name" required title="角色标识" placeholder="请输入英文标识" value="{{ $role['name']??'' }}"></x-input>
    </div>
</div>
<button class="btn btn-primary mt-3">保存</button>
