@extends('templates.bstory.master')
@section('main')
    
    @foreach($objStories as $story)
    @php
        $story_id       = $story->story_id;
        $name           = $story->name;
        $slug           = str_slug($name);
        $preview_text   = $story->preview_text;
        $counter        = $story->counter;
        $picture        = $story->picture;
        $urlPic         = 'templates/bstory/hinhanh/'.$picture;    
        $created_at     = $story->created_at;
        $urlDetail      = route('bstory.story.detail', [$slug,$story_id]);
    @endphp
    @section('title', 'Trang chủ')
    <div class="article">
        <h2>{{$name}}</h2>
        <p class="infopost">Ngày đăng: {{$created_at}}. Lượt đọc: {{$counter}}</p>
        <div class="clr"></div>
        <div class="img"><img src="{{ $urlPic }}" width="161" height="192" alt="" class="fl" /></div>
        <div class="post_content">
            <p>{{$preview_text}}</p>
            <p class="spec"><a href="{{ $urlDetail }}" class="rm">Chi tiết</a></p>
        </div>
        <div class="clr"></div>
    </div>
    @endforeach
       
        {{$objStories->links()}}
      
@stop
