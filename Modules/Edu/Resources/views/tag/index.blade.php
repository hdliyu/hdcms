@extends('layouts.module')
@section('content')
    <nav class="nav nav-tabs nav-stacked">
        <a class="nav-link" href="{{ route('edu.admin.index') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
        </a>
        <a class="nav-link active" href="#">标签管理</a>
    </nav>
    <form action="{{ route('edu.admin.tag.store') }}" method="post">
        @csrf
        <div class="card mt-3">
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-12 col-sm-2" v-for="(tag,index) in tags" :key="index">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="title[]" v-model="tag.title" />
                            <input type="hidden" class="form-control" name="ids[]" v-model="tag.id" />
                            <a href="#" class="input-group-append" @click.prevent="del(index)">
                                <span class="input-group-text" id="basic-addon2">删除</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="button" class="btn btn-info btn-sm" @click="add">添加</button>
            </div>
        </div>
        <button class="btn btn-primary mt-3">保存</button>
    </form>
@endsection
@push('scripts')
    <script>
        window.vue={
            data:{
                tags:@json($tags)
            },
            methods:{
                add(){
                    this.tags.push({id:0,title:''})
                },
                del(i){
                    this.tags.splice(i,1);
                }
            }
        }
    </script>
@endpush
