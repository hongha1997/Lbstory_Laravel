@extends('templates.admin.master')
@section('main')
    @section('title', 'Edit User')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Sửa username</h4>
                </div>
                <div class="content">
                    <form action="{{route('admin.user.edit', $id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control border-input"  value="{{$user->username}}">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control border-input"  value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" name="fullname" class="form-control border-input"  value="{{$user->fullname}}">
                                    @error('fullname')
                                        {{ $message }}
                                    @enderror
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
