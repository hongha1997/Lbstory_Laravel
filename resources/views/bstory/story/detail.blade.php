@extends('templates.bstory.master')
@section('main')
    <div class="article">
        
        <h1>{{$story->name}}</h1>
        @section('title', $story->name)
        <div class="clr"></div>
        <p>Ngày đăng: {{$story->created_at}}. Lượt đọc: {{$soso}}</p>
        <div class="vnecontent">
            <p>{!! $story->detail_text !!}</p>
        </div>
    </div>
    <div class="article">
        <h2><span>3</span> Truyện liên quan</h2>
        <div class="clr"></div>
        @foreach($haha as $haha)
        @php
            $story_id       = $haha->story_id;
            $name           = $haha->name;
            $slug           = str_slug($name);
            $preview_text   = $haha->preview_text;
            $picture        = $haha->picture;
            $urlPic         = '/storage/app/files/'.$picture;
        @endphp
        <div class="comment"> <a href="#"><img src="{{ $urlPic }}" width="40" height="40" alt="" class="userpic" /></a>
            <h3><a href="{{ route('bstory.story.detail', [$slug, $story_id]) }}" title="">{{ $name }}</a></h3>
            <p>{{ $preview_text }}</p>
        </div>
        @endforeach
    </div>
@stop
