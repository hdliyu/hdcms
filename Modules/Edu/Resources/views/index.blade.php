@extends('edu::layouts.front')

@section('content')
<div class="container mt-3 mt-md-5 mb-5">
    <div class="row">
        <div class="col-12 col-sm-9 mt-2">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    社区动态
                    <a href="{{ route('edu.front.topic.create') }}" class="btn btn-outline-secondary btn-sm">发表</a>
                </div>
                <div class="card-body">
                    @foreach ($activities as $activity)
                    @include('edu::layouts.activity.'.$activity['log_name'])
                    @endforeach
                    <div class="pt-3">
                        @include('edu::layouts.paginate',['data'=>$activities])
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-3 mt-2 pl-0">
            @include('edu::topic.tips')
            @include('edu::layouts.study')
        </div>
    </div>
</div>
@endsection
