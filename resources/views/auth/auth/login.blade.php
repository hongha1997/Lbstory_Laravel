@extends('templates.admin.master')
@section('main')
     @section('title', 'Login')
    <div class="row">
       
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Đăng nhập</h4>
                </div>
                @if(Session::has('msg'))
                    <p class="category success">
                        {{Session::get('msg')}}
                    </p>
                @endif
                <div class="content">
                    <form action="{{route('auth.auth.login')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control border-input"  value="">
                                    @error('username')
                                        <p class="category success">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control border-input"  value="">
                                    @error('password')
                                        <p class="category success">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="text-center">
                            <input type="submit" class="btn btn-info btn-fill btn-wd" value="Đăng nhập" />
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@stop
