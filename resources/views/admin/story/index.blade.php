@extends('templates.admin.master')
@section('main')
    @section('title', 'Story')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Danh sách tin</h4>
                    @if(Session::has('msg'))
                        <p class="category success">
                            {{Session::get('msg')}}
                        </p>
                    @endif
                    <a href="{{route('admin.story.add')}}" class="addtop"><img  src="/templates/admin/img/add.png" alt="" /> Thêm</a>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Tiêu đề</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th>Chức năng</th>
                        </thead>
                        <tbody>

                        @foreach($storys as $story)
                            @php
                                $story_id       = $story->story_id;
                                $name           = $story->name;
                                $preview_text   = $story->preview_text;
                                $picture        = $story->picture;
                                $counter        = $story->counter;
                                $catname        = $story->catname;
                                $urlEdit        = route('admin.story.edit', $story_id);
                                $urlDel         = route('admin.story.del', $story_id);
                            @endphp
                        <tr>
                            <td>{{$story_id}}</td>
                            <td>{{$name}}</td>
                            <td>{{$preview_text}}</td>
                            @if($picture!='')
                            <td><img src="templates/bstory/hinhanh/{{$picture}}" alt="" width="100px" /></td>
                            @else 
                            <td>Không có ảnh</td>
                            @endif
                            <td>{{$counter}}</td>
                            <td>{{$catname}}</td>
                            <td>
                                <a href="{{$urlEdit}}"><img src="/templates/admin/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                <a onclick="return xacnhanxoa('Bạn có chắc muốn xóa')" href="{{$urlDel}}"><img src="/templates/admin/img/del.gif" alt="" /> Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>

                    <div class="text-center">
                        {{$storys->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
