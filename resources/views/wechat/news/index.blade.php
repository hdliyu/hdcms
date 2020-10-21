@extends('layouts.module.system')

@section('content')
@include('wechat.news.nav')
<div class="row">
    @foreach ($news as $new)
    <div class="col-6 col-sm-2 mb-3">
        <div class="card shadow-sm ">
            <div class="wechat-news">
                @foreach ($new['contents'] as $article)
                <div>
                    <img src="{{ $article['picurl'] }}" />
                    <h5>{{ $article['title'] }}</h5>
                </div>
                @endforeach
            </div>
            <div class="card-footer text-center">
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="{{ route("wechat.news.edit",$new) }}" class="btn btn-info">编辑</a>
                    <btn-del action="{{ route('wechat.rule.destroy',$new->rule_id) }}" class="btn btn-secondary">
                    </btn-del>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{-- <table class="table mt-3 table-bordered">
    <thead>
        <tr>
            <th width="80">ID</th>
            <th>规则编号</th>
            <th>规则名称</th>
            <th>微信公众号</th>
            <th>关键词</th>
            <th width="120"></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($news as $article)
        <tr>
            <td>{{ $article['id'] }}</td>
<td>{{ $article->rule->id }}</td>
<td>{{ $article->rule->title }}</td>
<td>{{ $article->rule->wechat->title }}</td>
<td>
    @foreach ($article->rule->keywords as $keyword)
    <span class="badge badge-info">
        {{ $keyword->word }}
    </span>
    @endforeach
</td>
<td>
    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
        <a href="{{ route("wechat.news.edit",$article) }}" class="btn btn-info">编辑</a>
        <btn-del action="{{ route('wechat.rule.destroy',$article->rule_id) }}" class="btn btn-secondary">
        </btn-del>
    </div>
</td>
</tr>
@endforeach
</tbody>
</table> --}}

@endsection
