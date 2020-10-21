@extends('layouts.module.system')
@section('content')
@include('wechat.text.nav')
<table class="table mt-3 table-bordered">
    <thead>
        <tr>
            <th width="80">ID</th>
            <th>规则编号</th>
            <th>规则名称</th>
            <th>关键词</th>
            <th width="120"></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($texts as $text)
        <tr>
            <td>{{ $text['id'] }}</td>
            <td>{{ $text->rule->id }}</td>
            <td>{{ $text->rule->title }}</td>
            <td>
                @foreach ($text->rule->keywords as $keyword)
                <span class="badge badge-info">
                    {{ $keyword->word }}
                </span>
                @endforeach
            </td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="{{ route("wechat.text.edit",$text) }}" class="btn btn-info">编辑</a>
                    <btn-del action="{{ route('wechat.rule.destroy',$text->rule_id) }}" class="btn btn-secondary">
                    </btn-del>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
