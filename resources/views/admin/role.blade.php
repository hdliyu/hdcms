@extends('layouts.admin')
@section('content')
    @include('admin.nav')
    <form action="{{ route('site.admin.role.update',[$site,$user]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card mt-3">
            <div class="card-header">
                设置管理员 <strong>{{ $user->name }}</strong> 的角色
            </div>
            <div class="card-body">
                @foreach ($site->roles as $role)
                    <label class="mr-2 mb-2">
                        <input type="checkbox" name="roles[]" value={{ $role['id'] }}
                            {{ $user->hasRole($role['name'])?'checked':'' }}> {{ $role['title'] }}
                        <a href="{{ route('site.permission.edit',[$site,$role]) }}" class="small">
                            <span class="badge badge-info">查看权限</span>
                        </a>

                    </label>
                @endforeach
            </div>
        </div>
        <button class="btn btn-primary mt-3">保存</button>
    </form>
@endsection
