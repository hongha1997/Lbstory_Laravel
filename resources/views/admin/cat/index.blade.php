@extends('templates.admin.master')
@section('main')
    @section('title', 'Cat')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Danh sách Danh mục</h4>                  
                    @if(Session::has('msg'))
                        <p class="category success">
                            {{Session::get('msg')}}
                        </p>
                    @endif
                    <a href="{{route('admin.cat.add')}}" class="addtop"><img src="/templates/admin/img/add.png" alt="" /> Thêm</a>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Chức năng</th>
                        </thead>
                        <tbody>
                        <tr>
                        <!-- <?php //echo ham($cats,0) ?> -->

                        </tr>
                        <?php
                            // function ham($cats,$parent) {
                            //     foreach($cats as $cat){
                            //         if($cat->parent==$parent){                                      
                            //             echo '<td>'.$cat->cat_id.'</td>';
                            //             echo '<td>'.$cat->name.'<ul><li>';
                            //             echo "ok";
                            //             echo '</li></ul></td>';
                            //         // echo "<li class='list-group-item menu1'>";
                            //         // echo "{$ctgr->name}";
                            //         // echo "</li>";
                            //         // echo "<ul>";
                            //         // ham($category,$ctgr->id);
                            //         // echo "</ul>";                           
                            //         }
                            //     }
                            // }
                        ?>
                        @foreach($cats as $cat)
                            @php
                                $cat_id        = $cat->cat_id;
                                $name           = $cat->name;
                                $parent        = $cat->parent;
                                $urlEdit        = route('admin.cat.edit', $cat_id);
                                $urlDel      = route('admin.cat.del', $cat_id);
                            @endphp
                        <tr>
                            @if($parent==0)
                            <td>{{$cat_id}}</td>
                            <td>{{$name}}
                                <?php echo ham($cats,$cat_id) ?>
                            </td>
                            <td>
                                <a  href="{{$urlEdit}}"><img src="/templates/admin/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                <a onclick="return xacnhanxoa('Bạn có chắc muốn xóa')" href="{{$urlDel}}"><img src="/templates/admin/img/del.gif" alt="" /> Xóa</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                        <?php
                            function ham($cats,$cat_id) {
                                foreach($cats as $cat){
                                    if($cat->parent==$cat_id){
                                    $urlEdit        = route('admin.cat.edit', $cat->cat_id);
                                    $urlDel      = route('admin.cat.del', $cat->cat_id);
                                    echo "<ul>";
                                    echo "<li>";
                                    echo "{$cat->name}";
                                    ?>
                                    <a  href="{{$urlEdit}}"><img src="/templates/admin/img/edit.gif" alt="" /></a> &nbsp;||&nbsp;
                                    <a onclick="return xacnhanxoa('Bạn có chắc muốn xóa')" href="{{$urlDel}}"><img src="/templates/admin/img/del.gif" alt="" /></a>
                                    <?php
                                    ham($cats,$cat->cat_id);
                                    echo "</li>";                                   
                                    echo "</ul>";                           
                                    }
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
@stop
