<div class="card mt-3">
    <div class="card-header">
        用户组资料
    </div>
    <div class="card-body">
        <div class="col-12 col-sm-6">
            <x-input title="用户组名称" name="title" required value="{{$group['title']??''}}"></x-input>
            <x-input title="站点数量" name="site_nums" required value="{{$group['site_nums']??''}}"></x-input>
            <x-input title="可用天数" name="days" required value="{{$group['days']??''}}"></x-input>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        可选套餐
    </div>
    <div class="card-body">
        <table class="table table-border">
            <thead>
            <tr>
                <th width="80"></th>
                <th width="80">编号</th>
                <th width="200">套餐名称</th>
                <th>包含模块</th>
            </tr>
            </thead>
            <tbody>
            @foreach($packages as $package)
                <tr>
                    <td><input type="checkbox" name="packages[]" value="{{$package['id']}}"
                               {{$group->packages->contains($package)?'checked':''}}
                        ></td>
                    <td>{{$package['id']}}</td>
                    <td>{{$package['title']}}</td>
                    <td>
                        @foreach($package->modules as $module)
                            <span class="badge badge-primary mr-2">{{$module['title']}}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<button class="btn btn-primary mt-3">保存</button>
