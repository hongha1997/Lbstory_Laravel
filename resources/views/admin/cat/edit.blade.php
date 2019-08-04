@extends('templates.admin.master')
@section('main')
    @section('title', 'Edit Cat')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Sửa danh mục</h4>
                </div>
                <div class="content">
                    <form action="{{route('admin.cat.edit', $id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control border-input"  value="{{$cat->name}}">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Danh mục cha</label>
                                    <select name="nameparent" class="form-control border-input">
                                        <option value="0">Không</option>
                                        @foreach($cats as $cat1)
                                        <option 
                                        @if ($cat->parent==$cat1->cat_id) 
                                            {{"selected"}}
                                        @endif
                                        value="{{$cat1->cat_id}}">{{$cat1->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-info btn-fill btn-wd" value="Sửa" />
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@stop
