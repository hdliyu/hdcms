@extends('layouts.admin')

@section('content')

@include('permission.nav')

<form action="{{ route('site.permission.update',[$site,$role]) }}" method="post">
    @csrf
    @method('PUT')

    @forelse ($modules as $module)
    <div class="card mt-3">
        <div class="card-header">
            {{ $module['title'] }}
        </div>
        <div class="card-body">
            <div class="bg-white p-3 shadow-sm border rounded">
                @foreach ($module['menus'] as $menu)
                <h6 class="">{{ $menu['title'] }}</h6>
                <div class="row mb-3 border-bottom pb-2">
                    @foreach ($menu['items'] as $item)
                    <div class="col-6 col-sm-2">
                        <label>
                            <input type="checkbox" name="permissions[]"
                                   value="{{permission_name($item['permission'],$site,$module) }}"
                                {{ $role->hasPermissionTo(permission_name($item['permission'],$site,$module))?'checked':'' }}>
                            {{ $item['title'] }} <small>{{ $item['permission'] }}</small>
                        </label>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <button class="btn btn-primary mt-3">保存</button>

    @empty
    <div class="text-secondary mb-3 text-center p-5 border mt-3 shadow-sm rounded">
        <i class="fa fa-info-circle" aria-hidden="true"></i> 当前站点没有任何模块，请联系站长 <strong>{{ $site->master->name }}</strong>
        添加模块
    </div>
    @endforelse

</form>

@endsection
