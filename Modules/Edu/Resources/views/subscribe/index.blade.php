@extends('layouts.module')
@section('content')
@include('edu::subscribe.nav')
<div class="row">
    @foreach ($subscribes as $subscribe)
        <div class="col-12 col-md-3 mt-3">
            <div class="card shadow-sm item">
                <div class="card-body text-center pb-4 pt-5 shadow">
                    <i class="fa-6x text-primary fab fa-codepen"></i>
                    <div class="mt-3 mb-2">
                        <span class="price h2">{{ (int)$subscribe['price'] }}</span>
                        <small class="text-secondary">元</small>
                    </div>
                    <div class="title font-weight-bold text-secondary h6">{{ $subscribe['title'] }}</div>
                </div>
                <div class="card-footer text-muted text-center pb-3 shadow">
                    <h5 class="text-center mb-3 mt-2">{{ $subscribe['ad'] }}</h5>
                    <a href="{{ route("edu.admin.subscribe.edit",$subscribe) }}" class="btn btn-info btn-sm">编辑</a>
                    <btn-del action="{{ route('edu.admin.subscribe.destroy',$subscribe) }}"
                             class="btn btn-secondary btn-sm">删除</btn-del>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
