<?php

namespace App\Http\Controllers\Admin;
use App\Cat;
use App\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatController extends Controller
{
    public function __construct(Cat $mcat, Story $mstory){
		$this->mcat = $mcat;
        $this->mstory = $mstory;
	}
	public function index(){
    	$cats = $this->mcat->getList();
        return view('admin.cat.index', compact('cats'));
    }
    public function getAdd(){
        $cats = $this->mcat->getList();
        return view('admin.cat.add', compact('cats'));
    }
    public function postAdd(Request $request){
        $request->validate(
            [
                'name' => 'required|min:6|max:32',
            ],
            [
                'name.required'=>'Yều cầu nhập',
                'name.min'=>'Yều cầu nhập lớn hơn 6 ký tự',
                'name.max'=>'Yều cầu nhập nhơ hơn 32 ký tự',
            ]
        );
        $name = trim($request->name);
        $nameparent = $request->nameparent;
        $item = [
        	'name' => $name,
            'parent' => $nameparent,
        ];
        $result = $this->mcat->addItem($item);
        if($result) {
        	return redirect()
        		->route('admin.cat.index')
        		->with('msg', 'Thêm thành công');
        } else {
        	return redirect()
        		->route('admin.cat.index')
        		->with('msg', 'Lỗi');
        }
    }
    public function del($id) {
        //xóa tin trước khi xóa thư mục
        $objStorys = $this->mstory->getItemByCat($id);
        foreach ($objStorys as $objStory) {
            $oldPicture = $objStory->picture;
            if ($oldPicture !="" && file_exists('templates/bstory/hinhanh/'.$oldPicture)) {
                unlink('templates/bstory/hinhanh/'.$oldPicture);          
            }
            $this->mstory->delItem($objStory->story_id);
        }
        // xóa danh mục con
        // $resultCon = $this->mcat->getItemCon($id); // all 38

        // if(isset($resultCon)){
        
        //     $haha2 = $this->mcat->delItemCon($resultCon->parent);
        //     if($haha2)
        //     {
        //         del($resultCon->parent);
        //     }
        // }

        $this->mcat->delItemCon($id);

    	$result = $this->mcat->delItem($id);
    	if($result) {
        	return redirect()
        		->route('admin.cat.index')
        		->with('msg', 'Xóa thành công');
        } else {
        	return redirect()
        		->route('admin.cat.index')
        		->with('msg', 'Lỗi');
        }
    }
    public function getEdit($id) {
    	$cat = $this->mcat->getItem($id);
    	$cats = $this->mcat->getList();
    	return view('admin.cat.edit', compact('id', 'cat','cats'));
    }
    public function postEdit(Request $request, $id){
        $request->validate(
            [
                'name' => 'required|min:6|max:32',
            ],
            [
                'name.required'=>'Yều cầu nhập tên truy cập',
                'name.min'=>'Yều cầu nhập lớn hơn 6 ký tự',
                'name.max'=>'Yều cầu nhập nhơ hơn 32 ký tự',
            ]
        );
        $name = trim($request->name);
        $nameparent = $request->nameparent;
        $item = [
            'name' => $name,
            'parent' => $nameparent,
        ];
        $result = $this->mcat->editItem($id, $item);
        if($result) {
        	return redirect()
        		->route('admin.cat.index')
        		->with('msg', 'Sửa thành công');
        } else {
        	return redirect()
        		->route('admin.cat.index')
        		->with('msg', 'Lỗi');
        }
    }
}
