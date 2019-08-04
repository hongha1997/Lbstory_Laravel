<?php

namespace App\Http\Controllers\Admin;
use App\Story;
use App\Cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{
	public function __construct(Story $mstory, Cat $mcat){
		$this->mstory = $mstory;
		$this->mcat = $mcat;
	}
    public function index(){
    	$storys = $this->mstory->getList();
        return view('admin.story.index', compact('storys'));
    }
    public function getAdd(){
    	$cats = $this->mcat->getListForLeftBar();
        return view('admin.story.add', compact('cats'));
    }
    public function postAdd(Request $request){
        $request->validate(
            [
                'namestory' => 'required',
                'mota' => 'required',
                'chitiet' => 'required',
            ],
            [
                'namestory.required'=>'Yều cầu nhập',
                'mota.required'=>'Yều cầu nhập',
                'chitiet.required'=>'Yều cầu nhập',
            ]
        );
        $namestory 		= $request->namestory;       
        $catstory 		= $request->catstory;
        $mota 			= $request->mota;
        $chitiet 		= $request->chitiet;
        //$picture 		= $request->picture;
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' ){
                return redirect()
        		->route('admin.story.add')
        		->with('loi','Chỉ được chọn file ảnh');
            }
            $name = $file->getClientOriginalName();
            
            $Hinh = str_random(4)."_".$name;
            while (file_exists("templates/bstory/hinhanh/".$Hinh)) { // Tồn tại thì nó trả về TRUE
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('templates/bstory/hinhanh',$Hinh);
            $picture = $Hinh;
        } else {
            $picture = "";
        }
        $item = [
        	'name' => $namestory,
        	'preview_text' => $mota,
        	'detail_text' => $chitiet,
        	'picture' => $picture,
        	'counter' => 0,
        	'cat_id' => $catstory,
        ];
        $result = $this->mstory->addItem($item);
        if($result) {
        	return redirect()
        		->route('admin.story.index')
        		->with('msg', 'Thêm thành công');
        } else {
        	return redirect()
        		->route('admin.story.index')
        		->with('msg', 'Lỗi');
        }
    }
    public function del($id) {
    	$picture = $this->mstory->getOldPicture($id);
    	$oldPicture = $picture->picture;
        if ($oldPicture !="" && file_exists('templates/bstory/hinhanh/'.$oldPicture)) {
            unlink('templates/bstory/hinhanh/'.$oldPicture);          
        }
    	$result = $this->mstory->delItem($id);
    	if($result) {
        	return redirect()
        		->route('admin.story.index')
        		->with('msg', 'Xóa thành công');
        } else {
        	return redirect()
        		->route('admin.story.index')
        		->with('msg', 'Lỗi');
        }
    }
    public function getEdit($id) {

    	$story = $this->mstory->getItem($id);
    	$cats = $this->mcat->getListForLeftBar();
    	return view('admin.story.edit', compact('id', 'story','cats'));
    }
    public function postEdit(Request $request, $id){
        $request->validate(
            [
                'namestory' => 'required',
                'mota'      => 'required',
                'chitiet'   => 'required',
            ],
            [
                'namestory.required'=>'Yều cầu nhập',
                'mota.required'     =>'Yều cầu nhập',
                'chitiet.required'  =>'Yều cầu nhập',
            ]
        );
        $picture = $this->mstory->getOldPicture($id);
        $oldPicture = $picture->picture;
        // if ($oldPicture !="" && file_exists('templates/bstory/hinhanh/'.$oldPicture)) {
        //     unlink('templates/bstory/hinhanh/'.$oldPicture);          
        // }
        $namestory 		= $request->namestory;       
        $catstory 		= $request->catstory;
        $mota 			= $request->mota;
        $chitiet 		= $request->chitiet;
        $xoa            = $request->xoa;
        //dd($xoa);
        if($xoa==1){
            if ($oldPicture !="" && file_exists('templates/bstory/hinhanh/'.$oldPicture)) {
                unlink('templates/bstory/hinhanh/'.$oldPicture);
            }
        }
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $duoi = $file->getClientOriginalExtension();
            if($duoi!='jpg' && $duoi!='png' && $duoi!='jpeg' ){
                return redirect()
        		->route('admin.story.Sửa')
        		->with('loi','Chỉ được chọn file ảnh');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while (file_exists("templates/bstory/hinhanh/".$Hinh)) { // Tồn tại thì nó trả về TRUE
                $Hinh = str_random(4)."_".$name;
            }
            $file->move('templates/bstory/hinhanh',$Hinh);
            //if($xoa==1){
                if ($oldPicture !="" && file_exists('templates/bstory/hinhanh/'.$oldPicture)) {
                    unlink('templates/bstory/hinhanh/'.$oldPicture);
                }
            //}
            $picture = $Hinh;
        } else {
            $picture = $oldPicture;
        }
        $item = [
        	'name' => $namestory,
        	'preview_text' => $mota,
        	'detail_text' => $chitiet,
        	'picture' => $picture,
        	'counter' => 0,
        	'cat_id' => $catstory,
        ];
        $result = $this->mstory->editItem($id, $item);
        if($result) {
        	return redirect()
        		->route('admin.story.index')
        		->with('msg', 'Sửa thành công');
        } else {
        	return redirect()
        		->route('admin.story.index')
        		->with('msg', 'Lỗi');
        }
    }
}