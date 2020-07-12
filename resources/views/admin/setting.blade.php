@extends('layouts.admin')

@section('content')
    <div class="mb-5">
        <h6 class="mb-3 pl-3 bl-5">应用扩展</h6>
        <section class="d-flex">
            <a href="{{route('admin.module.index')}}"
                class="system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3">
                <i class="fa fa-2x d-block fa fa-cubes" aria-hidden="true"></i>
                模块
            </a>
        </section>
    </div>

    <div class="mb-5">
        <h6 class="mb-3 pl-3 bl-5">用户管理</h6>
        <section class="d-flex">
            <div
                class="system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3">
                <i class="fa fa-2x d-block fa-briefcase" aria-hidden="true"></i>
                我的帐户
            </div>
            <div
                class="system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3">
                <i class="fa fa-2x d-block fa-users" aria-hidden="true"></i>
                用户组管理
            </div>
            <div
                class="system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3">
                <i class="fa fa-2x d-block fa-comments-o" aria-hidden="true"></i>
                服务套餐
            </div>
        </section>
    </div>

    <div class="mb-5">
        <h6 class="mb-3 pl-3 bl-5">系统管理</h6>
        <section class="d-flex">
            <div
                class="system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3">
                <i class="fa fa-2x d-block fa-sitemap" aria-hidden="true"></i>
                站点列表
            </div>
            <div
                class="system-menu d-flex flex-column justify-content-center align-items-center bg-white shadow-sm rounded border p-3  mr-3">
                <i class="fa fa-2x d-block fa-tachometer" aria-hidden="true"></i>
                系统配置
            </div>
        </section>
    </div>
@endsection
