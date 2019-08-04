@extends('templates.admin.master')
@section('main')
    @section('title', 'Add Story')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Thêm tin</h4>
                </div>
                @if(Session::has('loi'))
                    <p class="category success">
                        {{Session::get('loi')}}
                    </p>
                @endif
                <div class="content">
                    <form action="{{route('admin.story.add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tên truyện</label>
                                    @error('namestory')
                                        <span style="color:red"> - {{ $message }}</span>
                                    @enderror 
                                    <input type="text" name="namestory" class="form-control border-input" placeholder="Họ tên" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="catstory" class="form-control border-input">
                                        @foreach($cats as $cat)
                                        <option value="{{$cat->cat_id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" name="picture" class="form-control" placeholder="Chọn ảnh" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    @error('mota')
                                        <span style="color:red"> - {{ $message }}</span>
                                    @enderror  
                                    <textarea rows="4" id="demo" class="form-control border-input ckeditor" name="mota" placeholder=""></textarea>
                                    <script type="text/javascript">
                                             CKEDITOR.replace( 'demo',
                                             {
                                                 filebrowserBrowseUrl: '/library/ckfinder/ckfinder.html',
                                                 filebrowserImageBrowseUrl: '/library/ckfinder/ckfinder.html?type=Images',
                                                 filebrowserUploadUrl: '/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                 filebrowserImageUploadUrl: '/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                                             });
                                        </script>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Chi tiết</label>
                                    @error('chitiet')
                                        <span style="color:red"> - {{ $message }}</span>
                                    @enderror  
                                    <textarea rows="4" id="demo" class="form-control border-input ckeditor" name="chitiet" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>

                         

                        <div class="text-center">
                            <input type="submit" name="submit" class="btn btn-info btn-fill btn-wd" value="Thêm" />
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@stop
