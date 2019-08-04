<div class="content table-responsive table-full-width">

                    
                    <table class="table table-striped">
                        <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Content</th>
                        <th>Show/Hide</th>
                        <th>Chức năng</th>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            @php
                                $contact_id     = $contact->contact_id;
                                $name           = $contact->name;
                                $email          = $contact->email;
                                $website        = $contact->website;
                                $content        = $contact->content;
                                $active         = $contact->active;
                                $urlDel         = route('admin.contact.del', $contact_id);
                            @endphp
                        <tr>
                            <td>{{$contact_id}}</td>
                            <td>{{$name}}</td>
                            <td>{{$email}}</td>
                            <td>{{$website}}</td>
                            <td>{{$content}}</td>
                            <td>
                                <a href="javascript:void(0)" onclick="return getTrangthai({{$active}}, {{$contact_id}})">
                                @php
                                    if($active==1){
                                    echo '<img src="/templates/admin/img/agree.png" alt="" />';
                                } else {
                                    echo '<img src="/templates/admin/img/deagree.png" alt="" />';
                                }
                                @endphp
                                </a>
                            </td>
                            <td>
                                <a onclick="return xacnhanxoa('Bạn có chắc muốn xóa')" href="{{$urlDel}}"><img src="/templates/admin/img/del.gif" alt="" /> Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>
                    
                    <script type="text/javascript">
                        // $.ajaxSetup({
                        //     headers: {
                        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //     }
                        // });
                        function getTrangthai(trangthai, id){
                            
                            var Trangthai = trangthai;
                            var Id = id;
                            //alert(Trangthai);
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: "/trangthai",
                                type: 'POST',  // POST or GET
                                cache: false, // true là lưa lại thông tin, false ko lưu, có thể xóa
                                data: {
                                    aTrangthai: Trangthai,
                                    aId: Id
                                },
                                success: function(data){ // dữ liệu lấy qua biến data
                                    //$('.jquery-demo-ajax').html(data);
                                    //alert(data);
                                    //console.log(data.success)
                                     $('#ket-qua').html(data);
                                },
                                error: function (){
                                    alert('Có lỗi xảy ra');
                                }
                            });
                            return false;
                        }
                    </script>

                    <div class="text-center">
                        {{$contacts->links()}}
                    </div>
                    
                </div>