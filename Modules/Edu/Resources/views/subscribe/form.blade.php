<div class="card mt-3">
    <div class="card-header">
        添加套餐
    </div>
    <div class="card-body">
        <x-input title="套餐标题" name="title" value="{{ $subscribe['title'] }}"></x-input>
        <x-input title="图标" name="icon" value="{{ $subscribe['icon'] }}"></x-input>
        <small class="mb-3 d-block">请访问 <a
                href="https://fontawesome.com/icons?d=gallery">https://fontawesome.com/icons?d=gallery</a>
            获取图标</small>
        <x-input type="number" title="价格" name="price" value="{{ $subscribe['price'] }}"></x-input>
        <x-input type="number" title="套餐月数" name="month" value="{{ $subscribe['month'] }}"></x-input>
        <x-input title="套餐介绍" name="ad" value="{{ $subscribe['ad'] }}"></x-input>
    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-primary btn-sm">保存</button>
    </div>
</div>
