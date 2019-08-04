@extends('templates.bstory.master')
@section('main')
    @section('title', 'Liên hệ')

    <div class="article">
        <h2><span>Liên hệ</span></h2>
        <div class="clr"></div>
        <p>Nếu có thắc mắc hoặc góp ý, vui lòng liên hệ với chúng tôi theo thông tin dưới đây.</p>
    </div>
    <div class="article">
        <h2>Form liên hệ</h2>
        <div class="clr"></div>
        @if(Session::has('msg'))
            <p class="category success">
                {{Session::get('msg')}}
            </p>
        @endif
        <form action="{{route('bstory.contact.index')}}" method="post" id="sendemail">
            @csrf
            <ol>
                <li>
                    <label for="name">Họ tên
                    @error('name')
                        {{ $message }}
                    @enderror
                    </label>
                    <input id="name" name="name" class="text" />
                </li>
                <li>
                    <label for="email">Email
                    @error('email')
                        {{ $message }}
                    @enderror
                    </label>
                    <input id="email" name="email" class="text" />
                </li>
                <li>
                    <label for="website">Website
                    @error('website')
                        {{ $message }}
                    @enderror
                    </label>
                    <input id="website" name="website" class="text" />
                </li>
                <li>
                    <label for="message">Nội dung
                    @error('message')
                        {{ $message }}
                    @enderror
                    </label>
                    <textarea id="message" name="message" rows="8" cols="50"></textarea>
                </li>
                <li>
                    <input type="submit" value="Send" name="submit"  src="/templates/bstory/images/submit.gif" class="send" />
                    <div class="clr"></div>
                </li>
            </ol>
        </form>
    </div>
@stop
