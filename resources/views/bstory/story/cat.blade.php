@extends('templates.bstory.master')
@section('main')
    <div class="article">
        <h1><span>Danh mục: {{$nameCat->name}}</span></h1>
        @section('title', $nameCat->name)
    </div>
    @foreach($cat as $catItem)
    @php
        $story_id       = $catItem->story_id;
        $name           = $catItem->name;
        $slug           = str_slug($name);
        $preview_text   = $catItem->preview_text;
        $counter        = $catItem->counter;
        $picture        = $catItem->picture;   
        $created_at     = $catItem->created_at;
    @endphp
    <div class="article">
        <h2>{{ $name }}</h2>
        <p class="infopost">Ngày đăng: {{$created_at}}. Lượt đọc: {{$counter}}</p>
        <div class="clr"></div>
        <div class="img"><img src="/templates/bstory/hinhanh/{{$picture}}" width="161" height="192" alt="" class="fl" /></div>
        <div class="post_content">
            <p>{!!$preview_text!!}</p>
            <p class="spec"><a href="{{ route('bstory.story.detail',[$slug, $story_id]) }}" class="rm">Chi tiết</a></p>
        </div>
        <div class="clr"></div>
    </div>
    @endforeach
    {{$cat->links()}}
@stop
