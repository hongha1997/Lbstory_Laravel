@extends('templates.admin.master')
@section('main')
    @section('title', 'Add User')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Thêm username</h4>
                </div>
                <div class="content">
                    <form action="{{route('admin.user.add')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-16">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control border-input"  value="">
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
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" name="fullname" class="form-control border-input"  value="">
                                    @error('fullname')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thêm" />
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@stop
