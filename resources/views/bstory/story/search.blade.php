@extends('templates.bstory.master')
@section('main')
    <div class="article">
    	@php
    		function doimau($str, $tukhoa)
    		{
    			return str_replace($tukhoa, "<span style='color:red'>$tukhoa</span>",$str);
    		}
    	@endphp
        <h1>Tìm kiếm với từ khóa: <span style="color:red">{{$tukhoa}}</span></h1>
        @section('title', 'Tìm kiếm')
    </div>
    @foreach($tintucs as $tintuc)
    @php
        $story_id       = $tintuc->story_id;
        $name           = $tintuc->name;
        $slug           = str_slug($name);
        $preview_text   = $tintuc->preview_text;
        $counter        = $tintuc->counter;
        $picture        = $tintuc->picture;   
        $created_at     = $tintuc->created_at;
    @endphp
    <div class="article">
        <h2>{{$name}}</h2>
        <p class="infopost">Ngày đăng: {{$created_at}}. Lượt đọc: {{$counter}}</p>
        <div class="clr"></div>
        <div class="img"><img src="/templates/bstory/hinhanh/{{$picture}}" width="161" height="192" alt="" class="fl" /></div>
        <div class="post_content">
            <p>{{$preview_text}}</p>
            <p class="spec"><a href="{{ route('bstory.story.detail',[$slug, $story_id]) }}" class="rm">Chi tiết</a></p>
        </div>
        <div class="clr"></div>
    </div>
    @endforeach
    {{$tintucs->links()}}
@stop
